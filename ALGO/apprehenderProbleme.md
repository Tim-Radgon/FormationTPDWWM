# Implémenter un Algorithme en Programmant

Dans le développement d'applications, une grande partie du métier concerne la _programmation_. La _programmation_, sa définition stricte en tout cas, est une activité visant à dicter, par le biais d'un ensemble de symboles (un _langage de programmation_), une suite d'opérations dans le contexte d'une application. L'objectif final étant bien sûr la résolution d'un problème, ou, plus large encore, la gestion d'un besoin (interface entre systèmes, optimisation de tâche, automatisation de processus de travail, etc).

Mais quelles instructions donner à une machine pour construire une application ?

## Problèmes et Algorithmes

L'approche principale que l'on peut adopter pour résoudre un problème, quel qu'il soit, est de décrire la résolution de celui-ci au travers d'un _algorithme_. Cette _suite d'instructions_ écrite, elle doit permettre en les suivant pas à pas, de résoudre le problème et obtenir le résultat attendu à tous les coups.

### Le Problème

Pour résoudre un problème à l'aide d'un algorithme, il faut un problème.

Introduisons donc un problème que nous devrons résoudre à l'aide d'un algorithme :

```
Jacques possède une boutique qui propose à la vente de nombreux produits de catégories différentes. 
Chaque catégorie possède un numéro permettant à Jacques d'administrer plus facilement sa boutique
Ces catégories sont : 

- Téléphonie - catégorie 1
- TV & Son - catégorie 2
- Informatique - catégorie 3
- Photo - catégorie 4
 
Chaque produit doit donc pouvoir être classé par catégorie, mais actuellement tous les produits sont classés de manière chronologique. Exemple de produits :


╔═══════════════════════════════╗ ╔═══════════════════════════════╗ 
║   name : Olympus OM-D MKIII   ║ ║   name : iPhone XS            ║
╠═══════════════════════════════╣ ╠═══════════════════════════════╣
║   category : 4                ║ ║   category : 1                ║
╠═══════════════════════════════╣ ╠═══════════════════════════════╣
║   price : 399                 ║ ║   price : 360                 ║
╠═══════════════════════════════╣ ╠═══════════════════════════════╣
║   add_date : 2021-10-03       ║ ║   add_date : 2021-09-15       ║
╠═══════════════════════════════╣ ╠═══════════════════════════════╣
║   description : "..."         ║ ║   description : "..."         ║
╚═══════════════════════════════╝ ╚═══════════════════════════════╝ 



Comment, à partir d'un nom de catégorie, peut on regrouper les mêmes produits d'une même catégorie et n'afficher que ces produits à l'écran ? 
```

Bien évidemment, pour le bien du cours le problème est _fantoche_ et ne se résoudrait pas exactement comme nous allons le résoudre. Il s'agit juste d'un exercice pour mettre en place un algorithme qui se base sur quelque chose de plus concret que des maths ou des inversions de chaînes de caractères !

### Approche du Problème

Pour approcher la résolution du problème, il faut d'abord tenter de découper celui-ci en un minimum de _sous-tâches_ à effectuer. Nous allons procéder d'abord de façon très générale, puis tenter de préciser chacun des processus qu'il nous paraît naturel d'implémenter.

Mettons en place un premier schéma pour décider de notre marche à suivre :

![Premier algorithme](algo1.png)

Jusqu'ici rien de bien compliqué.
Notre approche est _intuitive_ et fonctionne sans soucis pour des êtres humains. Autrement dit, si on avait un employé et qu'on lui demandait de faire ça à la main, il n'aurait pas de soucis à le mettre en place.

### Traduire pour la machine

Lorsqu'il s'agit de programmation, nous ne sommes pas face à des humains. Nos instructions ne peuvent se faire qu'au travers d'un ensemble de symboles et de concepts très réduit. Ces langages de programmations que nous utilisons ne peuvent pas indiquer à une machine "juste tries moi tout ça stp", après tout ce sont des machines. Il nous faut donc utiliser les structures du langage à disposition pour effectuer ces tâches.

#### Quelles structures ?

Très bien. Listons ce que nous avons à disposition pour résoudre notre problème actuel :

##### 1. Les variables

Une variable est un registre permettant l'enregistrement et l'accès à une donnée à l'aide de son nom. L'utilité dans un programme est de pouvoir se référer à cette valeur, dont la valeur _**varie**_ - que ce soit lors de l'exécution du programme ou à _chaque nouvelle exécution_.

Prenons l'exemple de notre algorithme. Si jamais j'écrivais non pas
`Choisir une Catégorie` puis `Déterminer les produits appartenant à cette Catégorie` mais que j'utilisais plutôt la terminologie `Choisir la catégorie Photo` puis `Déterminer les produits appartenant à la catégorie Photo`, notre algorithme ne serait plus "Trier les produits selon une catégorie" mais "Trier les produits Photo", et cela perdrait de son intérêt. Le mot français "Catégorie" est un des _paramètres_ de notre algorithme. Et pour pouvoir le réutiliser, notre programme le stockera dans une variable.

Notre intérêt est dans la possibilité d'aborder le problème de façon _générique_, et donc d'utiliser des mots et des concepts pour remplacer des valeurs qui seraient elles _absolues_.

La variable permet cette abstraction de valeurs de façon absolument triviale, et nous permet donc de produire des comportements génériques qui pourront être répétés à l'identique pour différents _paramètres_.

Dans notre code source, il est aussi très utile d'utiliser les variables pour stocker des valeurs réutilisables qui n'ont pas prévu de _réellement varier_. On appelle ces valeurs des constantes, et elles sont particulièrement appréciables pour améliorer la _lisibilité_ de notre code. C'est le même principe que celui utilisé pour certaines constantes en science, comme le nombre d'Euler qui est abrévié en `e` pour les mathématiciens. En voyant `e`, on sait que la valeur est en réalité `2,71828`, cela permet de savoir que ce n'est pas un nombre arbitraire que l'on utilise, mais bien cette constante, et cela permet d'obtenir un meilleur contexte et une meilleure lisibilité.

###### Qu'est-ce qu'on peut stocker dans des variables ?
Des chaînes de caractères, des nombres, des _booléens_, des données structurées (comme des tableaux), des références à des objets, et même des fonctions/programmes entiers.

Lorsque les données sont simples (nombres, booléens, strings) on appelle ça des valeurs _scalaires_.

##### 2. Les Conditions

Pour pouvoir exécuter un comportement selon la valeur d'un paramètre, on utilise des conditions.

Les conditions peuvent être vues comme des embranchements sur un chemin. On en utilise dans la vie de tous les jours de la même façon qu'un ordinateur : `"S'il fait beau, je vais en formation en vélo, sinon j'y vais en voiture"`. Ici notre proposition est découpée en deux possibilités. S'il fait `beau` ou pas. Les actions en découlant sont mutuellement exclusives, c'est-à-dire que l'une s'exécute que si l'autre ne s'exécute pas.

En schématisant notre algorithme sur `"Comment vais-je me rendre en formation ?"` on obtient :

![Algorithme "aller en formation"](algo2.png)

Ces conditions sont généralement appelées `Conditions Si` ou `If Conditions` en anglais et suivent le schéma `Si, Sinon`.

##### 3. Les Boucles

Il est parfois nécessaire de répéter un certain traitement plusieurs fois. Pour ce faire, on peut définir une _boucle_, qui permet d'introduire une notion de traitement systématique dans notre programme.

Dans le problème de nos produits et leurs catégories, il sera sûrement nécessaire de faire une _boucle_ sur nos produits pour pouvoir les inspecter _un à un_.

Imaginons cependant temporairement un problème plus simple. Nous devons observer les tomates dans un jardin pour déterminer lesquelles sont mûres et lesquelles ne le sont pas encore. Pour ça, on se fie à la couleur. Si elles sont rouges, on les sélectionne, sinon on les laisse pousser.

L'observation de la couleur de la tomate se fait de façon répétée, et se répète pour chaque tomate dans le jardin.

###### Définition d'une boucle :
Pour mettre en place une boucle qui fonctionne, il faut pouvoir déterminer _trois_ paramètres.

1. notre postulat de départ

Il faut pouvoir déterminer où commencer notre boucle pour pouvoir préciser _combien de fois_ note instruction va se répéter. Pour commencer à compter quelque chose, on part en général de `0`. Ici, on part de `0` tomates comptées.

2. la raison de s'arrêter

Si on ne veut pas que l'opération se répète _ad vitam æternam_, il vaut mieux préciser à notre programme quand il doit s'arrêter. Dans le cas de notre compte, il faut s'arrêter lorsqu'on a compté toutes nos tomates. Donc lorsque notre compte de tomates atteint le nombre de tomates dans le jardin. Appelons ce nombre de tomates `n`.
A chaque nouveau _tour de boucle_, on réévalue la raison de s'arrêter (_"a-t-on compté toutes les tomates ?"_) avant d'entamer un autre _tour_.

3. quoi changer à chaque tour de boucle

En tant qu'êtres humains, on va compter les tomates dans notre tête ou avec nos doigts ; mais un programme lui a besoin d'un endroit ou _stocker_ la valeur de compte. Une variable par exemple.
Cette variable, pour qu'elle puisse représenter efficacement notre avancée, devrait s'_incrémenter_ (augmenter de 1) à chaque fois qu'on inspecte une nouvelle tomate.
On va donc lui ajouter `1` à chaque fois qu'on termine notre opération de vérification de maturité.

On peut voir ces trois paramètres comme :
1. d'où on part, 2. où l'on va, 3. comment y allons nous

Schématisons cette histoire de tomates :

![boucle récolte de tomates](algo3.png)

On voit que la complexité augmente grandement. Chaque opération de récolte est soumise à deux conditions désormais :
- a-t-on observé toutes les tomates ? _si oui_, on arrête, _sinon_, on observe la tomate suivante.
- la tomate qui est observée est-elle mûre ? _si oui_ on la récolte, _sinon_ on l'ignore.

La première condition soumet le programme à un _boucle_ qui ne s'arrêtera que quand l'objectif défini au départ sera atteint !
Très utile donc.


##### 4. Les tableaux

Nos données peuvent être simples ou elles peuvent être complexes. La plus _primitive_ (mais néanmoins indispensable) de ces structures est le _tableau_.

Le tableau permet le rangement de données d'un _même type_ de façon séquentielle et permet ainsi le stockage de _multiples données_ dans une seule variable ! Ainsi au lieu d'avoir une variable qui contient un nombre ou une phrase, on peut avoir une variable qui contient de multiples nombres, ou de multiples phrases.

Pour pouvoir stocker ces informations et permettre de s'y retrouver, chaque donnée est rangée dans une _case_ de tableau, qui elle est numérotée en partant de `0`. Si on souhaitait schématiser le stockage des ingrédients d'une recette, on pourrait donc faire :

![tableau ingredients](algo4.png)

Pour accéder au premier ingrédient, il faudrait donc préciser qu'on souhaite accéder à la valeur stockée à la case `0` du tableau stocké dans `ingredients`. On note ça généralement `ingredients[0]`, les `[]` symbolisant une case de tableau.

Si on voulait donc récupérer l'information `guanciale`, il faudrait aller chercher `ingredients[3]`.


### Appliquons enfin ces structures à notre problème de départ

Essayons de schématiser notre problème de façon plus précise.

![Algorithme de tri des produits](algo5.png)

Hola ! Grosse différence avec notre ancien schéma. Essayons de découper ce qu'on fait, pas à pas, et pourquoi on le fait de cette façon.

####1. La sélection de la catégorie

Notre algorithme commence par choisir la catégorie sur laquelle on souhaite effectuer notre tri. Ce choix n'est en fait pas réellement notre, il vient de l'_extérieur_ (un utilisateur, une interface), mais le résultat est le même : une catégorie qu'on ne connaît pas à l'avance va être sélectionnée. Le reste de notre algorithme dépend forcément de cette première donnée, ainsi elle est stockée et sera réutilisée plus tard (par le biais d'une _variable_).

####2. La boucle sur nos produits

Il faut ensuite décortiquer ce qu'est réellement l'action de _trier des produits selon leur catégorie_. D'un de vue très pragmatique, notre action en tant qu'humain serait d'examiner _chaque produit_ et déterminer leur catégorie, puis par exemple les mettre dans le rayon adéquat. Imaginez que vous ayez un panier rempli d'objets, et que vous fassiez le rangement de ces objets, vous inspecteriez chaque objet un par un pour tenter de déterminer si oui ou non vous devriez le ranger à cet endroit-ci (ou pas).

Le principe ici est le même. On ne s'arrêtera que lorsque l'on sera à court de produits (pour être sûrs de ne pas en louper un seul), et chaque nouveau produit amène une nouvelle examination (est ce que le produit est de la catégorie sélectionnée ?).

#####2.a L'action de la boucle

A chaque nouveau produit, on examine donc `Le produit appartient-il a la catégorie ?`  et si c'est le cas, on le renvoie/l'affiche/le sélectionne. En tout cas on fait _quelque chose_.

#####2.b Le tour de boucle
Il ne nous reste plus qu'à, à la suite de notre action, passer au produit suivant pour continuer.
Si aucun produit n'est disponible, on arrête ici, notre travail est fini !

### Traduction en Langage de Programmation

Tout ça est bien beau, mais le code dans tout ça ?

Eh bien toutes ces structures, ces conditions variables et tableaux, sont bien évidemment disponibles au travers de symboles (ou combinaison de symboles plutôt) qui composent nos langages de programmation !

Il ne nous reste plus qu'à trouver quel symbole va à quel endroit. Plus facile à dire qu'à faire cependant !
