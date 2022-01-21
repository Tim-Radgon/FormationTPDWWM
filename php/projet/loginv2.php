<?php
require('exos/Securite.php');
require('exos/GestionBDD.php');
require('util.php');
require('config.php');
require('exos/Request.php');

$request = new Request($_POST);
$gestionBDD = new GestionBDD();
$securite = new Securite();

if ($request->getSession('user')) {
    redirection('index.php');
}

$resultat = '';

$connexionBDD = $gestionBDD->connexion();
if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $resultat = $securite->loginv2($connexionBDD, $_POST['login'], $_POST['password']);
}
body('template/securiteTPL.php', $resultat);
