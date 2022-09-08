Un gardien de copropriété s\'occupe de changer régulièrement les ampoules des communs de son immeuble de 11 étages.
Réaliser un Dashboard responsive dans lequel le gardien peut ajouter, modifier ou supprimer chaque changement d\'ampoule.

L\'application de base comportera :

une page qui liste l\'historique des changements d\'ampoules.
une page qui comportera le formulaire permettant d\'ajouter/modifier un changement d\'ampoule.
La suppression d\'un changement d\'ampoule se fera depuis la page qui liste l\'historique des changements d\'ampoules. Une boîte d\'alerte doit s\'afficher prévenant si la personne veut continuer ou annuler l\'action. Une fois la suppression terminée, afficher une alerte de type toasts qui indique que le changement d\'ampoule a bien été supprimé.



Le formulaire d\'ajout / modification doit comporter les champs suivants :

- La date du changement
- L\'étage ( rez-de-chaussée, étage1, étage2, étage3.....étage11)
- La position ( côté gauche, côté droit, fond)
- Le prix de l\'ampoule

Tous les champs du formulaire sont obligatoires et seront testés en HTML et PHP



Les +
Si le temps vous le permet vous pouvez ajouter un ou tous les points ci-dessous :

Une pagination de l\'historique
Une protection d\'accès aux pages par un formulaire de login et un lien de déconnexion


Rappel des étapes
Réaliser un wireframe de vos pages
Installer votre serveur Web
Créer votre base de données
Réaliser la page qui permet d\'ajouter un changement d\'ampoule
Réaliser la page qui liste l\'historique des changements d\'ampoule
Adapter le formulaire d\'ajout pour qu\'il puisse aussi modifier un changement d\'ampoule
Gérer la suppression d\'un changement d\'ampoule
Réaliser le responsive


Durant toutes les étapes

Essayez par vous-même
Vous êtes en difficulté ? Demandez à un apprenant de votre groupe de vous expliquer les bases
Tu as compris ? Prends le temps d\'aider un autre apprenant
Tu as finis ? Ajoute des fonctionnalités
Tout le long du projet versionne ton projet


Ressources :
Le wireframing
Le zoning et wireframe
Créer une base de données avec phpMyAdmin
Les variables en php
les tableaux en php
Les conditions en php
Les boucles en php
Les variables POST en php
Les variables GET en php
Connexion base de données en php
Sélectionner en sql
Mettre à jour en sql
Supprimer en sql
Valider le formulaire côté front
Valider le formulaire côté back
Toast en js
Modal en js


Notes pour le formateur

Pour l\'activité découverte PHP fichier csv dans la rubrique \'Fichiers Joints\'

Activités le matin
http://doc.onlineformapro.com/link/143#bkmrk-javascript-définitio

Javascript définition et utilité dans la web
Javascript les variables
Javascript Les tests
Javascripts les tableaux
Javascript Les boucles
Javascript les sélecteurs
Javascript Les événements
Javascript API Element classList
Javascript Ajouter un élément dans le DOM
Javascript Supprimer un élément dans le DOM
Javascript Copier et déplacer un élément dans le DOM
Javascript modifier les attributs d\'un élément
Javascript modifier les propriété d\'un élément



//////////////////////////////////////////////////////////////////////////////////////

Jour1:  J'ai réaliser des notes au stylo des consignes de l'exercice ainsi qu un rapide croquis aux stylo de couleurs afin de bien comprendre les différent compartiment du code a crée.
J'ai ensuite procédé a la création d'un wireframe avant de commencer mon code.
J'ai rencontrer des difficultés pour ajouter un utilisateur et même problématique pour ajouter un élément de ma table exo ( en l occurance : une ampoule a l étage )
Une fois avoir réussie a l'ajouter a ma base de donnée ma problématique était de l'afficher.

Jour2:Graçe a un tuttoriel j'ai réussi a afficher tous les éléments de mon tableau sous forme de liste.Afin de donner un aspect plus lisible j'ai utiliser une mise en page de type bootstrapp pour donner un effet tableau a mes données.C'est a l'interieur de ce tableau ou j'ai profiter de joindre un bouton supprimer accompagner d'un message de type toast afin de prévenir l'utilisateur de la suppression. J'ai par la suite crée mon fichier supprimer qui pourra une fois cliquer sur le boutton supprimer, effacera l'id de l'insertion.

jour3:Probème rencontrer : je ne donne pas de nom technique a mes pages web du coup aujourd'hui j'ai eu cette problématique que je corrige courant du jours 4.
J'ai réussie a crée une page détaille qui a pour mission de récupérer tous les éléments de mon formulaire et de les affichers.J'ai rajouter une variable de type long text pour crée un message technique destiné a informer les différents utilisateurs.

jour4:Probème rencontrer : les beugs de la veilles ont été corriger. Aujourd'hui le CRUD fonctionne et le toast s'affiche lors de la suppression d'un utilisateur.J'ai aussi crée un toast pour le modifier, j'ai aussi ajouter la fonctionnalité de ne pas ajouter une intervention a un etage 12 alors que l'immeuble n'a que 11 etages.
J'ai aussi réussi a crée une validation a modifier et j'ai terminer le crud.
J'ai encoder le mots de pass des utilisateurs.
J'ai rajouter l'heure a coté de la date et son historique, ici j'ai appris qu'il est possible d afficher l'heure dans un varchar si dans le php j'ai bien retranscrit a la main les bonnes requets.

jour5:Aujourd'hui j'ai mit en forme ma page principale, celle-ci affiche mon immeuble avec 11etages. Les étages par position et accompagner d'un gif ampoule.
j'ai aussi crée une boucles pour cela.
a ce stade je peut dire que la mise en forme est fini.

jour6:j'ai réussi a crée un boutton pour mettre dans la boucle de ma page principale accompagné d'une image d'ampoule, le boutton est clicable et ce dirige en direction du dashbord ou une intervention est possible par le boutton modifier.
c'est par la suite qu'une boucle génératrice d'erreur avec un % transformera mes ampoules en rouge pour que clickable elle soit modifiable et donc l'intervention soit faite.

jour7:Aujourd'hui j'ai réussi la connexion utilisateurs et la page inscription.
j'ai crée une table pour les messages d'intervention.
j'ai aussi fait un peut de mise en forme comme pour les boutons.

