# Symfony

### installer un projet symfony

composer create-project symfony/skeleton:"^5.4" nomDeVotreProjet


### Ajouter deux bundles symfony

composer req maker --dev
composer req profiler --dev

***--dev*** precise à composer lors d'un déploiment en production que ces bundles ne seront pas installé

### Création d'un controlleur symfony
php bin/console make:controller


### executer un projet
php -S 127.0.0.1:8000 -t public

(
-S serveur
ip local
: port
-t dossier ou se trouve son fichier principal php
)

### Quand on partage un projet symfony sur git, le dossier ***var*** et ***vendor*** n'existe plus
Il va falloir obligatoirement taper ça:

composer i
ça permet de reinstaller toutes les dépendances du projet

pour faire une mise à jour des dépendances on pourra taper

composer u

### Ajouter le bundle formulaire dans son projet

composer req form

## Base de donnée

### Ajouter le bundle doctrine
composer req doctrine

### Cloner le fichier .env en .env.local
Ça sert à sécuriser les données sensibles telles que le login/password de sa base de donnée ou le app_secret de symfony

### Créer ma base de donnée via symfony
php bin/console doctrine:database:create

### Créer une entitée
php bin/console make:entity

### Créer un CRUD (Create Read Update Delete) après avoir créer son entitée
php bin/console make:crud

### Ajouter dans notre base de donnée toutes les modifications précédentes
Crée un fichier php avec les requetes sql

php bin/console make:migration

Lance les requetes sql

php bin/console doctrine:migrations:migrate

Autre possibilité de mettre à jour sa base de donnée

php bin/console doctrine:schema:update --dump-sql

--dump-sql permet de voir toutes les requetes qu'il va faire
une fois qu'on a vérifié alors on peut executer les requetes

php bin/console doctrine:schema:update --force

### Création d'utilisateur

Création d'un utilisateur en utilisant les paramètres par défaut

php bin/console make:user

Authentification

php bin/console make:auth

Création du formulaire d'enregistrement

php bin/console make:registration-form

Modifier le premier role dans la base donnée, dans la table user

["ROLE_ADMIN"]

requete SQL pour le modifier directement

UPDATE user SET roles = ["ROLE_ADMIN"] WHERE id=1;

Pour permettre de vérifier un type d'utilisateur dans twig, il faudra installer extra-bundle

composer require twig/extra-bundle

en twig

{% if is_granted('ROLE_ADMIN') %} blabla {% endif %}

# API RestFul

Il faut installer

composer require symfony/http-client

ça va nous permettre d'avoir accès à des api restful distante comme google maps ou de météo ou récupération des informations sur github ou autre

voir ce site pour plus d'information

https://symfony.com/doc/current/http_client.html