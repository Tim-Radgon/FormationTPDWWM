<?php
require('exos/Request.php');

//$request = new Request($_POST);
//
//$request->setSession('favcolor', 'red'); // $_SESSION['favcolor'] = 'green';
//$request->setSession('animal', 'cat'); // $_SESSION['animal']   = 'cat';
//$request->setSession('time', time()); // $_SESSION['time']     = time();
//$request->setSession('user_id', 1); // $_SESSION['user_id'] = 1;

session_start();

echo $_SESSION['prenom'] ?? '';
echo '<br>';
echo $_SESSION['dice'] ?? '';
echo '<br>';
echo $_SESSION['dice_total'] ?? '';
echo '<br>';

var_dump($_SESSION['bad_user'] ?? '');

$menu = 'accueil';

//
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
require('template/body.php');