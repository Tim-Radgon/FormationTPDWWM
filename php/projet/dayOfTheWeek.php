<?php
require('exos/dayOfTheWeek/DayOfTheWeek.php');
require('util.php');

require('exos/Request.php');

$request = new Request($_POST);
$request->sessionDestroy();

$result = '';
if (!empty($_POST['date'])) {
    $dayOfTheWeek = new DayOfTheWeek(
        $_POST['date']
    );
}
body("template/dayOfTheWeek.php", $result);