<?php

namespace App\Controller;

use App\Entity\Resume;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    /**
     * @Route("/delete/{id}", name="_delete")
     */
    public function delete(Resume $resume, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $resume->getId(), $request->request->get('_token'))) {
            $entityManager->remove($resume);
            $entityManager->flush();
        }
        return $this->redirectToRoute('resume_show');
    }
}
