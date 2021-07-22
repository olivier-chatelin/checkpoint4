<?php

namespace App\DataFixtures;

use App\Entity\Profile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfileFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $profile = new Profile();
        $profile->setDescription('Actuellement Chef comptable, et forte de 10 ans d\'expérience je recherche un cabinet qui pourra m\'apporter épanouissement. ');
        $manager->persist($profile);
        $this->addReference('profileCamille1', $profile);
        $profile = new Profile();
        $profile->setDescription('Actuellement Chef comptable, et forte de 10 ans d\'expérience je recherche un cabinet qui pourra m\'apporter épanouissement. ');
        $manager->persist($profile);
        $this->addReference('profileCamille2', $profile);
        $profile = new Profile();
        $profile->setDescription('Actuellement Chef comptable, et forte de 10 ans d\'expérience je recherche un cabinet qui pourra m\'apporter épanouissement. ');
        $manager->persist($profile);
        $this->addReference('profileCamille3', $profile);
        $manager->flush();
    }
}
