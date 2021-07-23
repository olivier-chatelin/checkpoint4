<?php

namespace App\Controller;

use App\Entity\Avatar;
use App\Form\ProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="profile")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        $user = $this->getUser();
        $resume = $session->get('resume');
        $theme = $resume->getTemplate()->getTheme();
        $profile = $resume->getProfile();
        $form = $this->createForm(ProfileType::class, $profile);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            return $this->redirectToRoute('experience');
        }
        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'theme' => $theme,
            'resume' => $resume,
            'form' => $form->createView(),
        ]);
    }
}
