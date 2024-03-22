<?php

namespace App\Controller;

use App\Form\CalorieType;
use App\Repository\CalorieRepository;
use IntlDateFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalorieController extends AbstractController
{
    #[Route('/accueil-calories', name: 'calorieGet', methods: ['GET'])]
    public function calorieGet(): Response
    {
        return $this->render('calorie/calorie_homepage.twig', [
        ]);
    }

    #[Route('/ajouter-calories', name: 'addCaloriesGet', methods: ['GET'])]
    public function addCaloriesGet(): Response
    {
        $form = $this->createForm(CalorieType::class);
        return $this->render('calorie/add_calories.twig', [
            'form' => $form
        ]);
    }


    #[Route('/ajouter-calories', name: 'addCaloriesPost', methods: ['POST'])]
    public function addCaloriesPost(Request $request, CalorieRepository $calorieRepository): Response
    {
        $form = $this->createForm(CalorieType::class);
        $response = new Response();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $calorie = $form->getData();
            $calorieRepository->getEm()->persist($calorie);
            $calorieRepository->getEm()->flush();
            $this->addFlash('success', 'L\'enregistrement des calories à bien été pris en compte !');
            return $this->redirectToRoute('caloriesGraph');
        }
        return $this->render('calorie/add_calories.twig', [
            'form' => $form
        ],$response->setStatusCode($response::HTTP_BAD_REQUEST));
    }

    #[Route('/graphique-de-calories', name: 'caloriesGraph', methods: ['GET'])]
    public function caloriesGraphGet(CalorieRepository $calorieRepository,IntlDateFormatter $dateFormatter): Response
    {
        foreach($calorieRepository->findAll() as $k => $calorie)
        {
            $calorieRepository->findAll()[$k]->dateFr = ucfirst($dateFormatter->format($calorie->getDate()));
        }
        return $this->render('calorie/calorie_graph.twig', [
            'calories' => $calorieRepository->findAll()
        ]);
    }
}
