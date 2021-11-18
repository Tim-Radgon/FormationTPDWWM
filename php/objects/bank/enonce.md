# Gestion d'un compte en banque en Programmation Orientée Objet

Mettre en place au travers d'une classe la gestion programmatique d'un compte en banque.

Ce compte doit pouvoir gérer :

- un nom de titulaire
- le solde du compte
- la devise dans laquelle traiter le solde `USD($) ou EUR(€)`

On doit pouvoir créditer le compte d'un montant arbitraire, et également débiter le compte d'un montant arbitraire. Ce
compte n'a pas de découvert autorisé, on doit donc empêcher le retrait si celui-ci fait tomber la balance en dessous
de `0`.

On doit enfin pouvoir afficher le solde avec la devise choisie en indiquant "Bonjour [nom du titulaire], votre solde est
de [solde][devise]".