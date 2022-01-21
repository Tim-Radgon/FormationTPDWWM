<?php
require('exos/Securite.php');
require('exos/GestionBDD.php');
require('util.php');
require('config.php');

$gestionBDD = new GestionBDD();
$securite = new Securite();

session_start();

if (!empty($_SESSION['user'])) {
    redirection('index.php');
}

$resultat = '';

if (!empty($_POST['login']) && !empty($_POST['mot_de_passe'])) {
    $connexionBDD = $gestionBDD->connexion();

    $resultat = $securite->loginv1($connexionBDD, $_POST['login'], $_POST['mot_de_passe']);
}

body('template/securiteTPL.php', $resultat);
