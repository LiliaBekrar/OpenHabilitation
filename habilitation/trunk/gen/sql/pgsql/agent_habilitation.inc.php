<?php
//$Id$ 
//gen openMairie le 21/05/2019 15:36

$DEBUG=0;
$serie=15;
$ent = __("application")." -> ".__("agent_habilitation");
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
$table = DB_PREFIXE."agent_habilitation
    LEFT JOIN ".DB_PREFIXE."agent 
        ON agent_habilitation.agent=agent.agent 
    LEFT JOIN ".DB_PREFIXE."habilitation 
        ON agent_habilitation.habilitation=habilitation.habilitation ";
// SELECT 
$champAffiche = array(
    'agent_habilitation.agent_habilitation as "'.__("agent_habilitation").'"',
    'agent_habilitation.libelle as "'.__("libelle").'"',
    'agent.nom as "'.__("agent").'"',
    'habilitation.libelle as "'.__("habilitation").'"',
    "case agent_habilitation.archive when 't' then 'Oui' else 'Non' end as \"".__("archive")."\"",
    'to_char(agent_habilitation.date_validite_habilitation ,\'DD/MM/YYYY\') as "'.__("date_validite_habilitation").'"',
    );
//
$champNonAffiche = array(
    'agent_habilitation.observation as "'.__("observation").'"',
    );
//
$champRecherche = array(
    'agent_habilitation.agent_habilitation as "'.__("agent_habilitation").'"',
    'agent_habilitation.libelle as "'.__("libelle").'"',
    'agent.nom as "'.__("agent").'"',
    'habilitation.libelle as "'.__("habilitation").'"',
    );
$tri="ORDER BY agent_habilitation.libelle ASC NULLS LAST";
$edition="agent_habilitation";
/**
 * Gestion de la clause WHERE => $selection
 */
// Filtre listing standard
$selection = "";
// Liste des clés étrangères avec leurs éventuelles surcharges
$foreign_keys_extended = array(
    "agent" => array("agent", ),
    "habilitation" => array("habilitation", ),
);
// Filtre listing sous formulaire - agent
if (in_array($retourformulaire, $foreign_keys_extended["agent"])) {
    $selection = " WHERE (agent_habilitation.agent = ".intval($idxformulaire).") ";
}
// Filtre listing sous formulaire - habilitation
if (in_array($retourformulaire, $foreign_keys_extended["habilitation"])) {
    $selection = " WHERE (agent_habilitation.habilitation = ".intval($idxformulaire).") ";
}

/**
 * Gestion SOUSFORMULAIRE => $sousformulaire
 */
$sousformulaire = array(
    'evenement',
);

