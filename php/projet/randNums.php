<?php
require('exo/RandNums.php');
require('util.php');

$result = '';

if (!empty($_POST['min']) &&
    !empty($_POST['max']) &&
    isset($_POST['nombreValeurs'])) {
    $randNums = new randNums(
        $_POST['min'],
        $_POST['max'],
        $_POST['nombreValeurs']
    );

    $result = $randNums->result();
}

body("template/randNums.php", $result);
