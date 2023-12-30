<?php

namespace App\Controller;

use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/connexion', name: 'login')]
    public function loginGet(AuthenticationUtils $authenticationUtils): Response
    {
        $form = $this->createForm(LoginType::class);
        $error = $authenticationUtils->getLastAuthenticationError();
        if ($error) {
            $error = new FormError('Oops! Identifiant ou mot de passe invalide !');
            $username = $form->get('username');
            $username->addError($error);
            $this->redirectToRoute('homepage');
        }
        return new Response($this->render('login/login.twig', [
            'form' => $form,
        ]), Response::HTTP_BAD_REQUEST);
    }

}
