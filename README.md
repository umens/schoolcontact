schoolcontact
=============

Projet School Contact / CRW / 2012-2013

Pour installer le projet, allez à la racine du projet et lancer la commande :
```php
php composer.phar install
```
=============

Si vous avez des erreurs, essayez ces deux commandes a la suite après avoir supprimer le dossier `vendor`

```php
php composer.phar install --no-scripts
php vendor/sensio/distribution-bundle/Sensio/Bundle/DistributionBundle/Resources/bin/build_bootstrap.php
```
