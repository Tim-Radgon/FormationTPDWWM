<?php
require('exos/Request.php');
//class PasClass
//{
//    public function blabla($post): void
//    {
//        echo $post . '<br>';
//    }
//}
//
//$pasclass = new PasClass();
//
//
//$chiffre = 20;
//$tartuffe = "Eric est comme ça";
//$post = "C'est faux, il n'est pas comme ça";
//
//$pasclass->blabla(10);
//$pasclass->blabla($chiffre);
//$pasclass->blabla($tartuffe);
//$pasclass->blabla($post);
//die;

//$request = new Request($_POST);
//
//$request->setSession('favcolor', 'red'); // $_SESSION['favcolor'] = 'green';
//$request->setSession('animal', 'cat'); // $_SESSION['animal']   = 'cat';
//$request->setSession('time', time()); // $_SESSION['time']     = time();
//$request->setSession('user_id', 1); // $_SESSION['user_id'] = 1;


//
//echo $_SESSION['prenom'] ?? '';
//echo '<br>';
//echo $_SESSION['dice'] ?? '';
//echo '<br>';
//echo $_SESSION['dice_total'] ?? '';
//echo '<br>';

//
//
//
//var_dump($_SESSION['bad_user']??'');

//$_POST['login'] = 'ttt@gmail.com';
//$_POST['password'] = 'Laurent';
//
//$motdepasseCrypte = '$2y$10$gxLQF12uzPb9qw34z/TfwOpmEYFI0rFc4wB1zDrMXutrbtzDQP.8.';
//if(password_verify($_POST['password'], $motdepasseCrypte)) {
//    echo 'mot de passe correct';
//} else {
//    echo 'Votre mot de passe est invalide';
//}

//die;
//
session_start();

$menu = 'accueil';
require('template/body.php');