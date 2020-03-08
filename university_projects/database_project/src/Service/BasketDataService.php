<?php


namespace App\Service;


use App\Common\Common;
use App\Entity\Basket;
use App\Entity\Equipment;
use App\Entity\User;
use App\Repository\BasketRepository;
use App\Repository\EquipmentRepository;
use Doctrine\ORM\EntityManagerInterface;

class BasketDataService extends AbstractService
{
    /** @var BasketRepository */
    private $basketRepo;

    /** @var EquipmentRepository */
    private $equipmentRepo;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->basketRepo = $entityManager->getRepository(Basket::class);
        $this->equipmentRepo = $entityManager->getRepository(Equipment::class);
    }

    public function getBasketEquipments()
    {
        $equipments = [];
        $equipmentsId = $this->basketRepo->getUserEquipmentsId(Common::getUser());
        foreach($equipmentsId as $id)
        {
            $equipments[] = $this->equipmentRepo->findOneBy(["id" => $id]);
        }

        return $equipments;
    }

    public function removeEquipmentFromBasket(Equipment $equipment)
    {
        $this->basketRepo->removeEquipmentFromBasket($equipment);
    }

    public function getBasketCount(User $user)
    {
        return $this->basketRepo->getUserBasketCount($user);
    }

    public function emptyBasket(User $user)
    {
        $this->basketRepo->emptyBasket($user);
    }
}