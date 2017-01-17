# Projet MeetingHub

## Description

MeetingHub est un site internet utilisé pour créer des réunions et y inviter des participants.

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

**GET**

* `http://localhost:8000/fichier` --> Retourne la liste complète des fichiers
* `http://localhost:8000/fichier/create` --> Retourne
* `http://localhost:8000/fichier/{fichier}` --> Retourne
* `http://localhost:8000/fichier/{fichier}/edit` --> Retourne
* `http://localhost:8000/meeting` --> Retourne la liste complète des réunions
* `http://localhost:8000/meeting/create` --> Retourne
* `http://localhost:8000/meeting/{id}/participant` --> Retourne
* `http://localhost:8000/meeting/{meeting}` --> Retourne
* `http://localhost:8000/meeting/{meeting}/edit` --> Retourne
* `http://localhost:8000/participant` --> Retourne
* `http://localhost:8000/participant/{participant}/edit` --> Retourne
* `http://localhost:8000/profile` --> Retourne
* `http://localhost:8000/profile/create` --> Retourne
* `http://localhost:8000/profile/{profile}` --> Retourne
* `http://localhost:8000/profile/{profile}/edit` --> Retourne
* `http://localhost:8000/participant/{participant}/edit` --> Retourne
* `http://localhost:8000/participant/{participant}/edit` --> Retourne
* `http://localhost:8000/participant/{participant}/edit` --> Retourne

**POST**

* `http://localhost:8000/fichier` --> Retourne
* `http://localhost:8000/meeting` --> Retourne
* `http://localhost:8000/participant` --> Retourne
* `http://localhost:8000/profile` --> Retourne
* `http://localhost:8000/participant` --> Retourne
* `http://localhost:8000/profile` --> Retourne

**PUT**

* `http://localhost:8000/fichier/{fichier}` --> Retourne
* `http://localhost:8000/meeting/{meeting}` --> Retourne
* `http://localhost:8000/participant/{participant}` --> Retourne
* `http://localhost:8000/profile/{profile}` --> Retourne

**DELETE**

* `http://localhost:8000/fichier/{fichier}` --> Retourne
* `http://localhost:8000/meeting/{meeting}` --> Retourne
* `http://localhost:8000/participant/{meeting_id}/delete/{email_participant}` --> Retourne
* `http://localhost:8000/profile/{profile}` --> Retourne
