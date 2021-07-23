<?php

namespace App\Controller;

use App\Entity\Hobby;
use App\Entity\Language;
use App\Form\HobbyType;
use App\Form\LanguageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class LanguageController extends AbstractController
{
    /**
     * @Route("/language", name="language")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        $user = $this->getUser();
        $resume = $session->get('resume');
        $theme = $resume->getTemplate()->getTheme();
        $language = new Language();
        $form = $this->createForm(LanguageType::class,$language);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $resume->addLanguage($language);
        }
        return $this->render('language/index.html.twig', [
            'user' => $user,
            'theme' => $theme,
            'resume' => $resume,
            'form' => $form->createView(),
        ]);
    }
}
