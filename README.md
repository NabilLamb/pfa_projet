﻿# pfa_projet
## projet (PFA)

E-commerce Web Application
(NabilShop)

Ce référentiel contient une application web e-commerce développée en utilisant les technologies suivantes : PHP, HTML, CSS, JS et Bootstrap. L'application permet aux utilisateurs de parcourir et d'acheter des produits en ligne.

## Fonctionnalités

- Affichage des produits disponibles avec des détails tels que le nom, la description, le prix, etc.
- Fonctionnalité de recherche pour trouver rapidement des produits spécifiques.
- Ajout de produits au panier d'achat.
- Gestion du panier d'achat avec possibilité de modifier les quantités et de supprimer des produits.
- Paiement en ligne.
- Confirmation de commande avec récapitulatif des produits achetés.
- Interface d'administration pour la gestion des produits, des commandes et des utilisateurs (réservée aux administrateurs).
- Possibilité de contacter le client et l'administrateur par e-mail.
- Vérification des e-mails lors de la création du compte utilisateur.
- Possibilité de favoriser un produit en utilisant un bouton au format de cœur.
- Possibilité pour les utilisateurs de donner leur opinion dans le processus d'achat.
- Tableau de bord pour visualiser les informations essentielles.
- Fonctionnalité d'ajout de produits ou de catégories, soit individuellement soit à partir d'un fichier Excel.
- Réponse aux clients par e-mail.
- Visualisation des détails de commande/message et des informations du client.

## Installation

1. Clonez ce référentiel sur votre machine locale en utilisant la commande suivante :
   ```
   git clone https://github.com/NabilLamb/pfa_ecommerce/
   ```

2. Assurez-vous que vous avez un environnement de développement PHP (par exemple, XAMPP) installé sur votre machine.

3. Importez la base de données fournie dans le fichier `database.sql` dans votre serveur de base de données MySQL.

4. Ouvrez le fichier `database.php` situé dans le répertoire `includes` et configurez les informations de connexion à votre base de données.

5. Démarrez votre serveur local et accédez à l'application via votre navigateur en utilisant l'URL suivante :
   ```
   http://localhost/nom-du-projet
   ```

## Configuration

Dans le fichier `database.php`, vous pouvez modifier les paramètres suivants :

- `$servername` : l'hôte de votre serveur de base de données.
- `$username` : le nom d'utilisateur de votre base de données.
- `$password` : le mot de passe de votre base de données.
- `$dbname` : le nom de votre base de données.

## Contributions

Les contributions visant à améliorer cette application sont les bienvenues ! Si vous souhaitez apporter des modifications, veuillez suivre ces étapes :

1. Fork ce référentiel.
2. Créez une branche pour vos modifications :
   ```
   git checkout -b ameliorations
   ```
3. Effectuez vos modifications et effectuez un commit.
4. Poussez vos modifications vers votre fork :
   ```
   git push origin ameliorations
   ```
5. Ouvrez une demande d'extraction (pull request) pour soumettre vos modifications.

## Auteurs

- Votre Nom - [NabilLamb](https://github.com/NabilLamb/)
