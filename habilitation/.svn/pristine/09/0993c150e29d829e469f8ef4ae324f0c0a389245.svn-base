<?php
//$Id$ 
//gen openMairie le 13/05/2019 12:37

$DEBUG=0;
$serie=15;
$ent = __("application")." -> ".__("habilitation");
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
$table = DB_PREFIXE."habilitation";
// SELECT 
$champAffiche = array(
    'habilitation.habilitation as "'.__("habilitation").'"',
    'habilitation.libelle as "'.__("libelle").'"',
    "case habilitation.archive when 't' then 'Oui' else 'Non' end as \"".__("archive")."\"",
    );
//
$champNonAffiche = array(
    'habilitation.observation as "'.__("observation").'"',
    );
//
$champRecherche = array(
    'habilitation.habilitation as "'.__("habilitation").'"',
    'habilitation.libelle as "'.__("libelle").'"',
    );
$tri="ORDER BY habilitation.libelle ASC NULLS LAST";
$edition="habilitation";
/**
 * Gestion de la clause WHERE => $selection
 */
// Filtre listing standard
$selection = "";

/**
 * Gestion SOUSFORMULAIRE => $sousformulaire
 */
$sousformulaire = array(
    'agent_habilitation',
    'condition',
);

