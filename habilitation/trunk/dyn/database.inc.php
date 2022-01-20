<?php
/**
 * Ce fichier permet le paramétrage de la connexion à la base de données,
 * chaque entrée du tableau correspond à une base différente. Attention
 * l'index du tableau conn représente l'identifiant du dossier dans lequel
 * seront stockés les fichiers propres a cette base dans l'application.
 *
 * @package openmairie_exemple
 * @version SVN : $Id: database.inc.php 3685 2017-01-06 18:01:48Z fmichon $
 */

// PostGreSQL
$conn[1] = array(
    "Gestion des habilitations", // Titre
    "pgsql", // Type de base
    "pgsql", // Type de base
    "postgres", // Login
    "postgres", // Mot de passe
    "tcp", // Protocole de connexion
    "localhost", // Nom d'hote
    "5432", // Port du serveur
    "", // Socket
    "openhabilitation", // Nom de la base
    "AAAA-MM-JJ", // Format de la date
    "openhabilitation", // Nom du schéma
    "", // Préfixe
    null, // Paramétrage pour l'annuaire LDAP
    "mail-default", // Paramétrage pour le serveur de mail
    null, // Paramétrage pour le stockage des fichiers
);

?>
