<?php

namespace App\Repository;

use App\Entity\Department;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Department|null find($id, $lockMode = null, $lockVersion = null)
 * @method Department|null findOneBy(array $criteria, array $orderBy = null)
 * @method Department[]    findAll()
 * @method Department[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Department::class);
    }

    // /**
    //  * @return Department[] Returns an array of Department objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Department
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getDepartmentsWithFreeSlots()
    {
        return $this->createQueryBuilder("d")
            ->select("d")
             ->leftJoin("App:Equipment", "e", 'WITH', "e.department = d")
            ->groupBy("d")
            ->having("d.slots_count - COUNT(e) > 0")
            ->getQuery()
            ->getResult();
    }

    public function getFreeSlotsCountForDepartment(Department $department)
    {
        return $this->createQueryBuilder("d")
            ->select("d.slots_count - COUNT(e)")
            ->join("App:Equipment", "e")
            ->where("e.department = :department")
            ->setParameter("department", $department)
            ->setMaxResults(1)
            ->groupBy("d")
            ->getQuery()
            ->getOneOrNullResult();
    }
}
