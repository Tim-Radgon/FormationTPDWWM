<?php

class Request
{
    private $post;

    public function __construct(array $post)
    {
        $this->post = $post;
        session_start();
    }

    /**
     * Je set une variable de session
     * exemple $_SESSION[$name] = $value;
     * C'est équivalent à faire
     * $request->sessionSet($name, $value)
     *
     * @param string $name
     * @param $value
     * @return void
     */
    public function setSession(string $name, $value): void
    {
        $_SESSION[$name] = $value;
    }


    /**
     * $name = $_SESSION[$name];
     * C'est équivalent à faire
     * $name = $request->sessionGet($name)
     *
     * @param string $name
     * @return mixed
     */
    public function getSession(string $name): mixed
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }

        return null;
    }

    /**
     * Vérifie si une variable existe dans une session
     *
     * @param string $name
     * @return bool
     */
    public function sessionExist(string $name): bool
    {
        return isset($_SESSION[$name]);
    }

    /**
     * Supprime un element dans une session
     *
     * @param string $name
     * @return void
     */
    public function sessionUnset(string $name): void
    {
        unset($_SESSION[$name]);
    }

    /**
     * Supprime toutes les infos dans la session
     *
     * @return void
     */
    public function sessionDestroy()
    {
        session_unset();
        session_destroy();
        unset($_SESSION);
    }

    /**
     * $nom = $_POST[$nom];
     * C'est équivalent à faire
     * $nom = $request->postGet($nom)
     *
     * @param string $nom
     * @return mixed|null
     */
    public function getPost(string $nom)
    {
        if (isset($this->post[$nom])) {
            return $this->post[$nom];
        }

        return null;
    }


    /**
     * donne une valeur à un $_POST
     *
     * $_POST[$nom] = $valeur;
     * C'est équivalent à faire
     * $request->postSet($nom, $valeur);
     *
     * @param string $nom
     * @param mixed $valeur
     * @return void
     */
    public function setPost(string $nom, $valeur): void
    {
        $this->post[$nom] = $valeur;
    }
}
