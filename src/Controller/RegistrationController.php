<?php

namespace App\Controller;

use App\Form\RegistrationType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/registration', name: 'registrationGet', methods: ['GET'])]
    public function registrationGet(): Response
    {
        $form = $this->createForm(RegistrationType::class);
        return new Response($this->render('registration/registration.twig', [
            'form' => $form
        ]));
    }

    #[Route('/registration', name: 'registrationPost', methods: ['POST'])]
    public function registrationPost(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $passwordHasher): Response
    {
        $form = $this->createForm(RegistrationType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $hashPassword = $passwordHasher->hashPassword($user, $user->getPassword());

            $user->setPassword($hashPassword);
            $user->setRoles(['ROLE_ADMIN']);

            $userRepository->getEm()->persist($user);
            $userRepository->getEm()->flush();

            $this->redirectToRoute('login');
        }
        return new Response($this->render('registration/registration.twig', [
            'form' => $form
        ]), Response::HTTP_BAD_REQUEST);
    }


}
