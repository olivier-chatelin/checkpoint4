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
use App\Form\TemplateType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ThemeController extends AbstractController
{
    /**
     * @Route("/theme", name="theme")
     */
    public function show(UserRepository $userRepository, EntityManagerInterface $entityManager, Request $request, SessionInterface $session): Response
    {
        $template = new Template();
        $form = $this->createForm(TemplateType::class, $template);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($template);
            $resume = new Resume();
            $resume->setTemplate($template);
            $avatar = new Avatar();
            $avatar->setImage('avatar.jpeg');
            $entityManager->persist($avatar);
            $detail =new Detail();
            $detail->setAvatar($avatar);
            $entityManager->persist($detail);
            $resume->setDetail($detail);
            $profile = new Profile();
            $entityManager->persist($profile);
            $resume->setProfile($profile);
            $experience = new Experience();
            $entityManager->persist($experience);
            $resume->addExperience($experience);
            $skill = new Skill();
            $entityManager->persist($skill);
            $resume->addSkill($skill);
            $scholarship = new Scholarship();
            $entityManager->persist($scholarship);
            $resume->addScholarship($scholarship);
            $hobby = new Hobby();
            $entityManager->persist($hobby);
            $resume->addHobby($hobby);
            $language = new Language();
            $entityManager->persist($language);
            $resume->addLanguage($language);
            $resume->setUser($this->getUser());
            $entityManager->persist($resume);
            $entityManager->flush();
            $session->set('resume', $resume);

            return $this->redirectToRoute('detail');
        }
        $user = $userRepository->findOneByEmail('camille.martin@gmail.com');
        $resume = $user->getResumes()->get(0);
        $view = 'theme/index.html.twig';
        return $this->render($view, [
            'theme' => 'tangerine',
            'user' => $user,
            'resume' => $resume,
            'form' => $form->createView(),
        ]);
    }
}
