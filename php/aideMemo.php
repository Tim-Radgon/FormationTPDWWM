<?php

$variable = 'texte'; // entre guillemet / apostrophe = texte
$variableEntiere = 1; // chiffre
$boolean = true; // false //  vrai ou faux

// Je teste si une variable existe ou pas
// isset retourne vrai ou faux
// ici $variableExiste n'a jamais été créée donc notre condition est fausse
if (isset($variableExiste) === true) {
} else {
}
// empty permet de vérifier si la variable existe et si elle existe alors vérifie si il y a une valeur ou pas
if (empty($variableExiste)) {
}
// je teste si c'est pas vide dans ce cas là
if (!empty($variableExiste)) {
}

// condition autre
// dans ce cas on permet de verifier $variableExiste existe et si elle a un contenu alors $a aura la valeur de $variableExiste sinon $a aura pour valeur 'contenu'
$a = $variableExiste ?? 'contenu';
// $a = $variableExiste ?? 'contenu'; équivalence en php classique
if (isset($variableExiste) && $variableExiste) {
    $a = $variableExiste;
} else {
    $a = 'contenu';
}

$a = isset($variableExiste) && $variableExiste ? $variableExiste : 'contenu';

// ici, si $variableA existe et a un contenu alors $a aura son contenu sinon elle prendra le contenu de $variableB, pareil si elle existe sinon ça sera le contenu de $variableC
$a = $variableA ?? $variableB ?? $variableC;


// Operateur ternaire
// ? :
// si $variable est vrai (donc à un contenu) alors $a aura la valeur 'test' et sinon aura la valeur 'valeur par defaut'
$a = $variable ? 'test' : 'valeur par defaut';

if ($variable) {
    $a = 'test';
} else {
    $a = 'valeur par defaut';
}

// on test si $variable existe et si elle existe alors $a aura la valeur de $variable et sinon aura la valeur 'valeur par defaut'
$a = isset($variable) ? $variable : 'valeur par defaut';

// $a = $variable ?: 'valeur par defaut';
// est équivalent écrire ça
// $a = $variable ? $variable: 'valeur par defaut';
// l'avantage est que l'on va éviter de dupliquer son code
$a = $variable ?: 'valeur par defaut';

// condition d'égalité multiple
// Si (dans le cas suivant) $voiture est = à EriMobile alors execute le cas EricMobile et aussi NicolasMobile car tant que
// la condition ne rencontre pas de break alors il exécute tous les cas suivants.
switch ($voiture) {
    case 'EricMobile':
        // traitement d'Eric Mobile
        echo('Eric Mobile est selectionné');

    case 'NicolasMobile':
        // traitement de Nicolas Mobile
        echo('Nicolas Mobile est selectionné');
        break;

    case 'DjibrilMobile':
        echo('Djibril Mobile est selectionné');
        break;
}


// $i++ revient à dire $i = $i + 1;
// $i-- revient à dire $i = $i - 1;

// boucle incrémentale
for ($i = 0; $i < 10; $i++) {
    echo "Numero : $i";
}
for ($i = 20; $i > 10; $i--) {
    echo "Numero : $i";
}

// autre boucle
$i = 0;
do { // fait
    echo "Numero : $i";
} while ($i++ < 10); // tant que $i est inférieur à dix
//
$i = 0;
while ($i < 10) { // tant que $i < 10
    $i++;
    echo "Numero : $i";
}

// création d'un tableau
// deux façons d'écrire un tableau en php
$tableau = array(45, 2323, 234234);
$tableau = [45, 2323, 234234];

echo $tableau[0]; // 45;
echo $tableau[2]; // 234234;

// le premier element du tableau commence toujours par 0
$a = count($tableau); // permet de connaitre le nombre d'élement dans un tableau

//Je veux dans un tableau associer le prénom et le nom
// pour ça on va utiliser une clé et une valeur (valeur de la clé)
$tableau = [
    'laurent' => 'chaloupe',
    'nicolas' => 'nom de nicolas',
    'orféo' => 'nom d orfeo'
];

// ici je vérifie s'il existe un element de mon tableau qui a une clé 'laurent'
if (isset($tableau['eric'])) { // dans notre tableau eric n'existe pas
    echo $tableau['eric']; // affiche le nom d'eric
}
var_dump($_POST);

$tableau = [ // le premier tableau va contenir un autre tableau
    ['id' => 1, 'prenom' => 'laurent', 'nom' => 'chaloupe'],
    // id est une clé qui a pour valeur 1
    // prenom est la clé qui a pour valeur laurent
    ['id' => 2, 'prenom' => 'eric', 'nom' => 'son nom']
    // id est une clé qui a pour valeur 1
    // prenom est la clé qui a pour valeur laurent
];

// $tableau[0] à pour valeur ['id' => 1, 'prenom' => 'laurent', 'nom' => 'chaloupe']

for ($i = 0; $i < count($tableau); $i++) {
    var_dump($tableau[$i]);
    var_dump($tableau[0]);
    echo $tableau[$i]['prenom'];
}

// exemple du tableau ancien avec les clés valeurs
$tableauBis = [45, 2323, 234234];
$tableauBis = [0 => 45, 1 => 2323, 2 => 234242];
echo '<br><br><br><br><br>';

$tableau = [
    ['id' => 1, 'prenom' => 'laurent', 'nom' => 'chaloupe'],
    ['id' => 2, 'prenom' => 'eric', 'nom' => 'son nom']
];

foreach ($tableau as $valeurDeMonTableau) {
    echo $valeurDeMonTableau['prenom'] . '<br>';
}
/* equivalent avec une boucle for
for($i = 0; $i < count($tableau); $i++) {
    echo $tableau[$i]['prenom'];
}
*/
echo '<br><br><br><br><br>';

$tableau = [
    'laurent' => 'chaloupe',
    'nicolas' => 'nom de nicolas',
    'orféo' => 'nom d orfeo'
];
// Si on veut parcourir ce tableau on ne pourra pas le faire avec un for
foreach ($tableau as $cle => $valeur) {
    echo 'Cle = ' . $cle . ' Valeur = ' . $valeur . '<br>';
}

// Permet d'essayer un code et s'il y a un envoi d'exception
// alors dans le catch on peut afficher un message adéquat suivant l'erreur envoyée
try {
} catch (Exception $e) {
}

/**
 * test
 *
 * @return mixed
 * @throws Exception Retourne une erreur avec le code 77
 */
function amazon()
{
    // instructions
    throw new Exception("Message d'erreur", 77); // Envoie une exception, donc un message et un code d'erreur
    // instructions

    return $donnee;
}

/**
 * Cette fonction va tester si il y a une exception qui a été envoyé via un try / catch
 * @return void
 */
function recupDonneeAmazon()
{
    try { // un try nous permet de vérifier que tout ce passe bien et dans le cas contraire, s'il y a une exception attraper l'erreur
        $result = amazon();
    } catch (Exception $e) { // le catch permet d'attraper une erreur de type Exception
        if ($e->getCode() == 77) { // la méthode getCode() récupére le code de l'exception que l'on pourra traiter suivant le code erreur afficher un message d'erreur adéquat
            echo("Les données d'amazon ne sont pas trouvé");
        } else {
            echo $e->getMessage(); // la méthode getMessage() récupére uniquement le message et dans ce cas affiche le message
        }
    }
}

recupDonneeAmazon();


class NomDeClasse
{ // Nom d'une classe commence toujours par une majuscule et est en CamelCase
    // " visibilité " dans une classe ou projet (public, protected, private)

    // Les attributs sont en camel case et commence toujours par une minuscule

    public $attributPublic; // ouvert à tout le monde
    protected $attributProtege; // partagé entre classe qui va hériter d'elle
    private $attributPrive; // réserver uniquement à cette classe

    public function __construct($parametre)
    {
    } // La construction d'un objet passe par un constructeur

    // Les méthodes sont en camel case et commence toujours par une minuscule
    public function methodeDeMaClasse()
    {
    }
}

//exemple
class MaVie
{
    public $attribut;

    public function __construct()
    {
    }

    public function jeSuisUnLivreOuvert()
    {
    }

    protected function jeCommuniqueQuAvecMesAmis()
    {
    }

    private function monJardinSecret()
    {
    }
}

$maVie = new MaVie();
$maVie->jeSuisUnLivreOuvert();


// On ne peut hériter d'une classe que si elle fait partie d'elle
// ex: class Homme extends Humain
// L'homme est un humain
// Quand on peut dire " est un " alors il y a héritage
class NomDeClasseEnfant extends NomDeClasse
{ // on ne peut hériter que d'une classe, et la derniere s'appelle class mère
    public function methode()
    {
    } // si une méthode a le même nom que la class mère, comme dans ce cas alors on appelle ça du polymorphisme
    // le constructeur est toujours une méthode de polymorphisme quand il y a l'héritage
}


// création d'un objet
// new permet de créer l'objet dont la variable est l'objet
$nomObjet = new NomDeClasseEnfant('paramètre éventuel');


// ---------------- Comment éviter les INJECTIONS SQL ---------------------------
// au lieu de concatener une variable dans notre requête comme par exemple ci-dessous
$query = "insert into user (nomColonne1, nomColonne2) values ('{$variable}', '{$variable2}')";

// on va enlever les apostrophes ainsi que la variable et mettre un placeholder à la place
// ça s'écrit par exemple
// :nom
// les placeholders seront sécurisé par PDO
// il faudra ensuite spécifier par quoi on remplace ce placeholder dans un bindParam ou un tableau que l'on transmet à la méthode execute()

$query = "insert into user (nomColonne1, nomColonne2) values (:placeHolderQuiALeNomDeSaColonne1, :nomColonne2)";

$prepare = $this->connexion->prepare($query);

$prepare->bindParam('placeHolderQuiALeNomDeSaColonne1', $variable, PDO::PARAM_STR, 30); // 30 = nombre de caractère maxi
$prepare->bindParam('nomColonne2', $variable2, PDO::PARAM_INT);

// ici dans cet exemple on précise le même nom du placeholder que dans bindParam
// à l'emplacement du placeholder correspondant sera remplacé par la valeur variable mais protégé

$prepare->execute();

// autre façon plus rapide mais pas rigoureuse car on ne précise pas
$prepare->execute([
    'placeHolderQuiALeNomDeSaColonne1' => $variable,
    'nomColonne2' => $variable2,
]); // puis on execute sa requête

// petite précision, on peut mettre ds placeholder que pour les noms des colones et non pas pour remplacer le sens du tri d'un "order by" par exemple


// ------------------------- Crypter un mot de passe pour une base de donnée et le tester ----------------------------
// admettons, on a un champ d'un formulaire qui s'appelle password
// et le mot de passe tapé est "eric"
$_POST['password'] = 'eric';

// on devra crypter le mot de passe avec la fonction password_hash comme ci-dessous pour l'enregistrer dans la base de donnée
// $motdepasseCrypte = password_hash($motDePasseACrypter, CONSTANTE_DE_TYPE_DE_CRYPTAGE);
// exemple concret
$motdepasseCrypte = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Le hash et le sel donné aura pour valeur quelque chose comme ça
$motdepasseCrypte = '$2y$10$gxLQF12uzPb9qw34z/TfwOpmEYFI0rFc4wB1zDrMXutrbtzDQP.8.';

// Pour info la taille d'un mot de passe crypté vaut toujours 72 caractères, donc la taille de la colonne d'une base de donnée qui
// devra stocker le mot de passe devra faire cette taille mais pourra être supèrieur par sécurité et avoir une taille de 255 caractères

// Puis il faudra dans un second temps vérifier le mot de passe saisie dans le formulaire
// avec celui de la base de donnée avec la fonction password_verify
// exemple
if (password_verify($_POST['password'], $motdepasseCrypte)) {
    echo 'mot de passe correct';
} else {
    echo 'Votre mot de passe est invalide';
}

// Faire des tests unitaires
// Il faut installer un package qui s'appelle PHPUnit
// ça permet de tester des méthodes (d'une classe) et de s'assurer que cette méthode retourne toujours un résultat attendu
// Exemple on a besoin de vérifier qu'une méthode de mot de passe soit valide si il y a 1 majuscule, 1 chiffre, 1 symbol
// de tester différent mot de passe valid et invalid et de certifier que celui ci est valid
composer require --dev phpunit / phpunit ^ 9

// Expression régulière
// C'est un fonction php preg_match ou preg_replace qui va executer un pattern (chaine de caractère) qui est un tas de condition
// Exemple on a besoin de vérifier qu'une méthode de mot de passe soit valide si il y a 1 majuscule, 1 chiffre, 1 symbol
preg_match();
preg_replace(); // permet de remplacer par exemple un mot ou lettre par un autre