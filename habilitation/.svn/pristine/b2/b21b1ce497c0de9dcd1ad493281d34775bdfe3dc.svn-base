<?php
//$Id$ 
//gen openMairie le 04/07/2018 10:33

require_once "../gen/obj/agent.class.php";

class agent extends agent_gen {

	/* surcharge DBForm pour suppression en cascade des enregistrements de la cle secondaire
	 * 
     * Cette methode permet de rechercher les enregistrements
     * ayant le champ 'field' correspondant a la valeur 'id' dans la table
     * 'table'. Si il y a des enregistrements, alors ils sont supprimés 
     * via la méthode 'supprimer' et
     * l'attribut 'correct' de l'objet reste à true 
     * un message supplementaire est
     * ajoute a l'attribut msg de l'objet pour indiquer la suppression
     * de ces enregistrements.
     *
     * Cette methode est principalement destinee a etre appellee depuis la
     * methode cleSecondaire.
     *
     * @param null &$dnu1 @deprecated  Ne pas utiliser.
     * @param string $table
     * @param string $field
     * @param string $id
     * @param null $dnu2 @deprecated  Ne pas utiliser.
     * @param string $selection
     *
     * @return void
     */
    function rechercheTable(&$dnu1 = null, $table, $field, $id, $dnu2 = null, $selection = "") {
        //
        $sql = "select count(*) from ".DB_PREFIXE.$table." ";
        if ($this->typeCle == "A") {
            $sql .= "where ".$field."='".$id."' ";
        } else {
            $sql .= "where ".$field."=".$id." ";
        }
        $sql .= $selection;

        // Exécution de la requête
        $nb = $this->f->db->getone($sql);
        // Logger
        $this->addToLog(__METHOD__."(): db->getone(\"".$sql."\");", VERBOSE_MODE);
        // Vérification d'une éventuelle erreur de base de données
        $this->f->isDatabaseError($nb);

        //
        if ($nb > 0) { //alors supprimer ces enregistrements dans la table secondaire
            //$this->correct = false;
            $this->msg .= $nb." ";
            $this->msg .= __("enregistrement(s) lie(s) a cet enregistrement dans la table");
            $this->msg .= " ".$table."<br />";
 
			$sql = "select ".$field." from ".DB_PREFIXE.$table." ";
			if ($this->typeCle == "A") {
				$sql .= "where ".$field."='".$id."' ";
			} else {
				$sql .= "where ".$field."=".$id." ";
			}
			$sql .= $selection;
			// Execution de la requete a partir de l'enregistrement $premier avec
			// la limite $this->serie
			$res = $db->limitquery($sql, intval($this->getParam("premier")), $this->serie);
			// Logger
			$this->addToLog(__METHOD__."(): db->limitquery(\"".$sql."\", ".intval($this->getParam("premier")).", ".$this->serie.");", VERBOSE_MODE);

			// Verification d'erreur sur le resultat de la requete
			$this->f->isDatabaseError($res);
 
			// Boucle sur les resultats de la requete
			while ($row =& $res->fetchRow()) {
				
				//on instancie une classe $table
				$enr = this->f->get_inst__om_dbform(array(
                    "obj" => $table,
                    "idx" => $row,
                ));
 
				//$value_enr = array($this->table_om_utilisateur_field_id => $user[$this->table_om_utilisateur_field_id], );
 
 
 
                
                // Supprime l'enregistrement
                $enr->supprimer($value_enr, $this->db, DEBUG);
			}
		}
    }
	// debrayage de la condition exist ver 4.9 pour action 1 2 et 3 **
    function exists() {
        //if (!isset($this->val[0]) || $this->val[0] == "") {
        //    return false;
        //}
        return true;
    }


    function get_var_sql_forminc__champs() {
        return array(
			"'' as search_agent",
			"agent",
            "matricule",
            "nom",
            "prenom",
            "nomjf",
            "date_naissance",
            "service",
			"poste",
            "'' as web_agent",
        );
    }

    function setType(&$form, $maj) {
		parent::setType($form, $maj);
		$form->setType("web_agent", "hidden");
        if ($maj == 1 ) {
            $form->setType("search_agent", "hidden");
        }
        if ($maj == 3 ) {
            $form->setType("search_agent", "hidden");
        }
    }   
    
    function setLib(&$form, $maj) {
		parent::setLib($form, $maj);
        $form->setLib('agent', __('Agent'));
        $form->setLib('nom', __('Nom'));
        $form->setLib('prenom', __('Prenom'));
        $form->setLib('nomjf', __('nomjf'));
        $form->setLib('matricule', __('Matricule'));
        $form->setLib('date_naissance', __('Date de naissance'));
        $form->setLib('service', __('Service'));
    }
    
    function set_form_default_values(&$form, $maj, $validation) { 
		if($validation==0) {
			if($this->f->getParameter("web_agent") != '') {
				//$this->addToMessage($this->f->getParameter('web_agent'));
				$web_agent = Trim($this->f->getParameter("web_agent"));
			} else {
				$web_agent = "http://glenan.ville-arles.fr/web_service/rh/transfert_oci_json.php?champ=nom";
			}
			$form->setVal('web_agent', $web_agent);
		}
	}
}

?>
