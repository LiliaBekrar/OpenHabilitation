<?php
//$Id$ 
//gen openMairie le 13/05/2019 14:25

$DEBUG=0;
$serie=15;
$ent = __("application")." -> ".__("evenement");
if(!isset($premier)) $premier='';
if(!isset($tricolsf)) $tricolsf='';
if(!isset($premiersf)) $premiersf='';
if(!isset($selection)) $selection='';
if(!isset($retourformulaire)) $retourformulaire='';
if (!isset($idxformulaire)) {
    $idxformulaire = '';
}
if (!isset($tricol)) {
    $tricol = '';
}
if (!isset($valide)) {
    $valide = '';
}
// FROM 
$table = DB_PREFIXE."evenement
    LEFT JOIN ".DB_PREFIXE."agent_habilitation 
        ON evenement.agent_habilitation=agent_habilitation.agent_habilitation 
    LEFT JOIN ".DB_PREFIXE."condition 
        ON evenement.condition=condition.condition 
    LEFT JOIN ".DB_PREFIXE."organisme 
        ON evenement.organisme=organisme.organisme ";
// SELECT 
$champAffiche = array(
    'evenement.evenement as "'.__("evenement").'"',
    'evenement.libelle as "'.__("libelle").'"',
    'agent_habilitation.libelle as "'.__("agent_habilitation").'"',
    'condition.libelle as "'.__("condition").'"',
    'organisme.libelle as "'.__("organisme").'"',
    'evenement.fichier as "'.__("fichier").'"',
    'to_char(evenement.date_evenement_debut ,\'DD/MM/YYYY\') as "'.__("date_evenement_debut").'"',
    'to_char(evenement.date_evenement_fin ,\'DD/MM/YYYY\') as "'.__("date_evenement_fin").'"',
    'to_char(evenement.date_validite ,\'DD/MM/YYYY\') as "'.__("date_validite").'"',
    'evenement.type_formation as "'.__("type_formation").'"',
    "case evenement.forcer_validation when 't' then 'Oui' else 'Non' end as \"".__("forcer_validation")."\"",
    );
//
$champNonAffiche = array(
    'evenement.observation as "'.__("observation").'"',
    );
//
$champRecherche = array(
    'evenement.evenement as "'.__("evenement").'"',
    'evenement.libelle as "'.__("libelle").'"',
    'agent_habilitation.libelle as "'.__("agent_habilitation").'"',
    'condition.libelle as "'.__("condition").'"',
    'organisme.libelle as "'.__("organisme").'"',
    'evenement.fichier as "'.__("fichier").'"',
    'evenement.type_formation as "'.__("type_formation").'"',
    );
$tri="ORDER BY evenement.libelle ASC NULLS LAST";
$edition="evenement";
/**
 * Gestion de la clause WHERE => $selection
 */
// Filtre listing standard
$selection = "";
// Liste des clés étrangères avec leurs éventuelles surcharges
$foreign_keys_extended = array(
    "agent_habilitation" => array("agent_habilitation", ),
    "condition" => array("condition", ),
    "organisme" => array("organisme", ),
);
// Filtre listing sous formulaire - agent_habilitation
if (in_array($retourformulaire, $foreign_keys_extended["agent_habilitation"])) {
    $selection = " WHERE (evenement.agent_habilitation = ".intval($idxformulaire).") ";
}
// Filtre listing sous formulaire - condition
if (in_array($retourformulaire, $foreign_keys_extended["condition"])) {
    $selection = " WHERE (evenement.condition = ".intval($idxformulaire).") ";
}
// Filtre listing sous formulaire - organisme
if (in_array($retourformulaire, $foreign_keys_extended["organisme"])) {
    $selection = " WHERE (evenement.organisme = ".intval($idxformulaire).") ";
}

