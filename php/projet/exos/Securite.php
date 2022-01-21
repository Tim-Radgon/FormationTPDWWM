<?php

class Securite
{
    public function __construct()
    {
    }

    public function loginv1(PDO $connexionBDD, $login, $password)
    {
        try {
            $query = "select * from user where login = '$login' AND password = '$password'";
            $PDOStatement = $connexionBDD->prepare($query);
            $PDOStatement->execute();

            if ($PDOStatement->rowCount()) {
                $_SESSION['user'] = $login;
                redirection('index.php');
            }

            return "<strong>L'utilisateur n'existe pas</strong>";
        } catch (Exception $e) {
            if ('dev' === APP_ENV) {
                return $e->getMessage() . '<br>' . $query;
            } else {
                die("Il y a un problème de bdd<br>Veuillez contacter votre administrateur");

            }
        }
    }

    public function loginv2(PDO $connexionBDD, string $login, string $password): string
    {
        try {
            $query = "select login, password from user where login = :login";
            $PDOStatement = $connexionBDD->prepare($query);
            $PDOStatement->execute([
                ':login' => $login
            ]);

            $user = $PDOStatement->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user['login'];
                redirection('index.php');
            }

            return "<strong>L'utilisateur n'existe pas</strong>";
        } catch (Exception $e) {
            if ('dev' === APP_ENV) {
                return $e->getMessage() . '<br>' . $query;
            } else {
                die("Il y a un prolbème de bdd<br>Veuillez contacter votre administrateur");

            }
        }
    }

    public function loginv2bis(PDO $connexionBDD, Request $request): string
    {
        try {
            $login = $request->getPost('login');
            $password = $request->getPost('password');

            if ($login && $password) {
                $query = "select login, password from user where login = :login";
                $PDOStatement = $connexionBDD->prepare($query);
                $PDOStatement->execute([
                    ':login' => $login
                ]);

                $user = $PDOStatement->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user['password'])) {
                    $request->setSession('user', $user['login']);
                    redirection('index.php');
                }

                return "<strong>L'utilisateur n'existe pas</strong>";
            }
        } catch (Exception $e) {
            if ('dev' === APP_ENV) {
                return $e->getMessage() . '<br>' . $query;
            } else {
                die("Il y a un prolbème de bdd<br>Veuillez contacter votre administrateur");

            }
        }

        return "";
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        redirection('index.php');
    }
}