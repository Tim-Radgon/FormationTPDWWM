# Calcul de Facture d'électricité

A partir de la grille tarifaire EDF en vigueur, calculer, en sélectionnant la puissance en Kilo Voltampère, et le nombre
de kWh consommés, le total du prix à payer.

Les puissances et prix kWh correspondant sont :

- 3 kVA : 0.1558 €
- 6 kVA : 0.1558 €
- 9 kVA : 0.1605 €
- 12 kVA : 0.1605 €
- 15 kVA : 0.1605 €
- 18 kVA : 0.1605 €

Deuxième partie: implémentation heures creuses et pleines

En fonction des puissances, un tarif heures pleines et heures creuses s'applique, la tarification est la suivante :

- 3 kVA : pas d'HP/HC
- 6 kVA : HP: 0.1821 € HC: 0.1360 €
- 9 kVA : HP: 0.1821 € HC: 0.1360 €
- 12 kVA : HP: 0.1821 € HC: 0.1360 €
- 15 kVA :    HP: 0.1821 HC: € 0.1360 €
- 18 kVA :    HP: 0.1821 HC: € 0.1360 €
