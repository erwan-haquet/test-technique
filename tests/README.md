# Tests #

Documentation pour la mise en place de test.

## SETUP ##

Au premier lancement, il faudra créer la base de test via :

``` bash
$ symfony console doctrine:database:create --env=test
$ symfony console doctrine:migration:migrate --env=test
$ symfony console doctrine:fixtures:load --env=test
```

