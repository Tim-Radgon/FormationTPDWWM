<?php

class Compte
{
    private $nom;
    private $solde;
    private $devise;

    public function __construct($nom, $devise)
    {
        $this->nom = $nom;
        $this->devise = $devise;
        $this->solde = 0;
    }

    public function debiter($valeur)
    {
        if ($valeur > $this->solde) {
            echo "Retrait impossible, solde insuffisant";
        } else {
            echo "Retrait de $valeur $this->devise";
            $this->solde -= $valeur;
        }
    }

    public function crediter($valeur)
    {
        echo "Ajout de $valeur $this->devise sur le compte";
        $this->solde += $valeur;
    }

    public function afficherSolde()
    {
        if ($this->devise === "USD") {

            echo "Bonjour $this->nom, votre solde s'élève à $ $this->solde";
        }
        if ($this->devise === "EUR") {
            echo "Bonjour $this->nom, votre solde s'élève à $this->solde €";
        }
    }

}

$compte = new Compte("Patrick Balkany", "EUR");
$compte->crediter(20);
$compte->debiter(10);
$compte->afficherSolde();
