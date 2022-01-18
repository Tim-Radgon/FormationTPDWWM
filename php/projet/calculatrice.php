<?php
require('exos/calculatrice.php'); // charge la class de notre exercise
require('util.php');

$resultat = '';

if (isset($_POST["operation"]) && isset($_POST["a"]) && isset($_POST["b"])) {
    $calculatrice = new Calculatrice($_POST['operation'], $_POST["a"], $_POST["b"]);

    $resultat = $calculatrice->result();
}

body('template/calculatrice.php', $resultat);
