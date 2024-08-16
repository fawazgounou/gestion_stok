<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog_index')]
public function index(): Response
{
return new Response('Bienvenue sur le blog!');
}
#[Route('/recette/create', name: 'create_recette')]
public function createRecette(): Response
{
return new Response('Cr´eation d\'une nouvelle recette!');
}
}
