<?php

namespace App\Controller;

use App\Entity\Resume;
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
     * @Route("/scholarship/{id}", name="scholarship")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, Resume $resume): Response
    {
        if (!isset($scholarship)) $scholarship = new Scholarship();
        $form = $this->createForm(ScholarshipType::class,$scholarship);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($scholarship);
            $resume->addScholarship($scholarship);
            $entityManager->flush();
            return $this->redirectToRoute('language',['id'=>$resume->getId()]);

        }
        return $this->render('components/_main.html.twig', [
            'user' => $this->getUser(),
            'theme' => $resume->getTemplate()->getTheme(),
            'resume' => $resume,
            'form' => $form->createView(),
            'next' => 'Langues',
            'previous' => 'Compétences',
            'previous_href' => 'skill',


        ]);
    }
}
