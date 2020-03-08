<?php

namespace App\DataFixtures;

use App\Entity\EquipmentCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class F3_CategoryFixture extends Fixture
{
    /** @var Factory */
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create("pl_PL");
    }

    public function load(ObjectManager $manager)
    {
        $categories = [
            "ski", "snowboard", "ski_boots", "snowboard_boots", "poles", "helmet"
        ];
        foreach($categories as $category)
        {
            $cat = new EquipmentCategory();
            $cat->setType($category);
            $manager->persist($cat);
        }
        $manager->flush();
    }
}
