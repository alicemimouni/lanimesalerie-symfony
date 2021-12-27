<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Address;
use Faker;

class AddressFixtures extends Fixture
{
    public const ADDRESS_REFERENCE = [
        'address1',
        'address2',
        'address3',
        'address4',
        'address5',
        'address6',
        'address7',
        'address8',
        'address9',
        'address10',   
    ];
    
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 0; $i < 10; $i++) {

            $address = new Address();
            $address->setLine1($faker->streetAddress());
            $address->setPostalcode($faker->postcode());
            $address->setCity($faker->country());
            //AJOUTE ADDRESS REFERENCE
            $this->addReference(self::ADDRESS_REFERENCE[$i], $address);
            
            $manager->persist($address);
        }

        $manager->flush();
    }
}
