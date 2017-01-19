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

* `GET /meeting` --> Retourne la liste complète des réunions
* `GET /meeting/create` --> Retourne
* `GET /meeting/{id}/participant` --> Retourne
* `GET /meeting/{meeting}` --> Retourne
* `GET /meeting/{meeting}/edit` --> Retourne
* `GET /json/meeting` --> Retourne
* `GET /json/meeting/{id}` --> Retourne
* `POST /meeting` --> Retourne
* `PUT /meeting/{meeting}` --> Retourne
* `DELETE /meeting/{meeting}` --> Retourne

**Ressource profile**

* `GET /profile` --> Retourne
* `GET /profile/create` --> Retourne
* `GET /profile/{profile}` --> Retourne
* `GET /profile/{profile}/edit` --> Retourne
* `GET /json/profile` --> Retourne
* `POST /profile` --> Retourne
* `PUT /profile/{profile}` --> Retourne
* `DELETE /profile/{profile}` --> Retourne

**Ressource participant**

* `GET /participant` --> Retourne
* `GET /participant/{participant}/edit` --> Retourne
* `GET /json/meeting/{id}/participants` --> Retourne
* `POST /participant` --> Retourne
* `PUT /participant/{participant}` --> Retourne
* `DELETE /participant/{meeting_id}/delete/{email_participant}` --> Retourne

**Ressource fichier**

* `GET /fichier` --> Retourne la liste complète des fichiers
* `GET /fichier/create` --> Retourne
* `GET /fichier/{fichier}` --> Retourne
* `GET /fichier/{fichier}/edit` --> Retourne
* `GET /json/meeting/{id}/fichiers` --> Retourne
* `POST /fichier` --> Retourne
* `PUT http://localhost:8000/fichier/{fichier}` --> Retourne
* `DELETE http://localhost:8000/fichier/{fichier}` --> Retourne
