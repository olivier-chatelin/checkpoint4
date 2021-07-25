<?php

namespace App\Controller;

use App\Entity\Experience;
use App\Entity\Resume;
use App\Entity\Skill;
use App\Form\ExperienceType;
use App\Form\SkillType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SkillController extends AbstractController
{
    /**
     * @Route("/skill/{id}", name="skill")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, Resume $resume): Response
    {
        if (!isset($skill)) $skill = new Skill();
        $form = $this->createForm(SkillType::class,$skill);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($skill);
            $resume->addSkill($skill);
            $entityManager->flush();
        }
        return $this->render('components/_main.html.twig', [
            'user' => $this->getUser(),
            'theme' => $resume->getTemplate()->getTheme(),
            'resume' => $resume,
            'form' => $form->createView(),
            'next' => 'Formations',
            'next_href' => 'scholarship',
            'fa' => 'fas fa-arrow-right',
            'previous' => 'Experiences',
            'previous_href' => 'experience',
            'allow_add'=>true,
            'add'=>'une compétence'


        ]);
    }
}
