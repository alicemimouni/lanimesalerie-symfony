<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Stats;


class StatsFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {

        $stats = [
            [
                'name' => 'Chien',
                'value' => 42
            ],
            ['name' => 'Chat',
                'value' => 21
            ]
        ];
        foreach($stats as $stat) {
            $statToAdd = new Stats();
            $statToAdd->setName($stat['name']);
            $statToAdd->setValue($stat['value']);

            $manager->persist($statToAdd);
        }

        $manager->flush();
    }
}
