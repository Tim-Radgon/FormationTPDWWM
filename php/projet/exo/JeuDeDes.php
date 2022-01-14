<?php

class JeuDeDes
{
//    private $des;
    private $request;

    /**
     * On crée ici un constructeur qui a besoin du résultat de notre formulaire pour le traiter après
     *
     * On ne doit jamais trouver ici de variable global telle que des $_POST ou $_GET
     * c'est pourquoi on utilise un constructeur qui a un paramètre et on va lui transmettre la valeur de notre post ou get quand on va l'instancier
     */
    public function __construct(Request $request) // $des = $_POST["dice"];
    {
        $this->request = $request;
//        $this->des = $des;
    }

    public function diceRoll()
    {
        //On sépare la chaîne de l'utilisateur en utilisant les + comme séparateur
        $diceList = explode("+", mb_strtoupper($this->request->getPost('dice')));

        $_SESSION['dice'] = $this->request->getPost('dice');
        //on se prépare à compter
        $total = 0;
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
                $total += $dieValues[0];
            }
        }

        $_SESSION['dice_total'] = $total;

        return $total;
    }
}
