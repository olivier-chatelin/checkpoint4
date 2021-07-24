<?php

namespace App\Controller;

use App\Entity\Experience;
use App\Form\ExperienceType;
use App\Form\ResumeExpType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ExperienceController extends AbstractController
{
    /**
     * @Route("/experience", name="experience")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        $user = $this->getUser();
        $resume = $session->get('resume');
        $theme = $resume->getTemplate()->getTheme();
        $experience = new Experience();
        $form = $this->createForm(ExperienceType::class,$experience);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $resume->addExperience($experience);
            return $this->redirectToRoute('skill');
        }

        return $this->render('components/_main.html.twig', [
            'user' => $user,
            'theme' => $theme,
            'resume' => $resume,
            'form' => $form->createView(),
            'next' => 'Compétences'

        ]);
    }
}
