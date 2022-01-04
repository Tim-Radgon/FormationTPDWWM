<?php
require('exo/JeuDeDes.php'); // charge la class de notre exercise
require('util.php');

$resultat = '';

if (!empty($_POST['dice'])) {
    $jeudedes = new JeuDeDes($_POST['dice']); // on transmet ici $_POST['dice'] car c'est le champ du formulaire de cet exercice

    $resultat = $jeudedes->diceRoll(); // on traite les données du formulaire envoyé
}

body('template/des.php', $resultat); // on affiche le template de l'exercice ainsi que le résultat si il y en a
