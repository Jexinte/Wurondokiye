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
    #[Route('/inscription', name: 'registrationGet', methods: ['GET'])]
    public function registrationGet(): Response
    {
        $form = $this->createForm(RegistrationType::class);
        return $this->render('registration/registration.twig', [
            'form' => $form
        ]);
    }

    #[Route('/inscription', name: 'registrationPost', methods: ['POST'])]
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
        return $this->render('registration/registration.twig', [
            'form' => $form
        ]);
    }


}
