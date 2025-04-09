Première Appli PHP – Formulaire de Commande

Ce dépôt contient ma première application PHP réalisée dans le cadre de ma formation.
L'application permet de passer une commande via un formulaire, de traiter et stocker les données saisies, puis d'afficher un récapitulatif sous forme de tableau. 
Elle intègre également des fonctionnalités pour ajouter, enlever un article, tout supprimer ou supprimer individuellement un article, ainsi que des messages d'erreur et de réussite et l'affichage du nombre d'articles commandés.


Fonctionnalités


Formulaire de commande :

-Saisie des informations nécessaires pour passer commande (articles, prix, quantité, boutons d'envois).7

-Mise en place d'une validation des données saisies avec affichage de messages d'erreur si nécessaire.


Traitement des données :

-Récupération et traitement des informations soumises.

-Envoi des données vers un fichier de récapitulatif.


Récapitulatif des commandes :

-Affichage d'un tableau listant les articles commandés et les informations associées.

-Affichage dynamique du nombre total d'articles en commande.


Gestion des commandes :

-Ajouter : Possibilité d'ajouter de nouveaux articles.

-Modifier : Modifier la quantité d'un article.

-Supprimer individuellement : Retirer un article spécifique de la commande.

-Supprimer tout : Réinitialiser l'ensemble de la commande.

-Messages de succès pour confirmer les actions réalisées et messages d'erreur en cas de problème.


Mise en place CSS :

-Utilisation de CSS pour styliser le formulaire et le tableau récapitulatif afin d'améliorer l'ergonomie et l'esthétique de l'application.


Structure du Projet

-index.php : Page principale contenant le formulaire de commande.

-traitement.php : Script de traitement des données envoyées par le formulaire.
-recap.php : Fichier de récapitulatif affichant un tableau des commandes.
-styles.css : Feuille de style pour la mise en page et le design de l'application.

Remarques
Ce projet a été réalisé dans un cadre pédagogique pour approfondir mes compétences en PHP et en gestion d'interactions web.
Des améliorations pourront être apportées, notamment en termes de sécurité (validation côté serveur, protection contre les injections) et de gestion de l'interface utilisateur.
