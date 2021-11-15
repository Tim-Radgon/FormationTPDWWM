<?php
//traiter les valeurs de formulaire de la calculatrice pour afficher le résultat du calcul à l'écran

if ($_POST["operation"] == "add") {
    echo $_POST["a"] + $_POST["b"];
}
if ($_POST["operation"] == "sub") {
    echo $_POST["a"] - $_POST["b"];
}
if ($_POST["operation"] == "mul") {
    echo $_POST["a"] * $_POST["b"];
}
if ($_POST["operation"] == "div") {
    echo $_POST["a"] / $_POST["b"];
}






