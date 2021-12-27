<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Meanspayment;
use Faker;

class MeansPaymentFixtures extends Fixture
{
    public const MEANSPAYMENT_REFERENCE = [
        'meansPayment1',
        'meansPayment2',
        'meansPayment3',
        'meansPayment4',
        'meansPayment5',
        'meansPayment6',
        'meansPayment7',
        'meansPayment8',
        'meansPayment9',
        'meansPayment10',   
    ];
    
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 0; $i < 10; $i++) {

            $meansPayment = new Meanspayment();
            $meansPayment->setDesignation($faker->randomElement($array = array ('Paypal','Virement','meansPaymente bancaire')));
            $this->addReference(self::MEANSPAYMENT_REFERENCE[$i], $meansPayment);

            $manager->persist($meansPayment);
        }

        $manager->flush();
    }
}
