<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/resume", name="resume")
     */
class ResumeController extends AbstractController
{
    /**
     * @Route("/show", name="_show")
     */
    public function index(): Response
    {
        $resumes = $this->getUser()->getResumes();
        return $this->render('resume/index.html.twig', [
            'resumes' => $resumes,
            'user' => $this->getUser(),

        ]);
    }
}
