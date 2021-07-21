<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname('Camille');
        $user->setLastname('Martin');
        $user->setEmail('camille.martin@gmail.com');
        $user->setPassword($this->encoder->encodePassword($user, '123456'));
        $user->setRoles(['ROLE_USER']);

        $manager->persist($user);
        $this->addReference('Camille', $user);
        $manager->flush();
    }
}
