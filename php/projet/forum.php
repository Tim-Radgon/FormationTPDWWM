<?php
require('exos/GestionBDD.php');
require('config.php');
require('util.php');
require('exos/forum/GestionUtilisateur.php');
require('exos/Request.php');

$request = new Request($_POST);
$gestionBDD = new GestionBDD();
$connexion = $gestionBDD->connexion();
$gestionUtilisateur = new GestionUtilisateur($connexion);

$resultat = $gestionUtilisateur->inscription($request);
$listUser = $gestionUtilisateur->find();

body('template/forumTPL.php', $resultat['result'], $listUser);
