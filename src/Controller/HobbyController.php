<?php

namespace App\Controller;

use App\Entity\Hobby;
use App\Entity\Resume;
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
     * @Route("/hobby/{id}", name="hobby")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, Resume $resume): Response
    {
        if (!isset($hobby)) $hobby = new Hobby();
        $form = $this->createForm(HobbyType::class,$hobby);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($hobby);
            $resume->addHobby($hobby);
            $entityManager->flush();
        }
        return $this->render('components/_main.html.twig', [
            'user' => $this->getUser(),
            'theme' => $resume->getTemplate()->getTheme(),
            'resume' => $resume,
            'form' => $form->createView(),
            'next' => 'Sauvegarder le cv',
            'next_href' => 'resume_show',
            'fa' => 'fas fa-save',
            'previous' => 'Langues',
            'previous_href' => 'language',
            'allow_add'=>true,
            'add'=>'un loisir'



        ]);
    }
}
