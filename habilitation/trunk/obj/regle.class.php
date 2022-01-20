<?php
//$Id$ 
//gen openMairie le 07/05/2019 14:13

require_once "../gen/obj/regle.class.php";

class regle extends regle_gen {
	
	
	function setType (&$form, $maj) {
        parent::setType ($form, $maj);
		if($maj<2){
			$form->setType('champ', 'select');
			$form->setType('operateur', 'select');
		}
    }
    
    function setLib(&$form,$maj) {
        parent::setLib($form,$maj);
        $form->setLib('operateur','');
        $form->setLib('duree',_("Durée en mois"));
	}
    
	function setSelect(&$form, $maj,&$db,$debug) {
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
        
		if($maj<2){
			//champ
			$contenu=array();
            $contenu[0][0]="age";
            $contenu[1][0]=" "._("Age")." ";
            $contenu[0][1]="type";
            $contenu[1][1]=" "._("Type")." ";
            
            $form->setSelect('champ',$contenu);
			
            // operateur
            $contenu=array();
            $contenu[0][0]="==";
            $contenu[1][0]=" "._("egal à")." ";
            $contenu[0][1]=">";
            $contenu[1][1]=" "._("plus grand que")." ";
            $contenu[0][2]="<";
            $contenu[1][2]=_("plus petit que")." ";
            $contenu[0][3]=">=";
            $contenu[1][3]=" "._("plus grand ou égal à")." ";
            $contenu[0][4]="<=";
            $contenu[1][4]=_("plus petit ou égal à")." ";

            $form->setSelect('operateur',$contenu);
        }

    }
    
    function setLayout(&$form, $maj) {
        $form->setFieldset('libelle','D',' '._('libelle').' ', "collapsible");
			$form->setBloc('libelle','D',"","group");
            $form->setBloc('condition','F');
        $form->setFieldset('condition','F','');
        
        $form->setFieldset('champ','D',' '._('regle').' ', "collapsible");
            $form->setBloc('champ','D',"","group");
            $form->setBloc('operateur','D');
            $form->setBloc('valeur','F');
        $form->setFieldset('valeur','F','');
        
        $form->setFieldset('duree','D',' '._('message').' ', "collapsible");
        $form->setFieldset('duree','F','');
		
		$form->setFieldset('message','D',' '._('message').' ', "collapsible");
        $form->setFieldset('message','F','');
	}

}
