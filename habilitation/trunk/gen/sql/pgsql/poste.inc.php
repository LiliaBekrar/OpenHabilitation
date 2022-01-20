<?php
//$Id$ 
//gen openMairie le 13/06/2019 10:59

$DEBUG=0;
$serie=15;
$ent = __("application")." -> ".__("poste");
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
$table = DB_PREFIXE."poste";
// SELECT 
$champAffiche = array(
    'poste.poste as "'.__("poste").'"',
    'poste.libelle as "'.__("libelle").'"',
    );
//
$champNonAffiche = array(
    );
//
$champRecherche = array(
    'poste.poste as "'.__("poste").'"',
    'poste.libelle as "'.__("libelle").'"',
    );
$tri="ORDER BY poste.libelle ASC NULLS LAST";
$edition="poste";
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

