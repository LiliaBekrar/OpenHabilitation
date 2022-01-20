<?php
//$Id$ 
//gen openMairie le 04/07/2018 10:33

require_once "../gen/obj/agent_habilitation.class.php";

class agent_habilitation  extends agent_habilitation_gen  {


    function get_var_sql_forminc__sql_agent() {
        return "SELECT agent.agent, concat(agent.nom,' ',agent.prenom) as lib FROM ".
        DB_PREFIXE."agent ORDER BY agent.nom ASC";
    }

    function get_var_sql_forminc__sql_agent_by_id() {
        return "SELECT agent.agent, concat(agent.nom,' ',agent.prenom) as lib FROM ".
        DB_PREFIXE."agent WHERE agent = <idx>";
    }
    
    function get_var_sql_forminc__sql_habilitation() {
        return "SELECT habilitation.habilitation, habilitation.libelle FROM ".DB_PREFIXE.
        "habilitation WHERE archive is not true ORDER BY habilitation.libelle ASC";
    }

    function get_var_sql_forminc__sql_habilitation_by_id() {
        return "SELECT habilitation.habilitation, habilitation.libelle FROM ".DB_PREFIXE.
        "habilitation WHERE habilitation = <idx> AND archive is not true";
    }

    function setType(&$form, $maj) {
		parent::setType($form, $maj);
		
        if ($maj == 1 ) {
            $form->setType("observation", "html");
            $form->setType("agent", "selecthiddenstatic");
            $form->setType("habilitation", "selecthiddenstatic");
        }
        
        if ($maj == 0 ) {
            $form->setType("observation", "html");
            $form->setType("libelle", "hidden");
            $form->setType("date_validite_habilitation", "hidden");
            $form->setType("archive", "hidden");
        }
    }   
    
	function setLib(&$form, $maj) {
		parent::setLib($form,$maj);
        $form->setLib('libelle','');
        $form->setLib('agent', '');
        $form->setLib('agent_habilitation', '');
        $form->setLib('habilitation', '');
        $form->setLib('observation', '');
        $form->setLib('archive', _('Archive'));
        $form->setLib('date_validite_habilitation', '');
    }  

    function setLayout(&$form, $maj) {
		
		if($maj==0){
			$form->setFieldset('agent','D',' '._('agent-habilitation').' ', "collapsible");
				$form->setBloc('agent','D',"","group");
				$form->setBloc('habilitation','F');
			$form->setFieldset('habilitation','F','');		
			
		}else{
        $form->setFieldset('agent_habilitation','D',' '._('agent habilitation').' ', "collapsible");
            $form->setBloc('agent_habilitation','D',"","group");
            $form->setBloc('libelle','F');
            $form->setBloc('agent','D',"","group");
            $form->setBloc('habilitation','F');
        $form->setFieldset('habilitation','F','');			
			
		}
		$form->setFieldset('observation','D',' '._('observation').' ', "collapsible");
        $form->setFieldset('observation','F','');
        
        $form->setFieldset('archive','D',' '._('date de validite').' ', "startClosed");
        $form->setFieldset('date_validite_habilitation','F','');
        
	}

    
    function triggerajouter($id, &$dnu1 = null, $val = array(), $dnu2 = null) {
		$this->valF['libelle']=$this->set_libelle($id, $dnu1, $val, $dnu2 );
    }
    
    
    function verifier($val = array(), &$dnu1 = null, $dnu2 = null) {
        parent::verifier($val);
        if ($this->getParameter('maj') < 2) {
			$sql = "select habilitation, agent from ".DB_PREFIXE."agent_habilitation 
				where habilitation = ".$this->valF['habilitation']." AND agent = "
				.$this->valF['agent']." AND archive is not true";
			$res = $this -> f -> db -> query($sql);
			$this->f->isDatabaseError($res);
			$this->addToLog(__METHOD__."(): "._("ajout au log"), VERBOSE_MODE);
			if ($this->getParameter('maj') == 0) {
				$nmb = 1;
			}else {
				$nmb = 2;
			}
			if ($res->numrows() >= $nmb ) {
				$this->correct = false;
				$this->addToMessage(_( 'Il existe déjà un évenement non archivé
				 correspondant à l\'agent ').$this->valF['agent'].
				_( ' et à l\'habilitation ').$this->valF['habilitation']);
			}
		}
	}
	
    // Libelle automatique NOM-PRENOM-habilitation
	function set_libelle($id, &$dnu1 = null, $val = array(), $dnu2 = null){
		$sql = "select libelle from ".DB_PREFIXE."habilitation where habilitation.habilitation = ".
				$this->valF['habilitation'];
		$res = $this -> f -> db -> getOne($sql);
		// erreur ?
        if ($this->f->isDatabaseError($res, true)) {
			// Appel de la methode de recuperation des erreurs
            $this->erreur_db($res->getDebugInfo(), $res->getMessage(), '');
            $res="";
        }
		$sql="select nom, prenom from  ".DB_PREFIXE."agent WHERE agent.agent = ".
				$this->valF['agent'];
		$res2 = $this -> f -> db -> query($sql);
        if ($this->f->isDatabaseError($res2, true)) {
			// Appel de la methode de recuperation des erreurs
            $this->erreur_db($res2->getDebugInfo(), $res2->getMessage(), '');
            $libelle=substr($res, 0, 35);
        }else{
			while ($row=& $res2->fetchRow(DB_FETCHMODE_ASSOC)) {
				$libelle = substr($row['nom'], 0, 
				15)."-".substr($row['prenom'], 0, 10)."-".substr($res, 0, 35);
			}
		}
		$this->valF['libelle'] = $libelle;     
		return $this->valF['libelle'];
	}  

}

?>
