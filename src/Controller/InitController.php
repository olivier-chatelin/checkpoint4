<?php

namespace App\Controller;

use App\Entity\Avatar;
use App\Entity\Detail;
use App\Entity\Profile;
use App\Entity\Resume;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InitController extends AbstractController
{
    /**
     * @Route("/init", name="init")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $resume = new Resume();
        $detail = new Detail();
        $avatar = new Avatar();
        $profile = new Profile();
        $entityManager->persist($detail);
        $entityManager->persist($avatar);
        $entityManager->persist($profile);
        $resume->setProfile($profile);
        $detail->setAvatar($avatar);
        $resume->setDetail($detail);
        $entityManager->persist($resume);
        $user = $this->getUser();
        $user->addResume($resume);
        $entityManager->flush();
        return $this->redirectToRoute('theme',['id'=>$resume->getId()]);
    }
}
