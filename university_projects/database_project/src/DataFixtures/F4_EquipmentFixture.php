<?php

namespace App\DataFixtures;

use App\Entity\Department;
use App\Entity\Equipment;
use App\Entity\EquipmentCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class F4_EquipmentFixture extends Fixture
{
    /** @var Factory */
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create("pl_PL");
    }

    public function load(ObjectManager $manager)
    {
       /** @var Department[] $departments */
        $departments = $manager->getRepository(Department::class)->findAll();

        /** @var EquipmentCategory[] $categories */
        $categories = $manager->getRepository(EquipmentCategory::class)->findAll();

        $equipmentCount = count($departments) * 15;

        $brands = [
            "HEAD", "Salomon", "Atomic", "Rossignol", "Volk", "Nordic", "Elan", "Burton", "Diabblo", "Fisher"
        ];

        for($i=0; $i<$equipmentCount;$i++)
        {
            $equipment = new Equipment();
            $index = rand(0, count($categories) -1);
            $index2 = rand(0, count($departments) -1);

            $department = $departments[$index2];
            $category = $categories[$index];
            $price = rand(30,60) * 1.2;
            $name = ucfirst($category->getType()).' '.$brands[rand(0, count($brands)-1)].' '.rand(3000, 3500);
            $description = $this->faker->sentence;
            $milleage = 0.0;

            $equipment
                ->setType($category)
                ->setName($name)
                ->setPrice($price)
                ->setMilleage($milleage)
                ->setDescription($description)
                ->setDepartment($department)
                ->setTimeTillService(60);
            $manager->persist($equipment);

        }

        $manager->flush();
    }
}
