<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SaveController extends AbstractController
{
    /**
     * @Route("/save", name="save")
     */
    public function index(SessionInterface $session, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $resume = $session->get('resume');
        $entityManager->persist($resume);
        $user->addResume($resume);
        $entityManager->flush();
        return $this->redirectToRoute('resume_show');
    }
}
