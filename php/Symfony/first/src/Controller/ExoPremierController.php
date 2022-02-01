<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExoPremierController extends AbstractController
{
    #[Route('/exo/premier', name: 'exo_premier')]
    public function index(): Response
    {
        return $this->render('exo_premier/index.html.twig', [
            'controller_name' => 'ExoPremierController',
            'header' => 'mettre un truc un peu mieux',
            'footer' => 'mettre un truc un peu moins bien',
            'body' => 'un truc au top pas ouf, un truc dégueulasse'
        ]);
    }

    #[Route('/exo/second', name: 'exo_second')]
    public function formulaire(Request $r): Response
    {
        $form = $this->createFormBuilder()
            ->setMethod('POST')
            ->add('prenom', TextType::class)
            ->add('nom', TextType::class)
            ->add('email', TextType::class)
            ->add('login', TextType::class)
            ->add('password', TextType::class)
            ->getForm();

        $form->handleRequest($r);
        $isEmailValid = false;
        $isFormSend = false;

        if ($form->isSubmitted() && $form->isValid()) {
            $isFormSend = true;
            $email = $form->getData()['email'] ?? '';

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $isEmailValid = true;
            }
//            $isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;

        }

//        $clealacon = 'ceci est une valeur à la con';

        return $this->render('exo_premier/exo_second.twig', [
            'formulaire' => $form->createView(),
            'isEmailValid' => $isEmailValid,
            'isFormSend' => $isFormSend
//            'clealacon' => $clealacon
        ]);
    }
}