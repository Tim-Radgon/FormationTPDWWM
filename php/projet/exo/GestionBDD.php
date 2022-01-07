<?php

class GestionBDD
{
    public function __construct()
    {
    }

    public function connexion()
    {
        try {
            $connexion = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
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

        return $connexion;
    }
}