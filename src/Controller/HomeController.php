<?php

namespace App\Controller;

use App\Entity\Avatar;
use App\Form\AvatarType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(UserRepository $userRepository): Response
    {
        $user = $userRepository->findOneByEmail('camille.martin@gmail.com');
        $resume = $user->getResumes()->get(1);
        $template = $resume->getTemplate();
        $view = 'home/' . $template->getName() . '.html.twig';
        return $this->render($view, [
//            'theme' => $template->getTheme(),
            'theme' => 'tangerine',
            'user' => $user,
            'resume' => $resume,
        ]);
    }
    /**
     * @Route("/templates", name="templates")
     */
    public function show(UserRepository $userRepository): Response
    {
        $user = $userRepository->findOneByEmail('camille.martin@gmail.com');
        $resume = $user->getResumes()->get(0);
        $view = 'home/showTemplates.html.twig';
        return $this->render($view, [
            'theme' => 'tangerine',
            'user' => $user,
            'resume' => $resume,
        ]);
    }
}
