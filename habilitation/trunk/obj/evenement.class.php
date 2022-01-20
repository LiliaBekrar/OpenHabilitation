<?php
//$Id$ 
//gen openMairie le 17/05/2011 11:46 
require_once ("../gen/obj/evenement.class.php");

class evenement extends evenement_gen {
	
	// enleve libelle    
	var $required_field = array(
        "agent_habilitation",
        "date_evenement_debut",
        "evenement",
        "condition"
    );
    
    var $agent_habilitation;
   
    function get_var_sql_forminc__sql_condition() {

		if ( $this->getParameter('maj') < 2 and $this->retourformulaire ==
		 'agent_habilitation') {
			$sql="select habilitation from ".DB_PREFIXE.
				"agent_habilitation where agent_habilitation = ".
				 $this->getParameter('idxformulaire') ;
			$res=$this->f->db->getOne($sql);
			$this->addToLog(__METHOD__.$sql, VERBOSE_MODE);
			$this->f->isDatabaseError($res);
			//echo "ca passe";
			return "SELECT condition.condition, condition.libelle FROM "
			.DB_PREFIXE."condition WHERE habilitation = ".$res.
			" ORDER BY condition.libelle ASC";
		}else
			return "SELECT condition.condition, condition.libelle FROM 
			".DB_PREFIXE."condition ORDER BY condition.libelle ASC";
	}
 
    
    function get_var_sql_forminc__champs() {
        return array(
			"evenement",
			"fichier",
            "libelle",
            "agent_habilitation",
            "condition",
            "type_formation",
            "organisme",
            "date_evenement_debut",
            "date_evenement_fin",
            "date_validite",
            "forcer_validation",
            "observation as observation_evenement", //ne pas etre concurrent avec form agent_habilitation/observation
        );
    }

    function setvalF($val = array()) {
		parent::setvalF($val);
        //affectation valeur formulaire
        // ne pas etre concurrent avec form agent_habilitation/observation
        $this->valF['observation'] = $val['observation_evenement'];
    }


    function setLib(&$form, $maj) {
		parent::setLib($form,$maj);
        $form->setLib("evenement",""); 
        $form->setLib("fichier","");
        $form->setLib('libelle', '');
        $form->setLib('agent_habilitation', '');
        $form->setLib('condition', '');
        $form->setLib('organisme', '');
        $form->setLib('date_evenement_debut', _('Du :'));
        $form->setLib('date_evenement_fin', _('au :'));
        $form->setLib('date_validite', 'Jusqu\'au');
        $form->setLib('type_formation', _('Type de formation'));
        $form->setLib('observation_evenement', '');
        $form->setLib('forcer_validation', _('Forcer la date'));
    }
    
	function setType(&$form,$maj) {
		parent::setType($form,$maj);
		if ($maj == 0 ) {
			$form->setType("libelle", "hidden");
		}
		if ($maj==1) {
			$form->setType("condition", "selecthiddenstatic");
            $form->setType("agent_habilitation", "hiddenstatic");
		}
		if ($maj < 2) {
	  		$form->setType('fichier','upload2');
	  		//ne pas etre concurrent avec form agent_habilitation/observation
  			$form->setType('observation_evenement','html');
  			$form->setType('evenement','hidden');
  			$form->setType('type_formation', 'select');
			if($this->retourformulaire != "")
				$form->setType("registre","hidden");
		}
		if ($maj == 3) {
	  		$form->setType('fichier','afficheall');
	  		$form->setType('evenement','hidden');
	  	}
	  	if($this->retourformulaire != 'agent_habilitation'){
			$form->setType('condition','selectstatic');
		}
		
		if ($maj==2){ //supprimer
            $form->setType('fichier','filestatic');
        }// fin supprimer
	}

    function setSelect(&$form, $maj,&$db,$debug) {
	 // agent_habilitation
        $this->init_select(
            $form, 
            $this->f->db,
            $maj,
            null,
            "agent_habilitation",
            $this->get_var_sql_forminc__sql("agent_habilitation"),
            $this->get_var_sql_forminc__sql("agent_habilitation_by_id"),
            false
        );
        // condition
        $this->init_select(
            $form, 
            $this->f->db,
            $maj,
            null,
            "condition",
            $this->get_var_sql_forminc__sql("condition"),
            $this->get_var_sql_forminc__sql("condition_by_id"),
            false
        );
        // organisme
        $this->init_select(
            $form, 
            $this->f->db,
            $maj,
            null,
            "organisme",
            $this->get_var_sql_forminc__sql("organisme"),
            $this->get_var_sql_forminc__sql("organisme_by_id"),
            false
        );
        
		$contenu=array();
        $contenu[0][0]="initiale";
        $contenu[1][0]=_("initiale");
        $contenu[0][1]="recyclage";
        $contenu[1][1]=_("recyclage");
        $contenu[0][2]="";
        $contenu[1][2]=_(" ");

        $form->setSelect('type_formation',$contenu);
	}



	function setLayout(&$form, $maj) {
        //Ouverture d'un fieldset
		if ($maj==3){	 
            $form->setBloc('libelle','D',"",'col_4'); // bloc gauche
				$form->setFieldset('libelle','D',_('evenement'), "collapsible"); 		
				$form->setFieldset('observation','F','');
			$form->setBloc('observation','F',''); 
			            
            $form->setBloc('evenement','D',"",'col_8'); // bloc droite
				$form->setFieldset('evenement','D',_('fichier'), "collapsible");
				$form->setFieldset('fichier','F','');    
			$form->setBloc('fichier','F','');
			
        }else{
			
			$form->setFieldset('fichier','D',' '._('evenement').' ', 
			"collapsible");
				$form->setBloc('fichier','D',"","group");
				$form->setBloc('libelle','F');
				$form->setBloc('agent_habilitation','D',"","group");
				$form->setBloc('condition','F');
			$form->setFieldset('condition','F','');		
			
			$form->setFieldset('type_formation','D',' '._('formation').' ',
			 "collapsible");
				$form->setBloc('type_formation','D',"","group");
				$form->setBloc('organisme','F');
			$form->setFieldset('organisme','F','');
			
			$form->setFieldset('date_evenement_debut','D',' '._('date').' ',
			 "collapsible");
				$form->setBloc('date_evenement_debut','D',"","group");
				$form->setBloc('date_evenement_fin','F');
			$form->setFieldset('date_evenement_fin','F','');
			
		$form->setFieldset('date_validite','D',' '._('validite').' ',
		 "startClosed");
			$form->setBloc('date_validite','D',"","group");
			$form->setBloc('forcer_validation','F');
        $form->setFieldset('forcer_validation','F','');
	
		$form->setFieldset('observation','D',' '._('observation').' ',
		 "collapsible");
        $form->setFieldset('observation','F','');							
		}
	}
    
    
    function triggerajouter($id, &$dnu1 = null, $val = array(), $dnu2 = null) {
		$this->valF['date_validite']=$this->calcul_date_validite
		($id, $dnu1, $val, $dnu2 );
		$this->valF['libelle']=$this->set_libelle
		($id, $dnu1, $val, $dnu2 );
    }

	function triggermodifier($id, &$dnu1 = null, $val = array(), $dnu2 = null) {
		$this->valF['date_validite']=$this->calcul_date_validite
		($id, $dnu1, $val, $dnu2 );
		$this->valF['libelle']=$this->set_libelle
		($id, $dnu1, $val, $dnu2 );
    }
    
    function triggersupprimer($id, &$dnu1 = null, $val = array(), $dnu2 = null) {
		$this->calcul_date_habilitation_suppression
		($id, $dnu1 , $val , $dnu2 );
    }

	function triggerajouterapres($id, &$dnu1 = null, $val = array(), $dnu2 = null) {
		$this->calcul_date_habilitation
		($id, $dnu1, $val, $dnu2 );	
    }

    function triggermodifierapres($id, &$dnu1 = null, $val = array(), $dnu2 = null) {
		$this->calcul_date_habilitation
		($id, $dnu1, $val , $dnu2);
    }

    function triggersupprimerapres($id, &$dnu1 = null, $val = array(), $dnu2 = null) {
		$this->calcul_date_habilitation
		($id, $dnu1, $val, $dnu2 );
    }

	// recherche de l'habilitation correspondante a l evenement
	function get_habilitation($id, &$dnu1 = null, $val = array(), $dnu2 = null) {	
		$sql="select habilitation from ".DB_PREFIXE."agent_habilitation ";
		if (isset($this->valF['agent_habilitation']) 
		&& ($this->valF['agent_habilitation'] != null)) {
			$sql .= " where agent_habilitation = "
				.$this->valF['agent_habilitation'];
		}else{
			$sql .= " where agent_habilitation = "
				.$this->get_agent_habilitation($id, $dnu1 , $val , $dnu2 );
		}
		$res=$this->f->db->getOne($sql);
        $this->addToLog(__METHOD__.$sql, VERBOSE_MODE);
        $this->f->isDatabaseError($res);
		return $res;
    }
    
    // recherche agent habilitation
    function get_agent_habilitation($id, &$dnu1 = null, $val = array(), $dnu2 = null) {
		$this->agent_habilitation = $this->getParameter('idxformulaire');
		return $this->agent_habilitation;
			
	}
	
    // Libelle automatique NOM-PRENOM-condition-type
    function set_libelle($id, &$dnu1 = null, $val = array(), $dnu2 = null){
		if ($maj ==1) {
			if ($this->valF['type_formation'] != null){
				$libelle = $this->valF['libelle']."-"
				.substr( $this->valF['type_formation'], 0, 3);   	
			}
		}else {
			$sql = "select libelle from ".DB_PREFIXE.
				"condition where condition.condition = ".$this->valF['condition'];
			$res = $this -> f -> db -> getOne($sql);
			if ($this->f->isDatabaseError($res, true)) {
				// Appel de la methode de recuperation des erreurs
				$this->erreur_db($res->getDebugInfo(), $res->getMessage(), '');
				$res="";
			}
			$sql="select nom, prenom from  ".DB_PREFIXE."agent join ".DB_PREFIXE.
				"agent_habilitation ON agent.agent = agent_habilitation.agent
				WHERE agent_habilitation.agent_habilitation = ".
				$this->get_agent_habilitation($id, $dnu1 , $val , $dnu2 );
			$res2 = $this -> f -> db -> query($sql);
			if ($this->f->isDatabaseError($res2, true)) {
				// Appel de la methode de recuperation des erreurs
				$this->erreur_db($res2->getDebugInfo(), $res2->getMessage(), '');
				$libelle=substr($res, 0, 60);
			}else{
				while ($row=& $res2->fetchRow(DB_FETCHMODE_ASSOC)) {
					$libelle = substr($row['nom'], 0, 
					15)."-".substr($row['prenom'], 0, 10)."-".$res;
				}
				if ($this->valF['type_formation'] != null){
					$libelle = $libelle."-"
						.substr( $this->valF['type_formation'], 0, 3);   	
				}
			}
		}
		$this->valF['libelle'] = $libelle;     
		return $this->valF['libelle'];	
	}

	// calcul de la date de validite de l habilitation
	// en fonction des conditions de l'habilitation
	// on retient la date de l'evenement dont la validite est le plus proche

	function calcul_date_habilitation($id, &$dnu1 = null, $val = array(), $dnu2 = null){
		// recherche des conditions de l habilitation
		$sql = "select condition.condition, condition.libelle from ".DB_PREFIXE.
			"condition where condition.habilitation = ".
		$this->get_habilitation($id, $dnu1 , $val , $dnu2 );	
		// Recupere les habilitations associees a l'habilitation de l'evenement
		$res = $this-> f -> db -> query($sql);
		if (database::isError($res))die($res->getMessage());       
		$date_actuelle = date('Y-m-d');
		$date_habilitation = date('01-01-2099');
		$i=0; //compteur d'erreur
		while ($row=& $res->fetchRow(DB_FETCHMODE_ASSOC)) {
			// Recupere les evenements associes a l'agent_habilitation et la condition
			$sql = "select max(date_validite) from ".DB_PREFIXE.
				"evenement where condition = ".$row['condition'].
				" and agent_habilitation = ".
			$this->get_agent_habilitation($id, $dnu1 , $val , $dnu2 );
			//$this->addToMessage($sql);			
			$res2 = $this -> f-> db -> getOne($sql);
			//$this->addToMessage($res2);
			$this->addToLog(__METHOD__."(): "._("ajout au log"), VERBOSE_MODE);      
			if (database::isError($res2))die($res2->getMessage());
			// Verifie si toutes les habilitations sont remplies
			if ($res2 != null) {
				// Selectionne la date de limite la plus proche
				if ( new DateTime($res2) < new DateTime($date_habilitation)) {
					$date_habilitation = $res2;
				}	
			}else {
				$this->addToMessage(_( 'Il n\'y a pas d\'évenement correspondant à la condition \' ').$row['libelle'].' \'');
				$i++;
			}
		}
		
		if ($i > 0) {
			$date_habilitation = NULL;
			$this->addToMessage(_( 'Il manque ').$i._(' condition(s) la date de validité de l\'agent_habilitation n\'a pas pu être ajoutée'));
		}else{		
			$sql = "UPDATE ".DB_PREFIXE."agent_habilitation SET 
				date_validite_habilitation = '".
				$date_habilitation."' WHERE agent_habilitation = ".
				$this->get_agent_habilitation($id, $dnu1 , $val , $dnu2 );
			$res3 = $this->db->query($sql);
			$this->f->isDatabaseError($res);
			$this->addToLog(__METHOD__."(): "._("ajout au log"), VERBOSE_MODE);
			if ($this->getParameter('maj') <= 1){
				$this->addToMessage(_( 'La date d\'habilitation ').
				$date_habilitation.(' a ete ajoutée.'));
			}else{
				$this->addToMessage(_( 'La date d\'habilitation a ete modifiée pour : ').$date_habilitation);
			}
			//echo "<script  type='text/javascript'>
			//date_validite_habilitation.value = '01/01/2018';
			//alert(date_validite_habilitation.value)</script>";	
		}	 
	}
	
	function calcul_date_habilitation_suppression($id, &$dnu1 = null, $val = array(), $dnu2 = null){
		//echo "<script  type='text/javascript'>alert('xxx');</script>";
		$sql = "SELECT condition FROM ".DB_PREFIXE.
			"evenement WHERE evenement = ".$val['evenement'];
		$res=$this->f->db->getOne($sql);
        $this->addToLog(__METHOD__.$sql, VERBOSE_MODE);
        $this->f->isDatabaseError($res);
        $sql = "select count(evenement) FROM ".DB_PREFIXE.
			"evenement WHERE agent_habilitation = ".
			$this->get_agent_habilitation($id, $dnu1 , $val , $dnu2 ).
			" and condition = ".$res;
        $res2 = $this-> f -> db -> getOne($sql);
        if (database::isError($res2))die($res2->getMessage());       
		// Supprime la date d'habilitation car si l'un des evenements n'existe plus les conditions ne sont pas remplies
		//echo "<script  type='text/javascript'>alert('xxx');</script>";
		if ($res2 == 1) {
			$sql = "UPDATE ".DB_PREFIXE."agent_habilitation SET 
				date_validite_habilitation = NULL WHERE agent_habilitation = "
				.$this->get_agent_habilitation($id, $dnu1 , $val , $dnu2 );
			$res3 = $this -> f -> db -> query($sql);
			$this->addToMessage(_( 'La date d\'habilitation a ete supprimée'));
		}else{
		// sinon recupere la valeur de l'agent_habilitation pour effectuer de 
		//nouveau calcul_date_habilitation()
			$this->agent_habilitation = $this->getVal('agent_habilitation');
			//$this->calcul_date_habilitation($id, $dnu1, $val , $dnu2); 
		}
	}
	

	// en fonction de la duree de la condition en mois
	// il est calcule la date de validite suivant la date debut 
	// ou la date fin de l'evenement si elle existe

	function calcul_date_validite($id, &$dnu1 = null, $val = array(), $dnu2 = null){
		if ($val['forcer_validation'] == 1 || $val['forcer_validation'] == "t" || 
		$val['forcer_validation'] == "Oui") {
			if ($this->valF['date_validite'] == null) {
				$this->valF['date_validite']='2099-01-01'; // pas de date de validite
			}else{
				$this->valF['date_validite'] = $val['date_validite'];
			}
		} else {
			// recherche la duree de la condition correspondante a l'evenement
			$sql = "select duree from ".DB_PREFIXE."condition where condition = ".$val['condition'];
			//$this->addToMessage($sql);
			$res = $this -> f -> db -> getOne($sql);
			$this->f->isDatabaseError($res);
			$this->addToLog(__METHOD__."(): "._("ajout au log"), VERBOSE_MODE);
			$duree = $res;
			//$this->addToMessage($duree);
			// Si il existe une regle on va verifier si
			// cette condition est applicable 
			// si elle est applicable alors la duree = la duree fixee dans la
			// regle
			$sql = "select champ, operateur, valeur, duree, message from ".DB_PREFIXE.
			"regle where condition = ".$val['condition'];
			$res2 = $this -> f -> db -> query($sql);
			$this->f->isDatabaseError($res2);
			$this->addToLog(__METHOD__."(): "._("ajout au log"), VERBOSE_MODE);
			$i=0;
			$contenu=array();
			$contenu2=array();
			while ($row=& $res2->fetchRow(DB_FETCHMODE_ASSOC)) {
				$champ = $row['champ'];
				//$this-> addToMessage($row['champ']);
				$operateur = $row['operateur'];
				$valeur = $row['valeur'];
				$duree_condition = $row['duree'];
				$message = $row['message'];				
				if ($duree_condition != null) {
					if ($champ == 'type') {
						if ($this->getParameter('maj') == 0) {
							if ($valeur == 
							$this->valF['type_formation'])
							{
								$contenu[$i]= $duree_condition;
								$this-> addToMessage($message);	
							}
						}elseif ($this->getParameter('maj') > 0) {
							if ($valeur == $val['type_formation'])
							{
								$contenu[$i]= $duree_condition;
								$this-> addToMessage($message);	
							}
						}
					}
					if ($champ == 'age') {
						$sql="select date_naissance from  ".DB_PREFIXE."agent join ".DB_PREFIXE.
							"agent_habilitation ON agent.agent = agent_habilitation.agent
							WHERE agent_habilitation.agent_habilitation = ".
						$this->get_agent_habilitation($id, $dnu1 , $val , $dnu2 );
						//$this->addToMessage($sql);
						$res4 = $this-> f -> db -> getOne($sql);
						$this->f->isDatabaseError($res4);
						$this->addToLog(__METHOD__."(): "._("ajout au log"), VERBOSE_MODE);
						$date_naissance = $res4;
						$date_actuelle = date('Y-m-d');
						$date1 = date("Y-m-d", strtotime($date_actuelle));
						$date2 = date("Y-m-d", strtotime($date_naissance.
							" +".$valeur." year"));
						//$condition = $date1.$operateur.$date2;
						//$this->addToMessage($condition);
						if ($operateur == '==') {
							if ($date1 == $date2) {
								$contenu2[$i]= $duree_condition;
								$this-> addToMessage($message);	
							}
						} elseif ($operateur == '>') {
							if ($date1 > $date2) {
								$contenu2[$i] = $duree_condition;
								$this-> addToMessage($message);	
							}
						} elseif ($operateur == '>=') {
							if ($date1 >= $date2) {
								$contenu2[$i] = $duree_condition;
								$this-> addToMessage($message);	
							}
						} elseif ($operateur == '<') {
							if ($date1 < $date2) {
								$contenu2[$i] = $duree_condition;
								$this-> addToMessage($message);	
							}
						} elseif ($operateur == '<=') {
							if ($date1 <= $date2) {
								$contenu2[$i] = $duree_condition;
								$this-> addToMessage($message);	
							}
						}
					}
					// selectionne la plus petite duree de validite pour age et type
					if ($contenu != null) {
						$duree_age = min($contenu);
					}
					if ($contenu2 != null) {
						$duree_type = min($contenu2);
					}
				}
			}
			// si il y'a des condition age ou type $duree devient la plus petite
			// duree de validité
			if (($duree_age != null) OR ($duree_type != null)) {
				if (($duree_age != null) AND ($duree_type != null)) {
					$duree = min($duree_age, $duree_type);	
				}elseif ($duree_age == null) {
					$duree = $duree_type;
				}elseif ($duree_type == null) {
					$duree = $duree_age;
				}
			}			
			if($duree == ""){
				$this->valF['date_validite']='2099-01-01'; // pas de date de validite
			}else{	
				// Ajoute la duree a la date de l'evenement		
				if ($this->valF['date_evenement_fin'] != null) {
					$this->valF['date_validite'] = date("Y-m-d", strtotime($this->valF['date_evenement_fin'].
					" +".$duree." month"));
				}else{
					$this->valF['date_validite'] = date("Y-m-d", strtotime($this->valF['date_evenement_debut'].
					" +".$duree." month"));			
				}
				$this->addToMessage(_( 'La durée ajoutée est de ').$duree.' mois.');

			}
		}	
		return $this->valF['date_validite'];		
	}
	
}// fin classe
?>

