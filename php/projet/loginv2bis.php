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

$resultat = $securite->loginv2bis($connexionBDD, $request);

body('template/securiteTPL.php', $resultat, ['menu' => 'securite']);