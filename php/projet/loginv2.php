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
if (!empty($_POST['login']) && !empty($_POST['mot_de_passe'])) {
    $resultat = $securite->loginv2($connexionBDD, $_POST['login'], $_POST['mot_de_passe']);
}
body('template/securiteTPL.php', $resultat);
