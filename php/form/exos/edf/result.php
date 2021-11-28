<?php
//pour récupérer nos valeurs de formulaire, on continue de se tourner vers $_POST
//les informations sont stockées aux indices correspondant aux "name" de nos champs dans le formulaire HTML
$consumption = $_POST["consumption"];
$power = $_POST["power"];
$hp = $_POST["hp"];
$hc = $_POST["hc"];

//pour pouvoir faire la correspondance entre le "niveau de puissance" en kVA et le tarif en euros, on peut utiliser un tableau associatif
$tarifs = ["3" => 0.1558, "6" => 0.1558, "9" => 0.1605, "12" => 0.1605, "15" => 0.1605, "18" => 0.1605];
$hp = 0.1821;
$hc = 0.1360;

if ($power = "3") {
    echo $tarifs[$power] * $consumption;
} else
    echo $tarifs[$power] * $consumption + $hp + $hc;

