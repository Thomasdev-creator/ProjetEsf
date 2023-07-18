# ProjetEsf
Premier projet symfony

Ceci est le fichier README pour mon projet créé dans Visual Studio Code (VSCode). Ce projet a été développé dans le but de mon évaluation en cour de formation.
L'objectif étant de créer une application web vitrine pour un garge en mettant en avant la qualité des services délivrés.
Les utilisateurs peuvent visualiser les véhicules d'occasions, les services ainsi que les commentaire, les avis et les horaires d'ouvertures. Ils peuvent également contacter l'administrateur via un formulaire de contact.
L'administrateur peut ajouter des services, des véhicules, créer des comptes...
L'employé dispose également de son espace pour modéer les commentaires, modifier ou ajouter des véhicules.

## Installation

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- [MySQL](https://www.mysql.com/) : Assurez-vous d'avoir une instance de MySQL en cours d'exécution sur votre machine.

1. Cloner ce dépôt sur votre machine locale.

git clone https://github.com/Thomasdev-creator/ProjetEsf.git

2. Ouvrir le projet dans VSCode.

cd votre-projet

3. Installer les extensions recommandées :
- Extension 1 : Twig language 2
- Extension 2 : Symfony for VSCode
- Extension 3 : Symfony code snippets

4. Configurer les paramètres de connexion à la base de données dans le fichier `.env`.

# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8.0.32&charset=utf8mb4"
Ainsi que le mailer dsn : 
# MAILER_DSN=null://null

5. Installer les dépendances en exécutant la commande suivante dans le terminal de VSCode :

npm install

6. Créer la base de données dans MySQL en utilisant la commande suivante :

mysql -u <utilisateur> -p <nom_de_la_base_de_donnees> < chemin_vers_le_fichier.sql

7. Configurer les paramètres du projet dans le fichier `settings.json`.

Configuartion de twig : "files.associations": {
        "*.twig": "html"
    },

8. Lancer l'application en utilisant la commande symfony serve.

## Créer un administrateur pour le back-office de l'application web : 

- Rendez-vous dans php my admin puis dans user, puis séléctionnez user, puis définissez l'utilisateur comme admin grâce à [ROLE_ADMIN]

## Fonctionnalités

- Fonctionnalité : Autentification
- Fonctionnalité : Inscription
- Fonctionnalité : Recherche
- Fonctionnalité : Gestion et visualisation des véhicules, des services, des horaires, des avis et commentaires.
- Fonctionnalité : Commentaires et avis 
- Fonctionnalité : Formulaire de contact
- Fonctionnalité : Pagination
- Fonctionnalité : Gestion des droits d'accès et interface admin, employé et visiteur
- Fonctionnalité : Tableau de bord

## Structure du projet

Config : Contient les routes et les packages
Migrations : Toutes les migrations éfféctuées
Public : contient le CSS et index.php
SRC : Contient tout les controlers, les entités, les repositorys...
Templates : Contient toute la vue avec les fichiers twig
Tests : Tests unitairs et fonctionnels. 
.env : Tout les paramètres de l'application notamment la base de donnée, le mailer, la clé ssh.
. env test
Readme.md : Informations concernant l'application.


## Contribution

Nous sommes ouverts aux contributions ! Si vous souhaitez contribuer à ce projet, veuillez suivre les étapes suivantes :

1. Forker ce dépôt.

2. Créer une branche pour votre fonctionnalité ou correction de bug.


3. Effectuer les modifications nécessaires.

4. Soumettre une demande de pull en expliquant clairement les modifications apportées.

## Auteurs

- Votre Nom <thomas.exemple@exemple.com>

## Licence

Ce projet est sous licence [MIT](https://opensource.org/licenses/MIT).





