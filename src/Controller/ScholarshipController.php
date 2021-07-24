<?php

namespace App\Controller;

use App\Entity\Scholarship;
use App\Form\ExperienceType;
use App\Form\ResumeExpType;
use App\Form\ScholarshipType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ScholarshipController extends AbstractController
{
    /**
     * @Route("/scholarship", name="scholarship")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        $user = $this->getUser();
        $resume = $session->get('resume');
        $theme = $resume->getTemplate()->getTheme();
        $scholarship = new Scholarship();
        $form = $this->createForm(ScholarshipType::class,$scholarship);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $resume->addScholarship($scholarship);
            return $this->redirectToRoute('language');

        }
        return $this->render('components/_main.html.twig', [
            'user' => $user,
            'theme' => $theme,
            'resume' => $resume,
            'form' => $form->createView(),
            'next' => 'Langues'

        ]);
    }
}
