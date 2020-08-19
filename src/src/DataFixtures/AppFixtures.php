<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Products;
use Faker\Factory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        
        for ($i = 0; $i < 100; $i++) { 
            $product = new Products();
            $product->setName($faker->word);
            $product->setSku($faker->ean8);
            $product->setPrice($faker->randomFloat(2,10,100));
            $product->setWeather($faker->randomElement(array('cloudy', 'sunny', 'rainy', 'snow', 'fog')));
            $manager->persist($product);
        }

        $manager->flush();
    }
}
