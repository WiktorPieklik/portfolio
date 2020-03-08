<?php


namespace App\Service;


use App\Common\Common;
use App\Entity\DamageReport;
use App\Entity\Equipment;
use App\Entity\OrderT;
use App\Repository\DamageReportRepository;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;

class DamageReportDataService extends AbstractService
{
    /** @var DamageReportRepository */
    private $damageRepo;

    /** @var OrderDataService */
    private $orderService;

    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(DamageReportRepository $damageRepo, OrderDataService $orderService, EntityManagerInterface $entityManager)
    {
        $this->damageRepo = $damageRepo;
        $this->orderService = $orderService;
        $this->entityManager = $entityManager;
    }

    public function getDamageReports()
    {
        return $this->damageRepo->findDamageReportForGivenServiceman(Common::getUser());
    }

    public function reportDamage(OrderT $order, ?array $equipments, ?string $message, int $departmentId)
    {
        $damageReport = new DamageReport();
        $damageReport->setAttachedOrder($order)
            ->setStatus(DamageReport::STATUS_DAMAGE_NOT_ASSIGNED)
            ->setMessage($message)
            ->setCreatedAt(Carbon::now());

        $this->orderService->finishOrder($order, $departmentId);

        if($equipments != null)
        {
            foreach ($equipments as $id)
            {
                /** @var Equipment $equipment */
                $equipment = $this->entityManager->getRepository(Equipment::class)
                    ->findOneBy(["id" => $id]);
                $equipment->setStatus(Equipment::STATUS_DAMAGED);
                $equipment->addDamageReport($damageReport);
                $this->entityManager->persist($equipment);
            }
        }
        $this->entityManager->persist($damageReport);
        $this->entityManager->flush();
    }

    public function finishDamageReport(DamageReport $damageReport)
    {
        $damageReport->setStatus(DamageReport::STATUS_DAMAGE_FINISHED);
        $this->entityManager->persist($damageReport);
        $this->entityManager->flush();
    }
}