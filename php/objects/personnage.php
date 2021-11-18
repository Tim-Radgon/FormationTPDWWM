<?php
//En programmation, le besoin de structurer l'information peut être résolu au travers de différentes structures : les tableaux par exemple
//Mais un tableau ne permet de stocker l'information que de manière séquentielle : [1, 3, 7, 9]
//En PHP, les tableaux peuvent aider à stocker des couples clé/valeur
// ["temp_matin" => 1, "temp_midi => 7, "temp_soir" =>9]
// ["username" => "ericLaBiere", "address" => "1664 Rue de La Kro"]
//Mais l'information est tout de même désorganisée et peu structurée, et sas réutilisation peut apparaître difficile dû au fait que rien ne m'oblige à suivre cette structure, ou en tout cas rien ne m'indique à quoi ressemble la structure dans laquelle stocker mes données
//On dispose cependant d'une manière de cadrer notre stockage et manipulation de l'information qui s'appelle Objet

//Un objet est donc une autre structure de données pouvant contenir des attributs (valeurs) et des méthodes (fonctions), et qui peut être définie au travers d'une classe (un plan/un schéma) qui permettra de décrire ces propriétés et méthodes

//pour définir une classe d'objets, on utilise le mot clé class
//le nom de la classe s'écrit toujours avec une Majuscule au début
//une classe est un schema selon laquel on peut construire des objets
class Personnage
{
    //une classe d'objets possède des attributs permettant de définir quelles données seront stockées dans les objets de la classe
    //les membres d'une classe (attributs ou méthodes) possèdent une visibilité, cette visibilité décide du point de vue par lequel on peut accéder aux données de l'objet
    //un attribut privé (private) par exemple ne peut être accédé que par l'objet lui-même, et ne peut donc être utilisé que dans le corps de la classe
    //à contrario, la visibilité publique (public) permet d'accéder à l'attribut ou à la méthode même "en dehors" de l'objet lui même, donc du point de vue externe à la classe et l'objet
    private $name;
    private $hp;
    private $constitution;
    private $force;
    private $endurance;

    //pour définir notre façon d'instancier (construire) nos personnages, on décrit son Constructeur
    //toutes les classes ont un constructeur, mais on l'agrémente de quelques précisions pour l'adapter à la structure de nos objets
    //chaque paramètre précisé dans la fonction __construct (deux _ car c'est une fonction réservée dit "magique")
    //pourra être utilisé lors de l'instantiation de l'objet, ils nous permettent de préciser quelles données sont attendues pour créer l'objet
    public function __construct($name, $constitution, $force, $endurance)
    {
        //$this permet d'accéder à l'objet instancié à partir de la classe
        //c'est un moyen de cibler l'objet "du point de vue de la classe"
        //on peut également le voir comme un moyen pour l'objet de se cibler lui-même, le code de la classe s'exécutant dans les objets instanciés
        $this->name = $name;
        $this->constitution = $constitution;
        //on peut également avoir des propriétés calculées lors de la construction de l'objet
        //le constructeur peut accepter du code influençant la future instance
        $this->hp = $constitution * 10;
        $this->force = $force;
        $this->endurance = $endurance;
    }

    //un attribut rendu "private" peut être rendu accessible au travers de méthodes (appelées "accesseurs") qui permette, de façon publique, de lire et modifier les attributs de l'objet
    //l'avantage d'utiliser ces méthodes est qu'elles peuvent accepter du code à exécuter au moment de la modification
    public function setHp($value)
    {
        //ici, nos HP ne sont pas modifiables directement (et sont donc private) car on veut pouvoir vérifier que leur valeur ne tombe pas en dessous de 0
        $this->hp = $value;
        //si les hp tombent sous 0
        if ($this->hp < 0) {
            //on les ramène à 0
            $this->hp = 0;
        }
    }

    //pour pouvoir tout de même lire la valeur des HP de notre personnage
    //on met en place un "getter" qui se contente de renvoyer la valeur de l'attribut lorsqu'il est appelé
    public function getHp()
    {
        return $this->hp;
    }

    public function presentation()
    {
        echo "Je m'appelle" . $this->name;
    }

    //les méthodes peuvent accepter des paramètres qui sont des objets
    //ici par exemple, on attend un objet de classe Personnage
    public function frapper($cible)
    {
        //dans le code d'une méthode, on peut donc utiliser sans ambiguïté, même pour deux objets d'une même classe, les attributs et méthodes de chacun, en utilisant l'objet courant avec $this et l'objet ciblé avec son nom de paramètre (ici $cible)
        //on affiche un message annonçant le coup à venir
        echo "$this->name frappe $cible->name pour {$this->valeurDegats($cible->constitution)} dégats !";
        //on retire ensuite les points de vie de la cible en fonction des dégâts de notre attaquant
        $cible->setHp($cible->hp - ($this->valeurDegats($cible->constitution)));
    }

    //une méthode peut également être privée, si c'est le cas elle ne peut être, comme un attribut, utilisée que dans le corps de la classe
    //une méthode privée est en général une méthode qui n'a d'intérêt que dans le mécanisme de la classe elle-même
    private function valeurDegats($constitutionCible)
    {
        $lostHp = $this->force - $constitutionCible / 2;
        if ($lostHp < $this->force / 2) {
            $lostHp = $this->force / 2;
        }
        return $lostHp;
    }
}

//pour instancier (créer) un objet à partir d'une classe, on appelle son constructeur grâce au mot clé "new"
//ici on crée un nouveau Personnage appelé eric avec 20 de constitution, 15 de force, 100 d'endurance
$link = new Personnage("Link", 10, 15, 100);
$moblin = new Personnage("Moblin", 10, 10, 100);
$link->presentation();
$moblin->presentation();
$link->frapper($moblin);
var_dump($moblin->getHp());
