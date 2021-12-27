<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Cart;
use Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CartFixtures extends Fixture implements DependentFixtureInterface
{
    public const CART_REFERENCE = [
        'cart1',
        'cart2',
        'cart3',
        'cart4',
        'cart5',
        'cart6',
        'cart7',
        'cart8',
        'cart9',
        'cart10',   
    ];
    
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 0; $i < 10; $i++) {

            $cart = new cart();
            $cart->setUser($this->getReference(UserFixtures::USER_REFERENCE));
            $cart->setOrders($this->getReference(OrderFixtures::ORDER_REFERENCE));
            $cart->setCartDate($faker->dateTimeBetween('-3 weeks', 'now'));
            //AJOUT DE CART REFERENCE
            $this->addReference(self::CART_REFERENCE[$i], $cart);
           
            $manager->persist($cart);
        }

        $manager->flush();
    }

    //#####################
    //FIXTURES DEPENDANTES
    //#####################
    public function getDependencies()
     {
         return array(
             UserFixtures::class,
             OrderFixtures::class
         );
     }
}
