<?php

class RandNums
{
    private $min;
    private $max;
    private $nombreValeurs;

    public function __construct($min, $max, $nombreValeurs)
    {
        $this->min = $min;
        $this->max = $max;
        $this->nombreValeurs = $nombreValeurs;
    }

    /**
     * Fait un ombre aléatoire entre min et max n fois (nombreValeurs)
     *
     * @return string
     */
    public function result()
    {
        // TODO Dans la prochaine version, il faudra virer le HTML de ce code

        if (0 < $this->nombreValeurs) {
            // on prépare une liste html
            $html = "<ul>";
            //on répète autant de fois que nécessaire
            for ($i = 0; $i < $this->nombreValeurs; $i++) {
                //la génération des nombres aléatoires
                $html .= '<ul>' . "<li>" . rand($this->min, $this->max) . "</li></ul>";
            }
            //on ferme notre liste
            return $html . '</ul>';
        } else {
            //si le nombre de répétitions est inférieur à 0 on affiche un message
            return "Le nombre de valeurs doit être > à 0";
        }
    }
}