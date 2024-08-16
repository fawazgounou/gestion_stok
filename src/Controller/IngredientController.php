<?php
namespace App\Controller;

use App\Entity\Ingrediant;
use App\Form\IngredientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class IngredientController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    // Injecting the EntityManagerInterface via the constructor
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/ingredient', name: 'ingredient_index')]
    public function new(Request $request): Response
    {
        $ingredient = new Ingrediant();
        $form = $this->createForm(IngredientType::class, $ingredient);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($ingredient);
            $this->entityManager->flush();

            return $this->redirectToRoute('ingredient');
        }

        return $this->render('ingredient/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
