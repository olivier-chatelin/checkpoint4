<?php

namespace App\Controller;

use App\Entity\Experience;
use App\Entity\Resume;
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
     * @Route("/experience/{id}", name="experience")
     */
    public function index(Request $request, Resume $resume, EntityManagerInterface $entityManager): Response
    {
        if (!isset($experience)) $experience = new Experience();
        $form = $this->createForm(ExperienceType::class,$experience);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($experience);
            $resume->addExperience($experience);
            $entityManager->flush();
            return $this->redirectToRoute('skill', ['id'=>$resume->getId()]);
        }

        return $this->render('components/_main.html.twig', [
            'user' => $this->getUser(),
            'theme' => $resume->getTemplate()->getTheme(),
            'resume' => $resume,
            'form' => $form->createView(),
            'next' => 'Compétences',
            'fa' => 'fas fa-arrow-right',
            'previous' => 'Profil',
            'previous_href' => 'profile',


        ]);
    }
}
