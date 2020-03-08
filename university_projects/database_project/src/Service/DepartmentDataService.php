<?php


namespace App\Service;


use App\Entity\Department;
use App\Entity\Equipment;
use App\Repository\DepartmentRepository;
use App\Repository\EquipmentRepository;
use Doctrine\ORM\EntityManagerInterface;

class DepartmentDataService extends AbstractService
{
    /** @var DepartmentRepository */
    private $departmentRepo;
    /** @var EquipmentRepository */
    private $equipmentRepo;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->departmentRepo = $entityManager->getRepository(Department::class);
        $this->equipmentRepo = $entityManager->getRepository(Equipment::class);
    }

    /**
     * @return Department[]
     */
    public function getDepartments()
    {
        return $this->departmentRepo->findAll();
    }
}