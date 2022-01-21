<?php
require('exos/Securite.php');
require('util.php');

session_start();

$securite = new Securite();
$securite->logout();
