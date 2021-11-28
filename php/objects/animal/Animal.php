<?php

class Animal
{
    private $nom;
    private $type;
    private $genre;
    private $sexe;

    public function __construct($nom, $type, $genre, $sexe)
    {
        $this->setNom($nom);
        $this->type = $type;
        $this->genre = $genre;
        $this->sexe = $sexe;
    }

    public function setNom($nom)
    {
        if (strlen($nom) < 3) {
            exit('Votre nom "' . $nom . '" doit être plus long');
        }

        $this->nom = $nom;
    }

    protected function getNom()
    {
        return $this->nom;
    }

    public function cri()
    {
        echo $this->nom . ' hurle<br>';
    }

    public function seDeplacer()
    {
        echo $this->nom . ' bouge<br>';
    }
}