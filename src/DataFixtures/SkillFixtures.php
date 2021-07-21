<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $skill = new Skill();
        $skill->setName('PHP');
        $skill->setResume($this->getReference('cv1'));

        $manager->persist($skill);

        $skill = new Skill();
        $skill->setName('JS');
        $skill->setResume($this->getReference('cv1'));
        $manager->persist($skill);

        $skill = new Skill();
        $skill->setName('Bootstrap');
        $skill->setResume($this->getReference('cv1'));
        $manager->persist($skill);


        $skill = new Skill();
        $skill->setName('PHP');
        $skill->setResume($this->getReference('cv2'));

        $manager->persist($skill);

        $skill = new Skill();
        $skill->setName('JS');
        $skill->setResume($this->getReference('cv2'));
        $manager->persist($skill);

        $skill = new Skill();
        $skill->setName('Bootstrap');
        $skill->setResume($this->getReference('cv2'));
        $manager->persist($skill);


        $skill = new Skill();
        $skill->setName('PHP');
        $skill->setResume($this->getReference('cv3'));

        $manager->persist($skill);

        $skill = new Skill();
        $skill->setName('JS');
        $skill->setResume($this->getReference('cv3'));
        $manager->persist($skill);

        $skill = new Skill();
        $skill->setName('Bootstrap');
        $skill->setResume($this->getReference('cv3'));
        $manager->persist($skill);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ResumeFixtures::class
        ];
    }
}
