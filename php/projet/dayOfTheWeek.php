<?php
require('exos/dayOfTheWeek/DayOfTheWeek.php');
require('util.php');

require('exos/Request.php');

$request = new Request($_POST);
$request->sessionDestroy();

$jours = '';
if (!empty($_POST['date'])) {
    $dayOfTheWeek = new DayOfTheWeek(
        $_POST['date']
    );
    $jours = $dayOfTheWeek->jours();
}
body("template/dayOfTheWeek.php", $jours);