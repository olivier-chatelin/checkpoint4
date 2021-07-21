<?php

namespace App\Controller;

use App\Entity\Avatar;
use App\Form\AvatarType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/modern", name="modern")
     */
    public function modern(Request $request, EntityManagerInterface $entityManager): Response
    {



        return $this->render('home/modern.html.twig', [
//            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/premium", name="premium")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {


        return $this->render('premium/index.html.twig', [
//            'form' => $form->createView(),
        ]);
    }
}
