<?php

namespace App\Controller;

use App\Form\WeightType;
use App\Repository\WeightRepository;
use IntlDateFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeightController extends AbstractController
{
    #[Route('/accueil-poids', name: 'weightGet',methods: ['GET'])]
    public function weightGet(): Response
    {
        return $this->render('weight/weight_homepage.twig');
    }
    #[Route('/ajouter-poids', name: 'addWeightGet',methods: ['GET'])]
    public function weightPost(): Response
    {
        $form = $this->createForm(WeightType::class);

        return $this->render('weight/add_weight.twig',[
            'form' => $form
        ]);
    }

    #[Route('/graphique-de-poids', name: 'weightsGraph',methods: ['GET'])]
    public function weightGraphGet(WeightRepository $weightRepository,IntlDateFormatter $dateFormatter): Response
    {
        foreach($weightRepository->findAll() as $k => $calorie)
        {
            $weightRepository->findAll()[$k]->dateFr = ucfirst($dateFormatter->format($calorie->getDate()));
        }

        return $this->render('weight/weight_graph.twig',[
            'weights' => $weightRepository->findAll(),
        ]);
    }
    #[Route('/ajouter-un-poids', name: 'addWeightPost',methods: ['POST'])]
    public function addWeightPost(Request $request , WeightRepository $weightRepository): Response
    {
        $form = $this->createForm(WeightType::class);
        $response = new Response();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $weight = $form->getData();
            $weightRepository->getEm()->persist($weight);
            $weightRepository->getEm()->flush();

            $this->addFlash('success', 'L\'enregistrement du poids à bien été pris en compte !');
            return $this->redirectToRoute('weightsGraph');


        }
        return $this->render('weight/add_weight.twig',[
            'form' => $form
        ],$response->setStatusCode(Response::HTTP_BAD_REQUEST));
    }


}
