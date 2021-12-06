<?php
require('config.php');

// localhost ou 127.0.0.1 c'est pareil
// localhost c'est le nom de domaine
try {
    $connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
        DB_USERNAME, DB_PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    if ('dev' === APP_ENV) {
        var_dump($e);
        die();
    } else {
        die('Erreur de base de donnée');
    }
} catch (Exception $e) {
    die('Erreur inconnue');
}

$prep = $connection->prepare('select * from message');
$prep->execute();
var_dump($prep->fetch());