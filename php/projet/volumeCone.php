<?php
require('exos/volumeCone/VolumeCone.php');
require('util.php');

require('exos/Request.php');

$request = new Request($_POST);
$request->sessionDestroy();

$result = '';
if (!empty($_POST['radius']) && !empty($_POST['height'])) {
    $volumeCone = new VolumeCone(
        $_POST['radius'],
        $_POST['height'],
        $_POST['round'] ?? ""
    );

    $result = $volumeCone->result();
}
body("template/volumeCone.php", $result);