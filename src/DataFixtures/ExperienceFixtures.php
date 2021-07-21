<?php

namespace App\DataFixtures;

use App\Entity\Experience;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ExperienceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $experience = new Experience();
        $experience
            ->setJobName('Manager')
            ->setEmployer('Méga Compta, Bordeaux')
            ->setYearEnd(new \DateTime('2021-03-01'))
            ->setYearStart(new \DateTime('2018-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim ')
            ->setResume($this->getReference('cv1'));
        $manager->persist($experience);

        $experience = new Experience();
        $experience
            ->setJobName('Manager')
            ->setEmployer('Super Compta, Paris')
            ->setYearEnd(new \DateTime('2018-03-01'))
            ->setYearStart(new \DateTime('2016-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim.  ')
            ->setResume($this->getReference('cv1'));

        $manager->persist($experience);

        $experience = new Experience();
        $experience
            ->setJobName('Manager')
            ->setEmployer('Molo Compta, Tours')
            ->setYearEnd(new \DateTime('2016-03-01'))
            ->setYearStart(new \DateTime('2015-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim. ')
            ->setResume($this->getReference('cv1'));
        $manager->persist($experience);


        $experience = new Experience();
        $experience
            ->setJobName('Manager')
            ->setEmployer('Méga Compta, Bordeaux')
            ->setYearEnd(new \DateTime('2021-03-01'))
            ->setYearStart(new \DateTime('2018-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim ')
            ->setResume($this->getReference('cv2'));
        $manager->persist($experience);

        $experience = new Experience();
        $experience
            ->setJobName('Manager')
            ->setEmployer('Super Compta, Paris')
            ->setYearEnd(new \DateTime('2018-03-01'))
            ->setYearStart(new \DateTime('2016-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim.  ')
            ->setResume($this->getReference('cv2'));

        $manager->persist($experience);

        $experience = new Experience();
        $experience
            ->setJobName('Manager')
            ->setEmployer('Molo Compta, Tours')
            ->setYearEnd(new \DateTime('2016-03-01'))
            ->setYearStart(new \DateTime('2015-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim. ')
            ->setResume($this->getReference('cv2'));
        $manager->persist($experience);


        $experience = new Experience();
        $experience
            ->setJobName('Manager')
            ->setEmployer('Méga Compta, Bordeaux')
            ->setYearEnd(new \DateTime('2021-03-01'))
            ->setYearStart(new \DateTime('2018-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim ')
            ->setResume($this->getReference('cv3'));
        $manager->persist($experience);

        $experience = new Experience();
        $experience
            ->setJobName('Manager')
            ->setEmployer('Super Compta, Paris')
            ->setYearEnd(new \DateTime('2018-03-01'))
            ->setYearStart(new \DateTime('2016-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim.  ')
            ->setResume($this->getReference('cv3'));

        $manager->persist($experience);

        $experience = new Experience();
        $experience
            ->setJobName('Manager')
            ->setEmployer('Molo Compta, Tours')
            ->setYearEnd(new \DateTime('2016-03-01'))
            ->setYearStart(new \DateTime('2015-03-01'))
            ->setDescription('Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim. ')
            ->setResume($this->getReference('cv3'));
        $manager->persist($experience);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ResumeFixtures::class,
        ];
    }
}
