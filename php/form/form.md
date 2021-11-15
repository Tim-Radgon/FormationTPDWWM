# Les formulaires et leur traitement

Un formulaire HTML n'est qu'une collection de champs dans lesquels on peut remplir certaines valeurs.
Cependant, leur rôle prend tout leur sens lorsqu'ils sont couplés avec un langage capable de traiter ces valeurs.
Pour ce faire, on définit un formulaire `<form>` auquel on donne un attribut `action` ciblant le script PHP s'occupant du traitement.

**Attention** : Pour que le traitement se fasse, il faut que le formulaire (et le script php) soient lancés depuis le _serveur_ et non le _navigateur_.
Pour cela, il faut accéder au fichier `form.html` à partir de son adresse sur le serveur (commençant par `http://localhost/...`)


## Création du Formulaire
Dans un fichier `html` :
```html
<!--
    Un formulaire HTML se définit à l'aide de la balise <form>
    On y définit le type de requête (GET, POST...) ainsi que sa destination (l'url de traitement du formulaire)
    Si aucune destination n'est définie, c'est la page du formulaire qui doit s'en charger
-->
<!-- 
method est la méthode HTTP utilisée, GET pour récuperer, POST pour envoyer
action est la "destination" pour traitement
-->
<form method="POST" action="result.php">
    <!-- 
        Pour récupérer des données entrées du côté client, il faut définir les différents champs de notre formulaire à l'aide de <input> et consorts
    -->
    <label for="nickname">Pseudo</label>
    <!-- 
    dans un label, l'attribut for est lié à l'id du champ input correspondant (côté client)
    l'attribut name sert à identifier la valeur lors du traitement du formulaire (côté serveur)
    -->
    <input id="nickname" name="nickname" type="text" />

    <!-- pour définir une liste déroulante, on peut utiliser <select> -->
    <select name="fruit" id="fruit">
        <!-- permet de définir une liste de choix parmis lesquels seul un pourra être utilisé 
            chaque choix est défini dans une balise <option> -->
        <option value="fraise">Fraise</option>
        <!-- value est la valeur qu'on recevra lors du traitement du formulaire-->
        <option value="banane">Banane</option>
        <option value="pomme">Pomme</option>
        <option value="poire">Poire</option>
    </select>

    <!-- pour définir une checkbox on utilse type="checkbox" sur un champ input-->
    <label for="agree">Acceptez vous les conditions d'utilisation ? </label>
    <input type="checkbox" name="agree" id="agree" />

    <!-- pour envoyer le formulaire il faut un bouton d'envoi qui est également un input-->
    <!-- lorsqu'on appuie sur le bouton submit, la page se redirige vers l'url définie dans "action" de notre formulaire -->
    <!-- et les valeurs du formulaires sont envoyées avec -->
    <input type="submit" value="Envoyer" />
</form>
```

### Rappel HTTP :

Les méthodes HTTP sont un moyen d'indiquer l'intention d'une requête.

`GET` signifie qu'on veut récupérer une ressource.
`POST` signifie qu'on veut envoyer une ressource.

Dans le cadre des formulaires, `POST` est donc plus souvent la méthode qui sera utilisée dans l'attribut `method` de notre `<form>`.


## Traitement du formulaire
Le traitement se fait donc dans un fichier php ici appelé `result.php` :

```php
<?php
//ici on traite les données reçues via notre formulaire form.html

//pour traiter les valeurs reçues du formulaire en méthode POST, il faut pouvoir les récupérer
//Dans un traitement de formulaire POST, les valeurs sont stockées dans une variable nommée $_POST
//$_POST contient un tableau associatif (clé/Valeurs), les clés étant les "name" de nos champs input
//les valeurs étant les "value" de notre formulaire

//pour vérifier si des données ont bien été envoyées, il faut donc vérifier si $_POST est rempli
//var_dump($_POST); //var_dump permet d'inspecter une variable

//pour vérifier l'existence de données, on peut utiliser la fonction isset() qui permet de renvoyer true si une donnée existe

if (isset($_POST['nickname'])) { //si nickname existe dans $_POST
    echo $_POST['nickname']; //c'est qu'on peut accéder à sa valeur
}

if (isset($_POST['fruit'])) { //si fruit existe dans $_POST
    echo "<br/>Votre fruit préféré est : {$_POST['fruit']}"; //les accolades autour d'une variable dans une chaine permettent d'émuler une concaténation
}

//pour vérifier si une checkbox a été cochée, on vérifie son existence, si elle est présente dans $_POST c'est qu'elle a été cochée
if (isset($_POST['agree'])){
    echo "<br/>Les conditions ont été acceptées";
} else {
    echo "<br/>Veuillez accepter les conditions";
}
```

## Récupération et traitement des valeurs :

Les `values` de notre formulaire sont donc toujours stockées dans la variable appropriée lors du traitement. Si elles ne sont pas présente, c'est soit que le champ n'a pas été renseigné par l'utilisateur, soit qu'il est manquant.
Le traitement des valeurs doit se faire **après** qu'on ait vérifié leur présence, sinon la tentative d'accès se résultera en un bug.

La variable _superglobale_ `$_POST` se remplit en utilisant les attributs des formulaires et leurs valeurs. On peut schématiser cette correspondance de la façon suivante :

![formulaire](forms.png)