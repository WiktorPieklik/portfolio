<?php

namespace App\Repository;

use App\Entity\EquipmentCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EquipmentCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipmentCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipmentCategory[]    findAll()
 * @method EquipmentCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipmentCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipmentCategory::class);
    }

    // /**
    //  * @return EquipmentCategory[] Returns an array of EquipmentCategory objects
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
    public function findOneBySomeField($value): ?EquipmentCategory
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
