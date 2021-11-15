<?php
//CORRECTION et Recommandation de Sécurité :

//on teste si notre formulaire est envoyé dans son intégralité avec les noms attendus
if (isset($_POST["radius"]) && isset($_POST["height"])) {
//on récupère les valeurs de notre formulaire
    $radius = $_POST["radius"];
    $height = $_POST["height"];
    //on vérifie que les valeurs envoyées soient bien des nombres
    if (is_numeric($radius) && is_numeric($height)) {
        //on effectue notre calcul :
        $result = (pi() * $radius ** 2 * $height) / 3;
        //si la case à cocher pour arrondir est cochée
        if (isset($_POST["round"])) {
            //renvoi du résultat arrondi
            echo round($result);
        } else {
            //sinon renvoi du résultat complet
            echo $result;
        }
    } else {
        echo "Veuillez envoyer des nombres";
    }
} else {
    echo "Erreur de formulaire";
}