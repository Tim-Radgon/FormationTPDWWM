<?php
require('exos/calculatrice/Calculatrice.php');
require('util.php');

require('exos/Request.php');

$request = new Request($_POST);
$request->sessionDestroy();

$result = '';
if (!empty($_POST['calcul']) &&
    !empty($_POST['num1']) &&
    isset($_POST['num2'])) {
    $calculatrice = new Calculatrice(
        $_POST['calcul'],
        $_POST['num1'],
        $_POST['num2']
    );

    $result = $calculatrice->result();
}

body("template/calculatrice.php", $result);