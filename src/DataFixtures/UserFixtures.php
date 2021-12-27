<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class UserFixtures extends Fixture implements DependentFixtureInterface
{
    protected $faker;
    public $hasher;
    public const USER_REFERENCE = [
        'user1',
        'user2',
        'user3',
        'user4',
        'user5',
        'user6',
        'user7',
        'user8',
        'user9',
        'user10',   
    ];


    public function __construct(UserPasswordHasherInterface $hasher){
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
    //#################
    //UTILISATEUR ADMIN
    //##################
        $userAdmin = new User();
        $userAdmin->setEmail('admin@admin.com');
        $userAdmin->setRoles(['ROLE_ADMIN']);
        $userAdmin->setPassword($this->hasher->hashPassword($userAdmin, 'admin'));

        $manager->persist($userAdmin);

    //###########################
    //USER ALEATOIRES FAKER
    //########################
        for($i = 0; $i < 9; $i++) {

            $user = new User();
            $user->setEmail($faker->freeEmail());
            $user->setPassword($faker->password(10, 15));
            $user->setAddress($this->getReference(AddressFixtures::ADDRESS_REFERENCE));
            $this->addReference(self::USER_REFERENCE[$i], $user);
            $manager->persist($user);
        }

        $manager->flush();
    }

    //######################
    //DEPENDANCES
    //#######################
    public function getDependencies()
    {
        return array(
           AddressFixtures::class,
        );
    }
}
