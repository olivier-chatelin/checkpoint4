<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Entity\Resume;
use App\Form\ProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile/{id}", name="profile")
     */
    public function index(Request $request, EntityManagerInterface $entityManager,Resume $resume): Response
    {
        $profile = $resume->getProfile();
        $form = $this->createForm(ProfileType::class, $profile);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($profile);
            $resume->setProfile($profile);
            $entityManager->flush();
            return $this->redirectToRoute('experience',['id'=>$resume->getId()]);

        }
        return $this->render('components/_main.html.twig', [
            'user' => $this->getUser(),
            'theme' => $resume->getTemplate()->getTheme(),
            'resume' => $resume,
            'form' => $form->createView(),
            'next' => 'Expériences',
            'fa' => 'fas fa-arrow-right',
            'previous' => 'Details Personnels',
            'previous_href' => 'detail',
            'allow_add'=>false,



        ]);
    }
}
