# ![logo](https://cdn.discordapp.com/emojis/784416461958938634.png?size=32) Jabami

Jabami est une application web qui a pour but de centraliser les informations et proposer un système de suivi efficace.

<br>

Accéder à Jabami sur Internet [ici](https://jabami.alwaysdata.net/). 

<br>

|Equipe 6| Rôle |
|-|-|
|__BOINET Lucas__|  Membre| 
|__BOLLE Gwendal__|  Membre| 
|__GHANOUCHI Brahim__|  Chef de projet| 
|__GUILLET Quentin__|  Membre|   
|__HOUNY Julien__|  Membre|   
|__ROBSON Thomas__|  Membre|  

<br><br>

## Base de données
* [AlwaysData](https://phppgadmin.alwaysdata.com/) (interface graphique -> utilisé l'identifiant et le mot de passe ci dessous)
* host : postgresql-jabami.alwaysdata.net
* dbname : jabami_app
* Identifiant : `jabami`
* Mot de passe : `jabami_dev6`

<br>

## Utilisation en local

Si vous voulez lancer l'application en local sur votre machine, suivez les étapes suivantes :

__1.__ Téléchargez [Wamp](https://www.wampserver.com/en/) (serveur local). <br>
__2.__ Installez Wamp et lancez le si ce n'est pas déjà fait. <br>
__3.__ Activez les extentions de PHP suivante en cliquant sur l'icone de wamp dans votre barre des tâches à droite puis allez dans 'PHP' puis 'extensions PHP' : <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__*__ `pdo_pgsql`<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__*__ `pgsql`<br>
__4.__ Changez ensuite la version de PHP pour la version `7.4.9` dans 'PHP' puis 'Versions'.<br>
__5.__ Ensuite mettre tous les fichiers de l'application dans le dossier `www` de wamp qui se situe dans le répertoire indiqué lors de l'installation de wamp.<br>
__6.__ Ensuite ouvrez un des navigateurs conseillé et rentrez l'url suivante : `localhost`.<br>
__7. (Optionnel)__ - Si lors de l'étape 6 vous êtes face à une erreur du style: `The requested URL was not found on this server`, il vous faut simplement activer un module apache en cliquant sur l'icone de wamp puis sur `Apache` puis dans `Modules Apache` et cocher `rewrite_module`.<br>


## Utilisation conseillée
### Navigateurs
* Google Chrome
* Mozilla Firefox
* Microsoft Edge

### Support
* Pas encore entièrement fonctionnelle sur téléphone, préférez l'utilisation sur un ordinateur ou une tablette pour pouvoir apprécier toutes les fonctionnalitées.

<br>

## Eléments de tests
| Login | Mot de passe | Description |
| :-: | :-: | - |
|`bolleg`|`bolleg`|étudiant du groupe S3B2 test sans permissions|
|`boinetl`|`boinetl`|étudiant du groupe S3B2 test permissions (ajouter et supprimer des rendus)|
|`robsont`|`robsont`|étudiant du groupe S3B2 test délégué|
|`goulianj`|`goulianj`|responsable du département (voir l'agenda et les stats de tous les groupes)|

<br><br>

## Fonctionnement
* ### Les `controllers`
    * Dans le dossier `controller`, de la forme `NomDeLaPageController.php`.
    * Appelé en fonction de la route, fait la récupération et le traitement des données.
    <br>
* ### Les `vues`
    * Dans le dossier `controller/views`, de la forme `NomDeLaPage.view.php`.
    * Template pour l'affichage des pages, est appelé dans son controller. 
    <br>
* ### Le `Model`
    * Dans le dossier `controller/Model`, de la forme `NomDeLaClasse.php`.
    * Utilisé pour structurer et traiter les données.
    <br>
* ### L'`interface DAO`
    * Dans le dossier `controller/Model/database`.
    * Utilisé pour les échanges avec la base de données (SELECT,INSERT,UPDATE,DELETE).
    <br>
* ### Script périodique pour notifications
    * Dans le dossier `script`.
    * S'exécute tous les soirs à `00h00`, ajoute les notifications de `rendu avec date limite proche` ou de `rendu avec date limite dépassée`.
    <br>
* ### Le `router`
    * `index.php`.
    * Utilisé pour traiter la route et appeler le controller correspondant.
