<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemeController extends AbstractController
{
    /**
     * @Route("/theme", name="theme")
     */
    public function show(UserRepository $userRepository): Response
    {
        $user = $userRepository->findOneByEmail('camille.martin@gmail.com');
        $resume = $user->getResumes()->get(0);
        $view = 'theme/index.html.twig';
        return $this->render($view, [
            'theme' => 'tangerine',
            'user' => $user,
            'resume' => $resume,
        ]);
    }
}
