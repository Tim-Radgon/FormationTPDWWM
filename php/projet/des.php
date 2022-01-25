<?php
require('exos/Request.php');
require('exos/des/JeuDeDes.php'); // charge la class de notre exercise
require('util.php');


$request = new Request($_POST);

//if(count($_SESSION)) {
//    echo !empty($_SESSION['favcolor']) ? $_SESSION['favcolor'].'<br>' : 'Pas de couleur selectionné<br>'; // green
//    echo !empty($_SESSION['animal']) ? $_SESSION['animal'].'<br>' : 'Pas d animaux<br>';   // cat
//    echo !empty($_SESSION['time']) ? date('Y m d H:i:s', $_SESSION['time']).'<br>' : 'Aucune date selectionné';
//    echo $_SESSION['user_id'] ?? 'Pas connecté';
//}

$resultat = '';

if ($request->getPost('dice')) {
    $jeudedes = new JeuDeDes($request); // on transmet ici $_POST['dice'] car c'est le champ du formulaire de cet exercice

    $resultat = $jeudedes->diceRoll(); // on traite les données du formulaire envoyé
}

body('template/des.php', $resultat, ['menu' => 'des']); // on affiche le template de l'exercice ainsi que le résultat si il y en a