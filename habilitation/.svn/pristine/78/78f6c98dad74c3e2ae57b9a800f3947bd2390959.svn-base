<?php
//$Id$ 
//gen openMairie le 13/05/2019 14:22

$DEBUG=0;
$serie=15;
$ent = __("application")." -> ".__("condition");
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
$table = DB_PREFIXE."condition
    LEFT JOIN ".DB_PREFIXE."categorie 
        ON condition.categorie=categorie.categorie 
    LEFT JOIN ".DB_PREFIXE."habilitation 
        ON condition.habilitation=habilitation.habilitation ";
// SELECT 
$champAffiche = array(
    'condition.condition as "'.__("condition").'"',
    'condition.libelle as "'.__("libelle").'"',
    'habilitation.libelle as "'.__("habilitation").'"',
    'categorie.libelle as "'.__("categorie").'"',
    'condition.duree as "'.__("duree").'"',
    'condition.ordre as "'.__("ordre").'"',
    );
//
$champNonAffiche = array(
    );
//
$champRecherche = array(
    'condition.condition as "'.__("condition").'"',
    'condition.libelle as "'.__("libelle").'"',
    'habilitation.libelle as "'.__("habilitation").'"',
    'categorie.libelle as "'.__("categorie").'"',
    'condition.duree as "'.__("duree").'"',
    'condition.ordre as "'.__("ordre").'"',
    );
$tri="ORDER BY condition.libelle ASC NULLS LAST";
$edition="condition";
/**
 * Gestion de la clause WHERE => $selection
 */
// Filtre listing standard
$selection = "";
// Liste des clés étrangères avec leurs éventuelles surcharges
$foreign_keys_extended = array(
    "categorie" => array("categorie", ),
    "habilitation" => array("habilitation", ),
);
// Filtre listing sous formulaire - categorie
if (in_array($retourformulaire, $foreign_keys_extended["categorie"])) {
    $selection = " WHERE (condition.categorie = ".intval($idxformulaire).") ";
}
// Filtre listing sous formulaire - habilitation
if (in_array($retourformulaire, $foreign_keys_extended["habilitation"])) {
    $selection = " WHERE (condition.habilitation = ".intval($idxformulaire).") ";
}

/**
 * Gestion SOUSFORMULAIRE => $sousformulaire
 */
$sousformulaire = array(
    'regle',
);

