# Projet MeetingHub

## Description

MeetingHub est un site internet utilisé pour créer des réunions et y inviter des participants.

Le projet a été développé à l'aide du Framework PHP Laravel (https://laravel.com/) et implemente une API RESTFUL. 

## Déploiement du projet

### Téléchargement du projet 

Le projet est téléchargeable à l'adresse suivante : https://github.com/FlorianLdt/MeetingHub.

### Serveur du projet MeetingHub

MeetingHub est consultable à l'adresse suivante : http://arsene.me/.

## Présentation de l'API RESTFUL du projet

### Les ressources

Les différentes ressources que notre API met en place sont :

* `meeting` correspondant à une réunion organisé 
* `profile` correspondant à un profil utilisateur
* `participant`correspondant à un participant à une réunion
* `fichier` correspondant à un document joint à une réunion

### Adresses et verbes HTTP

L'ensemble des adresses ci-dessous sont consultatables uniquement quand l'utilisateur est authentifié.

**Ressource meeting**

* `GET /meeting` --> Retourne la liste complète des réunions où l'utilisateur authentifié est propriétaire ou participant.
* `GET /meeting/create` --> Retourne la page de création d'une réunion.
* `GET /meeting/{meeting_id}/participant` --> Retourne la liste des participants à la réunion ({meeting_id} doit être une réunion dont l'utilisateur est propriétaire ou participant).
* `GET /meeting/{meeting_id}` --> Retourne la page de la réunion ({meeting_id} doit être une réunion dont l'utilisateur est propriétaire ou participant).
* `GET /meeting/{meeting_id}/edit` --> Retourne la page de modification de la réunion ({meeting_id} doit être une réunion dont l'utilisateur est propriétaire ou participant)
* `GET /json/meeting` --> Retourne au format JSON la liste complète des réunions où l'utilisateur authentifié est propriétaire ou participant. 
* `GET /json/meeting/{meeting_id}` --> Retourne au format JSON la réunion ({meeting_id} doit être une réunion dont l'utilisateur est propriétaire ou participant).
* `POST /meeting` --> Retourne
* `PUT /meeting/{meeting}` --> Retourne
* `DELETE /meeting/{meeting_id}` --> Supprime la réunion ({meeting_id} doit être une réunion dont l'utilisateur est propriétaire ou participant).

**Ressource profile**

* `GET /profile` --> Retourne la page profil
* `GET /profile/create` --> Retourne
* `GET /profile/{profile}` --> Retourne
* `GET /profile/{profile}/edit` --> Retourne
* `GET /json/profile` --> Retourne au format JSON le profil de l'utilisateur
* `POST /profile` --> Retourne
* `PUT /profile/{profile}` --> Retourne
* `DELETE /profile/{profile}` --> Retourne

**Ressource participant**

* `GET /participant` --> Retourne
* `GET /participant/{participant}/edit` --> Retourne
* `GET /json/meeting/{meeting_id}/participants` --> Retourne au format JSON la liste des participants à une réunion ({meeting_id} doit être une réunion dont l'utilisateur est propriétaire ou participant).
* `POST /participant` --> Retourne
* `PUT /participant/{participant}` --> Retourne
* `DELETE /participant/{meeting_id}/delete/{email_participant}` --> Supprime un participant à une réunion ({meeting_id} doit être une réunion dont l'utilisateur est propriétaire ou participant et {email_participant} un email valide d'un participant à cette réunion).

**Ressource fichier**

* `GET /fichier` --> Retourne la liste complète des fichiers
* `GET /fichier/create` --> Retourne
* `GET /fichier/{fichier}` --> Retourne
* `GET /fichier/{fichier}/edit` --> Retourne
* `GET /json/meeting/{meeting_id}/fichiers` --> Retourne au format JSON la liste des fichiers à une réunion ({meeting_id} doit être une réunion dont l'utilisateur est propriétaire ou participant).
* `POST /fichier` --> Retourne
* `PUT /fichier/{fichier}` --> Retourne
* `DELETE /fichier/{fichier}` --> Retourne
