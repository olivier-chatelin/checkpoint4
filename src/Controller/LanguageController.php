<?php

namespace App\Controller;

use App\Entity\Hobby;
use App\Entity\Language;
use App\Entity\Resume;
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
     * @Route("/language/{id}", name="language")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, Resume $resume): Response
    {
        if (!isset($language)) $language = new Language();
        $form = $this->createForm(LanguageType::class,$language);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($language);
            $resume->addLanguage($language);
            $entityManager->flush();
        }
        return $this->render('components/_main.html.twig', [
            'user' => $this->getUser(),
            'theme' => $resume->getTemplate()->getTheme(),
            'resume' => $resume,
            'form' => $form->createView(),
            'next' => 'Centres d\'intérêts',
            'next_href' => 'hobby',
            'fa' => 'fas fa-arrow-right',
            'previous' => 'Formations',
            'previous_href' => 'scholarship',
            'allow_add'=>true,
            'add'=>'une langue'



        ]);
    }
}
