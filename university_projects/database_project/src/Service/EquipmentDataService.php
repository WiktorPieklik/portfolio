<?php


namespace App\Service;


use App\Common\Common;
use App\Entity\Department;
use App\Entity\Equipment;
use App\Repository\BasketRepository;
use App\Repository\EquipmentRepository;
use Doctrine\ORM\EntityManagerInterface;

class EquipmentDataService extends AbstractService
{
    /** @var EquipmentRepository */
    private $equipmentRepo;

    /** @var BasketRepository */
    private $basketRepo;

    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(EquipmentRepository $equipmentRepo, BasketRepository $basketRepo, EntityManagerInterface $entityManager)
    {
        $this->equipmentRepo = $equipmentRepo;
        $this->basketRepo = $basketRepo;
        $this->entityManager = $entityManager;
    }

    /**
     * @param Department $department
     * @return Equipment[]|object[]
     */
    public function getEquipmentsForDepartment(Department $department)
    {
        return $this->equipmentRepo->findBy(["department" => $department, "status" => Equipment::STATUS_FREE]);
    }

    public function addEquipmentToBasket(Equipment $equipment)
    {
        $this->basketRepo->insertEquipmentIntoBasket($equipment);
    }

    public function checkIfPossibleToAddToBasket(Equipment $equipment): bool
    {
        if($this->basketRepo->getUserBasketCount(Common::getUser()) == 0)
        {
            return true;
        }

        $basketEquipmentsId = $this->basketRepo->getUserEquipmentsId(Common::getUser());
        $basketEquipment = $this->equipmentRepo->findOneBy(["id" => $basketEquipmentsId[0]]);
        if($this->areDepartmentsEqual($basketEquipment->getDepartment(), $equipment->getDepartment()))
        {
            return true;
        }

        return false;
    }

    private function areDepartmentsEqual(Department $dep1, Department $dep2): bool
    {
        if($dep1->getId() != $dep2->getId())
        {
            return false;
        }

        return true;
    }

    public function handleAction(?string $isRepair, ?string $isUtilize, ?array $equipments)
    {
        $damagedEquipments = [];

        if($equipments != null)
        {
            foreach($equipments as $id)
            {
                $damagedEquipments[] = $this->entityManager
                    ->getRepository(Equipment::class)
                    ->findOneBy(["id" => $id]);
            }
        }

        if($isRepair == "true")
        {
            $this->repairEquipments($damagedEquipments);
        }
        if($isUtilize == "true")
        {
            $this->disposeEquipments($damagedEquipments);
        }
    }

    private function disposeEquipments(?array $equipments)
    {
        if($equipments != null)
        {
            /** @var Equipment $equipment */
            foreach($equipments as $equipment)
            {
                $equipment
                    ->setStatus(Equipment::STATUS_UTILIZED);
                $this->entityManager->persist($equipment);
            }
            $this->entityManager->flush();
        }
    }

    private function repairEquipments(?array $equipments)
    {
        if($equipments != null)
        {
            /** @var Equipment $equipment */
            foreach($equipments as $equipment)
            {
                $equipment
                    ->setStatus(Equipment::STATUS_FREE)
                    ->setTimeTillService(60);
                $this->entityManager->persist($equipment);
            }
            $this->entityManager->flush();
        }
    }
}