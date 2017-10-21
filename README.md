# Projet 360° Dev

TODO : Explication du projet ici

# Installation

Récupérer le projet :

```bash
$ git clone https://github.com/Oipnet/360-dev.git && cd 360-dev
```
Installer les dépendances : 

```bash
$ composer install -o
```

Paramétrer le fichier .env (à adapter  suivant votre environement) :

```dotenv
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=360dev
DB_USERNAME=root
DB_PASSWORD=
...

```

Démarrer le serveur local

```bash
$ php artisan serve
```

Vous pouvez accéder à l'application à l'adresse suivant : http://localhost:8000/
