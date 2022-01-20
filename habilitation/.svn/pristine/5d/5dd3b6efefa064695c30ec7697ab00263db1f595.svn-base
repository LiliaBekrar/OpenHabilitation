<?php
//$Id$ 
//gen openMairie le 13/06/2019 10:04

$DEBUG=0;
$serie=15;
$ent = __("application")." -> ".__("agent");
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
$table = DB_PREFIXE."agent
    LEFT JOIN ".DB_PREFIXE."poste 
        ON agent.poste=poste.poste 
    LEFT JOIN ".DB_PREFIXE."service 
        ON agent.service=service.service ";
// SELECT 
$champAffiche = array(
    'agent.agent as "'.__("agent").'"',
    'agent.nom as "'.__("nom").'"',
    'agent.prenom as "'.__("prenom").'"',
    'agent.nomjf as "'.__("nomjf").'"',
    'agent.matricule as "'.__("matricule").'"',
    'to_char(agent.date_naissance ,\'DD/MM/YYYY\') as "'.__("date_naissance").'"',
    'service.libelle as "'.__("service").'"',
    'poste.libelle as "'.__("poste").'"',
    );
//
$champNonAffiche = array(
    );
//
$champRecherche = array(
    'agent.agent as "'.__("agent").'"',
    'agent.nom as "'.__("nom").'"',
    'agent.prenom as "'.__("prenom").'"',
    'agent.nomjf as "'.__("nomjf").'"',
    'agent.matricule as "'.__("matricule").'"',
    'service.libelle as "'.__("service").'"',
    'poste.libelle as "'.__("poste").'"',
    );
$tri="ORDER BY agent.nom ASC NULLS LAST";
$edition="agent";
/**
 * Gestion de la clause WHERE => $selection
 */
// Filtre listing standard
$selection = "";
// Liste des clés étrangères avec leurs éventuelles surcharges
$foreign_keys_extended = array(
    "poste" => array("poste", ),
    "service" => array("service", ),
);
// Filtre listing sous formulaire - poste
if (in_array($retourformulaire, $foreign_keys_extended["poste"])) {
    $selection = " WHERE (agent.poste = ".intval($idxformulaire).") ";
}
// Filtre listing sous formulaire - service
if (in_array($retourformulaire, $foreign_keys_extended["service"])) {
    $selection = " WHERE (agent.service = ".intval($idxformulaire).") ";
}

/**
 * Gestion SOUSFORMULAIRE => $sousformulaire
 */
$sousformulaire = array(
    'agent_habilitation',
);

