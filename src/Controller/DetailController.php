<?php

namespace App\Controller;

use App\Entity\Avatar;
use App\Entity\Detail;
use App\Entity\Resume;
use App\Form\DetailType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, Resume $resume): Response
    {

        $detail = $resume->getDetail();
        $form = $this->createForm(DetailType::class, $detail);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($detail);
            $resume->setDetail($detail);
            $entityManager->flush();
            return $this->redirectToRoute('profile',['id'=>$resume->getId()]);
        }
        return $this->render('components/_main.html.twig', [
            'user' => $this->getUser(),
            'theme' => $resume->getTemplate()->getTheme(),
            'resume' => $resume,
            'form' => $form->createView(),
            'next' => 'Profil',
            'fa' => 'fas fa-arrow-right',
            'previous' => 'Modèle',
            'previous_href' => 'theme',


        ]);
    }
}
