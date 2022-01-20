<?php
//$Id$ 
//gen openMairie le 28/01/2019 21:47

$DEBUG=0;
$serie=15;
$ent = __("application")." -> ".__("categorie");
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
$table = DB_PREFIXE."categorie";
// SELECT 
$champAffiche = array(
    'categorie.categorie as "'.__("categorie").'"',
    'categorie.libelle as "'.__("libelle").'"',
    );
//
$champNonAffiche = array(
    );
//
$champRecherche = array(
    'categorie.categorie as "'.__("categorie").'"',
    'categorie.libelle as "'.__("libelle").'"',
    );
$tri="ORDER BY categorie.libelle ASC NULLS LAST";
$edition="categorie";
/**
 * Gestion de la clause WHERE => $selection
 */
// Filtre listing standard
$selection = "";

/**
 * Gestion SOUSFORMULAIRE => $sousformulaire
 */
$sousformulaire = array(
    'condition',
);

