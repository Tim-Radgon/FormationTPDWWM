<?php
require('exos/randNums/Randnums.php');
require('util.php');

require('exos/Request.php');

$request = new Request($_POST);
$request->sessionDestroy();

$result = '';

if (!empty($_POST['min']) &&
    !empty($_POST['max']) &&
    isset($_POST['nombreValeurs'])) {
    $randNums = new Randnums(
        $_POST['min'],
        $_POST['max'],
        $_POST['nombreValeurs']
    );

    $result = $randNums->result();
}

body("template/randNums.php", $result);