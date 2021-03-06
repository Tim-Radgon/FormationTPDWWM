<?php

class GestionUtilisateur
{
    private $connexion;

//    public const CONSTANTE = 'test';

    public function __construct(PDO $connexion)
    {
        $this->connexion = $connexion;
    }

    /**
     * Inscrit un nouvelle utilisateur dans la base de donnée
     *
     * @param Request $request
     * @return array
     */
    public function inscription(Request $request): array
    {
        try {
            $nom = $request->getPost('nom'); // $nom = $_POST['nom'];
            $prenom = $request->getPost('prenom');// $prenom = $_POST['prenom'];
            $login = $request->getPost('login');// $login = $_POST['login'];
            $password = $request->getPost('password');// $password = $_POST['password'];

            if ($nom && $prenom && $login && $password) {
                $password = password_hash($password, PASSWORD_DEFAULT);

                $query = "insert into user 
                            (nom, prenom, login, password, roles_id, date_inscription)
                          values
                            (:nom, :prenom, :login, :password, 1, now())";

                $prepare = $this->connexion->prepare($query);
//                $prepare->bindParam('prenom', $prenom, PDO::PARAM_STR, 10);

                $prepare->execute(
                    [
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'login' => $login,
                        'password' => $password
                    ]
                ); // puis on execute sa requête

                $_SESSION['prenom'] = $prenom;
                $request->setSession('prenom', $prenom);

                return ['result' => "Utilisateur bien enregistré <br>"];
            }
        } catch (PDOException $exception) {
            if ('dev' === APP_ENV) {
                var_dump($exception->getMessage());
                die($query);
            } else {
                if ($exception->getCode() == 23000) {
                    die("Le login est déjà existant, veuillez en choisir un autre");
                } else {
                    die("L'enregistrement n'a pas pu s'effectuer<br>Veuillez contacter votre administrateur");
                }

            }
        }

        return ['result' => ''];
    }

    public function connect($login, $password)
    {
        $login = "noemi25@grondin.com";
        $password = 'test';

        $query = 'select * from user where `login` = :login and :password';
        $query = 'select * from user where `login` = "noemi25@grondin.com" and "test"';

        $prepare = $this->connexion->prepare($query);
        $prepare->execute([
            ':login' => $login,
            ':password' => $password,
        ]);
    }


    /**
     * Retourne 10 utilisateurs
     * @return string|void
     */
    public function find(): array
    {
        try { // on essaye et si il y a un problème alors on affiche un message d'erreur adapté
            $query = 'select * from user order by date_inscription desc limit 10';

            $prepare = $this->connexion->prepare($query);

            $prepare->execute();

            $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

            return ['result' => '', 'listUser' => $result, 'menu' => 'forum'];
        } catch (PDOException $e) {
            if ('dev' === APP_ENV) {
                var_dump($e);
                die();
            } else {
                die("La lecture de la base de donnée ne marche pas<br>Veuillez contacter votre administrateur");
            }
        }
    }

}