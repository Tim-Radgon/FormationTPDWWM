<?php
//on vérifie que notre répétition est faisable
if ($_POST["n"] > 0) {
    //on prépare une liste html
    echo "<ul>";
    //on répète autant de fois que nécessaire
    for ($i = 0; $i < $_POST["n"]; $i++) {
        //la génération des nombres aléatoires
        echo "<li>" . rand($_POST["min"], $_POST["max"]) . "</li>";
    }
    //on ferme notre liste
    echo "</ul>";
} else {
    //si le nombre de répétitions est inférieur à 0 on affiche un message
    echo "Le nombre de valeurs doit être > à 0";
}