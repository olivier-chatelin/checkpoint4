<?php

namespace App\DataFixtures;

use App\Entity\Avatar;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AvatarFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $avatar = new Avatar();
        $avatar->setImage('templateImage.jpeg');
        $manager->persist($avatar);

        $manager->flush();
    }
}
