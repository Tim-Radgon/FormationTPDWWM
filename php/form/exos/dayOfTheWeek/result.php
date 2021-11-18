<?php


$d = $_POST["d"];
$m = $_POST["m"];
$y = $_POST["y"];

$weekday = [1 => "lundi", 2 => "mardi", 3 => "mercredi", 4 => "jeudi", 5 => "vendredi", 6 => "samedi", 7 => "dimanche"];

$formule = ((23 * $m / 9) + $d + 4 + $y + ($y - 1 / 4) - ($y - 1 / 100) + ($y - 1 / 400)) % 7;

echo;