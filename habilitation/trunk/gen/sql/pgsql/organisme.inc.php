<?php
//$Id$ 
//gen openMairie le 28/01/2019 21:48

$DEBUG=0;
$serie=15;
$ent = __("application")." -> ".__("organisme");
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
$table = DB_PREFIXE."organisme";
// SELECT 
$champAffiche = array(
    'organisme.organisme as "'.__("organisme").'"',
    'organisme.libelle as "'.__("libelle").'"',
    );
//
$champNonAffiche = array(
    );
//
$champRecherche = array(
    'organisme.organisme as "'.__("organisme").'"',
    'organisme.libelle as "'.__("libelle").'"',
    );
$tri="ORDER BY organisme.libelle ASC NULLS LAST";
$edition="organisme";
/**
 * Gestion de la clause WHERE => $selection
 */
// Filtre listing standard
$selection = "";

/**
 * Gestion SOUSFORMULAIRE => $sousformulaire
 */
$sousformulaire = array(
);

