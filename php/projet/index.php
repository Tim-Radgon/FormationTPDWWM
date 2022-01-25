<?php
require('util.php');

session_start();

body('template/accueil.php', '', ['menu' => 'accueil']);