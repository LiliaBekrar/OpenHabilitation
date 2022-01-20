<?php

//gen 
include "../gen/sql/pgsql/agent_habilitation.inc.php";

$champAffiche = array(
    'agent_habilitation.agent_habilitation as "'.__("agent_habilitation").'"',
    'agent_habilitation.libelle as "'.__("libelle").'"',
    'agent.nom as "'.__("agent").'"',
    'habilitation.libelle as "'.__("habilitation").'"',
    //'to_char(agent_habilitation.date_debut ,\'DD/MM/YYYY\') as "'.__("date_debut").'"',
    //'to_char(agent_habilitation.date_fin ,\'DD/MM/YYYY\') as "'.__("date_fin").'"',
    "case agent_habilitation.archive when 't' then 'Oui' else 'Non' end as \"".__("archive")."\"",
    'to_char(agent_habilitation.date_validite_habilitation ,\'DD/MM/YYYY\') as "'.__("date_validite_habilitation").'"',
    );


$champs['agent'] = array(
	'table' => 'agent',
	'colonne' =>   'agent', 
	'type' => 'select',                 
	);

$champs['habilitation'] = array(
	'table' => 'habilitation',
	'colonne' =>  'habilitation', 
	'type' => 'select',                 
	);  

$champs['date_validite_habilitation'] = array(
	'colonne' => 'date_validite_habilitation',
	'table' => 'agent_habilitation',
	//'libelle' => _(""),
	'lib1'=> _("Validité")." "._("du"),
	'lib2' => _("au"),
	'type' => 'date',
	'taille' => 8,
	'where' => 'intervaldate');


$options[] = array(
	'type' => 'search',
	'display' => true,
	'advanced'  => $champs,
	'default_form'  => 'advanced',
	'absolute_object' => 'agent_habilitation',
	 'export' => array("csv"));
