<?php

namespace App\DataFixtures;

use App\Entity\Scholarship;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ScholarshipFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $formation = new Scholarship();
        $formation
            ->setGraduation('BTS Compta')
            ->setSchool('Lycée Choiseul, Tours')
            ->setYearStart(new \DateTime('2012-03-01'))
            ->setYearEnd(new \DateTime('2009-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, ')
            ->setResume($this->getReference('cv1'));

        $manager->persist($formation);

        $formation = new Scholarship();
        $formation
            ->setGraduation('Bac S')
            ->setSchool('Lycée Descartes, Tours')
            ->setYearStart(new \DateTime('2006-03-01'))
            ->setYearEnd(new \DateTime('2003-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, ')
            ->setResume($this->getReference('cv1'));
        $manager->persist($formation);


        $formation = new Scholarship();
        $formation
            ->setGraduation('BTS Compta')
            ->setSchool('Lycée Choiseul, Tours')
            ->setYearStart(new \DateTime('2012-03-01'))
            ->setYearEnd(new \DateTime('2009-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, ')
            ->setResume($this->getReference('cv2'));

        $manager->persist($formation);

        $formation = new Scholarship();
        $formation
            ->setGraduation('Bac S')
            ->setSchool('Lycée Descartes, Tours')
            ->setYearStart(new \DateTime('2006-03-01'))
            ->setYearEnd(new \DateTime('2003-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, ')
            ->setResume($this->getReference('cv2'));
        $manager->persist($formation);


        $formation = new Scholarship();
        $formation
            ->setGraduation('BTS Compta')
            ->setSchool('Lycée Choiseul, Tours')
            ->setYearStart(new \DateTime('2012-03-01'))
            ->setYearEnd(new \DateTime('2009-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, ')
            ->setResume($this->getReference('cv3'));

        $manager->persist($formation);

        $formation = new Scholarship();
        $formation
            ->setGraduation('Bac S')
            ->setSchool('Lycée Descartes, Tours')
            ->setYearStart(new \DateTime('2006-03-01'))
            ->setYearEnd(new \DateTime('2003-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, ')
            ->setResume($this->getReference('cv3'));
        $manager->persist($formation);

        $manager->flush();
    }

    public function getDependencies()
    {
        return[
            ResumeFixtures::class
        ];
    }
}
