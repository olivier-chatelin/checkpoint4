<?php

namespace App\Controller;

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
     * @Route("/detail", name="detail")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        $resume = $session->get('resume');
        $detail = $resume->getDetail();
        $form = $this->createForm(DetailType::class, $detail);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('profile');
        }

        return $this->render('detail/index.html.twig', [
            'user' => $this->getUser(),
            'theme' => $resume->getTemplate()->getTheme(),
            'resume' => $resume,
            'form' => $form->createView()
        ]);
    }
}
