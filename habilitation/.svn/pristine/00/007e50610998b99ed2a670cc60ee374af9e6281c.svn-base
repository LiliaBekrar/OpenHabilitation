<?php
//$Id$ 
//gen openMairie le 13/05/2019 14:25

require_once PATH_OPENMAIRIE."om_dbform.class.php";

class evenement_gen extends dbform {

    protected $_absolute_class_name = "evenement";

    var $table = "evenement";
    var $clePrimaire = "evenement";
    var $typeCle = "N";
    var $required_field = array(
        "agent_habilitation",
        "condition",
        "date_evenement_debut",
        "evenement",
        "libelle"
    );
    
    var $foreign_keys_extended = array(
        "agent_habilitation" => array("agent_habilitation", ),
        "condition" => array("condition", ),
        "organisme" => array("organisme", ),
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
            "evenement",
            "libelle",
            "agent_habilitation",
            "condition",
            "organisme",
            "fichier",
            "date_evenement_debut",
            "date_evenement_fin",
            "date_validite",
            "type_formation",
            "observation",
            "forcer_validation",
        );
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_agent_habilitation() {
        return "SELECT agent_habilitation.agent_habilitation, agent_habilitation.libelle FROM ".DB_PREFIXE."agent_habilitation ORDER BY agent_habilitation.libelle ASC";
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_agent_habilitation_by_id() {
        return "SELECT agent_habilitation.agent_habilitation, agent_habilitation.libelle FROM ".DB_PREFIXE."agent_habilitation WHERE agent_habilitation = <idx>";
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_condition() {
        return "SELECT condition.condition, condition.libelle FROM ".DB_PREFIXE."condition ORDER BY condition.libelle ASC";
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_condition_by_id() {
        return "SELECT condition.condition, condition.libelle FROM ".DB_PREFIXE."condition WHERE condition = <idx>";
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_organisme() {
        return "SELECT organisme.organisme, organisme.libelle FROM ".DB_PREFIXE."organisme ORDER BY organisme.libelle ASC";
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_organisme_by_id() {
        return "SELECT organisme.organisme, organisme.libelle FROM ".DB_PREFIXE."organisme WHERE organisme = <idx>";
    }




    function setvalF($val = array()) {
        //affectation valeur formulaire
        if (!is_numeric($val['evenement'])) {
            $this->valF['evenement'] = ""; // -> requis
        } else {
            $this->valF['evenement'] = $val['evenement'];
        }
        $this->valF['libelle'] = $val['libelle'];
        if (!is_numeric($val['agent_habilitation'])) {
            $this->valF['agent_habilitation'] = ""; // -> requis
        } else {
            $this->valF['agent_habilitation'] = $val['agent_habilitation'];
        }
        if (!is_numeric($val['condition'])) {
            $this->valF['condition'] = ""; // -> requis
        } else {
            $this->valF['condition'] = $val['condition'];
        }
        if (!is_numeric($val['organisme'])) {
            $this->valF['organisme'] = NULL;
        } else {
            $this->valF['organisme'] = $val['organisme'];
        }
        if ($val['fichier'] == "") {
            $this->valF['fichier'] = NULL;
        } else {
            $this->valF['fichier'] = $val['fichier'];
        }
        if ($val['date_evenement_debut'] != "") {
            $this->valF['date_evenement_debut'] = $this->dateDB($val['date_evenement_debut']);
        }
        if ($val['date_evenement_fin'] != "") {
            $this->valF['date_evenement_fin'] = $this->dateDB($val['date_evenement_fin']);
        } else {
            $this->valF['date_evenement_fin'] = NULL;
        }
        if ($val['date_validite'] != "") {
            $this->valF['date_validite'] = $this->dateDB($val['date_validite']);
        } else {
            $this->valF['date_validite'] = NULL;
        }
        if ($val['type_formation'] == "") {
            $this->valF['type_formation'] = NULL;
        } else {
            $this->valF['type_formation'] = $val['type_formation'];
        }
            $this->valF['observation'] = $val['observation'];
        if ($val['forcer_validation'] == 1 || $val['forcer_validation'] == "t" || $val['forcer_validation'] == "Oui") {
            $this->valF['forcer_validation'] = true;
        } else {
            $this->valF['forcer_validation'] = false;
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
            $form->setType("evenement", "hidden");
            $form->setType("libelle", "text");
            if ($this->is_in_context_of_foreign_key("agent_habilitation", $this->retourformulaire)) {
                $form->setType("agent_habilitation", "selecthiddenstatic");
            } else {
                $form->setType("agent_habilitation", "select");
            }
            if ($this->is_in_context_of_foreign_key("condition", $this->retourformulaire)) {
                $form->setType("condition", "selecthiddenstatic");
            } else {
                $form->setType("condition", "select");
            }
            if ($this->is_in_context_of_foreign_key("organisme", $this->retourformulaire)) {
                $form->setType("organisme", "selecthiddenstatic");
            } else {
                $form->setType("organisme", "select");
            }
            $form->setType("fichier", "text");
            $form->setType("date_evenement_debut", "date");
            $form->setType("date_evenement_fin", "date");
            $form->setType("date_validite", "date");
            $form->setType("type_formation", "text");
            $form->setType("observation", "textarea");
            $form->setType("forcer_validation", "checkbox");
        }

        // MDOE MODIFIER
        if ($maj == 1 || $crud == 'update') {
            $form->setType("evenement", "hiddenstatic");
            $form->setType("libelle", "text");
            if ($this->is_in_context_of_foreign_key("agent_habilitation", $this->retourformulaire)) {
                $form->setType("agent_habilitation", "selecthiddenstatic");
            } else {
                $form->setType("agent_habilitation", "select");
            }
            if ($this->is_in_context_of_foreign_key("condition", $this->retourformulaire)) {
                $form->setType("condition", "selecthiddenstatic");
            } else {
                $form->setType("condition", "select");
            }
            if ($this->is_in_context_of_foreign_key("organisme", $this->retourformulaire)) {
                $form->setType("organisme", "selecthiddenstatic");
            } else {
                $form->setType("organisme", "select");
            }
            $form->setType("fichier", "text");
            $form->setType("date_evenement_debut", "date");
            $form->setType("date_evenement_fin", "date");
            $form->setType("date_validite", "date");
            $form->setType("type_formation", "text");
            $form->setType("observation", "textarea");
            $form->setType("forcer_validation", "checkbox");
        }

        // MODE SUPPRIMER
        if ($maj == 2 || $crud == 'delete') {
            $form->setType("evenement", "hiddenstatic");
            $form->setType("libelle", "hiddenstatic");
            $form->setType("agent_habilitation", "selectstatic");
            $form->setType("condition", "selectstatic");
            $form->setType("organisme", "selectstatic");
            $form->setType("fichier", "hiddenstatic");
            $form->setType("date_evenement_debut", "hiddenstatic");
            $form->setType("date_evenement_fin", "hiddenstatic");
            $form->setType("date_validite", "hiddenstatic");
            $form->setType("type_formation", "hiddenstatic");
            $form->setType("observation", "hiddenstatic");
            $form->setType("forcer_validation", "hiddenstatic");
        }

        // MODE CONSULTER
        if ($maj == 3 || $crud == 'read') {
            $form->setType("evenement", "static");
            $form->setType("libelle", "static");
            $form->setType("agent_habilitation", "selectstatic");
            $form->setType("condition", "selectstatic");
            $form->setType("organisme", "selectstatic");
            $form->setType("fichier", "static");
            $form->setType("date_evenement_debut", "datestatic");
            $form->setType("date_evenement_fin", "datestatic");
            $form->setType("date_validite", "datestatic");
            $form->setType("type_formation", "static");
            $form->setType("observation", "textareastatic");
            $form->setType("forcer_validation", "checkboxstatic");
        }

    }


    function setOnchange(&$form, $maj) {
    //javascript controle client
        $form->setOnchange('evenement','VerifNum(this)');
        $form->setOnchange('agent_habilitation','VerifNum(this)');
        $form->setOnchange('condition','VerifNum(this)');
        $form->setOnchange('organisme','VerifNum(this)');
        $form->setOnchange('date_evenement_debut','fdate(this)');
        $form->setOnchange('date_evenement_fin','fdate(this)');
        $form->setOnchange('date_validite','fdate(this)');
    }
    /**
     * Methode setTaille
     */
    function setTaille(&$form, $maj) {
        $form->setTaille("evenement", 11);
        $form->setTaille("libelle", 30);
        $form->setTaille("agent_habilitation", 11);
        $form->setTaille("condition", 11);
        $form->setTaille("organisme", 11);
        $form->setTaille("fichier", 30);
        $form->setTaille("date_evenement_debut", 12);
        $form->setTaille("date_evenement_fin", 12);
        $form->setTaille("date_validite", 12);
        $form->setTaille("type_formation", 20);
        $form->setTaille("observation", 80);
        $form->setTaille("forcer_validation", 1);
    }

    /**
     * Methode setMax
     */
    function setMax(&$form, $maj) {
        $form->setMax("evenement", 11);
        $form->setMax("libelle", 60);
        $form->setMax("agent_habilitation", 11);
        $form->setMax("condition", 11);
        $form->setMax("organisme", 11);
        $form->setMax("fichier", 60);
        $form->setMax("date_evenement_debut", 12);
        $form->setMax("date_evenement_fin", 12);
        $form->setMax("date_validite", 12);
        $form->setMax("type_formation", 20);
        $form->setMax("observation", 6);
        $form->setMax("forcer_validation", 1);
    }


    function setLib(&$form, $maj) {
    //libelle des champs
        $form->setLib('evenement', __('evenement'));
        $form->setLib('libelle', __('libelle'));
        $form->setLib('agent_habilitation', __('agent_habilitation'));
        $form->setLib('condition', __('condition'));
        $form->setLib('organisme', __('organisme'));
        $form->setLib('fichier', __('fichier'));
        $form->setLib('date_evenement_debut', __('date_evenement_debut'));
        $form->setLib('date_evenement_fin', __('date_evenement_fin'));
        $form->setLib('date_validite', __('date_validite'));
        $form->setLib('type_formation', __('type_formation'));
        $form->setLib('observation', __('observation'));
        $form->setLib('forcer_validation', __('forcer_validation'));
    }
    /**
     *
     */
    function setSelect(&$form, $maj, &$dnu1 = null, $dnu2 = null) {

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
    }


    //==================================
    // sous Formulaire
    //==================================
    

    function setValsousformulaire(&$form, $maj, $validation, $idxformulaire, $retourformulaire, $typeformulaire, &$dnu1 = null, $dnu2 = null) {
        $this->retourformulaire = $retourformulaire;
        if($validation == 0) {
            if($this->is_in_context_of_foreign_key('agent_habilitation', $this->retourformulaire))
                $form->setVal('agent_habilitation', $idxformulaire);
            if($this->is_in_context_of_foreign_key('condition', $this->retourformulaire))
                $form->setVal('condition', $idxformulaire);
            if($this->is_in_context_of_foreign_key('organisme', $this->retourformulaire))
                $form->setVal('organisme', $idxformulaire);
        }// fin validation
        $this->set_form_default_values($form, $maj, $validation);
    }// fin setValsousformulaire

    //==================================
    // cle secondaire
    //==================================
    

}
