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
-S serveur ip local
: port -t dossier ou se trouve son fichier principal php
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

    php bin/console doctrine:migrations:migratecomposer u