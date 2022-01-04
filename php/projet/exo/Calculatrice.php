<?php

class Calculatrice
{
    private $calcul;
    private $num1;
    private $num2;

    public function __construct($calcul, $num1, $num2)
    {
        $this->calcul = $calcul;
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function result()
    {
        if (isset($this->calcul) && isset($this->num1) && isset($this->num2)) {
            //on vérifie que les valeurs à calculer soient bien des nombres
            if (is_numeric($this->num1) && is_numeric($this->num2)) {
                //on applique ensuite le calcul désiré en fonction de l'opération demandée
                if ("add" == $this->calcul) {
                    return $this->num1 + $this->num2;
                }
                if ("sub" == $this->calcul) {
                    return $this->num1 - $this->num2;
                }
                if ("mul" == $this->calcul) {
                    return $this->num1 * $this->num2;
                }
                if ("div" == $this->calcul) {
                    //dans le cas d'une division, on s'assure qu'on n'essaye pas de diviser par zéro
                    if (0 == $this->num2) {
                        return "Division par Zéro Impossible";
                    } else {
                        return $this->num1 / $this->num2;
                    }
                }
            }
        }
    }
}