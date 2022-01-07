<?php

class GestionUtilisateur
{
    private $connexion;

    private $nom;
    private $prenom;
    private $login;
    private $password;

    public function __construct($connexion, $nom, $prenom, $login, $password)
    {
        $this->connexion = $connexion;

        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->login = $login;
        $this->password = $password;
    }

    public function inscription()
    {
        try {

            $query = "insert into user 
                (nom, prenom, login, password, roles_id, date_inscription)
              values
                ('{$this->nom}', '{$this->prenom}', '{$this->login}', '{$this->password}', 1, now())";

            $prepare = $this->connexion->prepare($query);
            $prepare->execute(); // puis on execute sa requete
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
            $html .= "id: {$result['id']}, login: {$result['login']}, password: {$result['password']}, prenom: {$result['prenom']}, nom: {$result['nom']}<br>";
        }

        return $html;
    }

}