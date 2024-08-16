<?php
// src/Controller/RecetteController.php
namespace App\Controller;
use App\Entity\Recette;
use App\Form\RecetteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class RecetteController extends AbstractController
{
    /**
     * @Route("/recette/new", name="recette_new")
     */
    #[Route('/recette', name: 'recette_index')]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $recette = new Recette();
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($recette);
            $entityManager->flush();
            return $this->redirectToRoute('recette_index');
        }
        return $this->render('recette/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/recette/{id}/edit", name="recette_edit")
     */
    public function edit(
        Request $request,
        Recette $recette,
        EntityManagerInterface
        $entityManager
    ): Response {
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('recette_index');
        }
        return $this->render('recette/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}