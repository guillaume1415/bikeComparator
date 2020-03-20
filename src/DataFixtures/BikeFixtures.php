<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Bike;

class BikeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 100; $i ++ ){
            $property = new bike();
            $property->setTitle($faker->words(3,true))
                ->setPrice($faker->numberBetween(1000,7000))
                ->setFrameSize($faker->numberBetween(50,62))
                ->setForkMaterial('carbon')
                ->setFrameMaterial('carbon')


                ->setImg('https://images.internetstores.de/products//1053563/02/f44391/Cannondale_SystemSix_Carbon_Ultegra_cashmere[600x600].jpg?forceSize=true&forceAspectRatio=true&forceAlign=center')
                ->setExist('1');

            $manager->persist($property);
        }

        $manager->flush();
    }
}
