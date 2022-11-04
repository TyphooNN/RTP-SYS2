# Groupe de scholt_k 882518

# RTP-SYS2

Projet d'hébergement web réalisé par Kevin,Valentin et Raphael.

## Usage

Afin de démarrer le projet, nous avons d'abord:
Mis en place une VM Debian Buster avec la configuration suivante.

OS: Debian Buster
Carte réseau: bridge recommande
Ressources: 2vCPU 4GO RAM
Stockage: 30GB+ recommande

Ensuite on gere les permitions de celui-ci avec des chmods sur les fichiers et dossier le concernant.
C'est surtout pour éviter qu'on utilise des sudo sur les docker-compose et docker.

## Containers

### MySQL

Création d'un Dockerfile permettant de créer un container database.

Afin de configurer la base de données, nous avons tout d'abord du choisir une image qui répondait aux contraintes du sujet:
Nous avons choisi l'image mysql:8 ainsi que le port en 3306 et avons décidé de passer par un entrypoint "mysqld".
Vu que nous passons par un entrypoint "mysqld", nous avons créer un dossier config dans lequel nous avons creer un fichier custom.cnf et mysqldumb.sql .

Il était aussi préciser que cette base de donnéees doit être percistante a l'aide d'un volume docker c'est-à-dire qu'en cas de redémarrage de container, 
la data stockée doit rester disponible.
Pour cela, nous avons eu besoin de creer dans la  partie service, une partie volumes ou dedans nous retrouvons notre - "database_volume:/var/lib/mysql" 
Mais aussi l'ajout d'une partit:
volumes: 
  database_volume: {}

Création d'une base de donnée contenant une table Users avec les champs id, username, email et password.
Une fois la DB et la table crées, elles devront se retrouver dans votre .sql (man mysqldump).

### Back

Création d'un Dockerfile permettant de créer un container back, avec tout pour lancer un serveur php , qui se connectera via PDO au container database. 
Le port utilisé sera le port 7777.
on a aussi crée un fichier index.php dans le dossier source ou on retrouve toute la partit connection a la Db, PDO et récupération de donnée.

### Front 

Création d'un Dockerfile permettant de créer un container Front
Dans celui-ci on retrouve tout pour lancer un server apache 
Création dun fichier index.php ou on retrouve notre front et son affichage toujours dans un dossier source
On retourne aussi dans le docker-compose.yml et on rajoute le port 8080 pour qu'on puisse lancer celui-ci en localhost:8080.
