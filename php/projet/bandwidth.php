<?php
require('exos/bandwidth/Bandwidth.php');
require('util.php');

require('exos/Request.php');

$request = new Request($_POST);
$request->sessionDestroy();

$result = '';
if (!empty($_POST['bit']) && !empty($_POST['val1']) && !empty($_POST['val2'])) {
    $bandwidth = new Bandwidth(
        $_POST['bit'],
        $_POST['val1'],
        $_POST['val2'],
    );

    $result = $bandwidth->result();
}
body("template/bandwidth.php", $result);