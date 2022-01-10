<?php
require('exo/GestionBDD.php');
require('config.php');
require('util.php');
require('exo/GestionUtilisateur.php');

$resultat = '';
$gestionBDD = new GestionBDD();
$connexion = $gestionBDD->connexion();
$gestionUtilisateur = new GestionUtilisateur($connexion);

if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['login']) && !empty($_POST['password'])) {


    $resultat = $gestionUtilisateur->inscription($_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['password']);

}
$resultat .= $gestionUtilisateur->find();
$resultat .= $gestionUtilisateur->findById(78);

body('template/forumTPL.php', $resultat);
