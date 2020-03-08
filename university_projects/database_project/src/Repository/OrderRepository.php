<?php

namespace App\Repository;

use App\Entity\OrderT;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method OrderT|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderT|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderT[]    findAll()
 * @method OrderT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderT::class);
    }

    // /**
    //  * @return OrderT[] Returns an array of OrderT objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderT
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getUserActiveOrders(User $user, string $dateOrderBy = "DESC")
    {
        return $this->createQueryBuilder("o")
            ->where("o.user = :user")
            ->setParameter('user', $user)
            ->andWhere("o.created_at is not null")
            ->andWhere("o.reserved_at is null")
            ->andWhere("o.finished_at is null")
            ->orderBy("o.created_at", $dateOrderBy)
            ->getQuery()
            ->getResult();
    }

    public function getUserReservations(User $user, $dateOrderBy = "DESC")
    {
        return $this->createQueryBuilder("o")
            ->where("o.user = :user")
            ->setParameter('user', $user)
            ->andWhere("o.created_at is null")
            ->andWhere("o.reserved_at is not null")
            ->andWhere("o.finished_at is null")
            ->orderBy("o.reserved_at", $dateOrderBy)
            ->getQuery()
            ->getResult();
    }

    public function getUserFinishedOrders(User $user, $dateOrderBy = "DESC")
    {
        return $this->createQueryBuilder("o")
            ->where("o.user = :user")
            ->setParameter("user", $user)
            ->andWhere("o.finished_at is not null")
            ->orderBy("o.finished_at", $dateOrderBy)
            ->getQuery()
            ->getResult();
    }

}
