<?php

namespace App\DataFixtures;

use App\Entity\Department;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker\Factory;

class F1_UserFixture extends Fixture
{
    /** @var UserPasswordEncoderInterface */
    private $encoder;

    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var Factory */
    private $faker;

    public function __construct(UserPasswordEncoderInterface $encoder, EntityManagerInterface $entityManager)
    {
        $this->encoder = $encoder;
        $this->entityManager = $entityManager;
        $this->faker = Factory::create("pl_PL");
    }

    public function load(ObjectManager $manager)
    {
        $conn = $this->entityManager->getConnection();
        $sql = "DELETE FROM order_t_equipment";
        $stm = $conn->prepare($sql);
        $stm->execute();

       for($i=0;$i<10;$i++)
       {
           $user = new User();
           $username = $this->faker->userName;
           $role = User::ROLE_USER;
           $credit_card = $this->faker->creditCardNumber;
           $pass = $this->encoder->encodePassword($user, 'eloelo320');
           $email = $this->faker->email;
           $user
               ->setUsername($username)
               ->setEmail($email)
               ->setCreditCardNumber($credit_card)
               ->setPassword($pass)
               ->setRoles($role);
           $manager->persist($user);
       }

       //directors
       for($i=0;$i<4;$i++)
       {
           $director = new User();
           $username = $this->faker->userName;
           $role = User::ROLE_DIRECTOR;
           $credit_card = $this->faker->creditCardNumber;
           $pass = $this->encoder->encodePassword($director, 'eloelo320');
           $email = $this->faker->email;
           $director
               ->setUsername($username)
               ->setPassword($pass)
               ->setEmail($email)
               ->setCreditCardNumber($credit_card)
               ->setRoles($role);
           $manager->persist($director);
       }

        //boss
        $boss = new User();
        $role = User::ROLE_BOSS;
        $username = "boss";
        $pass = $this->encoder->encodePassword($boss, 'elo320');
        $email = "boss@boss.com";
        $credit_card = $this->faker->creditCardNumber;
        $boss
            ->setUsername($username)
            ->setEmail($email)
            ->setCreditCardNumber($credit_card)
            ->setRoles($role)
            ->setPassword($pass);

        $manager->persist($boss);

       $manager->flush();
    }
}
