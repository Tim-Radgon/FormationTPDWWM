installer un projet symfony
composer create-project symfony/skeleton:"^5.4" nomDeVotreProjet

executer un projet
php -S 127.0.0.1:8000 -t public
(
-S serveur
ip local
: port
-t dossier ou se trouve son fichier principal php
)


Création d'un controlleur symfony
php bin/console make:controller


Quand on partage un projet symfony sur git, le dossier var et vendor n'existe plus
Il va falloir obligatoirement taper ça:
composer i
ça permet de reinstaller toutes les dépendances du projet