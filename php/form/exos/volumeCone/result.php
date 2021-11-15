<?php

$pi = "3.14";
$div = "3";

if (!isset($_POST["round"])) {
    echo "Pour arrondir le résultat, veuillez cocher la case 'Arrondir ?' à la page précédente ";
    echo ($pi * $_POST["radius"] ** 2 * $_POST["height"]) / $div;
} else {

    echo round($pi * $_POST["radius"] * $_POST["height"] / $div, 0, PHP_ROUND_HALF_ODD);
}
