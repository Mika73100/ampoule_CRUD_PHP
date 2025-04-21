# 💡 Ampoule - CRUD PHP

Ampoule est une application PHP simple permettant de **gérer une base de données d'ampoules** (ou objets similaires) via une interface CRUD complète : création, lecture, mise à jour, suppression, et génération de PDF.

## 🧩 Fonctionnalités

- Interface utilisateur en PHP natif
- CRUD complet (Créer, Lire, Mettre à jour, Supprimer)
- Interface d’administration
- Export en PDF des données
- Utilisation de MySQL pour la base de données

## 📂 Structure du projet

```
ampoule_CRUD_PHP/
├── index.php              # Page d'accueil
├── ajouter.php            # Ajouter une ampoule
├── modifier.php           # Modifier une ampoule
├── supprimer.php          # Supprimer une ampoule
├── affiche.php            # Liste des ampoules
├── genpdf.php             # Génération PDF
├── admin/                 # Interfaces d'administration
├── ampoule.sql            # Script de création de la base de données
```

## 🛠️ Installation

1. Cloner ce dépôt ou télécharger le ZIP
2. Placer le dossier dans votre serveur local (`htdocs` ou équivalent)
3. Importer le fichier `ampoule.sql` dans votre base de données MySQL
4. Configurer votre connexion à la base de données (via PDO ou mysqli)
5. Lancer dans votre navigateur : `http://localhost/ampoule_CRUD_PHP`

## 🧪 Prérequis

- Serveur local Apache (ex: XAMPP, WAMP)
- PHP 8.0 ou supérieur
- MySQL ou MariaDB
- Navigateur web moderne

## 📄 Génération de PDF

Le projet contient une fonction de génération de documents PDF via les scripts `genpdf.php` et `pdf-content.php`.

## 🙌 Remerciements

Merci d’avoir jeté un œil à ce projet !  

<div align="center">
⭐ N’hésite pas à forker, améliorer ou t’en inspirer ! ⭐  
Bon code à toi 🚀

⭐ Un petit like sur le repo fait toujours plaisir ! ⭐  
</div>
