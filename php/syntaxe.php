<?php
//ceci est un commentaire
$message = "salut"; //ceci est une variable
//les variables en PHP sont déclarées à l'aide du symbole $ précédant leur nom
//le ; est ici obligatoire

//étant donné qu'un fichier PHP interprété renvoie toujours du texte, pour afficher quelque chose à l'écran, il faut pouvoir dicter à PHP de renvoyer du texte à l'éxécution
//pour ça, on peut utiliser la fonction echo
echo $message;

//les conditions suivent les mêmes principes et syntaxes qu'en javascript
$age = 11;
    //cette condition sera toujours vraie, c'est pour l'exemple
if ($age < 18) {
    //étant donné qu'on renvoie du texte, on peut très bien écrire des balises HTML qui seront interprétées par le navigateur
    echo "<p>Accès interdit</p>";
}

//LES TABLEAUX
//étant donné que PHP est un langage de programmation, il y a forcément un moyen de gérer des tableaux
//un tableau s'écrit potentiellement de deux façons :

//de manière "hitorique"
$nombres = array(1, 2, 3, 4); //le tableau contient donc [1, 2, 3, 4]
//depuis php5 on peut créer un tableau "à la volée" comme en JS
$voitures = ["fiat", "ferrari", "alfa romeo"];
//on accède aux cases du tableau comme d'habitude via un index
echo $voitures[1]; //affiche "ferrari" à l'écran

//contrairement à javascript, une énorme différence est que les tableaux PHP sont mutables (modifiables) en place
$voitures[0] = "lancia"; //en javascript cela aurait été interdit
echo $voitures[0]; //au lieu d'afficher "fiat" on affiche donc "lancia"

//ajouter une nouvelle valeur peut se faire aussi de deux façons :
$voitures[] = "lamborghini"; //"crochet vide" serait l'équivalent d'un push : on ajoute la valeur à la fin du tableau
echo $voitures[3];
//on peut également utiliser array_push()
array_push($voitures, "peugeot", "renault");

//si l'on désirait parcourir notre tableau pour en afficher le contenu, on pourrait utiliser notre sempiternel for
echo "<ul";
//pour renvoyer le nombre d'éléments dans un tableau on utilise count()
//atttention : count() ne sert qu'aux tableaux et pas au chaînes de caractères
for ($i = 0; $i < count($voitures); $i++){
    echo "<li>$voitures[$i]</li>";
}
echo "</ul>";

//en PHP il existe un autre type de tableaux, appelés tableaux associatifs, qui prennent une forme de dictionnaire clé/valeur, et ressemblent un peu à des objets
$villes = [
    "34000" => "Montpellier",
    "75000" => "Paris",
    "31000" => "Toulouse",
    "13000" => "Marseille",
];
//pour afficher "Montpellier" on doit donc utiliser comme index son code postal
echo $villes["34000"];
//les données de  notre tableau associatif sont accessibles par des clés, mais par conséquent ne le sont plus à l'aide d'indices (0, 1, 2 ...)
//pour parcourir un tableau associatif, on ne peut donc pas utiliser un simple for
//le foreach s'écrit de la manière suivante : foreach($tableau as $clé => $valeur {}
foreach ($villes as $codePostal => $nomVille) {
    echo $codePostal . $nomVille; //affichera chaque élément de notre tableau
}
