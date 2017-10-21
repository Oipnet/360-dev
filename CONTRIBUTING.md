# Conventions de commits

TAG #issues_number description in english

Remplacer TAG par :

* ADD adding new feature
* FIX fixes a bug
* IMP improve something that worked but not in all situations
* To complete...

# Conventions de codage :

Le projet respecte les conventions de codage du PSR-2 : (http://www.php-fig.org/psr/psr-2/).
Vous pouvez formater votre code à l'aide de PHP Code Sniffer, avant de commiter, lancer les commandes suivantes :

```bash
$ ./vendor/bin/phpcs && ./vendor/bin/phpcbf 
```

Il va formater votre code afin de respecter les normes du PSR-2.

*Notre si vous utilisez PHPStorm : https://confluence.jetbrains.com/display/PhpStorm/PHP+Code+Sniffer+in+PhpStorm*
