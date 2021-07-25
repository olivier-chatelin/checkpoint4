<?php

namespace App\Controller;

use App\DataFixtures\LanguageFixtures;
use App\Entity\Avatar;
use App\Entity\Detail;
use App\Entity\Experience;
use App\Entity\Hobby;
use App\Entity\Language;
use App\Entity\Profile;
use App\Entity\Resume;
use App\Entity\Scholarship;
use App\Entity\Skill;
use App\Entity\Template;
use App\Entity\User;
use App\Form\TemplateType;
use App\Repository\ResumeRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ThemeController extends AbstractController
{
    /**
     * @Route("/theme", name="theme")
     */
    public function show(UserRepository $userRepository, EntityManagerInterface $entityManager, Request $request, SessionInterface $session, ResumeRepository $resumeRepository): Response
    {
        $template = new Template();
        $form = $this->createForm(TemplateType::class, $template);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($template);
            $resume = new Resume();
            $resume->setTemplate($template);
            $entityManager->persist($resume);
            $user = $this->getUser();
            $user->addResume($resume);
            $detail = new Detail();
            $entityManager->persist($detail);
            $avatar = new Avatar();
            $entityManager->persist($avatar);
            $profile = new Profile();
            $entityManager->persist($profile);
            $resume->setProfile($profile);
            $detail->setAvatar($avatar);
            $resume->setDetail($detail);
            $entityManager->flush();
            return $this->redirectToRoute('detail',['id'=>$resume->getId()]);
        }
        $user = $userRepository->findOneByEmail('camille.martin@gmail.com');
        $resume = $user->getResumes()->get(0);
        $view = 'theme/index.html.twig';
        return $this->render($view, [
            'theme' => 'tangerine',
            'user' => $user,
            'resume' => $resume,
            'form' => $form->createView(),
            'next' => 'Détails Personnels'

        ]);
    }
}
