<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}