<?php

class GestionUtilisateur
{
    private $connexion;


    public function __construct($connexion)
    {
        $this->connexion = $connexion;

    }

    public function inscription($nom, $prenom, $login, $password)
    {
        try {

            $query = "insert into user 
                (nom, prenom, login, mot_de_passe, roles_id, date_inscription)
              values
                ('$nom', '$prenom', '$login', '$password', 1, now())";

            $prepare = $this->connexion->prepare($query);
            $prepare->execute();
            return 'inscription bien effectué<br>';// puis on execute sa requete
        } catch (PDOException $exception) {
            if ('dev' === APP_ENV) {
                var_dump($exception);
                die($query);
            } else {
                die("L'enregistrement n'a pas pu s'effectuer<br>Veuillez contacter votre administrateur");
            }
        }
    }

    public function find()
    {
        try { // on essaye et si il y a un problème alors on affiche un message d'erreur adapté
            $prepare = $this->connexion->prepare('select * from user order by date_inscription desc limit 10');
            $prepare->execute();
        } catch (PDOException $e) {
            if ('dev' === APP_ENV) {
                var_dump($e);
                die();
            } else {
                die("La lecture de la base de donnée ne marche pas<br>Veuillez contacter votre administrateur");
            }
        }

        $html = '';

        while ($result = $prepare->fetch()) { // tant qu'il y a un enregistrement alors on boucle
            $html .= "id: {$result['id']}, login: {$result['login']}, password: {$result['mot_de_passe']}, prenom: {$result['prenom']}, nom: {$result['nom']}<br>";
        }

        return $html;
    }

    public function findById($id)
    {
        try { // on essaye et si il y a un problème alors on affiche un message d'erreur adapté
            $prepare = $this->connexion->prepare('SELECT * FROM user WHERE id =' . $id);
            $prepare->execute();
        } catch (PDOException $e) {
            if ('dev' === APP_ENV) {
                var_dump($e);
                die();
            } else {
                die("La lecture de la base de donnée ne marche pas<br>Veuillez contacter votre administrateur");
            }
        }

        $html = '';

        $result = $prepare->fetch();
        { // tant qu'il y a un enregistrement alors on boucle
            $html .= "id: {$result['id']}, login: {$result['login']}, password: {$result['mot_de_passe']}, prenom: {$result['prenom']}, nom: {$result['nom']}<br>";
        }

        return $html;
    }
}