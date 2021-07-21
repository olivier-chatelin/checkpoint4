<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LanguageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $language = new Language();
        $language
            ->setName('Anglais')
            ->setLevel('Lu');
        $manager->persist($language);
        $this->addReference('Anglais', $language);

        $language = new Language();
        $language
            ->setName('Espagnol')
            ->setLevel('Lu, Parlé');
        $manager->persist($language);
        $this->addReference('Espagnol', $language);

        $manager->flush();
    }
}
