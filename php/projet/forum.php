<?php
require('exo/GestionBDD.php');
require('config.php');
require('util.php');
require('exo/GestionUtilisateur.php');
require('exo/Request.php');

$request = new Request($_POST);
$gestionBDD = new GestionBDD();
$connexion = $gestionBDD->connexion();
$gestionUtilisateur = new GestionUtilisateur($connexion);

$resultat = $gestionUtilisateur->inscription($request);
$listUser = $gestionUtilisateur->find();

body('template/forumTPL.php', $resultat['result'], $listUser);
