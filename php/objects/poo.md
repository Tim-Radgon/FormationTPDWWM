## 1 - La Programmation Orientée Objet en PHP

Le PHP étant un langage _orienté objet_ il est possible d'y définir des classes et d'y instancier des objets.

### Définition d'une classe :

Pour définir une classe on utilise le mot clé `class` :

```php
class Personnage {
    //implémentation de notre classe
}
```

Pour lui attribuer des propriétés, il faut les définir dans le corps de la classe :

```php
class Personnage {
    private $hp;
}
```

### Visibilité d'une propriété :

Une propriété en PHP possède un degré de visibilité :

- `public` signifie que la propriété ou méthode est accessible à partir de l'objet (en dehors de la classe)

* `private` signifie que la propriété ou méthode est accessible seulement à l'intérieur de la classe

* `protected` (que l'on a pas vu) signifie que la propriété est privée, mais accessible aux classes héritantes (qui
  héritent de la classe)

Si une propriété ou méthode est définie comme `private`, par convention on l'écrit avec un `_`. Ex: `$hp`, `$name`.

### Constructeur :

Pour instancier un objet à partir d'une classe il faut que cette classe possède un `constructeur`. En php, celui ci est
une fonction :

```php
class Personnage {
    private $name;
    private $hp;

    public function __construct($name, $hp){
        $this->name = $name;
        $this->hp = $hp;
    }
}
```

Pour pouvoir définir une valeur pour nos propriétés dans le corps de la classe, on doit utilser `$this`. Cette variable
contient toujours l'objet qui exécutera le code.

**Attention** : l'accès à une propriété ou méthode d'un objet en PHP se fait à l'aide d'une _flèche_ "`->`" et non
d'un _point_ "`.`".

### Accesseurs (getters) et mutateurs (setters) :

Si l'on désire offrir la possibilité de lire et modifier une propriété définie comme `private`, et/ou imposer des
conditions sur ces lectures/modifications, on peut définir des méthodes appelées `getter` et `setter` qui s'en
chargeront.

Etant donné que ce sont des méthodes, on peut y définir un comportement spécifique comme par exemple empêcher une valeur
de sortir d'un certain intervalle :

```php
class Personnage {
    private $name;
    private $hp;

    public function __construct($name, $hp){
        $this->name = $name;
        $this->hp = $hp;
    }

    //les getters permettent de lire la valeur
    public getHp(){
        return $this->hp;
    }

    public getName(){
        return $this->name;
    }

    //les setters de la modifier
    public setHp($hp){
        //ici on peut définir un comportement particulier filtrant les valeurs autorisées
        if ($hp < 0){
            $this->hp = 0; //ramène une valeur négative à 0
        } else {
            $this->hp = $hp;
        }
    }
}
```

Si l'on décide de ne définir qu'une seule de ces méthodes cela permet essentiellement de limiter les actions autorisées.
Une propriété qui aurait un `getter` mais _pas_ de `setter` en deviendrait _de facto_ une propriété en _lecture seule_ (
possibilité de lire, mais pas modifier).

Dans cet exemple, la propriété `name` est en _lecture seule_.

En définissant ces méthodes on prodigue a notre classe la possibilité de limiter/amender les modifications et les
lectures de nos propriétés, offrant un contrôle sur nos données.

On peut également redéfinir le `constructeur` pour utiliser nos `setters` :

```php
//...
    public function __construct($name, $hp){
        $this->name = $name;
        $this->setHp($hp); //ici les hp seront limités a être positifs même dans le constructeur en passant par notre méthode setHp()
    }
//...

```

Si on décidait ainsi d'instancier un `Personnage` avec des points de vie négatifs :

```php
$jacques = new Personnage('jacques', -15);
```

Notre `Personnage` aurait un compte de `hp` à `0` au lieu de `-15` :

```php
$jacques->getHp(); //renvoie 0
```

### L'héritage :

Pour déterminer une classe héritant d'une autre, on utilise le mot clé `extends` :

```php
class Barbare extends Personnage {
    //on peut rajouter de nouvelles propriétés par rapport à Personnage
    private $rage = 100;
    private $resistance;
}
```

Cette classe nécessite également un constructeur, cependant celui-ci doit pouvoir appeler le constructeur `parent` à
l'aide de `parent::__construct` :

```php
class Barbare extends Personnage {
    //on peut rajouter de nouvelles propriétés par rapport à Personnage
    private $rage = 100;
    private $resistance;

    public function __construct($name, $hp, $resistance){
        parent::__construct($name, $hp);
        //après le constructeur parent résolu, on peut s'occuper des propriétés de l'enfant
        $this->resistance = $resistance;
    }
}
```

En effectuant cet héritage, `Barbare` hérite donc de toutes les propriétés et méthodes de `Personnage`, mais possède des
propriétés qui sont étrangères à `Personnage` (comme `rage` et `resistance` ici).

### Les constantes de classe :

Parfois, il survient le besoin de définir une `constante` dont la valeur sera retrouvée parmi tous les membres (objets
instanciés) de cette classe.

Petit mot sur les constantes:

- En PHP, le mot clé `const` définit une _constante_.

  Une `constante` en php est une _véritable constante_ dans le sens où elle est définie avant l'instanciation d'un
  objet, et donc avant l'exécution du script. Elle n'a pas pour vocation de varier pour chaque instance de chaque objet.

- Alors qu'en javascript, le mot clé `const` définit une _variable immuable_.

  Il s'agit seulement d'une _variable_ qui ne peut pas être modifiée après son initialisation. Chaque objet instancié
  peut donc définir sa propre valeur, ce qui est impossible en php avec `const`.

L'utilisation d'une constante paraît simple mais elle possède plusieurs implications qui sont liées au fonctionnement
des objets.

```php
class Personnage {

    //on définit une constante permettant d'indiquer le minimum de hp possible tous les personnages
    const MIN_HP = 0;

    private $name;
    private $hp;


    public function __construct($name, $hp){
        $this->name = $name;
        $this->setHp($hp);
    }

    public getHp(){
        return $this->hp;
    }

    public getName(){
        return $this->name;
    }

    public setHp($hp){
        //ici pour utiliser notre constante, on doit utiliser le mot clé self:: ou static:: au lieu de $this->
        if ($hp < static::MIN_HP){
            $this->hp = static::MIN_HP;
        } else {
            $this->hp = $hp;
        }
    }
}
```

La particularité des constantes de classe c'est qu'elles sont accessibles de façon _statique_, c'est à dire sans avoir
besoin d'instancier un objet :

```php
//on peut par exemple faire
echo Personnage::MIN_HP; //qui afficherait 0
```

Une `const` est donc **membre de la classe** et non de l'objet.

### Qu'est ce que sont `$this`, `self` et `static` ?

Ces concepts parfois confondus définissent des choses très différentes et sont autant d'outils pour identifier la valeur
à laquelle on souhaite accéder.

Chaque élément se définit comme suit :

- `$this` définit l'objet instancié à partir de la classe, il est donc variable d'un point de vue de la classe, étant
  donné que chaque objet est une instance différente de la classe. Du _point de vue du code_, `$this` pourrait donc être
  autant `objet1` que `objet10000`.

- `self` définit la classe elle même, et pointe toujours vers la classe qui utilise ce mot clé. La classe qui
  utilise `self` sera toujours celle référencée, **même en cas d'`héritage`**.

  `self` fait donc toujours référence à la classe à l'_origine du code_. Celle qui **définit l'appel**.

- `static` définit également la classe, mais pointe vers celle qui **effectue l'appel** au lieu de pointer vers celle
  qui **définit l'appel**.

  Cela signifie que `static` dans une classe _parente_ ciblera la classe _héritée_ lorsque celle-ci utilise la méthode
  du _parent_ contenant `static`.

### Démonstration de l'utilisation :

Si `Parent` définit le comportement suivant :

```php

class Parent {
    const MA_CONSTANTE = "PARENT";

    getMaConstante() {
        return self::MA_CONSTANTE;
    }
}

```

Et qu'une classe héritée veut `surcharger` cette constante :

```php

class Enfant {
    const MA_CONSTANTE = "ENFANT";
}
```

Si une instance de `Enfant` utilisait `getMaConstante()` :

```php
$enfant = new Enfant();
$enfant->getMaConstante(); //cela renverrait "PARENT"
```

Etant donné que `self` a été utilisé pour définir la valeur à récupérer, et que c'est `Parent` qui l'a définie, `Enfant`
obtiendra la valeur de `Parent`.

Si `Parent` utilisait `static` à la place :

```php

class Parent {
    const MA_CONSTANTE = "PARENT";

    getMaConstante() {
        return static::MA_CONSTANTE;
    }
}

```

Pour `Enfant` la valeur utilsée serait celle de celui qui **exécute l'appel**, donc `Enfant`.

```php
$enfant = new Enfant();
$enfant->getMaConstante(); //cela renverrait "ENFANT"
```

### Application dans notre classe Personnage :

On peut donc décider d'avoir une valeur constante pour `Personnage`, et une autre pour une classe héritée,
comme `Barbare` par exemple.

On donne à nos `Personnage` une propriété `str` et une constante `MIN_STR`. Cette constante `MIN_STR` sera différente
dans notre classe `Barbare`, car on veut que les barbares soit par nature plus forts que les autres.

On peut donc déclarer et surcharger cette constante :

```php

class Personnage {
    //...
    private $str;
    const MIN_STR = 1;
    //...
    public setStr($str){
        //en utilisant static, Barbare pourra utiliser sa propre valeur de MIN_STR
        if ($str < static::MIN_STR){
            $this->str = static::MIN_STR;
        } else {
            $this->str = $str;
        }
    }
}

class Barbare extends Personnage {
    //...
    const MIN_STR = 3;
    //...
}
```

En ce faisant, et en utilisant `static::MIN_STR` dans le code de `Personnage`, c'est bien la valeur de `MIN_STR`
de `Barbare` qui s'appliquera si on utilise `setStr()` :

```php
$jacques = new Personnage('Jacques');
$jacques->setStr('-1');
$jacques->getStr(); //renvoie 1

$krom = new Barbare('Krom');
$krom->setStr('-1');
$krom->getStr(); //renvoie 3
```

### Quel est l'intérêt de ces contraintes ? Pourquoi ne pas tout mettre en en propriété publique ?

Ces _contraintes_ sont des gardes fou. Ils sont là pour nous aider à structurer notre code et à clarifier nos intentions
quant aux composants de notre application.

En indiquant clairement ce qui est constant et ce qui ne l'est pas, ce qui est public et ce qui est privé, on limite les
erreurs et on améliore la compréhension de notre code à l'utilisation.

On permet également à nos collaborateurs de mieux comprendre notre code et à pouvoir l'utiliser plus efficacement, et
réduire en ce faisant les bugs et améliorer les temps de réalisation.

Ces contraintes sont également des représentations d'une certaine philosophie de chaque langage et application, et
permettent ainsi d'en faire des outils performants et adaptés à la tâche qui leur incombe.

La rigueur du langage est autant de rigueur que l'on doit s'imposer, et cette rigueur améliore la qualité de notre
travail.

## Inclure des morceaux de code dans d'autres

PHP permet la séparation des scripts en plusieurs pages, ce faisant améliorant la lisibilité de notre travail et son
organisation.

On peut le réaliser à l'aide des fonctions `include`, `require` et `require_once` :

```php
include('script.php'); //essaye d'inclure le script dans le script courant, ne fait pas de sbrouf s'il ne le trouve pas
require('script2.php'); //tente d'inclure un script dans le script courant, plante la page s'il ne le trouve pas
require_once('script3.php'); //tente d'inclure le script si jamais il n'a pas déjà été inclu auparavant. Plante la page s'il n'est pas trouvé.
```
