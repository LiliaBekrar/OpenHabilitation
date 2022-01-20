<?php
//$Id$ 
//gen openMairie le 13/05/2019 14:22

require_once PATH_OPENMAIRIE."om_dbform.class.php";

class condition_gen extends dbform {

    protected $_absolute_class_name = "condition";

    var $table = "condition";
    var $clePrimaire = "condition";
    var $typeCle = "N";
    var $required_field = array(
        "categorie",
        "condition",
        "habilitation",
        "libelle"
    );
    
    var $foreign_keys_extended = array(
        "categorie" => array("categorie", ),
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
            "condition",
            "libelle",
            "habilitation",
            "categorie",
            "duree",
            "ordre",
        );
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_categorie() {
        return "SELECT categorie.categorie, categorie.libelle FROM ".DB_PREFIXE."categorie ORDER BY categorie.libelle ASC";
    }

    /**
     *
     * @return string
     */
    function get_var_sql_forminc__sql_categorie_by_id() {
        return "SELECT categorie.categorie, categorie.libelle FROM ".DB_PREFIXE."categorie WHERE categorie = <idx>";
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
        if (!is_numeric($val['condition'])) {
            $this->valF['condition'] = ""; // -> requis
        } else {
            $this->valF['condition'] = $val['condition'];
        }
        $this->valF['libelle'] = $val['libelle'];
        if (!is_numeric($val['habilitation'])) {
            $this->valF['habilitation'] = ""; // -> requis
        } else {
            $this->valF['habilitation'] = $val['habilitation'];
        }
        if (!is_numeric($val['categorie'])) {
            $this->valF['categorie'] = ""; // -> requis
        } else {
            $this->valF['categorie'] = $val['categorie'];
        }
        if (!is_numeric($val['duree'])) {
            $this->valF['duree'] = NULL;
        } else {
            $this->valF['duree'] = $val['duree'];
        }
        if (!is_numeric($val['ordre'])) {
            $this->valF['ordre'] = NULL;
        } else {
            $this->valF['ordre'] = $val['ordre'];
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
            $form->setType("condition", "hidden");
            $form->setType("libelle", "text");
            if ($this->is_in_context_of_foreign_key("habilitation", $this->retourformulaire)) {
                $form->setType("habilitation", "selecthiddenstatic");
            } else {
                $form->setType("habilitation", "select");
            }
            if ($this->is_in_context_of_foreign_key("categorie", $this->retourformulaire)) {
                $form->setType("categorie", "selecthiddenstatic");
            } else {
                $form->setType("categorie", "select");
            }
            $form->setType("duree", "text");
            $form->setType("ordre", "text");
        }

        // MDOE MODIFIER
        if ($maj == 1 || $crud == 'update') {
            $form->setType("condition", "hiddenstatic");
            $form->setType("libelle", "text");
            if ($this->is_in_context_of_foreign_key("habilitation", $this->retourformulaire)) {
                $form->setType("habilitation", "selecthiddenstatic");
            } else {
                $form->setType("habilitation", "select");
            }
            if ($this->is_in_context_of_foreign_key("categorie", $this->retourformulaire)) {
                $form->setType("categorie", "selecthiddenstatic");
            } else {
                $form->setType("categorie", "select");
            }
            $form->setType("duree", "text");
            $form->setType("ordre", "text");
        }

        // MODE SUPPRIMER
        if ($maj == 2 || $crud == 'delete') {
            $form->setType("condition", "hiddenstatic");
            $form->setType("libelle", "hiddenstatic");
            $form->setType("habilitation", "selectstatic");
            $form->setType("categorie", "selectstatic");
            $form->setType("duree", "hiddenstatic");
            $form->setType("ordre", "hiddenstatic");
        }

        // MODE CONSULTER
        if ($maj == 3 || $crud == 'read') {
            $form->setType("condition", "static");
            $form->setType("libelle", "static");
            $form->setType("habilitation", "selectstatic");
            $form->setType("categorie", "selectstatic");
            $form->setType("duree", "static");
            $form->setType("ordre", "static");
        }

    }


    function setOnchange(&$form, $maj) {
    //javascript controle client
        $form->setOnchange('condition','VerifNum(this)');
        $form->setOnchange('habilitation','VerifNum(this)');
        $form->setOnchange('categorie','VerifNum(this)');
        $form->setOnchange('duree','VerifNum(this)');
        $form->setOnchange('ordre','VerifNum(this)');
    }
    /**
     * Methode setTaille
     */
    function setTaille(&$form, $maj) {
        $form->setTaille("condition", 11);
        $form->setTaille("libelle", 30);
        $form->setTaille("habilitation", 11);
        $form->setTaille("categorie", 11);
        $form->setTaille("duree", 11);
        $form->setTaille("ordre", 11);
    }

    /**
     * Methode setMax
     */
    function setMax(&$form, $maj) {
        $form->setMax("condition", 11);
        $form->setMax("libelle", 60);
        $form->setMax("habilitation", 11);
        $form->setMax("categorie", 11);
        $form->setMax("duree", 11);
        $form->setMax("ordre", 11);
    }


    function setLib(&$form, $maj) {
    //libelle des champs
        $form->setLib('condition', __('condition'));
        $form->setLib('libelle', __('libelle'));
        $form->setLib('habilitation', __('habilitation'));
        $form->setLib('categorie', __('categorie'));
        $form->setLib('duree', __('duree'));
        $form->setLib('ordre', __('ordre'));
    }
    /**
     *
     */
    function setSelect(&$form, $maj, &$dnu1 = null, $dnu2 = null) {

        // categorie
        $this->init_select(
            $form, 
            $this->f->db,
            $maj,
            null,
            "categorie",
            $this->get_var_sql_forminc__sql("categorie"),
            $this->get_var_sql_forminc__sql("categorie_by_id"),
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
            if($this->is_in_context_of_foreign_key('categorie', $this->retourformulaire))
                $form->setVal('categorie', $idxformulaire);
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
        $this->rechercheTable($this->f->db, "evenement", "condition", $id);
        // Verification de la cle secondaire : regle
        $this->rechercheTable($this->f->db, "regle", "condition", $id);
    }


}
