<?php


namespace App\Service;


use App\Common\Common;
use App\Entity\DamageReport;
use App\Entity\Department;
use App\Entity\Equipment;
use App\Entity\User;
use App\Repository\DamageReportRepository;
use App\Repository\EquipmentRepository;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;

class SystemService
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var EquipmentRepository */
    private $equipmentRepo;

    public function __construct(EntityManagerInterface $entityManager, EquipmentRepository $equipmentRepo)
    {
        $this->entityManager = $entityManager;
        $this->equipmentRepo = $equipmentRepo;
    }

    public function getEquipmentsToBeServiced(User $serviceman)
    {
        /** @var Department $department */
        $department = $this->entityManager
            ->getRepository(Department::class)
            ->findOneBy(["id" => $serviceman->getDepartmentID()]);

        return $this->equipmentRepo->getEquipmentsToService($department);
    }

    public function getServiceReports(User $serviceman)
    {
        /** @var DamageReportRepository $damageRepo */
        $damageRepo = $this->entityManager->getRepository(DamageReport::class);
        $damageRepo->flushUnsignedServiceReports();
        $equipments = $this->getEquipmentsToBeServiced($serviceman);
        $serviceReports = [];
        /** @var Equipment $equipment */
        foreach($equipments as $equipment)
        {
            $serviceReport = new DamageReport();
            $serviceReport
                ->setStatus(DamageReport::STATUS_SERVICE_NOT_ASSIGNED)
                ->setCreatedAt(Carbon::now())
                ->addEquipment($equipment)
                ->setMessage(DamageReport::SERVICE_MESSAGE);
            $this->entityManager->persist($serviceReport);
            $serviceReports[] = $serviceReport;
        }
        $this->entityManager->flush();

        return $serviceReports;
    }

    public function assignServiceReport(DamageReport $serviceReport)
    {
        $serviceReport
            ->setStatus(DamageReport::STATUS_SERVICE_IN_PROGRESS)
            ->setServiceman(Common::getUser());
        /** @var Equipment $equipment */
        foreach($serviceReport->getEquipments() as $equipment)
        {
            $equipment->setStatus(Equipment::STATUS_IN_SERVICE);
            $this->entityManager->persist($equipment);
        }
        $this->entityManager->persist($serviceReport);
        $this->entityManager->flush();
    }

    public function finishServiceReport(DamageReport $damageReport)
    {
        $damageReport->setStatus(DamageReport::STATUS_SERVICE_FINISHED);
        foreach($damageReport->getEquipments() as $equipment)
        {
            $equipment
                ->setStatus(Equipment::STATUS_FREE)
                ->setTimeTillService(60);
            $this->entityManager->persist($equipment);
        }
        $this->entityManager->persist($damageReport);
        $this->entityManager->flush();
    }

}