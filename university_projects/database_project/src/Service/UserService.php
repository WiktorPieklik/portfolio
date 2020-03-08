<?php


namespace App\Service;


use App\Common\Common;
use App\Entity\DamageReport;
use App\Entity\Department;
use App\Entity\User;
use App\Repository\DepartmentRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService extends AbstractService
{
    /** @var UserPasswordEncoderInterface */
    private $encoder;

    /** @var UserRepository */
    private $userRepo;

    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var DepartmentRepository */
    private $departmentRepo;


    public function __construct(UserPasswordEncoderInterface $encoder, UserRepository $userRepo, EntityManagerInterface $entityManager, DepartmentRepository $departmentRepo)
    {
        $this->encoder = $encoder;
        $this->userRepo = $userRepo;
        $this->entityManager = $entityManager;
        $this->departmentRepo = $departmentRepo;
    }

    public function encodePassword(string $password, User $user)
    {
        $encodedPassword = $this->encoder->encodePassword($user, $password);
        $user->setPassword($encodedPassword);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function isUserExisting(string $username): bool
    {
        return $this->userRepo->isExisting($username);
    }

    public function getFreeDepartments()
    {
        return $this->departmentRepo->getDepartmentsWithFreeSlots();
    }

    public function getFreeSlotsCountForDepartment(Department $department)
    {
        $count = $this->departmentRepo->getFreeSlotsCountForDepartment($department);
        if($count != null)
        {
            return (int)$count["1"];
        }
        return $department->getSlotsCount();
    }

    public function assignDamageReport(DamageReport $damageReport)
    {
        $damageReport
            ->setStatus(DamageReport::STATUS_DAMAGE_IN_PROGRESS)
            ->setServiceman(Common::getUser());
        $this->entityManager->persist($damageReport);
        $this->entityManager->flush();
    }

    public function getAssignedDamageReports()
    {
        return $this->entityManager
                    ->getRepository(DamageReport::class)
                    ->findBy(["serviceman" => Common::getUser(),
                              "status" => DamageReport::STATUS_DAMAGE_IN_PROGRESS],
                             ["created_at" => "DESC"]);
    }

    public function getAssignedServiceReports()
    {
        return $this->entityManager
            ->getRepository(DamageReport::class)
            ->findBy(["serviceman" => Common::getUser(),
                      "status" => DamageReport::STATUS_SERVICE_IN_PROGRESS],
                     ["created_at" => "DESC"]);
    }
}