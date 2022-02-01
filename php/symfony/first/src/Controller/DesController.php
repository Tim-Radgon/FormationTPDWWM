<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DesController extends AbstractController
{
    #[Route('/des', name: 'des')]
    public function diceRoll(Request $request): Response
    {
        $total = 0;
        $dice = "";
        if ($request->request->count())
            //On sépare la chaîne de l'utilisateur en utilisant les + comme séparateur
            $dice = $request->request->get("dice");
        $diceList = explode("+", mb_strtoupper($dice));
        //on se prépare à compter

        //pour chaque dè dans notre tableau de valeurs de dès

        foreach ($diceList as $die) {
            //on sépare le nombre de lancers du nombre de faces
            $dieValues = explode("D", $die);
            //si on a plusieurs valeurs, c'est qu'il s'agit bien d'un dè et non d'une valeur unique
            if (count($dieValues) > 1) {
                //dans ce cas on lance autant de dès que nécessaire
                for ($i = 0; $i < $dieValues[0]; $i++) {
                    $total += rand(1, $dieValues[1]);
                }
            } else {
                $total += (int)$dieValues[0];
            }
        }

        return $this->render("des/index.html.twig", ["dice" => $dice,
            "total" => $total,]);
    }
}
