# Projet MeetingHub

## Description

MeetingHub est un site internet utilisé pour créer des réunions et y inviter des participants.

Le projet a été implementé à l'aide du Framework PHP Laravel (https://laravel.com/) et utilise en 

## Déploiement du projet

### Téléchargement du projet 

Le projet est télachargeable à l'adresse suivante : https://github.com/FlorianLdt/MeetingHub.

### Installation du Framework Laravel

## Présentation de l'API REST du projet

### Les ressources

Les différentes ressources que notre API met en place sont :

* `meeting` correspondant à une réunion organisé 
* `profile` correspondant à un profil utilisateur
* `participant`correspondant à un participant à une réunion
* `fichier` correspondant à un document joint à une réunion

### Adresses et verbes HTTP

**Ressource meeting**

* `GET http://arsene.me/meeting` --> Retourne la liste complète des réunions
* `GET http://arsene.me/meeting/create` --> Retourne
* `GET http://arsene.me/meeting/{id}/participant` --> Retourne
* `GET http://arsene.me/meeting/{meeting}` --> Retourne
* `GET http://arsene.me/meeting/{meeting}/edit` --> Retourne
* `GET http://arsene.me/json/meeting` --> Retourne
* `GET http://arsene.me/json/meeting/{id}` --> Retourne
* `POST http://arsene.me/meeting` --> Retourne
* `PUT http://arsene.me/meeting/{meeting}` --> Retourne
* `DELETE http://arsene.me/meeting/{meeting}` --> Retourne

**Ressource profile**

* `GET http://arsene.me/profile` --> Retourne
* `GET http://arsene.me/profile/create` --> Retourne
* `GET http://arsene.me/profile/{profile}` --> Retourne
* `GET http://arsene.me/profile/{profile}/edit` --> Retourne
* `POST http://arsene.me/profile` --> Retourne
* `PUT http://arsene.me/profile/{profile}` --> Retourne
* `DELETE http://localhost:8000/profile/{profile}` --> Retourne

**Ressource participant**

* `GET http://localhost:8000/participant` --> Retourne
* `GET http://localhost:8000/participant/{participant}/edit` --> Retourne
* `GET http://localhost:8000/json/meeting/{id}/participants` --> Retourne
* `POST http://localhost:8000/participant` --> Retourne
* `PUT http://localhost:8000/participant/{participant}` --> Retourne
* `DELETE http://localhost:8000/participant/{meeting_id}/delete/{email_participant}` --> Retourne

**Ressource fichier**

* `GET http://localhost:8000/fichier` --> Retourne la liste complète des fichiers
* `GET http://localhost:8000/fichier/create` --> Retourne
* `GET http://localhost:8000/fichier/{fichier}` --> Retourne
* `GET http://localhost:8000/fichier/{fichier}/edit` --> Retourne
* `GET http://localhost:8000/json/meeting/{id}/fichiers` --> Retourne
* `POST http://localhost:8000/fichier` --> Retourne
* `PUT http://localhost:8000/fichier/{fichier}` --> Retourne
* `DELETE http://localhost:8000/fichier/{fichier}` --> Retourne
