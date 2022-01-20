<?php
//$Id$ 
//gen openMairie le 28/01/2019 21:48

$DEBUG=0;
$serie=15;
$ent = __("application")." -> ".__("service");
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
$table = DB_PREFIXE."service";
// SELECT 
$champAffiche = array(
    'service.service as "'.__("service").'"',
    'service.libelle as "'.__("libelle").'"',
    );
//
$champNonAffiche = array(
    );
//
$champRecherche = array(
    'service.service as "'.__("service").'"',
    'service.libelle as "'.__("libelle").'"',
    );
$tri="ORDER BY service.libelle ASC NULLS LAST";
$edition="service";
/**
 * Gestion de la clause WHERE => $selection
 */
// Filtre listing standard
$selection = "";

/**
 * Gestion SOUSFORMULAIRE => $sousformulaire
 */
$sousformulaire = array(
    'agent',
);

