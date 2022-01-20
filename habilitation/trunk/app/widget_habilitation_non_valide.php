<?php
/**
 * Widget - Affiche les habilitations non valide
 *
 * @package openvieassocative
 * @version SVN : $Id$
 */

//
require_once "../app/framework_openmairie.class.php";

// Si utils n'est pas instanciée
if (!isset($f)) {
    // Instance de la classe utils
    $f = new utils(null);
}

// Droits nécessaires2
$f->isAccredited(array("agent_habilitation", "agent_habilitation_tab"), "OR");
// parametres2
$link = '
<a class="lienTable" href="index.php?'
    .'module=form&obj=agent_habilitation'
    .'&amp;action=3'
    .'&amp;idx=%s'
    .'&amp;advs_id='
    .'&amp;premier=0'
    .'&amp;tricol='
    .'&amp;valide='
    .'&amp;retour=tab">'
    // Valeur affichée
    .'%s'
.'</a>';

// Action consulter
$action_consulter = '
<span class="om-icon om-icon-16 om-icon-fix consult-16" title="'._('Consulter').'">'
    ._('Consulter')
.'</span>
';
// il peut y avoir plusieurs parametres de nombre de mois 
$sql="select valeur from ".DB_PREFIXE."om_parametre";
$sql .=" where libelle like '%nbm_widget_habilitation%'";// évite les problème lier aux espaces
$res = $f->db->query($sql);
$f->addToLog("app/widget_habilitation_non_valide.php: db->query(\"".$sql."\");", VERBOSE_MODE);
$f->isDatabaseError($res);
$i = 0;
// la valeur par défaut est de 3 mois
if ($res->numrows() == 0 ) {
	$contenu[$i]=3;
} else {
	$contenu=array();
	while ($row =& $res->fetchRow(DB_FETCHMODE_ASSOC) ) {
		$contenu[$i]=$row['valeur'];
		$i++;
	}
	natcasesort($contenu);// tri des valeurs par ordre croissant
}
if ($f->getParameter("limit_widget_habilitation"))
	$limit_widget_habilitation=Trim($f->getParameter("limit_widget_habilitation"));
else
	$limit_widget_habilitation=10;
// pour chaque parametre nbm_widget_habilitation saisie
foreach($contenu as $element){
	$nbm_widget_habilitation = $element;
	$sql="select agent_habilitation.agent_habilitation, agent_habilitation.libelle, ";
	$sql .=" to_char(agent_habilitation.date_validite_habilitation, 'dd/mm/YYYY') as validite  "; 
	$sql .=" from ".DB_PREFIXE."agent_habilitation "; 
	$sql .=" where ";
	$sql .=" (agent_habilitation.date_validite_habilitation <= '".date('Y-m-d', mktime(0, 0, 0, date('m')+$nbm_widget_habilitation, date('d'), date('Y')))."' or agent_habilitation.date_validite_habilitation is null) ";  
	$sql .=" and agent_habilitation.date_validite_habilitation is not null "; 
	$sql .=" and agent_habilitation.archive is not true  ";  
	$sql .=" order by  agent_habilitation.date_validite_habilitation desc";
	$sql .=" limit ".$limit_widget_habilitation; // limite sur requete et non sur affichage 
	$res2 = $f->db->query($sql);
	$f->addToLog("app/widget_habilitation_non_valide.php: db->query(\"".$sql."\");", VERBOSE_MODE);
	$f->isDatabaseError($res2);
	$f->displaysubtitle(_("Habilitations non valides pour le " ).
		date('d-m-Y', mktime(0, 0, 0, date('m')+$nbm_widget_habilitation, date('d'), date('Y'))));
		
	if ( $res2->numrows() > 0 ) {
		if ($nbm_widget_habilitation == 0){
			$message = _("Liste des")." ".$limit_widget_habilitation." ".
			_("habilitations les plus anciennes non valides aujourd'hui :");
		}else{
			$message = _("Liste des")." ". $limit_widget_habilitation." ".
			_("habilitations les plus anciennes non valides dans le courant des")." ".$nbm_widget_habilitation." "._("mois:");
		}
		$f->displayDescription($message);

		// Début du tableau
		printf('<table class="tab-tab">');

		// Entête de tableau
		printf('<thead>');
			printf('<tr class="ui-tabs-nav ui-accordion ui-state-default tab-title">');
			   // Icône consulter
				printf('<th class="icons action-max-1">');
					printf('<span class="name">');
					printf('</span>');
				printf('</th>');
				// libelle
				printf('<th class="title col-0 firstcol">');
					printf('<span class="name">');
						printf(_('libelle'));
					printf('</span>');
				printf('</th>');
				// Date
				printf('<th class="title col-3 lastcol">');
					printf('<span class="name">');
						printf(_('validite'));
					printf('</span>');
				printf('</th>');
		printf('</thead>');

		// Corps du tableau
		printf('<tbody>');

		// Données dans le tableau
		while ($row =& $res2->fetchRow(DB_FETCHMODE_ASSOC) ) {

			printf('<tr class="tab-data">');
				// Icône consulter
				printf('<td class="icons">');
					printf($link, $row["agent_habilitation"],
						$action_consulter);
				printf('</td>');
				// libelle
				printf('<td class="col-0 firstcol">');
					printf($link, $row["agent_habilitation"], $row["libelle"], 
						$row["libelle"]);
				printf('</td>');
				// Date
				printf('<td class="col-1">');
					printf($link, $row["agent_habilitation"], $row["validite"], 
						$row["validite"]);
				printf('</td>');
			printf("</tr>");
		}

		printf('</tbody>');

		printf('</table><br>');
		
	} else {

		// Message s'il n'y a pas de données
		$message = _("Il n'y a pas d'habilitation non valide");
		$f->displayDescription($message);
	}
}


?>

