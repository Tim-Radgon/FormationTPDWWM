# Application de lancer de Dés

Pour les jeux de plateau (et jeux de rôles papier), il existe de nombreuses variantes de dés disponibles. La
caractéristique variant le plus souvent est le _nombre de faces_ du dé.

Pour efficacement indiquer quel dé on utilise, il est coutumier de raccourcir en `dN`, `N` étant le nombre de faces du
dé.

Un dé classique serait donc appelé `d6` alors qu'un dé à `10` faces serait appelé `d10`.

Lorsqu'une action de jeu nécessite plusieurs lancers à la fois, on indique le nombre de lancers devant le nom du dé.

`3d10` indique donc de lancer `3` dés à `10` faces. Le résultat obtenu serait donc compris entre 3 et 30.

On peut également ajouter des dés pour obtenir un résultat plus complexe, de la façon suivante :

`3d10 + 2d3 + d2` ce qui voudrait dire `3` lancers de dés à `10` faces et `2` lancers de dés à `3` faces et `1` dé à `2`
faces (un lancer de pièce).

A ce total qui pourrait être compris entre 6 et 38, on peut également choisir de rajouter une valeur fixe de la façon
suivante :

`3d10 + 2d3 + d2 + 4` ce qui voudrait dire `3` lancers de dés à `10` faces et `2` lancers de dés à `3` faces et `1` dé
à `2` faces (un lancer de pièce), auquel on rajoute 4.

Ce qui contient le total entre 10 et 42.

## Exercice

Implémenter un formulaire permettant d'entrer (de la façon que vous préférez) une _formule de dés_, et qui renverra le
résultat aléatoire obtenu à partir du lancer des dés correspondants. 
