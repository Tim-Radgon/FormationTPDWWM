<?php

$dice = $_POST["dice"];

//on prépare une case vide dans laquelle stocker notre première valeur de dé
//$diceList = [""];
//for ($i = 0; $i < mb_strlen($dice); $i++) {
//    //si notre caractère est un +
//    if ($dice[$i] != "+") {
//        //on crée une nouvelle case où stocker nos valeurs de dés
//        $diceList[count($diceList) - 1] .= $dice[$i];
//    } else {
//        //sinon on copie les caractères du dé dans la case
//        $diceList[] = "";
//    }
//}

//on sépare la chaine de l'utilisateur en utilisant les + comme séparateur
$diceList = (explode("+", mb_strtoupper($dice))); //strtoupper nous sert à "normaliser" la chaine de caractères pour ne pas avoir à gérer la casse sur les "D" de notre chaîne

//on se prépare à compter
$total = 0;
//pour chaque dé dans notre tableau de valeurs de dés
foreach ($diceList as $die) {
    //on sépare le nombre de lancers du nombre de faces
    $dieValues = explode("D", $die);
    //si on a plusieurs valeurs, c'est qu'il s'agit bien d'un dé et non d'une valeur unique
    if (count($dieValues) > 1) {
        //dans ce cas on lance autant de dés que nécessaire
        for ($i = 0; $i < $dieValues[0]; $i++) {
            $total += rand(1, $dieValues[1]);
        }
    } else {
        //sinon on ajoute juste notre valeur bonus au total
        $total += intval($dieValues[0]);
    }
}
echo $total;