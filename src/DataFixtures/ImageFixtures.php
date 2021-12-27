<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Image;
use Faker;


class ImageFixtures extends Fixture 
{
    public const IMAGE_REFERENCE = [
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'image7',
        'image8',
        'image9',
        'image10',   
    ];
    
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 0; $i < 10; $i++) {

            $image = new Image();
            $image->setUrl($faker->streetAddress($faker->imageUrl($width = '650px', $height = '480', 'cats', true, 'Faker')));
            $this->addReference(self::IMAGE_REFERENCE[$i], $image);

            $manager->persist($image);
        }

        $manager->flush();
    }
   
}
