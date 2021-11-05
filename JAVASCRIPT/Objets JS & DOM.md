# Objets Javascript et Document Object Model :

## Les Objets en Javascript

Pour stocker et manipuler des données complexes en JS, on utilisait déjà des tableaux auparavant.

### Rappel - Les Tableaux

Les tableaux nous permettaient de stocker des données de _même type_ de façon _séquentielle_ de la manière suivante :

```js
const mesIngredients = ["huile d'olive", "basilic", "tomates"];
```

et d'accéder à chaque élément notre tableau à l'aide des indices de chaque élément :

```js
console.log(mesIngredients[0]); //affiche "huile d'olive" dans la console
```

Si cette _structure de donnée_ permet déjà de nombreuses opérations, et suffit pour bien des cas de figure, il existe une structure plus complexe permettant la manipulation de données possédant de nombreuses _propriétés_ de types différents.
Cette structure est appelée _objet_

### Qu'est ce qu'un objet ?

Un objet, en programmation générale et en javascript, est une donnée complexe permettant la manipulation de clés et valeurs groupées ensemble de façon à leur apporter une structure. Ces _objets_ sont également capables de contenir des fonctions (appelées _méthodes_ dans le cadre de la programmation objet) qui peuvent agir sur les propriétés de l'objet (et/ou sur des données externes).

La _Programmation Orientée Objet_ est un paradigme de programmation qui lui fait tourner la mise en place et l'architecture de notre code au travers de ces structures, et intègre des concepts complexes comme les _Classes_ (le schéma d'un objet), l'_Héritage_ (la composition d'objets dérivés), et autres.

Pour l'instant, on va se contenter de manipuler des objets "ex nihilo".

### A quoi ça ressemble ?

En javascript, un objet peut être aussi simple que ça :

```js
const monObjet = {
    propriete: valeur,
};
```

Ici, on a _déclaré un objet_, cet objet possédant une propriété nommée `propriete` dont la valeur est `valeur`.

### A quoi ça sert ?

Typiquement, les objets servent à représenter un élément _complexe_ en lui attribuant de multiples propriétés le caractérisant.
Imaginons qu'on veuille créer un objet _user_ qui contiendrait les informations d'un utilisateur de notre plateforme. On pourrait structurer l'information de la manière suivante :

```js
const newUser = {
    username: "BeersAndLaRedoute",
    email: "eric-the-beerman@gmail.com",
    city: "Brussels",
};
```

Une fois notre information structurée à l'aide de ces couples _clé-valeur_, on peut accéder aux valeurs de chaque propriété de la façon suivante : `objet.propriété` :

```js
console.log(newUser.username); //affiche "BeersAndLaRedoute"
console.log(newUser.email); //affiche "eric-the-beerman@gmail.com"
```

Cela nous permet donc, dans notre code, de stocker et manipuler des informations de façon plus claire et structurée qu'en utilisant des tableaux et indices de tableaux.

## Le DOM, **D**ocument **O**bject **M**odel

Le `DOM` est un ensemble de données représentant le document web et ses éléments. Il est assemblé par le navigateur au moment de l'interprétation du HTML.
Chaque élement étant complexe (possède plusieurs _propriétés_), un objet javascript est donc utilisé pour représenter chaque élément de notre page.

Un objet HTMLDocument définit par exemple l'entiereté de la page.
Cet objet contient la représentation en javascript de chacune des balises.

Pour représenter l'_arborescence_ de notre Document (_`DOM Tree`_), le navigateur stocke les enfants de chaque élément dans celui-ci, permettant d'accéder aux enfants de chaque élément au travers des propriétés de l'objet.

Pour accéder à ce Document on peut scruter la variable globale document, qui est initialisée lors de la création de la page et contient toutes les informations sur la page elle même.

```js
console.log(document); //document est une variable globale qui contient l'entiereté de notre page dans un objet de type HTMLDocument
```

### Stocker un élément du DOM dans une variable

Les éléments du `DOM` sont donc représentés par des objets qui nous permettent de les manipuler.
Pour ce-faire, il faut les récupérer et les stocker dans une variable.

La méthode `document.getElementById()` permet donc de récupérer un élément selon son attribut `id` en HTML.

Pour l'élément input suivant défini en HTML :

```html
<input type="text" id="monElement" />
```

On pourrait effectuer la récupération suivante :

```js
const monElement = document.getElementById("monElement");
```

### Manipuler les éléments du DOM

Une fois les éléments accessibles au travers de variables, on peut accéder aux propriétés de ceux-ci et changer certaines valeurs.

Par exemple, pour changer le contenu _textuel_ d'un élement, on peut changer la valeur de sa propriété `textContent` :

```js
const monElement.textContent = "Mon Nouveau Texte"; //le texte affiché dans l'élément ciblé sera désormais "Mon Nouveau Texte"
```

## Réagir à un évènement dans le DOM à l'aide d'un EventListener

Pour pouvoir réagir à un évènement particulier survenant lors de l'exécution d'un document web, on peut utiliser un _gestionnaire d'évènement_ ou `eventListener`.

Pour pouvoir attacher un `eventListener` à un élément de notre DOM, on doit donc utiliser `element.addEventListener`.

### Le type d'évènement

Lorsqu'on attache un `EventListener` à un élément, il faut préciser à quel type d'évènement on souhaite réagir (par exemple, réagir à un _clic de souris_ ou a un _appui de touche_).

Le premier _paramètre_ de `addEventListener` est donc le type de l'évènement sous forme de `string`.

On peut retrouver une [liste des évènements disponibles ici](https://developer.mozilla.org/fr/docs/Web/Events).

### La réaction

Une fois notre type d'évènement précisé, il faut ensuite expliciter quelles actions vont êtres entreprises à la suite du déclenchement de l'évènement. On le fait donc au travers d'une `fonction`.

En réutilisant notre element `monElement`, on pourrait donc faire la chose suivante pour réagir à un appui de touche :

```js
//keyup est le nom de l'évènement permettant de détecter un appui de touche
monElement.addEventListener("keyup", () => {
    //code s'executant en réagissant à l'évènement
});
```

Pour pouvoir utiliser la cible d'un évènement dans l'`eventListener` :

```js
monElement.addEventListener("keyup", (event) => {
    const cible = event.target; //event.target désigne toujours la cible de l'évènement capturé
});
```

### C'est quoi cette fonction ? Pourquoi pas utiliser le mot clé `function` ?

Cette façon d'écrire les fonctions est ce qu'on appelle une _fonction anonyme_ (_anonymous function_) ou _fonction flêchée_ (_arrow function_).
C'est un raccourci d'écriture permettant de déclarer l'utilisation d'une fonction sans préciser son nom. Elle est typiquement utilisée dans les cas où la fonction ne sera pas réutilisée, et est donc à usage "unique".

Dans le cas de nos `eventListener`s, il s'agit de déclarer une réaction à un évènement, et très souvent une réaction identique ne serait pas réutilisée. Nommer notre fonction n'a donc que peu d'intérêt.

Mais on peut également utiliser cette syntaxe "_moderne_" pour déclarer des fonctions _nommées_.

Une déclaration de fonction classique :

```js
function addition(a, b) {
    return a + b;
}
```

deviendrait donc

```js
const addition = (a, b) => {
    return a + b;
};
```
