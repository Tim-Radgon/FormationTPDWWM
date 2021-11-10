<?php
//ici on traite les données de notre formulaire form.html

//pour traiter les valeurs reçues d'un formulaire en méthode POST, il faut pouvoir les récupérer
//dans un traitement en POST, les valeurs sont stockées dans une variable nommée $_POST
//et ce sous la forme d'un tableau associatif (clé/valeurs) les clés étant les noms de nos champs input, les valeurs les données des champs

//var_dump($_POST); //var_dump permet d'inspecter l'intérieur d'une variable à des fins de développement

//pour utiliser la valeur d'un champ de formulaire on peut donc accéder via sa clé à la valeur dans le tableau $_POST :

//pour utiliser la valeur d'un champ de formulaire on peut donc accéder via sa clé à la valeur dans le tableau $_POST
//pour vérifier l'existence des données, il faut qu'on vérifie que le champ existe
//on peut le faire avec une fonction nommée isset ()

//une checkbox lorsqu'elle est cochée envoie ses données et est donc présente dans le $_POST, sinon aucune valeur n'est envoyée
//pour voir si une checkbox a été cochée, on vérifie juste sa présence dans $_POST avec isset()
if (!isset($_POST["agreeTerms"])) {
    echo "Veuillez acceptez les termes du contrat";
} else {
//si notre valeur de formulaire est renseignée
//si nos valeurs de champs existent bien
    if (isset($_POST["nickname"]) && isset($_POST["country"])) {
        //on peut y accéder et l'utiliser sans erreurs
        //on récupère notre code pays dans $_POST
        $countryCode = $_POST["country"];
        //on prépare un tableau de correspondance entre les codes de pays et les traductions de nos salutations
        $greetings = ["FR" => "Bonjour", "DE" => "Guten Tag", "UK" => "Hello"];
        //on vérifie toujours que les données utilisateurs soieent bien correctes; ici il nous faut nous assurer que le code pays reçu soit bien un des codes pays que l'on gère dans notre tableau
        //si le code pays reçu est bien disponible en tant que clé dans notre tableau de salutations
        if (array_key_exists($countryCode, $greetings)) {
            //on affiche notre salutation
            echo $greetings[$countryCode] . " " . $_POST["nickname"];
        } else {
            //sinon on affiche une erreur
            echo "Erreur code pays";
        }
    } else {
        //sinon on affiche un message
        echo "Erreur de formulaire";
    }
}
