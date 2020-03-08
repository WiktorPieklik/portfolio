<?php

namespace App\Repository;

use App\Entity\DamageReport;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\DBAL\Connection;
use PDO;

/**
 * @method DamageReport|null find($id, $lockMode = null, $lockVersion = null)
 * @method DamageReport|null findOneBy(array $criteria, array $orderBy = null)
 * @method DamageReport[]    findAll()
 * @method DamageReport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DamageReportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DamageReport::class);
    }

    // /**
    //  * @return DamageReport[] Returns an array of DamageReport objects
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
    public function findOneBySomeField($value): ?DamageReport
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findDamageReportForGivenServiceman(User $user)
    {
        return $this->createQueryBuilder("r")
            ->join("App:OrderT", "o")
            ->where("r.status = :status")
            ->setParameter("status", DamageReport::STATUS_DAMAGE_NOT_ASSIGNED)
            ->andWhere("o.endDepartment = :servicemanDep")
            ->setParameter("servicemanDep", $user->getDepartmentID())
            ->orderBy("r.created_at", 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function getServiceReportsCount(User $serviceman)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT COUNT(d.id) FROM damage_report d JOIN damage_report_equipment dre ON(d.id=dre.damage_report_id)
                JOIN equipment e ON(dre.equipment_id=e.id)
                WHERE e.department_id = :serviceman_dep_id AND d.status = :status ";
        $values = ["serviceman_dep_id" => $serviceman->getDepartmentID(),
                   "status" => DamageReport::STATUS_SERVICE_NOT_ASSIGNED];
        $types = ["serviceman_dep_id" => PDO::PARAM_INT, "status" => PDO::PARAM_STR];

        return $conn->executeQuery($sql, $values, $types)->fetchColumn(0);
    }

    public function getDamageReportsCount(User $serviceman)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT COUNT(DISTINCT d.id) FROM damage_report d JOIN damage_report_equipment dre ON(d.id=dre.damage_report_id)
                JOIN equipment e ON(dre.equipment_id=e.id)
                WHERE e.department_id = :serviceman_dep_id AND d.status = :status ";
        $values = ["serviceman_dep_id" => $serviceman->getDepartmentID(),
            "status" => DamageReport::STATUS_DAMAGE_NOT_ASSIGNED];
        $types = ["serviceman_dep_id" => PDO::PARAM_INT, "status" => PDO::PARAM_STR];

        return $conn->executeQuery($sql, $values, $types)->fetchColumn(0);
    }

    public function flushUnsignedServiceReports()
    {
        $conn = $this->getEntityManager()->getConnection();
        $damageReportSQL = "DELETE FROM damage_report WHERE status= :status";
        $value = ["status" => DamageReport::STATUS_SERVICE_NOT_ASSIGNED];
        $type = ["status" => PDO::PARAM_STR];

        $conn->executeQuery($damageReportSQL, $value, $type);
    }
}
