<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;
use Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public const PRODUCT_REFERENCE = [
        'product1',
        'product2',
        'product3',
        'product4',
        'product5',
        'product6',
        'product7',
        'product8',
        'product9',
        'product10',   
    ];
    
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 0; $i < 10; $i++) {

            $product = new Product();
            $product->setTitle($faker->word());
            $product->setPriceHt($faker->biasedNumberBetween($min = 10.90, $max = 150.90, $function = 'sqrt'));
            $product->setReference($faker->isbn10());
            $product->setDescription($faker->realText($maxNbChars = 200, $indexSize = 2));
            $product->setIsonsale($faker->randomElement($array = array (0, 1)));
            $product->getImages($this->getReference(ImageFixtures::IMAGE_REFERENCE));
            $this->addReference(self::PRODUCT_REFERENCE[$i], $product);

            $manager->persist($product);
        }

        $manager->flush();
    }

    //######################
    //FIXTURES DEPENDANTES
    //#######################
    public function getDependencies()
    {
        return array(
            ImageFixtures::class
        );
    }
}
