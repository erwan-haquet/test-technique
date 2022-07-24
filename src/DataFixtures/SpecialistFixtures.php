<?php

namespace App\DataFixtures;

use App\Factory\SpecialistFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpecialistFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        SpecialistFactory::new()->createMany(25);

        $manager->flush();
    }
}
