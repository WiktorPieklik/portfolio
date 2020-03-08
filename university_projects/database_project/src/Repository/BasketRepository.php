<?php

namespace App\Repository;

use App\Common\Common;
use App\Entity\Basket;
use App\Entity\Equipment;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Basket|null find($id, $lockMode = null, $lockVersion = null)
 * @method Basket|null findOneBy(array $criteria, array $orderBy = null)
 * @method Basket[]    findAll()
 * @method Basket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BasketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Basket::class);
    }

    // /**
    //  * @return Basket[] Returns an array of Basket objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Basket
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function emptyBasket(User $user)
    {
        $this->createQueryBuilder("b")
            ->delete()
            ->where("b.user_id = :id")
            ->setParameter("id", $user->getId())
            ->getQuery()
            ->execute();
    }

    public function getUserEquipmentsId(User $user)
    {
        return $this->createQueryBuilder("b")
            ->select("b.equipment_id")
            ->where("b.user_id = :id")
            ->setParameter("id", $user->getId())
            ->getQuery()
            ->getResult();
    }

    public function getUserBasketCount(User $user)
    {
        return $this->createQueryBuilder("b")
            ->select("count(b.id)")
            ->where("b.user_id = :id")
            ->setParameter("id", $user->getId())
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function removeEquipmentFromBasket(Equipment $equipment)
    {
        $equipment->setStatus(Equipment::STATUS_FREE);
        $this->getEntityManager()->persist($equipment);
        $this->getEntityManager()->flush();

        $this->createQueryBuilder("b")
            ->delete()
            ->where("b.equipment_id = :id")
            ->setParameter("id", $equipment->getId())
            ->getQuery()
            ->execute();
    }

    public function insertEquipmentIntoBasket(Equipment $equipment)
    {
        $equipment->setStatus(Equipment::STATUS_IN_BASKET);
        $basket = new Basket();
        $basket
            ->setEquipmentId($equipment->getId())
            ->setUserId(Common::getUser()->getId());

        $this->getEntityManager()->persist($basket);
        $this->getEntityManager()->persist($basket);
        $this->getEntityManager()->flush();
    }
}
