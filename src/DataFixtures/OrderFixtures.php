<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Order;
use Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class OrderFixtures extends Fixture implements DependentFixtureInterface
{
    protected $faker;
    public const ORDER_REFERENCE = [
        'order1',
        'order2',
        'order3',
        'order4',
        'order5',
        'order6',
        'order7',
        'order8',
        'order9',
        'order10',   
    ];

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 0; $i < 10; $i++) {

            $order = new Order();
            $order->setReference($faker->ean8());
            $order->setTvaRate(0.20);
            $order->setIsPaid($faker->randomElement($array = array (0, 1)));
            $order->setMeansPayment($this->getReference(MeansPaymentFixtures::MEANSPAYMENT_REFERENCE));
            $order->setUser($this->getReference(UserFixtures::USER_REFERENCE));
            $order->setProduct($this->getReference(ProductFixtures::PRODUCT_REFERENCE));
            $order->setOrderDate($faker->dateTimeBetween('-3 weeks', 'now'));
            $this->addReference(self::ORDER_REFERENCE[$i], $order);
            $manager->persist($order);
        }

        $manager->flush();
    }
    //######################
    //FIXTURES DEPENDANTES
    //#######################
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            ProductFixtures::class,
            MeansPaymentFixtures::class
        );
    }
}
