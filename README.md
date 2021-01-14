# <center>hophopHopDev</center>

## <u>Front-Office</u> :
<!-- 
    - Mettre &check devant la tâche pour taches finies

    - Mettre _ devant la tâche pour tâche non faîtes
    
    - Mettre &cross; devant une tâche faîtes mais ne fonctionnant pas comme il faut
-->
<br>

### <u>Tâches</u> :

- [&cross;] Intégrer Bootstrap 4 aux template générale de Bootstrap 4

- [&cross;] Trouver un template Bootstrap 4 en adéquation avec le métier du client Finale (Hop hop hop livraison)

- [&cross;] Se familiariser rapidement avec Angular 11.0.8 principe de (router, Guard, Authenticator, Services, Components, Tests, ...)

- [&cross;] Utiliser HttpClient pour faire les requêtes aux url Back du webSite (cause rapidité des requête et sécurisation des requêtes)

- [&cross;] Utiliser Jquery pour plus de rapidité dans le DOM de la page web

- [&cross;] Demander au server si l'utilisateurs en question est autorisé a accéder a cette 
url pour le savoir il faudra regarder la partie access modifié par le server :
``` json
    {
        "url":"/planning",
        "roles":"ROLE_USER",
        "access":true
    },
    {
        "url":"/dev",
        "roles":"ROLE_USER",
        "access":false
    },
    {
        "url":"/admin",
        "roles":"ROLE_USER",
        "access":false
    },
    {
        "url":"/planning",
        "roles":"ROLE_ADMIN",
        "access":true
    },
    {
        "url":"/dev",
        "roles":"ROLE_ADMIN",
        "access":false
    },
    {
        "url":"/admin",
        "roles":"ROLE_ADMIN",
        "access":true
    },
    {
        "url":"/planning",
        "roles":"ROLE_DEV",
        "access":true
    },
    {
        "url":"/dev",
        "roles":"ROLE_DEV",
        "access":true
    }
    {
        "url":"/admin",
        "roles":"ROLE_DEV",
        "access":true
    }
```
- [&cross;] Demander au server les éléments à afficher

- [&cross;] S'occuper de l'UI du site web

## <u>Back-Office</u> :
<br>

### <u>Tâches Front-Office et API</u> :

- [&cross;] Créer une API utilisable que par le site web et l'application mobile et pas un autre site tiers

- [&cross;] Gérer les rôles utilisateurs Front via la sécurité intégrer dans Symfony version5.2.1

- [&cross;] Retourner aux Front les éléments demandé
<br>

### <u>Tâches Back-Office</u> :
- [&cross;] Intégrer Bootstrap 4 au fichier `Back/templates/base.admin.html.twig` du projet

- [&cross;] Créer deux routes :
    - [&cross;] '/dev' auquelle aura accès le 'ROLE_DEV' seulement Route consacré aux erreurs du site web
    - [&cross;] '/admin' auquelle aura accès le 'ROLE_DEV' et ROLE_ADMIN' consacré aux contenus du site web

- [&cross;] Quand ROLE_DEV fait une modif du site web avertir directement le ROLE_ADMIN avant upload du nouveau changement