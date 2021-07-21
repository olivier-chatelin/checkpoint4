<?php

namespace App\DataFixtures;

use App\Entity\Resume;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ResumeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $resume = new Resume();
        $resume
            ->setName('cv1')
            ->setUser($this->getReference('Camille'))
            ->setDetail($this->getReference('detailCamille1'))
            ->setProfile($this->getReference('profileCamille1'))
            ->setTemplate($this->getReference('classic'))
            ->addHobby($this->getReference('ping'))
            ->addHobby($this->getReference('voyage'))
            ->addHobby($this->getReference('cuisine'))
            ->addLanguage($this->getReference('Anglais'))
            ->addLanguage($this->getReference('Espagnol'));

        $manager->persist($resume);
        $this->addReference('cv1', $resume);

        $resume = new Resume();
        $resume
            ->setName('cv2')
            ->setUser($this->getReference('Camille'))
            ->setDetail($this->getReference('detailCamille2'))
            ->setProfile($this->getReference('profileCamille2'))
            ->setTemplate($this->getReference('modern'))
            ->addHobby($this->getReference('ping'))
            ->addHobby($this->getReference('voyage'))
            ->addHobby($this->getReference('cuisine'))
            ->addLanguage($this->getReference('Anglais'))
            ->addLanguage($this->getReference('Espagnol'));
        $manager->persist($resume);
        $this->addReference('cv2' , $resume);


        $resume = new Resume();
        $resume
            ->setName('cv3')
            ->setUser($this->getReference('Camille'))
            ->setDetail($this->getReference('detailCamille3'))
            ->setProfile($this->getReference('profileCamille3'))
            ->setTemplate($this->getReference('premium'))
            ->addHobby($this->getReference('ping'))
            ->addHobby($this->getReference('voyage'))
            ->addHobby($this->getReference('cuisine'))
            ->addLanguage($this->getReference('Anglais'))
            ->addLanguage($this->getReference('Espagnol'));
        $manager->persist($resume);
        $this->addReference('cv3', $resume);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            DetailFixtures::class,
            ProfileFixtures::class,
            TemplateFixtures::class,
            HobbyFixtures::class,
            LanguageFixtures::class,


        ];
    }
}
