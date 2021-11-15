<?php
//traiter les valeurs de formulaire de la calculatrice pour afficher le résultat du calcul à l'écran

//on vérifie que notre formulaire ait conservé son intégrité
if (isset($_POST["operation"]) && isset($_POST["a"]) && isset($_POST["b"])) {
    //on vérifie que les valeurs à calculer soient bien des nombres
    if (is_numeric($_POST["a"]) && is_numeric($_POST["b"])) {
        //on applique ensuite le calcul désiré en fonction de l'opération demandée
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
            //dans le cas d'une division, on s'assure qu'on n'essaye pas de diviser par zéro
            if ($_POST["b"] == 0) {
                echo "Division par Zéro Impossible";
            } else {
                echo $_POST["a"] / $_POST["b"];
            }
        }
    }
}





