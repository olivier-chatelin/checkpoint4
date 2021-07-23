<?php

namespace App\Controller;

use App\Entity\Hobby;
use App\Entity\Skill;
use App\Form\HobbyType;
use App\Form\SkillType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HobbyController extends AbstractController
{
    /**
     * @Route("/hobby", name="hobby")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        $user = $this->getUser();
        $resume = $session->get('resume');
        $theme = $resume->getTemplate()->getTheme();
        $hobby = new Hobby();
        $form = $this->createForm(HobbyType::class,$hobby);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $resume->addHobby($hobby);
        }
        return $this->render('hobby/index.html.twig', [
            'user' => $user,
            'theme' => $theme,
            'resume' => $resume,
            'form' => $form->createView(),
        ]);
    }
}
