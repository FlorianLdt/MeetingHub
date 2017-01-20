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
* `GET /meeting/{meeting_id}/participant` --> Retourne la liste des participants à la réunion (`{meeting_id}` doit être une réunion dont l'utilisateur est propriétaire ou participant).
* `GET /meeting/{meeting_id}` --> Retourne la page de la réunion (`{meeting_id}` doit être une réunion dont l'utilisateur est propriétaire ou participant).
* `GET /meeting/{meeting_id}/edit` --> Retourne la page de modification de la réunion (`{meeting_id}` doit être une réunion dont l'utilisateur est propriétaire ou participant)
* `GET /json/meeting` --> Retourne au format JSON la liste complète des réunions où l'utilisateur authentifié est propriétaire ou participant. 
* `GET /json/meeting/{meeting_id}` --> Retourne au format JSON la réunion (`{meeting_id}` doit être une réunion dont l'utilisateur est propriétaire ou participant).
* `PUT /meeting/{meeting_id}` --> Permet d'envoyer au serveur un meeting nouvellement créé avec l'identifiant {meeting_id}
* `DELETE /meeting/{meeting_id}` --> Supprime la réunion (`{meeting_id}` doit être une réunion dont l'utilisateur est propriétaire ou participant).

**Ressource profile**

* `GET /profile/{profile_id}` --> Retourne le profil de l'utilisateur avec pour identifiant `{profile_id}`
* `GET /json/profile` --> Retourne au format JSON le profil de l'utilisateur

**Ressource participant**

* `GET /json/meeting/{meeting_id}/participants` --> Retourne au format JSON la liste des participants à une réunion (`{meeting_id}` doit être une réunion dont l'utilisateur est propriétaire ou participant).
* `DELETE /participant/{meeting_id}/delete/{email_participant}` --> Supprime un participant à une réunion (`{meeting_id}` doit être une réunion dont l'utilisateur est propriétaire ou participant et `{email_participant}` un email valide d'un participant à cette réunion).

**Ressource fichier**

* `GET /json/meeting/{meeting_id}/fichiers` --> Retourne au format JSON la liste des fichiers à une réunion (`{meeting_id}` doit être une réunion dont l'utilisateur est propriétaire ou participant).
* `DELETE /fichier/{fichier_id}` --> Supprime le fichier avec pour identifiant `{fichier_id}`

### Codes HTTP d'erreurs du client web ou d'erreurs du serveur / du serveur d'application

Les codes HTTP d'erreurs implémentés dans le projet MeetingHub sont les suivants :

**Erreur du client web**
* 403 - Forbidden : Le serveur a compris la requête, mais refuse de l'exécuter. Cela signifie que les droits d'accès ne permettent pas au client d'accéder à la ressource.
* 404 - Not Found : Ressource non trouvée.

**Erreur du client web**
* 500 - Internal Server Error :	Erreur interne du serveur.
* 503 - Service Unavailable : Service temporairement indisponible ou en maintenance.

