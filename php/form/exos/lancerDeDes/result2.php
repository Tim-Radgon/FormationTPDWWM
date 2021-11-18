<?php


//récupération de la string
$diceString = $_POST["diceText"];

//séparation de la string en un tableau, avec le + comme séparateur
$dices = array_map('trim', explode("+", $diceString));

//on commence à compter le total à 0
$dieTotal = 0;
//pour chaque morceau de string initiale
foreach ($dices as $die) {
    //on sépare le nombre de dés du nombre de faces des dés
    $splitDie = explode("d", strtolower($die));
    //si on a plus d'une case, c'est qu'il s'agit d'un dé
    if (count($splitDie) > 1) {
        //on vérifie qu'on ait un nombre de dés à lancer
        $rollNum = $splitDie[0];
        //si ce n'est pas le cas ça veut dire que notre nombre de lancers est de 1
        if (empty($splitDie[0])) {
            $rollNum = 1;
        }
        for ($i = 0; $i < $rollNum; $i++) {
            //on lance un dé pour chaque lancer demandé
            $dieRoll = rand(1, intval($splitDie[1]));
            if ($rollNum > 1) {
                $rollPart = $i + 1 . "/";

            } else {
                $rollPart = "";
            }
            echo "<p>Roll $rollPart$die : $dieRoll</p>";
            //et on ajoute le résultat au total
            $dieTotal += $dieRoll;
        }
    } else {
        //en cas de valeur fixe, on l'ajoute au total
        $dieTotal += intval($splitDie[0]);
        echo "<p>Add $splitDie[0]</p>";
    }
}
//on affiche le total
echo "Total : $dieTotal";
