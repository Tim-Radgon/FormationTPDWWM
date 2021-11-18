<?php

//on prépare des ratios de conversion en référence à une unité de base : ici le b/s
//étant donné que le point de référence est le même pour tous les ratios de notre tableau, le résultat peut toujours être calculé de façon relative et sera ainsi toujours correct
$unity = ["b" => 1, "kb" => 1 / 1e3, "mb" => 1 / 1e6, "gb" => 1 / 1e9, "o" => 1 / 8, "ko" => 1 / 8e3, "mo" => 1 / 8e6, "go" => 1 / 8e9];
//1e3 signifie 1000 en notation scientifique, cette notation est acceptée comme un nombre en PHP

$ratio1 = $unity[$_POST["val1"]];
$ratio2 = $unity[$_POST["val2"]];

//tout ce qu'il nous reste à faire, c'est calculer le ratio de conversion entre la valeur d'arrivée et la valeur de départ, et la multiplier à notre valeur pour la convertir
echo $_POST["bit"] * $ratio1 / $ratio2;
