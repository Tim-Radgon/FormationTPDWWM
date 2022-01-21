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

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $connexionBDD = $gestionBDD->connexion();

    $resultat = $securite->loginv1($connexionBDD, $_POST['login'], $_POST['password']);
}

body('template/securiteTPL.php', $resultat);
