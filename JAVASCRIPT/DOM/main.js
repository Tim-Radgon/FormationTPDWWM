// DOM = Document Object Model
// Le DOM est un ensemble de données représentant le document web et ses éléments
// Il est assemblé par le navigateur au moment de l'interprétation du HTML
// Un objet javascript est donc utilisé pour représenter chaque élément de notre page
// Un objet HTMLDocument définit l'entiereté de la page
// Cet objet contient la représentation en javascript de chacune des balises

// Pour accéder à ce Document, on peut scruter la variable globale document, qui est initialisée lors de la création de la page et contient toutes les informations sur la page elle même 

console.log(document)

// Avec ce document HTMLDocument, on peut effectuer certaines manipulations sur le document lui même ou même ses enfants
// Ces manipulations vont se faire au travers de nombreuses propriétés (des valeurs) ou méthodes (des fonctions) des objets composant le document
// Une des propriétés de HTMLDocument par exemple body, qui contient l'objet body, et donc les informations sur le body de notre document 
console.log(document.body)

// Chaque élément du DOM étant représenté plus ou moins de la même façon, sous la forme de ce que javascript appelle un HTMLElement, ils possèdent donc tous des propriétés en commun
// Parmi ces propriétés se trouve les propriétés children et childNodes
// Dans children se trouvent tous les HTMLElement contenus dans l'élément ciblé
console.log(document.body.children) //on renvoie les "enfants" de body
// Dans childNodes on y trouve un peu plus d'informations, car s'y trouvent tous les "noeuds" du document, ce qui concerne les éléments ainsi que les noeuds de texte (sauts de ligne, texte écrit directement dans le document)
console.log(document.body.childNodes)

// Il est possible de cibler plus précisément certains éléments du DOM et ainsi intéragir avec
// Pour récupérer tous les éléments qui partagent un même nom de balise, on peut utiliser getElementsByName, qui est une méthode de document
const liElements = document.getElementsByTagName("li")
console.log(liElements)

// Il est également possible, dans la même veine que getElementsByTagName de sélectionner tous les éléments possédant une même classe avec getElementsByClassName
const superElements = document.getElementsByClassName("super") //tous les éléments possédant une classe "super" seront renvoyés dans notre constant superElements
console.log(superElements)

// Pour récupérer un élément unique, on peut utiliser un id comme identifiant de notre élément et le récupérer avec getElementById
const greeting = document.getElementById("greeting")
console.log(greeting)

// Une fois des éléments "récupérés" en javascript, on peut commencer à les manimuler et changer certaines de leurs propriétés
// Pour changer le style d'un élément, on peut accéder à la propriété style de celui ci 
greeting.style.color = "red" //en utilisant la propriété style on rajoute directement un attribut "style" contenant notre css dans l'élement html
// On peut également manipuler les classes d'un élément à partir de classList, qui permet d'ajouter, modifier, retirer des classes css sur un élément
greeting.classList.add("big")

// Créer des éléments à la volée
// Pour pouvoir créer dynamiquement des éléments et les insérer dans le DOM on peut utiliser document.createElement('nomdelelement')
const nouvelleImage = document.createElement('img')
// Une fois cet élément crée, on peut manipuler ses propriétés et donc ses attributs html
nouvelleImage.src = "https://via.placeholder.com/150"
nouvelleImage.alt = "placeeholder"
// Pour rajouter notre élément dans notre page, on cible l'élement dans lequel on souhaite ranger notre nouvel élément, et on utilise appendChild
greeting.appendChild(nouvelleImage)

// Pour retirer des éléments, on peut utiliser notreElement.remove(), par exemple ici on pourrait nouvelleImage.remove() pour supprimer notre image

// Evidemment, ces fonctionnalités ne "servent à rien" seules, et il faudra les associer à des évènements (clic de l'utilisateur, scroll, téléchargemment d'une image, etc)

