<?php
//ici on traite les données de notre formulaire form.html

//pour traiter les valeurs reçues d'un formulaire en méthode POST, il faut pouvoir les récupérer
//dans un traitement en POST, les valeurs sont stockées dans une variable nommée $_POST
//et ce sous la forme d'un tableau associatif (clé/valeurs) les clés étant les noms de nos champs input, les valeurs les données des champs

//var_dump($_POST); //var_dump permet d'inspecter l'intérieur d'une variable à des fins de développement

//pour utiliser la valeur d'un champ de formulaire on peut donc accéder via sa clé à la valeur dans le tableau $_POST :
//pour vérifier l'existence des données, il faut qu'on vérifie que le champ existe
//on peut le faire avec une fonction nommée isset ()
//si notre valeur de formulaire est renseignée
//si nos valeurs de champs existent bien
if (isset($_POST["nickname"]) && isset($_POST["country"])) {
    //on peut y accéder et l'utiliser sans erreurs
    if ($_POST["country"] == "DE") {
        echo "Guten Tag " . $_POST["nickname"];
    }
    if ($_POST["country"] == "FR") {
        echo "Bonjour " . $_POST["nickname"];
    }
    if ($_POST["country"] == "UK") {
        echo "Hello " . $_POST["nickname"];
    }
} else {
    //sinon on affiche un message
    echo "Erreur de formulaire";
}
