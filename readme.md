# Portfolio de Morgan ZARKA

## Pour installer le portfolio en local:

Installer le site en local :

- Installez XAMPP avec au minimum les modules Apache et MySQL.

- Ouvrez votre XAMPP et activer les serveurs Apache et MySQL.

- Ouvrir le dossier `htdocs`. (Dans XAMPP qui se trouve à la racine de votre disque).

- Déposer dans celui ci le dossier `portfolio-morgan-zarka` qui contient le code du site ainsi que le fichier de Base de Données.


## Pour installer la Base de Données en Local :

- Dans la barre d'URL de votre navigateur, tapez : [localhost/phpMyAdmin](localhost/phpMyAdmin).

- Allez dans l'onglet `Importer`.

- Sélectionnez le fichier `portfolio.sql` qui se trouve dans le dossier `portfolio-morgan-zarka`.

- Cliquez sur `Importer`, en bas de la page.

- Ouvrez le fichier `database.php` avec un éditeur de texte quelquonque.

- Modifiez les lignes 2 et 3 avec le nom d'utilisateur et le mot de passe de votre compte phpMyAdmin.

### Attention : 

Si dans votre base de donnée vous avez une base de donnée s'appelant déjà `fq0hs_portfolio`, il est possible qu'une erreur ai lieu lors de l'importation. 

Dans ce cas, il vous suffit : 

- Ouvrir le fichier `portfolio.sql` 

- Faire "ctrl+f" 

- Remplacer la chaîne de caractère `fq0hs_portfolio` par le nom que vous souhaitez donner à la base de donnée.

- Ouvrir le fichier `database.php` qui se trouve dans le dossier `script` du dossier du site.

- Remplacer la valeur de la variable `$database` (ligne 4) par le nom que vous avez donné à la base de donnée.


## Aller sur le site :

- Allez à l'adresse [localhost/portfolio-morgan-zarka](localhost/portfolio-morgan-zarka) dans votre navigateur pour arriver sur le site.

- La page d'accueil du site s'ouvrira.


### À noter :

Il sera possible d'envoyer un message via le formulaire de contact, mais lors de la validation de l'envoie, une erreur s'affichera, car l'envoie de mails n'est pas possible en local.
