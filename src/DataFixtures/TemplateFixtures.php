<?php

namespace App\DataFixtures;

use App\Entity\Template;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TemplateFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $template = new Template();
        $template->setName('classic');
        $template->setTheme('metal');

        $manager->persist($template);
        $this->addReference('classic', $template);

        $template = new Template();
        $template->setName('modern');
        $template->setTheme('copper');

        $manager->persist($template);
        $this->addReference('modern', $template);


        $template = new Template();
        $template->setName('premium');
        $template->setTheme('salmon');

        $manager->persist($template);
        $this->addReference('premium', $template);


        $manager->flush();


    }
}
