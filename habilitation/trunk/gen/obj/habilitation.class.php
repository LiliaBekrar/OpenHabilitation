<?php
//$Id$ 
//gen openMairie le 25/04/2019 10:17

require_once PATH_OPENMAIRIE."om_dbform.class.php";

class habilitation_gen extends dbform {

    protected $_absolute_class_name = "habilitation";

    var $table = "habilitation";
    var $clePrimaire = "habilitation";
    var $typeCle = "N";
    var $required_field = array(
        "habilitation"
    );
    
    var $foreign_keys_extended = array(
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
            "habilitation",
            "libelle",
            "observation",
            "archive",
        );
    }




    function setvalF($val = array()) {
        //affectation valeur formulaire
        if (!is_numeric($val['habilitation'])) {
            $this->valF['habilitation'] = ""; // -> requis
        } else {
            $this->valF['habilitation'] = $val['habilitation'];
        }
        if ($val['libelle'] == "") {
            $this->valF['libelle'] = NULL;
        } else {
            $this->valF['libelle'] = $val['libelle'];
        }
            $this->valF['observation'] = $val['observation'];
        if ($val['archive'] == 1 || $val['archive'] == "t" || $val['archive'] == "Oui") {
            $this->valF['archive'] = true;
        } else {
            $this->valF['archive'] = false;
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
            $form->setType("habilitation", "hidden");
            $form->setType("libelle", "text");
            $form->setType("observation", "textarea");
            $form->setType("archive", "checkbox");
        }

        // MDOE MODIFIER
        if ($maj == 1 || $crud == 'update') {
            $form->setType("habilitation", "hiddenstatic");
            $form->setType("libelle", "text");
            $form->setType("observation", "textarea");
            $form->setType("archive", "checkbox");
        }

        // MODE SUPPRIMER
        if ($maj == 2 || $crud == 'delete') {
            $form->setType("habilitation", "hiddenstatic");
            $form->setType("libelle", "hiddenstatic");
            $form->setType("observation", "hiddenstatic");
            $form->setType("archive", "hiddenstatic");
        }

        // MODE CONSULTER
        if ($maj == 3 || $crud == 'read') {
            $form->setType("habilitation", "static");
            $form->setType("libelle", "static");
            $form->setType("observation", "textareastatic");
            $form->setType("archive", "checkboxstatic");
        }

    }


    function setOnchange(&$form, $maj) {
    //javascript controle client
        $form->setOnchange('habilitation','VerifNum(this)');
    }
    /**
     * Methode setTaille
     */
    function setTaille(&$form, $maj) {
        $form->setTaille("habilitation", 11);
        $form->setTaille("libelle", 30);
        $form->setTaille("observation", 80);
        $form->setTaille("archive", 1);
    }

    /**
     * Methode setMax
     */
    function setMax(&$form, $maj) {
        $form->setMax("habilitation", 11);
        $form->setMax("libelle", 60);
        $form->setMax("observation", 6);
        $form->setMax("archive", 1);
    }


    function setLib(&$form, $maj) {
    //libelle des champs
        $form->setLib('habilitation', __('habilitation'));
        $form->setLib('libelle', __('libelle'));
        $form->setLib('observation', __('observation'));
        $form->setLib('archive', __('archive'));
    }
    /**
     *
     */
    function setSelect(&$form, $maj, &$dnu1 = null, $dnu2 = null) {

    }


    //==================================
    // sous Formulaire
    //==================================
    

    function setValsousformulaire(&$form, $maj, $validation, $idxformulaire, $retourformulaire, $typeformulaire, &$dnu1 = null, $dnu2 = null) {
        $this->retourformulaire = $retourformulaire;
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
        $this->rechercheTable($this->f->db, "agent_habilitation", "habilitation", $id);
        // Verification de la cle secondaire : condition
        $this->rechercheTable($this->f->db, "condition", "habilitation", $id);
    }


}
