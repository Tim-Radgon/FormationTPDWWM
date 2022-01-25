<?php
require('exos/randNums/Randnums.php');
require('util.php');

session_start();
$result = '';

if (!empty($_POST['min']) &&
    !empty($_POST['max']) &&
    isset($_POST['nombreValeurs'])) {
    $aleat = new Aleat(
        $_POST['min'],
        $_POST['max'],
        $_POST['nombreValeurs']
    );

    $result = $aleat->result();
}

body("template/randNums.php", $result, ['menu' => 'randNums']);