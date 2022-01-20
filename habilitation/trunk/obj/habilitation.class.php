<?php
//$Id$ 
//gen openMairie le 07/05/2019 14:13

require_once "../gen/obj/habilitation.class.php";

class habilitation extends habilitation_gen {

	function setType (&$form, $maj) {
        parent::setType ($form, $maj);
		if($maj<2){			
			$form->setType('observation', 'html');
		}
    }
    
    function setLib(&$form,$maj) {
        parent::setLib($form,$maj);
        $form->setLib('observation','');
	}   
  
    function setLayout(&$form, $maj) {
		$form->setFieldset('observation','D',' '._('observation').' ', "collapsible");
        $form->setFieldset('observation','F','');
	}
	
}
