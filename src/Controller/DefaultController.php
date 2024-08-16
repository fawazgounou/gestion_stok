<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(): Response
    {
        $data = [
            'name ' => 'John Doe',
            'age ' => 29,
            'status ' => 'active',
            'hobbies ' => ['Reading', 'Cycling', 'Coding']
        ];

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'user' => $data
        ]);
    }
}
