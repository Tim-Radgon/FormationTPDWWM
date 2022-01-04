<?php
require('config.php');

// localhost ou 127.0.0.1 c'est pareil
// localhost c'est le nom de domaine
try {
    $connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
        DB_USERNAME, DB_PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    if ('dev' === APP_ENV) {
        var_dump($e);
        die();
    } else {
        die('Erreur de base de donnée');
    }
} catch (Exception $e) {
    die('Erreur inconnue');
}
// étape 1 Verification que l'utilisateur à bien envoyer le formulaire complet
// 2 enregistrer les données
// 3 afficher message d'erreur si il y a une erreur

// Verification que l'utilisateur à bien envoyer le formulaire complet
if (empty($_POST['nom']) ||
    empty($_POST['prenom']) ||
    empty($_POST['login']) ||
    empty($_POST['password'])
) {
    die ("Vous devez remplir tous les champs du formulaire");
}

// on enregistre les données
try { // on essaye et s'il y a un problème alors on affiche un message d'erreur adapté dans le catch

    // on écrit la requette pour l'enregistrement
    $query = "insert into user 
                (nom, prenom, login, mot_de_passe, roles_id, date_inscription)
              values
                ('{$_POST['nom']}', '{$_POST['prenom']}', '{$_POST['login']}', '{$_POST['password']}', 1, now())";

    // pour enregistrer correctement sa requete on s'aperçoit que role_id doit être rempli
    // et que si on n'ajoute pas now() pour date_inscription alors on ne peut faire un tri correct pour l'affichage qui suit

    $prep = $connection->prepare($query);
    $prep->execute(); // puis on execute sa requete
} catch (PDOException $exception) {
    if ('dev' === APP_ENV) {
        var_dump($exception);
        die($query);
    } else {
        die("L'enregistrement n'a pas pu s'effectuer<br>Veuillez contacter votre administrateur");
    }
}

try { // on essaye et si il y a un problème alors on affiche un message d'erreur adapté
    $prep = $connection->prepare('select * from user order by date_inscription desc limit 10');
    $prep->execute();
} catch (PDOException $e) {
    if ('dev' === APP_ENV) {
        var_dump($e);
        die();
    } else {
        die("La lecture de la base de donnée ne marche pas<br>Veuillez contacter votre administrateur");
    }
}

while ($result = $prep->fetch()) { // tant qu'il y a un enregistrement alors on boucle
    echo "id: {$result['id']}, login: {$result['login']}, password: {$result['password']}, prenom: {$result['prenom']}, nom: {$result['nom']}<br>";
}



