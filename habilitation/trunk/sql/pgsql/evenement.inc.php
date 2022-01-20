<?php

//gen 
include "../gen/sql/pgsql/evenement.inc.php";

if(!isset($_GET['idxformulaire']))
	$tab_actions['corner']['ajouter'] = null;

$champAffiche = array(
    'evenement.evenement as "'.__("evenement").'"',
    'evenement.libelle as "'.__("libelle").'"',
    //'agent_habilitation.libelle as "'.__("agent_habilitation").'"',
    //'condition.libelle as "'.__("condition").'"',
    'organisme.libelle as "'.__("organisme").'"',
    'to_char(evenement.date_evenement_debut ,\'DD/MM/YYYY\') as "'.__("debut").'"',
    'to_char(evenement.date_evenement_fin ,\'DD/MM/YYYY\') as "'.__("fin").'"',
    'to_char(evenement.date_validite ,\'DD/MM/YYYY\') as "'.__("validite").'"',
    );
