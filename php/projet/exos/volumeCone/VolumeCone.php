<?php

class VolumeCone
{
    private $radius;
    private $height;
    private $round;

    public function __construct($radius, $height, $round)
    {
        $this->radius = $radius;
        $this->height = $height;
        $this->round = $round;
    }

    public function result()
    {
//on récupère les valeurs de notre formulaire
        $radius = $this->radius;
        $height = $this->height;
        //on vérifie que les valeurs envoyées soient bien des nombres
        if (is_numeric($radius) && is_numeric($height)) {
            //on effectue notre calcul :
            $result = (pi() * $radius ** 2 * $height) / 3;
            //si la case à cocher pour arrondir est cochée
            if ($this->round) {
                //renvoi du résultat arrondi
                return round($result);
            } else {
                //sinon renvoi du résultat complet
                return $result;
            }
        } else {
            return "Veuillez envoyer des nombres";
        }

    }
}