Title: Fonctionnalités de Kanboard
Description: Liste détaillée des fonctionnalités
Language: fr_FR
---

Travaillez plus efficacement avec Kanboard
==========================================

Simple
------

Il n'y a pas d'interface utilisateur fantaisiste, Kanboard se concentre sur la simplicité et le minimalisme.
Le nombre de fonctionnalités est volontairement limité.

Aperçu clair de vos tâches
--------------------------

Le tableau Kanban est le meilleur moyen de connaître le statut actuel d'un projet parce que c'est visuel.

![Tableau Kanban](/screenshots/board.png)

C'est tellement simple à comprendre qu'il n'y a rien à expliquer.

Glissez-déposez vos tâches entre les colonnes facilement
--------------------------------------------------------

![Glisser-déposer les tâches](/screenshots/drag-and-drop.png)

Vous pouvez ajouter, renommer et supprimer des colonnes à n'importe quel moment pour adapter le tableau à votre projet.

Limitez le travail en cours pour être plus efficace
---------------------------------------------------

![Limitez le travail en cours](/screenshots/task-limit.png)

Éviter le multitâche pour rester conçentrer sur votre travail.
Lorsque vous êtes au-dessus de la limite, la colonne devient rouge.

Filtres de recherche
--------------------

Ne perdez plus votre temps, trouvez rapidement vos tâches avec le moteur de recherche.

![Filtres de recherche](/screenshots/search.png)

Kanboard possède un langage de requête vraiment simple qui offre une certaine flexibilité pour trouver des tâches.

Appliquez dynamiquement des filtres au tableau Kanban pour trouver ce dont vous avez besoin.
Recherchez par utilisateur, description, catégorie, date d'échéance, etc.


Passez du tableau au calendrier à la vue en liste
-------------------------------------------------

Passez d'une vue à l'autre facilement :

![Vue en liste](/screenshots/list-view.png)

En un seul clic ou via un raccourci clavier, changez la manière d'afficher vos tâches.

Tableau de bord unique pour tous vos projets
--------------------------------------------

![Tableau de bord](/screenshots/dashboard.png)

Obtenez toutes les informations importantes à un seul endroit, vos projets, votre agenda, vos tâches assignées et sous-tâches.

Travaillez en équipe ou seul
----------------------------

Kanboard est prévu pour fonctionner avec de petites équipes, mais vous pouvez quand même travailler tout seul grâce aux projets privés.

![Permissions des projets](/screenshots/project-permissions.png)

Pour chaque projet, vous pouvez ajouter des utilisateurs qui peuvent avoir différents rôles.

Tâches, sous-tâches, pièces jointes et commentaires
---------------------------------------------------

![Tâches](/screenshots/task.png)

- Décomposez une tâche en sous-tâches, estimez le temps de réalisation ou la complexité.
- Décrivez vos tâches en utilisant la [syntaxe Markdown](/fr/documentation/syntax-guide).
- Ajouter des commentaires, des documents, changez la couleur, la catégorie, l'assigné ou la date d'échéance.
- Déplacez ou dupliquez vos tâches entre les différents projets en un seul clic.

Actions automatisées
--------------------

![Actions automatisées](/screenshots/automatic-actions.png)

- Arrêtez de vous répéter ! [Automatisez votre travail](/documentation/automatic-actions).
- Ne faites plus les mêmes opérations manuellement
- Changez automatiquement l'assigné, les couleurs, les catégories et plus en fonction d'événements.

Swimlanes
---------

![Swimlanes](/screenshots/swimlanes.png)

Les [swimlanes](/documentation/swimlanes) sont des séparations horizontales dans le tableau Kanban.
Vous pouvez diviser votre tableau en plusieurs sections pour gérer des versions de logiciels ou n'importe quoi d'autre.

Diagramme de Gantt
------------------

Visualisez vos projets en fonction du temps et faites des prévisions réalistes.

![Gantt pour les projets](/screenshots/gantt-projects.png)

Planifier des projets est très simple, car vous pouvez voir clairement lorsqu'un projet commence et se termine.

Statistiques et rapports
------------------------

Analysez et améliorez votre travail en utilisant le diagramme de flux cumulé ainsi que les autres graphiques :

![Stats](/screenshots/analytics.png)

Intégrations
------------

Connectez Kanboard avec les services externes que vous utilisez déjà.

Par exemple, vous pouvez créer une tâche directement par courriel :

![Emails entrants](/screenshots/incoming-emails.png)

Vous pouvez choisir entre plusieurs fournisseurs SMTP pour recevoir des emails directement dans Kanboard.

Synchronisez vos bugs et commits depuis les plateformes de gestion de code.
Fermez vos tâches, ajouter des commentaires, assignez des catégories ou plus en utilisant les extensions pour Github, Gitlab et Bitbucket.

Recevez les notifications directement par email ou par chat avec Hipchat, Slack, Mattermost, RocketChet ou Jabber.

Abonnez-vous au calendrier ou aux flux RSS :

![iCalendar feed](/screenshots/ical.png)

Importez dans Microsoft Outlook ou dans Apple Calendar vos tâches avec une date d'échéance.

Mettez en place vos propres intégrations en utilisant l'[API](/documentation/api-json-rpc) ou les [webhooks](/documentation/webhooks) :

![Client Python](/screenshots/api-dev.png)

Suivis du temps
--------------

Traquez automatiquement le temps passé sur chaque sous-tâche et tâche.
Comparez le temps réellement passé avec le temps estimé.

Traduit en 26 langues différentes
---------------------------------

Merci aux différents contributeurs, Kanboard est traduit en indonésien, bosnien, brésilien, chinois, tchèque, danois, anglais, finlandais, français, allemand, grec, hongrois, italien, japonais, coréen, malaisien, norvégien, polonais, portugais, russe, serbe, espagnol, suédois, thaïlandais, turque.

Plusieurs types d'authentifications
-----------------------------------

- Connectez Kanboard à vos serveurs [LDAP/Active Directory](/documentation/ldap-authentication).
- Utilisez des fournisseurs externes tels que [Google](/plugin/google-auth), [Github](/plugin/github-auth) ou [Gitlab](/plugin/gitlab-auth).
- Déléguez l'authentification à un autre système grâce au [mode proxy](/documentation/reverse-proxy-authentication).

Hébergez l'application presque partout
--------------------------------------

Installez Kanboard sur votre hébergement mutualisé, une machine virtuelle, votre Raspberry Pi ou votre ordinateur en local.
Déployez Kanboard avec [Docker](/fr/documentation/docker) ou n'importe quelle plateforme de cloud.

Si vous ne souhaitez pas vous préoccuper des détails techniques, nous proposons [une offre d'hébergement](/fr/hebergement).

Installation vraiment simple
----------------------------

Il n'y a presque aucune dépendance.

[Copiez-collez le code source](/documentation/installation) et vous êtes prêt à utiliser le logiciel.
Les mises à jour sont faciles à faire, les changements de base de données sont appliqués automatiquement.

Plusieurs types de base de données
----------------------------------

Kanboard est compatible avec [Sqlite](/documentation/sqlite-database), [Mysql](/documentation/mysql-configuration), MariaDB et [Postgres](/documentation/postgresql-configuration).

Sécurité
--------

- Kanboard supporte l'authentification à deux facteurs qui est compatible avec n'importe quel logiciel qui supporte le standard <abbr title="Time-based One-time Password Algorithm">TOTP</abbr>.
- Les en-têtes HTTP pour renforcer la sécurité sont utilisés pour éviter les attaques [XSS](https://en.wikipedia.org/wiki/Cross-site_scripting).
- Les mots de passe stockés dans la base de données utilisent une méthode [de chiffrement forte](http://php.net/password_hash).
- Une [protection pour les attaques par brute-force](/fr/documentation/bruteforce-protection) est incluse.

Logiciel libre et open source
-----------------------------

Kanboard est distribué sous **la licence permissive MIT**.
Le logiciel est principalement développé par Frédéric Guillot, mais plus de 60 contributeurs ont participé à l'amélioration du projet.
