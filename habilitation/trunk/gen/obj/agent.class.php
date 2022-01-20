<?php
//$Id$ 
//gen openMairie le 13/06/2019 10:59

require_once PATH_OPENMAIRIE."om_dbform.class.php";

class agent_gen extends dbform {

    protected $_absolute_class_name = "agent";

    var $table = "agent";
    var $clePrimaire = "agent";
    var $typeCle = "N";
    var $required_field = array(
        "agent",
        "matricule",
        "nom",
        "prenom",
        "service"
    );
    
    var $foreign_keys_extended = array(
        "poste" => array("poste", ),
        "service" => array("service", ),
    );
    
    /**
     *
     * @return string
     */
    function get_default_libelle() {
        return $this->getVal($this->clePrimaire)."&nbsp;".$this->getVal("nom");
    }

    /**
     *
     * @return array
     */
    function get_var_sql_forminc__champs() {
        return array(
            "agent",
            "nom",
            "prenom",
            "nomjf",
            "matricule",
            "date_naissance",
            "service",
            "poste",
        );
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_poste() {
        return "SELECT poste.poste, poste.libelle FROM ".DB_PREFIXE."poste ORDER BY poste.libelle ASC";
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_poste_by_id() {
        return "SELECT poste.poste, poste.libelle FROM ".DB_PREFIXE."poste WHERE poste = <idx>";
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_service() {
        return "SELECT service.service, service.libelle FROM ".DB_PREFIXE."service ORDER BY service.libelle ASC";
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_service_by_id() {
        return "SELECT service.service, service.libelle FROM ".DB_PREFIXE."service WHERE service = <idx>";
    }




    function setvalF($val = array()) {
        //affectation valeur formulaire
        if (!is_numeric($val['agent'])) {
            $this->valF['agent'] = ""; // -> requis
        } else {
            $this->valF['agent'] = $val['agent'];
        }
        $this->valF['nom'] = $val['nom'];
        $this->valF['prenom'] = $val['prenom'];
        if ($val['nomjf'] == "") {
            $this->valF['nomjf'] = NULL;
        } else {
            $this->valF['nomjf'] = $val['nomjf'];
        }
        $this->valF['matricule'] = $val['matricule'];
        if ($val['date_naissance'] != "") {
            $this->valF['date_naissance'] = $this->dateDB($val['date_naissance']);
        } else {
            $this->valF['date_naissance'] = NULL;
        }
        if (!is_numeric($val['service'])) {
            $this->valF['service'] = ""; // -> requis
        } else {
            $this->valF['service'] = $val['service'];
        }
        if (!is_numeric($val['poste'])) {
            $this->valF['poste'] = NULL;
        } else {
            $this->valF['poste'] = $val['poste'];
        }
    }

    //=================================================
    //cle primaire automatique [automatic primary key]
    //==================================================

    function setId(&$dnu1 = null) {
    //numero automatique
        $this->valF[$this->clePrimaire] = $this->f->db->nextId(DB_PREFIXE.$this->table);
    }

    function setValFAjout($val = array()) {
    //numero automatique -> pas de controle ajout cle primaire
    }

    function verifierAjout($val = array(), &$dnu1 = null) {
    //numero automatique -> pas de verfication de cle primaire
    }

    //==========================
    // Formulaire  [form]
    //==========================
    /**
     *
     */
    function setType(&$form, $maj) {
        // Récupération du mode de l'action
        $crud = $this->get_action_crud($maj);

        // MODE AJOUTER
        if ($maj == 0 || $crud == 'create') {
            $form->setType("agent", "hidden");
            $form->setType("nom", "text");
            $form->setType("prenom", "text");
            $form->setType("nomjf", "text");
            $form->setType("matricule", "text");
            $form->setType("date_naissance", "date");
            if ($this->is_in_context_of_foreign_key("service", $this->retourformulaire)) {
                $form->setType("service", "selecthiddenstatic");
            } else {
                $form->setType("service", "select");
            }
            if ($this->is_in_context_of_foreign_key("poste", $this->retourformulaire)) {
                $form->setType("poste", "selecthiddenstatic");
            } else {
                $form->setType("poste", "select");
            }
        }

        // MDOE MODIFIER
        if ($maj == 1 || $crud == 'update') {
            $form->setType("agent", "hiddenstatic");
            $form->setType("nom", "text");
            $form->setType("prenom", "text");
            $form->setType("nomjf", "text");
            $form->setType("matricule", "text");
            $form->setType("date_naissance", "date");
            if ($this->is_in_context_of_foreign_key("service", $this->retourformulaire)) {
                $form->setType("service", "selecthiddenstatic");
            } else {
                $form->setType("service", "select");
            }
            if ($this->is_in_context_of_foreign_key("poste", $this->retourformulaire)) {
                $form->setType("poste", "selecthiddenstatic");
            } else {
                $form->setType("poste", "select");
            }
        }

        // MODE SUPPRIMER
        if ($maj == 2 || $crud == 'delete') {
            $form->setType("agent", "hiddenstatic");
            $form->setType("nom", "hiddenstatic");
            $form->setType("prenom", "hiddenstatic");
            $form->setType("nomjf", "hiddenstatic");
            $form->setType("matricule", "hiddenstatic");
            $form->setType("date_naissance", "hiddenstatic");
            $form->setType("service", "selectstatic");
            $form->setType("poste", "selectstatic");
        }

        // MODE CONSULTER
        if ($maj == 3 || $crud == 'read') {
            $form->setType("agent", "static");
            $form->setType("nom", "static");
            $form->setType("prenom", "static");
            $form->setType("nomjf", "static");
            $form->setType("matricule", "static");
            $form->setType("date_naissance", "datestatic");
            $form->setType("service", "selectstatic");
            $form->setType("poste", "selectstatic");
        }

    }


    function setOnchange(&$form, $maj) {
    //javascript controle client
        $form->setOnchange('agent','VerifNum(this)');
        $form->setOnchange('date_naissance','fdate(this)');
        $form->setOnchange('service','VerifNum(this)');
        $form->setOnchange('poste','VerifNum(this)');
    }
    /**
     * Methode setTaille
     */
    function setTaille(&$form, $maj) {
        $form->setTaille("agent", 11);
        $form->setTaille("nom", 30);
        $form->setTaille("prenom", 30);
        $form->setTaille("nomjf", 30);
        $form->setTaille("matricule", 10);
        $form->setTaille("date_naissance", 12);
        $form->setTaille("service", 11);
        $form->setTaille("poste", 11);
    }

    /**
     * Methode setMax
     */
    function setMax(&$form, $maj) {
        $form->setMax("agent", 11);
        $form->setMax("nom", 100);
        $form->setMax("prenom", 100);
        $form->setMax("nomjf", 100);
        $form->setMax("matricule", 10);
        $form->setMax("date_naissance", 12);
        $form->setMax("service", 11);
        $form->setMax("poste", 11);
    }


    function setLib(&$form, $maj) {
    //libelle des champs
        $form->setLib('agent', __('agent'));
        $form->setLib('nom', __('nom'));
        $form->setLib('prenom', __('prenom'));
        $form->setLib('nomjf', __('nomjf'));
        $form->setLib('matricule', __('matricule'));
        $form->setLib('date_naissance', __('date_naissance'));
        $form->setLib('service', __('service'));
        $form->setLib('poste', __('poste'));
    }
    /**
     *
     */
    function setSelect(&$form, $maj, &$dnu1 = null, $dnu2 = null) {

        // poste
        $this->init_select(
            $form, 
            $this->f->db,
            $maj,
            null,
            "poste",
            $this->get_var_sql_forminc__sql("poste"),
            $this->get_var_sql_forminc__sql("poste_by_id"),
            false
        );
        // service
        $this->init_select(
            $form, 
            $this->f->db,
            $maj,
            null,
            "service",
            $this->get_var_sql_forminc__sql("service"),
            $this->get_var_sql_forminc__sql("service_by_id"),
            false
        );
    }


    //==================================
    // sous Formulaire
    //==================================
    

    function setValsousformulaire(&$form, $maj, $validation, $idxformulaire, $retourformulaire, $typeformulaire, &$dnu1 = null, $dnu2 = null) {
        $this->retourformulaire = $retourformulaire;
        if($validation == 0) {
            if($this->is_in_context_of_foreign_key('poste', $this->retourformulaire))
                $form->setVal('poste', $idxformulaire);
            if($this->is_in_context_of_foreign_key('service', $this->retourformulaire))
                $form->setVal('service', $idxformulaire);
        }// fin validation
        $this->set_form_default_values($form, $maj, $validation);
    }// fin setValsousformulaire

    //==================================
    // cle secondaire
    //==================================
    
    /**
     * Methode clesecondaire
     */
    function cleSecondaire($id, &$dnu1 = null, $val = array(), $dnu2 = null) {
        // On appelle la methode de la classe parent
        parent::cleSecondaire($id);
        // Verification de la cle secondaire : agent_habilitation
        $this->rechercheTable($this->f->db, "agent_habilitation", "agent", $id);
    }


}
