<?php

namespace App\DataFixtures;

use App\Entity\Avatar;
use App\Entity\Detail;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DetailFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $avatar1 = new Avatar();
        $avatar1->setImage('templateImage.jpeg');
        $manager->persist($avatar1);

        $avatar2 = new Avatar();
        $avatar2->setImage('templateImage.jpeg');
        $manager->persist($avatar2);

        $avatar3 = new Avatar();
        $avatar3->setImage('templateImage.jpeg');
        $manager->persist($avatar3);

        $detail = new Detail();
        $detail
            ->setAvatar($avatar1)
            ->setHeader('Experte comptable')
            ->setAddress('178 avenue Thiers')
            ->setZipCode('33100')
            ->setCity('Bordeaux')
            ->setTel('06 65 14 62 13')
            ->setLinkedin('https://www.linkedin.com/feed/')
            ->setGithub('https://www.github.com/feed/');
        $manager->persist($detail);
        $this->addReference('detailCamille1', $detail);
        $detail = new Detail();
        $detail
            ->setAvatar($avatar2)
            ->setHeader('Experte comptable')
            ->setAddress('178 avenue Thiers')
            ->setZipCode('33100')
            ->setCity('Bordeaux')
            ->setTel('06 65 14 62 13')
            ->setLinkedin('https://www.linkedin.com/feed/')
            ->setGithub('https://www.github.com/feed/');
        $manager->persist($detail);
        $this->addReference('detailCamille2', $detail);
        $detail = new Detail();
        $detail
            ->setAvatar($avatar3)
            ->setHeader('Experte comptable')
            ->setAddress('178 avenue Thiers')
            ->setZipCode('33100')
            ->setCity('Bordeaux')
            ->setTel('06 65 14 62 13')
            ->setLinkedin('https://www.linkedin.com/feed/')
            ->setGithub('https://www.github.com/feed/');
        $manager->persist($detail);
        $this->addReference('detailCamille3', $detail);



        $manager->flush();
    }
}
