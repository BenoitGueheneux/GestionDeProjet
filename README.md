# Gestionnaire de Projet - README.md

Ce projet consiste à créer une application de gestion de projet. L'objectif principal est de permettre aux utilisateurs de créer, gérer et suivre des projets, ainsi que les tâches qui leur sont associées. Chaque projet comprend des tâches avec un ordre de priorité, un titre et une description. Chaque tâche est attribuée à un utilisateur et suit un cycle de vie comprenant les états suivants : "Non débuté", "en cours", "terminé". De plus, il existe un utilisateur administrateur pour chaque projet, capable de créer et gérer les utilisateurs associés à ce projet.

## Configuration de la Base de Données

Pour commencer, nous allons créer une base de données nommée "gestion_de_projet" et importer le fichier SQL correspondant "gestion_de_projet.sql" pour mettre en place la structure de la base de données.

## Pour Commencer

Pour lancer le projet, suivez ces étapes :

1. Téléchargez le projet sur votre système.

2. Configurez un serveur web local (tel qu'Apache) pour servir le projet.

3. Assurez-vous que PHP et PDO sont activés sur votre serveur.

4. Créez une base de données nommée "gestion_de_projet" OU modifiez le fichier "src/Configuration/Config.php" pour l'adapter à votre base de données personnalisée.

5. Importez la structure de la base de données en utilisant le fichier SQL fourni "gestion_de_projet.sql".

6. Créez un utilisateur administrateur avec le mot de passe approprié dans la base de données OU modifiez les informations de connexion dans "src/Configuration/Config.php" pour correspondre à votre utilisateur personnalisé.

7. Exécutez la commande `php -S localhost:3000` dans un terminal.

8. Accédez à l'URL http://localhost:3000.

9. Profitez de la gestion efficace de vos projets et de vos tâches !
