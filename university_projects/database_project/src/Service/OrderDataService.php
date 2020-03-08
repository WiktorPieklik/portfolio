<?php

namespace App\Service;

use App\Common\Common;
use App\Entity\DamageReport;
use App\Entity\Department;
use App\Entity\Equipment;
use App\Entity\OrderT;
use App\Entity\User;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Carbon\Carbon;

class OrderDataService extends AbstractService
{
    private const MINUTES_DIFF = "minutes_diff";
    private const HOURS_DIFF = "hours_diff";
    private const DAYS_DIFF = "days_diff";

    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var OrderRepository */
    private $orderRepo;

    /** @var BasketDataService */
    private $basketService;


    public function __construct(EntityManagerInterface $entityManager, BasketDataService $service)
    {
        $this->entityManager = $entityManager;
        $this->orderRepo = $entityManager->getRepository(OrderT::class);
        $this->basketService = $service;
        date_default_timezone_set("Europe/Warsaw");
    }

    public function getUserActiveOrders(User $user)
    {
        return $this->orderRepo->getUserActiveOrders($user);
    }

    public function getUserReservations(User $user)
    {
        $this->updateReservations($user);
        return $this->orderRepo->getUserReservations($user);
    }

    private function updateReservations(User $user)
    {
        /** @var OrderT[] $reservations */
        $reservations = $this->orderRepo->getUserReservations($user);
        foreach($reservations as $reservation)
        {
            $format = "Y-m-d H:i:s";
            $startDate = Carbon::createFromFormat($format, $reservation->getreserved_at()->format($format));
            $now = Carbon::now();
            if($now->diffInMinutes($startDate) >= 30)
            {
                $attachedEquipments = $reservation->getEquipments();
                foreach($attachedEquipments as $equipment)
                {
                    $equipment->removeOrder($reservation);
                    $equipment->setStatus(Equipment::STATUS_FREE);
                    $this->entityManager->persist($equipment);
                    $this->entityManager->flush();
                }
                $this->entityManager->remove($reservation);
                $this->entityManager->flush();
            }
        }
    }

    public function getUserFinishedOrders(User $user)
    {
        return $this->orderRepo->getUserFinishedOrders($user);
    }

    public function getOrderEquipments()
    {
        return $this->basketService->getBasketEquipments();
    }

    public function emptyBasket(bool $isRemoval = false)
    {
        if($isRemoval)
        {
            $basketEquipments = $this->getOrderEquipments();
            foreach($basketEquipments as $equipment)
            {
                $this->basketService->removeEquipmentFromBasket($equipment);
            }
        }
        else
        {
            $this->basketService->emptyBasket(Common::getUser());
        }
    }

    public function processOrder(User $user, ?bool $isReservation = false, ?int $reservationId = -1)
    {
        /** @var Equipment[] $equipments */
        $equipments = null;

        /** @var OrderT $reservation */
        $reservation = null;

        if($isReservation)
        {
            global $equipments, $reservation;
            $reservation =  $this->orderRepo->findOneBy(["id" => $reservationId]);
            $equipments = $reservation->getEquipments();

            $this->entityManager->remove($reservation);
        }
        else
        {
            global $equipments;
            $equipments = $this->getOrderEquipments();
        }

        $order = new OrderT();
        $order
            ->setCreatedAt(Carbon::now())
            ->setReservedAt(null)
            ->setUser($user)
            ->setStartDepartment($equipments[0]->getDepartment());

        foreach($equipments as $equipment)
        {
            $equipment->addOrder($order);
            $equipment->setStatus(Equipment::STATUS_OCCUPIED);
            $equipment->setDepartment(null);
            $this->entityManager->persist($equipment);
        }

        $this->entityManager->persist($order);

        $this->entityManager->flush();
        $this->emptyBasket();
    }

    public function finishOrder(OrderT $order, $d_id)
    {
        /** @var Department $endDepartment */
        $endDepartment = $this->entityManager->getRepository(Department::class)->findOneBy(["id" => $d_id]);
        $finalPrice = 0.0;

        //distance is the same for all ordered equipments
        $distance = $this->calculateDistance($order);

        $equipments = $order->getEquipments();
        foreach($equipments as $equipment)
        {
            $finalPrice += $this->calculatePrice($order, $equipment->getPrice());
            $currentTimeTillService = $equipment->getTimeTillService();
            $equipmentDetails = $this->getProperEquipmentStatusAndTime($currentTimeTillService, $order);
            $currentDistance = $equipment->getMilleage();
            $equipment
                ->setDepartment($endDepartment)
                ->setStatus($equipmentDetails[0]) //if equipment is damaged it will be overwritten in reportDamage
                ->setMilleage($distance + $currentDistance)
                ->setTimeTillService($equipmentDetails[1]);
            $this->entityManager->persist($equipment);
        }

        $order
            ->setFinishedAt(Carbon::now())
            ->setEndDepartment($endDepartment)
            ->setPrice($finalPrice);

        $this->entityManager->persist($order);
        $this->entityManager->flush();
    }

    /**
     * This method return status_free either status_needs_service and time till next service based on given
     * equipment time till next service
     *
     * @param int $currentTimeTillService
     * @param OrderT $order
     * @return string
     */
    private function getProperEquipmentStatusAndTime(int $currentTimeTillService, OrderT $order): array
    {
        $activeUse = $this->orderTimeDiff($order, self::MINUTES_DIFF);
        if($currentTimeTillService - $activeUse > 0)
        {
            return [Equipment::STATUS_FREE, $currentTimeTillService - $activeUse];
        }
        else
        {
            return [Equipment::STATUS_NEEDS_SERVICE, $currentTimeTillService - $activeUse];
        }
    }

    private function calculateDistance(OrderT $order)
    {
        //TODO: restore diff in hours
        $hoursDiff = $this->orderTimeDiff($order, self::MINUTES_DIFF); //should be in hours but it would take to much time to present it
        if($hoursDiff != 0)
        {
            $fakeMileage = rand(30, 100) * 0.1;
            return $hoursDiff * $fakeMileage;
        }
        else
        {
            return 0.0;
        }

    }

    private function calculatePrice(OrderT $order, float $equipmentPrice)
    {
        $daysCount = $this->orderTimeDiff($order, self::DAYS_DIFF);
        if($daysCount == 0)
        {
            return $equipmentPrice;
        }
        else
        {
            return $equipmentPrice * $daysCount;
        }
    }

    private function orderTimeDiff(OrderT $order, string $diffType = self::MINUTES_DIFF)
    {
        $dateFormat = "Y-m-d H:i";
        $start = Carbon::createFromFormat($dateFormat , $order->getcreated_at()->format($dateFormat));
        $end = Carbon::now();
        switch($diffType)
        {
            default:
            case self::MINUTES_DIFF:
                return $end->diffInMinutes($start);
            case self::HOURS_DIFF:
                return $end->diffInHours($start);
            case self::DAYS_DIFF:
                return $end->diffInDays($start);
        }
    }

    public function processReservation(User $user)
    {
        /** @var Equipment[] $equipments */
        $equipments = $this->getOrderEquipments();

        $order = new OrderT();
        $order
            ->setReservedAt(Carbon::now())
            ->setUser($user)
            ->setStartDepartment($equipments[0]->getDepartment());

        foreach($equipments as $equipment)
        {
            $equipment->addOrder($order);
            $equipment->setStatus(Equipment::STATUS_RESERVED);
            $this->entityManager->persist($equipment);
        }

        $this->entityManager->persist($order);

        $this->entityManager->flush();
        $this->emptyBasket();
    }
}