<?php
//$Id$ 
//gen openMairie le 10/05/2019 11:44

require_once PATH_OPENMAIRIE."om_dbform.class.php";

class regle_gen extends dbform {

    protected $_absolute_class_name = "regle";

    var $table = "regle";
    var $clePrimaire = "regle";
    var $typeCle = "N";
    var $required_field = array(
        "champ",
        "libelle",
        "operateur",
        "regle",
        "valeur"
    );
    
    var $foreign_keys_extended = array(
        "condition" => array("condition", ),
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
            "regle",
            "libelle",
            "condition",
            "champ",
            "operateur",
            "valeur",
            "duree",
            "message",
        );
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




    function setvalF($val = array()) {
        //affectation valeur formulaire
        if (!is_numeric($val['regle'])) {
            $this->valF['regle'] = ""; // -> requis
        } else {
            $this->valF['regle'] = $val['regle'];
        }
        $this->valF['libelle'] = $val['libelle'];
        if (!is_numeric($val['condition'])) {
            $this->valF['condition'] = NULL;
        } else {
            $this->valF['condition'] = $val['condition'];
        }
        $this->valF['champ'] = $val['champ'];
        $this->valF['operateur'] = $val['operateur'];
        $this->valF['valeur'] = $val['valeur'];
        if ($val['duree'] == "") {
            $this->valF['duree'] = NULL;
        } else {
            $this->valF['duree'] = $val['duree'];
        }
        if ($val['message'] == "") {
            $this->valF['message'] = NULL;
        } else {
            $this->valF['message'] = $val['message'];
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
            $form->setType("regle", "hidden");
            $form->setType("libelle", "text");
            if ($this->is_in_context_of_foreign_key("condition", $this->retourformulaire)) {
                $form->setType("condition", "selecthiddenstatic");
            } else {
                $form->setType("condition", "select");
            }
            $form->setType("champ", "text");
            $form->setType("operateur", "text");
            $form->setType("valeur", "text");
            $form->setType("duree", "text");
            $form->setType("message", "text");
        }

        // MDOE MODIFIER
        if ($maj == 1 || $crud == 'update') {
            $form->setType("regle", "hiddenstatic");
            $form->setType("libelle", "text");
            if ($this->is_in_context_of_foreign_key("condition", $this->retourformulaire)) {
                $form->setType("condition", "selecthiddenstatic");
            } else {
                $form->setType("condition", "select");
            }
            $form->setType("champ", "text");
            $form->setType("operateur", "text");
            $form->setType("valeur", "text");
            $form->setType("duree", "text");
            $form->setType("message", "text");
        }

        // MODE SUPPRIMER
        if ($maj == 2 || $crud == 'delete') {
            $form->setType("regle", "hiddenstatic");
            $form->setType("libelle", "hiddenstatic");
            $form->setType("condition", "selectstatic");
            $form->setType("champ", "hiddenstatic");
            $form->setType("operateur", "hiddenstatic");
            $form->setType("valeur", "hiddenstatic");
            $form->setType("duree", "hiddenstatic");
            $form->setType("message", "hiddenstatic");
        }

        // MODE CONSULTER
        if ($maj == 3 || $crud == 'read') {
            $form->setType("regle", "static");
            $form->setType("libelle", "static");
            $form->setType("condition", "selectstatic");
            $form->setType("champ", "static");
            $form->setType("operateur", "static");
            $form->setType("valeur", "static");
            $form->setType("duree", "static");
            $form->setType("message", "static");
        }

    }


    function setOnchange(&$form, $maj) {
    //javascript controle client
        $form->setOnchange('regle','VerifNum(this)');
        $form->setOnchange('condition','VerifNum(this)');
    }
    /**
     * Methode setTaille
     */
    function setTaille(&$form, $maj) {
        $form->setTaille("regle", 11);
        $form->setTaille("libelle", 20);
        $form->setTaille("condition", 11);
        $form->setTaille("champ", 20);
        $form->setTaille("operateur", 20);
        $form->setTaille("valeur", 20);
        $form->setTaille("duree", 20);
        $form->setTaille("message", 20);
    }

    /**
     * Methode setMax
     */
    function setMax(&$form, $maj) {
        $form->setMax("regle", 11);
        $form->setMax("libelle", 20);
        $form->setMax("condition", 11);
        $form->setMax("champ", 20);
        $form->setMax("operateur", 20);
        $form->setMax("valeur", 20);
        $form->setMax("duree", 20);
        $form->setMax("message", 20);
    }


    function setLib(&$form, $maj) {
    //libelle des champs
        $form->setLib('regle', __('regle'));
        $form->setLib('libelle', __('libelle'));
        $form->setLib('condition', __('condition'));
        $form->setLib('champ', __('champ'));
        $form->setLib('operateur', __('operateur'));
        $form->setLib('valeur', __('valeur'));
        $form->setLib('duree', __('duree'));
        $form->setLib('message', __('message'));
    }
    /**
     *
     */
    function setSelect(&$form, $maj, &$dnu1 = null, $dnu2 = null) {

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
    }


    //==================================
    // sous Formulaire
    //==================================
    

    function setValsousformulaire(&$form, $maj, $validation, $idxformulaire, $retourformulaire, $typeformulaire, &$dnu1 = null, $dnu2 = null) {
        $this->retourformulaire = $retourformulaire;
        if($validation == 0) {
            if($this->is_in_context_of_foreign_key('condition', $this->retourformulaire))
                $form->setVal('condition', $idxformulaire);
        }// fin validation
        $this->set_form_default_values($form, $maj, $validation);
    }// fin setValsousformulaire

    //==================================
    // cle secondaire
    //==================================
    

}
