<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UsersController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(): Response
    {
        $user = $this->getUser();

        return $this->render('users/index.html.twig', [
            'user' => $user,
            'tile' => ''
        ]);
    }

    #[Route('/users/all', name: 'app_all_users')]
    #[IsGranted('ROLE_INSTRUCTOR')]
        public function users(UsersRepository $usersRepository): Response
    {
        //$this->denyAccessUnlessGranted('ROLE_INSTRUCTOR');
        $users = $usersRepository->findAll();
        return $this->render('users/all.html.twig', [
            'users' => $users,
        ]);
    }
}
