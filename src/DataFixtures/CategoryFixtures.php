<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;
use Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class CategoryFixtures extends Fixture implements DependentFixtureInterface
{
    public const CATEGORY_REFERENCE = [
        'category1',
        'category2',
        'category3',
        'category4',
        'category5',
        'category6',
        'category7',
        'category8',
        'category9',
        'category10',   
    ];
    
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');


        for($i = 0; $i < 10; $i++) {

            $category = new Category();
            $category->setName($faker->word());
            $category->setBegindate($faker->dateTimeBetween('-3 weeks', 'now'));
            $category->getChildren();
            $category->getParent();
            $category->setImage($this->getReference(ImageFixtures::IMAGE_REFERENCE));
            //AJOUTE CATEGORY REFERENCE
            $this->addReference(self::CATEGORY_REFERENCE[$i], $category);

            $manager->persist($category);
        }

        $manager->flush();
    }

    //#####################
    //FIXTURES DEPENDANTES
    //#####################
    public function getDependencies()
     {
         return array(
             ImageFixtures::class
         );
     }

}
