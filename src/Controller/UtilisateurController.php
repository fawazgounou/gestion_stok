<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class UtilisateurController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function login(): Response
    {
    return new Response('Login utilisateur');
    }
    #[Route('/logout', name: 'logout')]
    public function logout(): Response
    {
    return new Response('Logout utilisateur');
    }
    #[Route('/add_user', name: 'add_user')]
    public function add_user(): Response
    {
    return new Response('Utilisateur ajout´e');
    }
}
