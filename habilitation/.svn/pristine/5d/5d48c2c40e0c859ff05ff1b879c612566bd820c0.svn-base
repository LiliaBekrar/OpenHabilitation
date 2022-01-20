<?php
//$Id$ 
//gen openMairie le 21/05/2019 15:36

require_once PATH_OPENMAIRIE."om_dbform.class.php";

class agent_habilitation_gen extends dbform {

    protected $_absolute_class_name = "agent_habilitation";

    var $table = "agent_habilitation";
    var $clePrimaire = "agent_habilitation";
    var $typeCle = "N";
    var $required_field = array(
        "agent",
        "agent_habilitation",
        "habilitation"
    );
    
    var $foreign_keys_extended = array(
        "agent" => array("agent", ),
        "habilitation" => array("habilitation", ),
    );
    
    /**
     *
     * @return string
     */
    function get_default_libelle() {
        return $this->getVal($this->clePrimaire)."&nbsp;".$this->getVal("libelle");
    }

    /**
     *
     * @return array
     */
    function get_var_sql_forminc__champs() {
        return array(
            "agent_habilitation",
            "libelle",
            "agent",
            "habilitation",
            "observation",
            "archive",
            "date_validite_habilitation",
        );
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_agent() {
        return "SELECT agent.agent, agent.nom FROM ".DB_PREFIXE."agent ORDER BY agent.nom ASC";
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_agent_by_id() {
        return "SELECT agent.agent, agent.nom FROM ".DB_PREFIXE."agent WHERE agent = <idx>";
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_habilitation() {
        return "SELECT habilitation.habilitation, habilitation.libelle FROM ".DB_PREFIXE."habilitation ORDER BY habilitation.libelle ASC";
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_habilitation_by_id() {
        return "SELECT habilitation.habilitation, habilitation.libelle FROM ".DB_PREFIXE."habilitation WHERE habilitation = <idx>";
    }




    function setvalF($val = array()) {
        //affectation valeur formulaire
        if (!is_numeric($val['agent_habilitation'])) {
            $this->valF['agent_habilitation'] = ""; // -> requis
        } else {
            $this->valF['agent_habilitation'] = $val['agent_habilitation'];
        }
        if ($val['libelle'] == "") {
            $this->valF['libelle'] = NULL;
        } else {
            $this->valF['libelle'] = $val['libelle'];
        }
        if (!is_numeric($val['agent'])) {
            $this->valF['agent'] = ""; // -> requis
        } else {
            $this->valF['agent'] = $val['agent'];
        }
        if (!is_numeric($val['habilitation'])) {
            $this->valF['habilitation'] = ""; // -> requis
        } else {
            $this->valF['habilitation'] = $val['habilitation'];
        }
            $this->valF['observation'] = $val['observation'];
        if ($val['archive'] == 1 || $val['archive'] == "t" || $val['archive'] == "Oui") {
            $this->valF['archive'] = true;
        } else {
            $this->valF['archive'] = false;
        }
        if ($val['date_validite_habilitation'] != "") {
            $this->valF['date_validite_habilitation'] = $this->dateDB($val['date_validite_habilitation']);
        } else {
            $this->valF['date_validite_habilitation'] = NULL;
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
            $form->setType("agent_habilitation", "hidden");
            $form->setType("libelle", "text");
            if ($this->is_in_context_of_foreign_key("agent", $this->retourformulaire)) {
                $form->setType("agent", "selecthiddenstatic");
            } else {
                $form->setType("agent", "select");
            }
            if ($this->is_in_context_of_foreign_key("habilitation", $this->retourformulaire)) {
                $form->setType("habilitation", "selecthiddenstatic");
            } else {
                $form->setType("habilitation", "select");
            }
            $form->setType("observation", "textarea");
            $form->setType("archive", "checkbox");
            $form->setType("date_validite_habilitation", "date");
        }

        // MDOE MODIFIER
        if ($maj == 1 || $crud == 'update') {
            $form->setType("agent_habilitation", "hiddenstatic");
            $form->setType("libelle", "text");
            if ($this->is_in_context_of_foreign_key("agent", $this->retourformulaire)) {
                $form->setType("agent", "selecthiddenstatic");
            } else {
                $form->setType("agent", "select");
            }
            if ($this->is_in_context_of_foreign_key("habilitation", $this->retourformulaire)) {
                $form->setType("habilitation", "selecthiddenstatic");
            } else {
                $form->setType("habilitation", "select");
            }
            $form->setType("observation", "textarea");
            $form->setType("archive", "checkbox");
            $form->setType("date_validite_habilitation", "date");
        }

        // MODE SUPPRIMER
        if ($maj == 2 || $crud == 'delete') {
            $form->setType("agent_habilitation", "hiddenstatic");
            $form->setType("libelle", "hiddenstatic");
            $form->setType("agent", "selectstatic");
            $form->setType("habilitation", "selectstatic");
            $form->setType("observation", "hiddenstatic");
            $form->setType("archive", "hiddenstatic");
            $form->setType("date_validite_habilitation", "hiddenstatic");
        }

        // MODE CONSULTER
        if ($maj == 3 || $crud == 'read') {
            $form->setType("agent_habilitation", "static");
            $form->setType("libelle", "static");
            $form->setType("agent", "selectstatic");
            $form->setType("habilitation", "selectstatic");
            $form->setType("observation", "textareastatic");
            $form->setType("archive", "checkboxstatic");
            $form->setType("date_validite_habilitation", "datestatic");
        }

    }


    function setOnchange(&$form, $maj) {
    //javascript controle client
        $form->setOnchange('agent_habilitation','VerifNum(this)');
        $form->setOnchange('agent','VerifNum(this)');
        $form->setOnchange('habilitation','VerifNum(this)');
        $form->setOnchange('date_validite_habilitation','fdate(this)');
    }
    /**
     * Methode setTaille
     */
    function setTaille(&$form, $maj) {
        $form->setTaille("agent_habilitation", 11);
        $form->setTaille("libelle", 30);
        $form->setTaille("agent", 11);
        $form->setTaille("habilitation", 11);
        $form->setTaille("observation", 80);
        $form->setTaille("archive", 1);
        $form->setTaille("date_validite_habilitation", 12);
    }

    /**
     * Methode setMax
     */
    function setMax(&$form, $maj) {
        $form->setMax("agent_habilitation", 11);
        $form->setMax("libelle", 60);
        $form->setMax("agent", 11);
        $form->setMax("habilitation", 11);
        $form->setMax("observation", 6);
        $form->setMax("archive", 1);
        $form->setMax("date_validite_habilitation", 12);
    }


    function setLib(&$form, $maj) {
    //libelle des champs
        $form->setLib('agent_habilitation', __('agent_habilitation'));
        $form->setLib('libelle', __('libelle'));
        $form->setLib('agent', __('agent'));
        $form->setLib('habilitation', __('habilitation'));
        $form->setLib('observation', __('observation'));
        $form->setLib('archive', __('archive'));
        $form->setLib('date_validite_habilitation', __('date_validite_habilitation'));
    }
    /**
     *
     */
    function setSelect(&$form, $maj, &$dnu1 = null, $dnu2 = null) {

        // agent
        $this->init_select(
            $form, 
            $this->f->db,
            $maj,
            null,
            "agent",
            $this->get_var_sql_forminc__sql("agent"),
            $this->get_var_sql_forminc__sql("agent_by_id"),
            false
        );
        // habilitation
        $this->init_select(
            $form, 
            $this->f->db,
            $maj,
            null,
            "habilitation",
            $this->get_var_sql_forminc__sql("habilitation"),
            $this->get_var_sql_forminc__sql("habilitation_by_id"),
            false
        );
    }


    //==================================
    // sous Formulaire
    //==================================
    

    function setValsousformulaire(&$form, $maj, $validation, $idxformulaire, $retourformulaire, $typeformulaire, &$dnu1 = null, $dnu2 = null) {
        $this->retourformulaire = $retourformulaire;
        if($validation == 0) {
            if($this->is_in_context_of_foreign_key('agent', $this->retourformulaire))
                $form->setVal('agent', $idxformulaire);
            if($this->is_in_context_of_foreign_key('habilitation', $this->retourformulaire))
                $form->setVal('habilitation', $idxformulaire);
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
        // Verification de la cle secondaire : evenement
        $this->rechercheTable($this->f->db, "evenement", "agent_habilitation", $id);
    }


}
