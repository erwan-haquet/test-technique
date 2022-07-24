# Pros-Consulte #

Pour faciliter la relecture, chaque [tâche du test](https://github.com/erwan-haquet/test-technique#tâches-techniques) aura sa propre PR avec une description technique de son contenu.

## Installation ##
 
```bash
$ git clone git@github.com:erwan-haquet/test-technique.git
$ composer install
$ yarn install
$ symfony console doctrine:database:create
$ symfony console doctrine:migration:migrate
$ symfony console doctrine:fixtures:load
$ yarn dev
$ symfony serve
```

## Tests ##

```bash
$ php bin/phpunit # Lance l'ensemble des tests
```


## Tâches techniques ##

- [x] Afficher la liste des psychologues en mettant les psychologues "En ligne" en premier.
  - [x] Implémentation de la liste : https://github.com/erwan-haquet/test-technique/pull/1
  - [x] Setup des tests : https://github.com/erwan-haquet/test-technique/pull/2
- [x] Créer une page "Détail" pour afficher les informations complètes du psychologue
  - [x] Implémentation de la page de détail : https://github.com/erwan-haquet/test-technique/pull/3
  - [x] Tests sur page de détail : https://github.com/erwan-haquet/test-technique/pull/4
- [ ] Créer le système d'authentification (avec formulaire)
  - [x] Implementation du formulaire de connexion : https://github.com/erwan-haquet/test-technique/pull/5
  - [ ] Tests sur la page de connexion : 
- [ ] Créer une interface d'administration, accessible par le role ROLE_ADMIN.
- [ ] Dans l'espace admin, afficher la liste des psychologues et créer un formulaire pour ajouter un psychologue
- [ ] Créer une entité Appel: date (datetime), specialist (ManyToOne)
- [ ] Sur la page d'accueil, au clique sur Appeler, créer une nouvelle ligne d'Appel en base de données
- [ ] Afficher la liste des appels (date, psycholgue) dans l'admin
- [ ] Créer une entité Mail (date, subject, content)
- [ ] Créer un Service qui créé une nouvelle ligne Mail en base de données quand un psychologue est ajouté via le formulaire d'administration (Utiliser les events Doctrine)

