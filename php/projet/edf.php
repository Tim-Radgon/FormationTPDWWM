<?php
require('exos/edf/Edf.php');
require('util.php');

require('exos/Request.php');

$request = new Request($_POST);
$request->sessionDestroy();

$result = '';
if (!empty($_POST['consumption']) && !empty($_POST['power']) && !empty($_POST['hp']) && !empty($_POST['hc'])) {
    $edf = new Edf(
        $_POST['consumption'],
        $_POST['power'],
        $_POST['hp'],
        $_POST['hc']
    );

    $result = $edf->result();
}
body("template/edf.php", $result);