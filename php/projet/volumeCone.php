<?php
require('exos/volumeCone/VolumeCone.php');
require('util.php');

require('exos/Request.php');

$request = new Request($_POST);
$request->sessionDestroy();

$result = '';