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
    #[Route('/weight-homepage', name: 'weightGet',methods: ['GET'])]
    public function weightGet(): Response
    {
        return new Response($this->render('weight/weight_homepage.twig'));
    }
    #[Route('/add-weight', name: 'addWeightGet',methods: ['GET'])]
    public function weightPost(): Response
    {
        $form = $this->createForm(WeightType::class);

        return new Response($this->render('weight/add_weight.twig',[
            'form' => $form
        ]),);
    }

    #[Route('/weight-graph', name: 'weightGraph',methods: ['GET'])]
    public function weightGraphGet(WeightRepository $weightRepository,IntlDateFormatter $dateFormatter): Response
    {
        foreach($weightRepository->findAll() as $k => $calorie)
        {
            $weightRepository->findAll()[$k]->dateFr = ucfirst($dateFormatter->format($calorie->getDate()));
        }

        return new Response($this->render('weight/weight_graph.twig',[
            'weights' => $weightRepository->findAll()
        ]),);
    }
    #[Route('/add-weight', name: 'addWeightPost',methods: ['POST'])]
    public function addWeightPost(Request $request , WeightRepository $weightRepository): Response
    {
        $form = $this->createForm(WeightType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $weight = $form->getData();
            $weightRepository->getEm()->persist($weight);
            $weightRepository->getEm()->flush();
            $this->redirectToRoute('weightGet');
        }
        return new Response($this->render('weight/add_weight.twig',[
            'form' => $form
        ]),Response::HTTP_BAD_REQUEST);
    }


}
