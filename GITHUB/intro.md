# Introduction à la ligne de commande et le logiciel Git

## 1. Le Terminal de commande

Sur notre système d'exploitation, il existe plusieurs interfaces au travers desquelles nous pouvons intéragir avec nos applications et fichiers. La plus connue est l'interface dite _graphique_, qui permet au travers de clics et autres interactions "directes", d'utiliser nos outils.

Une autre interface possible est une interface _textuelle_, au travers d'un _émulateur de terminal_ ou _invite de commandes_.

Le _terminal_ est un logiciel en attente d'une commande textuelle décrivant une action. Par exemple :

La commande

```
mkdir factures
```

permet de créer un nouveau dossier nommé `factures`.

La commande s'exécute généralement dans le _dossier courant_, ce dossier est indiqué au niveau du _prompt_, c'est à dire en début de ligne de notre terminal.

![exemple d'un prompt](prompt.png)

Ici le _prompt_ nous indique qu'on se trouve dans le dossier `tpdwwm-1021-montpellier`.

### Utiliser le terminal

L'utilisation du terminal se fait donc au travers de texte uniquement. Décrivons ici certaines commandes et leur utilisation :

-   création d'un dossier avec `mkdir` :

    ```
    mkdir nomDuDossier
    ```

-   navigation dans les dossiers avec `cd` :

    ```
    cd nomDuDossier
    ```

-   suppression d'un dossier/fichier avec `rm` :
    ```
    rm nomDuFichier
    ```

### Naviguer dans les dossiers avec `cd`

Pour naviguer dans l'arborescence de fichiers, `cd` est l'outil principal à utiliser.

Cependant, il possède des limitations.

#### La navigation se fait sur _"un axe"_ uniquement.

On ne peut qu'avancer ou reculer de dossier en dossier. `cd` ne peut cibler qu'un dossier visible dans le dossier courant.

Pour pouvoir reculer, il faut utiliser une nomenclature spécifique aux dossiers permettant de préciser un dossier _relatif_ au dossier courant :

```
cd .
```

on ne bouge pas, `.` indique le dossier courant

```
cd ..
```

permet de remonter d'un dossier en arrière, `..` signifie toujours le dossier parent

```
cd ../dossier
```

permet de se rendre dans le dossier nommé `dossier` se trouvant dans le dossier parent

```
cd ../..
```

permet de remonter de deux dossiers en arrière.

Il existe d'autres commandes natives aux systèmes d'exploitations, et de nombreuses autres commandes étant fournies par des logiciels à installer.
Parmi ces logiciels accessibles en ligne de commande, on retrouve par exemple `Git`.

## 2. Git

Git est un logiciel de _gestion de version_ de code inventé par Linus Torvalds et permettant de sauvegarder, versionner, récupérer du code et collaborer sur des projets de manière facilitée.

Il répond cependant à un fonctionnement spécifique qui doit s'effectuer au travers de commandes et nombreux paramètres.

### Principe de base

Le principe de base de git se résume très facilement.

On indique à git des fichiers à suivre, si ces fichiers changent, on spécifie à git quels changements garder et git les enregistre.

### Utilisation

```
git init
```

permet d'initialiser un nouveau projet suivi par git (créer un _dépôt_)

```
git config --global user.name "myUsername"
git config --global user.email "myemail@mail.com"
```

ces commandes permettent de paramétrer git avec ses informations pour pouvoir signer chaque changement (et également se connecter à des plateformes d'hebergement de projets).

Une fois un fichier changé ou créé ou supprimé, on utilise

```
git add monFichier
```

pour indiquer à git qu'un changement doit être enregistré.

```
git commit -m "j'ai changé tel fichier"
```

Un `commit` est l'action de valider des changements dans le projet, et est accompagné d'un commentaire spécifié à l'aide de `-m`.

### Hébergement sur des plateformes

Pour pouvoir stocker son projet sur un serveur distant (sauvegarde, collaboration), il faut d'abord s'inscrire sur une plateforme dédiée (github, gitlab... etc).

Une fois cette inscription faite, on peut y créer un _dépôt distant_ (à voir sur chaque site).

Il faut ensuite lier le _dépôt local_ sur notre machine à notre _dépôt distant_ sur la plateforme d'hébergement.

Cela se fait à l'aide de la commande

```
git add remote origin https://plateforme.com/pseudo/nomDuProjet.git
```

pour un projet `monProjet` sur la plateforme `gitHub` créé par `PatocheBalk`, la commande sera :

```
git add remote origin https://github.com/PatocheBalk/monProjet.git
```

une fois l'origine distante ajoutée, on peut ensuite envoyer nos informations de `commits` grâce à la commande `push` :

```
git push -u origin master
```

Cela permet d'indiquer à la ressource distante que l'on souhaite placer l'origine de notre projet sur la branche `master`

Tout `push` fait ensuite pourra se contenter d'être appelé avec

```
git push
```

### Des branches ? Master? Késako ?

Git permet la gestion de notre projet à l'aide de branches.

A la création d'un projet, tout notre projet se trouve sur la branche principale communément appelée master.

Le projet s'articule donc à la manière d'un arbre. La branche principale (qu'on pourrait appeler le tronc) peut se séparer en plusieurs branches pour y effectuer des changements.
Une fois les changements effectués considérés satisfaisants, on peut ensuite rappeler ces changements et les appliquer à la branche principale.

Cela nous permet de pouvoir _bidouiller_ sans crainte, et si une erreur survient de juste supprimer la branche sans impacter _master_.

Pour créer une branche, on utilise

```
git branch nomDeLaBranche
```

Par exemple, si je souhaite créer une branche _experimentale_ sur laquelle faire des tests un peu fous, je peux faire

```
git branch experimental
```

En utilisant

```
git branch
```

seul je recevrai la liste de mes branches :

```
experimental
* master
```

L'astérisque indiquant que je me trouve actuellement sur master.

Pour me placer sur experimental je peux utiliser `switch` :

```
git switch experimental
```

Ici je peux effectuer des changements comme sur master. (`git add`, `git commit`)

Si je souhaite envoyer ma branche sur mon dépôt distant, je peux le faire à l'aide de `push`

```
git push -u origin experimental
```

Cela permettra de créer une branche experimentale sur le dépôt distant sur laquelle se calera notre branche locale.

Une fois que je suis ravi de mes tests, je peux les ramener sur la branche principale.
Je me place d'abord sur master :

```
git switch master
```

puis je fusionne les changements

```
git merge experimental
```

une fois cela fait je peux envoyer les changements

```
git push
```

et supprimer la branche experimentale

```
git branch -d experimental
```

Pour appliquer la suppression au dépôt distant je peux faire :

```
git push  origin :experimental
```
