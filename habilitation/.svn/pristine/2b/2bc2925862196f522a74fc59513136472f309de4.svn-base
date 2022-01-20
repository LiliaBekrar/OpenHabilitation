<?php
//$Id$ 
//gen openMairie le 10/05/2019 11:44

$DEBUG=0;
$serie=15;
$ent = __("application")." -> ".__("regle");
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
$table = DB_PREFIXE."regle
    LEFT JOIN ".DB_PREFIXE."condition 
        ON regle.condition=condition.condition ";
// SELECT 
$champAffiche = array(
    'regle.regle as "'.__("regle").'"',
    'regle.libelle as "'.__("libelle").'"',
    'condition.libelle as "'.__("condition").'"',
    'regle.champ as "'.__("champ").'"',
    'regle.operateur as "'.__("operateur").'"',
    'regle.valeur as "'.__("valeur").'"',
    'regle.duree as "'.__("duree").'"',
    'regle.message as "'.__("message").'"',
    );
//
$champNonAffiche = array(
    );
//
$champRecherche = array(
    'regle.regle as "'.__("regle").'"',
    'regle.libelle as "'.__("libelle").'"',
    'condition.libelle as "'.__("condition").'"',
    'regle.champ as "'.__("champ").'"',
    'regle.operateur as "'.__("operateur").'"',
    'regle.valeur as "'.__("valeur").'"',
    'regle.duree as "'.__("duree").'"',
    'regle.message as "'.__("message").'"',
    );
$tri="ORDER BY regle.libelle ASC NULLS LAST";
$edition="regle";
/**
 * Gestion de la clause WHERE => $selection
 */
// Filtre listing standard
$selection = "";
// Liste des clés étrangères avec leurs éventuelles surcharges
$foreign_keys_extended = array(
    "condition" => array("condition", ),
);
// Filtre listing sous formulaire - condition
if (in_array($retourformulaire, $foreign_keys_extended["condition"])) {
    $selection = " WHERE (regle.condition = ".intval($idxformulaire).") ";
}

