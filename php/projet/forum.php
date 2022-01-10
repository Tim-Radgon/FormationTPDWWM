<?php
require('exo/GestionBDD.php');
require('config.php');
require('util.php');
require('exo/GestionUtilisateur.php');

$resultat = '';
$gestionBDD = new GestionBDD();
$connexion = $gestionBDD->connexion();

if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['login']) && !empty($_POST['password'])) {

    $gestionUtilisateur = new GestionUtilisateur($connexion, $_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['password']);
    $resultat = $gestionUtilisateur->inscription() . $gestionUtilisateur->find();

}


body('template/forumTPL.php', $resultat);
