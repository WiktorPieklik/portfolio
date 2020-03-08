<?php

namespace App\Repository;

use App\Entity\Department;
use App\Entity\Equipment;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Equipment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipment[]    findAll()
 * @method Equipment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Equipment::class);
    }

    // /**
    //  * @return Equipment[] Returns an array of Equipment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Equipment
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getFreeSlotsCountForDepartment(Department $department)
    {
        return $this->createQueryBuilder("e")
            ->select("d.slots_count - COUNT(e)")
            ->join("App:Department", "d")
            ->where("e.department = :department")
            ->setParameter("department", $department)
            ->setMaxResults(1)
            ->groupBy("d")
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getEquipmentsToService(Department $department)
    {
        return $this->createQueryBuilder("e")
            ->where("e.status = :status")
            ->setParameter("status", Equipment::STATUS_NEEDS_SERVICE)
            ->andWhere("e.department = :department")
            ->setParameter("department", $department)
            ->getQuery()
            ->getResult();
    }
}
