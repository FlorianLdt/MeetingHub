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

* `GET /profile/create` --> Retourne 
* `GET /profile/{profile}` --> Retourne le profil de l'utilisateur avec pour identifiant {profile}
* `GET /profile/{profile}/edit` --> Retourne les informations du profil pour pouvoir les éditer dans un formulaire
* `GET /json/profile` --> Retourne au format JSON le profil de l'utilisateur
* `PUT /profile/{profile}` --> Permet d'envoyer au serveur le profil nouvellement créé avec l'identifiant {profile}
* `DELETE /profile/{profile}` --> Supprime le profil {profile} 

**Ressource participant**

* `GET /participant` --> Retourne
* `GET /participant/{participant}/edit` --> Retourne
* `GET /json/meeting/{meeting_id}/participants` --> Retourne au format JSON la liste des participants à une réunion (`{meeting_id}` doit être une réunion dont l'utilisateur est propriétaire ou participant).
* `PUT /participant/{participant}` --> Rajoute le participant avec pour id {participant}
* `DELETE /participant/{meeting_id}/delete/{email_participant}` --> Supprime un participant à une réunion (`{meeting_id}` doit être une réunion dont l'utilisateur est propriétaire ou participant et `{email_participant}` un email valide d'un participant à cette réunion).

**Ressource fichier**

* `GET /fichier` --> Retourne la liste complète des fichiers
* `GET /fichier/create` --> Retourne
* `GET /fichier/{fichier}` --> Retourne le fichier avec pour identifiant {fichier}
* `GET /fichier/{fichier}/edit` --> Retourne les informations du fichier {fichier} pour édition
* `GET /json/meeting/{meeting_id}/fichiers` --> Retourne au format JSON la liste des fichiers à une réunion (`{meeting_id}` doit être une réunion dont l'utilisateur est propriétaire ou participant).
* `PUT /fichier/{fichier}` --> Envoie au serveur le fichier {fichier}
* `DELETE /fichier/{fichier}` --> Supprime le fichier avec pour identifiant {fichier}
