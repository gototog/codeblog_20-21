```bash
git clone https://github.com/gototog/codeblog_20-21
```
Liens
==========
  * Slides https://slides.com/gotorahoutan/epsi-symfony  
  * Repository https://github.com/gototog/codeblog_20-21/  
  * Doc Symfony https://symfony.com/doc/current/index.html  
  * Doc Twig https://twig.symfony.com/doc/2.x/#reference  
  * Doc doctrine https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/reference/query-builder.html  

Installation
==========

**A. Phpstorm - IDE**

Installer [PhpStorm](https://www.jetbrains.com/phpstorm/download/)  
1. Choississez votre theme via   `Settings` > `Appearance & Behaviot` > `Appearance` Theme Darcula (noir) ou IntelliJ (blanc)
1. Installer le plugin Symfony
Aller dans `Settings` > `plugins` > `Browse Repository` > installer le `Symfony Plugin`
Pensez à l'activer pour le projet  `Settings` > `Languages and frammwork` > `PHP` > `Symfony` 
  - Cochez la case enable
  - remplacez les chemins commenceant par `app/` par `var/`
  - `web` devient `public`

**B. Installer les librairies externes**

On installe le projet via composer

    php bin/console composer:install
    
**C.Lancer le serveur**

    php bin/console server:start
    

GIT
=========
Installer git via leur site web. laisser la conf par défaut. Si vous avez des Terminaux ouverts, fermez les.

Serveur local avec Vagrant.
==========
Récupérer le fichier homestead.box sur la clé USB.  
Dans la ligne de commande windows, faire:  
`vagrant box add laravel/homestead file:///c:/users/TON_USERNAME/path/to/homestead.box`
Si on vous demande un provider, choisissez virtualbox


Depuis le dossier homestead, faire vagrant up

**Error**
Si `Check your Homestead.yaml file, the path to your private key does not exist.`
ssh-keygen -t rsa -C "you@homestead"


Installation du host 
Ouvrir notepad en tant qu'administrateur ouvrir le fichier
C:\Windows\System32\drivers\etc\hosts 
et rajouter 192.168.10.10  codeblog.localhost

Allez dans le dossier homestead, faire vagrant ssh
Puis allez dans le dossier `cd codeblog_20-21` et faites `composer install`
