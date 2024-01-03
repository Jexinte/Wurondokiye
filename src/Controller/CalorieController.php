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
    #[Route('/calorie-homepage', name: 'calorieGet', methods: ['GET'])]
    public function calorieGet(): Response
    {
        return new Response($this->render('calorie/calorie_homepage.twig', [
        ]));
    }

    #[Route('/add-calories', name: 'addCaloriesGet', methods: ['GET'])]
    public function addCaloriesGet(): Response
    {
        $form = $this->createForm(CalorieType::class);
        return new Response($this->render('calorie/add_calories.twig', [
            'form' => $form
        ]));
    }


    #[Route('/add-calories', name: 'addCaloriesPost', methods: ['POST'])]
    public function addCaloriesPost(Request $request, CalorieRepository $calorieRepository): Response
    {
        $form = $this->createForm(CalorieType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $calorie = $form->getData();
            $calorieRepository->getEm()->persist($calorie);
            $calorieRepository->getEm()->flush();
            $this->addFlash('success', 'L\'enregistrement des calories à bien été pris en compte !');
            return $this->redirectToRoute('homepage');
        }
        return new Response($this->render('calorie/add_calories.twig', [
            'form' => $form
        ]), 400);
    }

    #[Route('/calorie-graph', name: 'caloriesGraphGet', methods: ['GET'])]
    public function caloriesGraphGet(CalorieRepository $calorieRepository,IntlDateFormatter $dateFormatter): Response
    {
        foreach($calorieRepository->findAll() as $k => $calorie)
        {
            $calorieRepository->findAll()[$k]->dateFr = ucfirst($dateFormatter->format($calorie->getDate()));
        }
        return new Response($this->render('calorie/calorie_graph.twig', [
            'calories' => $calorieRepository->findAll()
        ]));
    }
}
