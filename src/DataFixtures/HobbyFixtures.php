<?php

namespace App\DataFixtures;

use App\Entity\Hobby;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HobbyFixtures extends Fixture

{
    public function load(ObjectManager $manager)
    {
        $hobby = new Hobby();
        $hobby->setName('Tennis de Table');
        $manager->persist($hobby);
        $this->addReference('ping', $hobby);

        $hobby = new Hobby();
        $hobby->setName('Voyages');
        $manager->persist($hobby);
        $this->addReference('voyage', $hobby);

        $hobby = new Hobby();
        $hobby->setName('Cuisine');
        $this->addReference('cuisine', $hobby);
        $manager->persist($hobby);




        $manager->flush();
    }

}
