<?php

namespace App\DataFixtures;

use App\Entity\Department;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class F2_DepartmentFixture extends Fixture
{
    /** @var Factory */
    private $faker;

    /** @var UserPasswordEncoderInterface */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->faker = Factory::create("pl_PL");
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        /** @var User[] $directors */
        $directors = $manager->getRepository(User::class)->findBy(["roles" => User::ROLE_DIRECTOR]);
        for($i=0;$i<4;$i++)
        {
            $department = new Department();
            $department
                ->setAddress($this->faker->address)
                ->setSlotsCount(30)
                ->setManager($directors[$i]);
            $manager->persist($department);
            $directors[$i]->addDepartment($department);
            $manager->persist($directors[$i]);
        }
        $manager->flush();

        //servicemen
        /** @var Department[] $departments */
        $departments = $manager->getRepository(Department::class)->findAll();
        $departmentIds = [];
        foreach($departments as $department)
        {
            $departmentIds[] = $department->getId();
        }
        for($i=0;$i<4;$i++)
        {
            $serviceMan = new User();
            $role = User::ROLE_SERVICEMAN;
            $username = $this->faker->userName;
            $pass = $this->encoder->encodePassword($serviceMan, 'eloelo320');
            $email = $this->faker->email;
            $credit_card = $this->faker->creditCardNumber;
            $index = rand(0, count($departmentIds)-1);

            $serviceMan
                ->setUsername($username)
                ->setPassword($pass)
                ->setRoles($role)
                ->setDepartmentID($departmentIds[$index])
                ->setEmail($email)
                ->setCreditCardNumber($credit_card);

            $manager->persist($serviceMan);
        }
        $manager->flush();
    }
}
