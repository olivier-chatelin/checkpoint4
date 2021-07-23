<?php

namespace App\Controller;

use App\Entity\Experience;
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
     * @Route("/skill", name="skill")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        $user = $this->getUser();
        $resume = $session->get('resume');
        $theme = $resume->getTemplate()->getTheme();
        $skill = new Skill();
        $form = $this->createForm(SkillType::class,$skill);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $resume->addSkill($skill);
        }
        return $this->render('experience/index.html.twig', [
            'user' => $user,
            'theme' => $theme,
            'resume' => $resume,
            'form' => $form->createView(),
        ]);
    }
}
