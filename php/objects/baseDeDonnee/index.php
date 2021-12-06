<?php

//localhost peut être remplacé par 127.0.0.1, c'est la même chose
//localhost est le nom de domaine

$connection = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');

$prep = $connection->prepare('select * from message');
$prep->execute();
$prep->fetch();