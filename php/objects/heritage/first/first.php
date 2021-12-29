<?php
//require_once('class/Animal.php'); // Appelle de fichier obligatoire mais une fois, plante à cette endroit si il est absent
require('class/Animal.php');
require('class/Loup.php');
// Appelle de fichier obligatoire
// Appelle de fichier obligatoire
//include_once('class/Animal.php'); // Appelle de fichier une fois, non obligatoire mais le projet peut planter si on en a besoin
//include('class/Animal.php'); Appelle de fichier non obligatoire mais le projet peut planter si on en a besoin
$animal = new Animal('Loup Garou', 'Loup', 'Lupus', 'mal');
$animalBis = new Animal('Loup Garoutte', 'Loup', 'Lupus', 'femelle');

$animal->setNom('tartuffe');
$animal->seDeplacer();

$animalBis->setNom('tooo');

$loup = new Loup('Grand méchant loup', 'mal');

$loup->cri();
$loup->nage();


var_dump($animal);
var_dump($animalBis);
var_dump($loup);