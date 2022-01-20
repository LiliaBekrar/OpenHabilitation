<?php
/**
 * Ce fichier est destine a permettre la surcharge de certaines methodes de
 * la classe om_formulaire pour des besoins specifiques de l'application
 *
 * @package openmairie_exemple
 * @version SVN : $Id: om_formulaire.class.php 2382 2013-06-11 10:56:25Z fmichon $
 */

/**
 *
 */
require_once PATH_OPENMAIRIE."om_formulaire.class.php";

/**
 *
 */
class om_formulaire extends formulaire {
	

	function afficheall($champ, $validation, $DEBUG = false) {
	  
        //----------------------------------------------------------
        $newWidth =570;
        $height=800;
        $heightcsv=400;
        //-----------------------------------------------------------
        // type autorise : .gif;.jpg;.jpeg;.png;.txt;.pdf;.csv
        if($this->val[$champ]!=""){
			$filename = $this->val[$champ]; 
			$scan_pdf = $this->f->storage->getPath($filename);
			$mimetype = $this->f->storage->getMimetype($filename);
			$info = $this->f->storage->getInfo($filename);        
		}
		
		if (isset($mimetype)) {
        if($mimetype == 'application/pdf'){
            echo "<object data='".$scan_pdf."' name='".$champ."' value=\"".
            $scan_pdf."\" type=\"".$mimetype."\" width='100%' height='". $height."px'>";
            echo "</object>";  
        }
        if(substr($mimetype,0,6) == 'image/'){
			//mo-------------------------------------
			$x_y = getimagesize($scan_pdf);
			// $x_y[0]."widht";
			// $x_y[1] ."height";
			$newHeight=($x_y[1]/ $x_y[0])*$newWidth;
			//echo "<img src=\"". $scan_pdf."\" width='".$newWidth."' height='". $$newHeight."' >";
			echo "<object data='".$scan_pdf."' name='".$champ."' value=\"".
				$scan_pdf."\" type='.$mimetype.' width='".$newWidth."' height='". $newHeight."''>";
				echo "</object>";   
        }
        if($mimetype == 'text/plain'){
            $fichier=fopen($scan_pdf, "r");
            $contenu = fread($fichier, 10000);
            echo "<textarea name='".$champ."' rows='10' cols='50' class=\"champFormulaire\" >".
                $contenu."</textarea>";
        }
        if($mimetype == 'application/csv'){
            $fichier=fopen($scan_pdf, "r");
            $contenu = fread($fichier, 10000);
            $flag_separateur=0;
            // chr(9)-> tabulation : si le texte contient des tab -> c est le separateur
            // chr(59)-> ; : si le texte ne contient pas de tab -> c est le separeateur
            //          | : si le texte ne contient pas de tab -> c est le separeateur
            // chr(44)-> , : si on ne trouve pas de ";" "tab" ou "|" et que le texte contient des ','
            // pas de séparateur si aucun des éléments ci dessus est trouvé -> affichage des lignes
            $separateur="";
            if(strstr($contenu, chr(9))){ 
                $separateur=chr(9);
                $flag_separateur=1;
            }else{
                if(strstr($contenu, chr(59))){ 
                    $separateur=chr(59);
                    $flag_separateur=1;
                }
                if(strstr($contenu, "|")){
                    $separateur="|";
                    $flag_separateur=1;                    
                } 
                if($flag_separateur==0 and strstr($contenu, chr(44))){ 
                    $separateur=chr(44);
                    $flag_separateur=1;                    
                }
            }
            if($flag_separateur==1){
                    $flagentete=1;
                    $tmp=explode("\n",$contenu);
                    echo "<div style='width:".$newWidth."px;height:". $heightcsv."px;overflow:auto;'>";
                    echo "<table id='table-csv'   cellpadding='0' cellspacing ='0' border='1px solid #000000;'><tr>";
                    foreach ($tmp as &$value) {
                        $tmp1=explode($separateur,$value);
                        echo "<tr>";
                        foreach ($tmp1 as &$value1) {
                            if ($flagentete==1){       
                                echo "<td align='center' id='entete-table-csv' >".$value1."</td>";
                            }else{
                                echo "<td id='td-table-csv' >".$value1."</td>";
                            }
                        }  
                        echo "</tr>";
                        $flagentete=0;      
                        }
                        echo "</table>";
                        echo "</div>";
                }else{
                    echo "<textarea name='".$champ."' rows='10' cols='50' class=\"champFormulaire\" >".
                    $contenu."</textarea>"; 
                }           
		} 
		}

	}
	
    function html_bible($champ, $validation, $DEBUG = false) {
        if(!isset($this->select[$champ]['class'])) {
            $this->select[$champ]['class'] = "";
        }
        if (!$this->correct) {
            $this->select[$champ]['class'] .= " html_bible";
            $this->textarea($champ, $validation, $DEBUG);
        } else {
            $this->htmlstatic($champ, $validation, $DEBUG);
        }
    }
    
/*
    function html_note($champ, $validation, $DEBUG = false) {
        if(!isset($this->select[$champ]['class'])) {
            $this->select[$champ]['class'] = "";
        }
        if (!$this->correct) {
            $this->select[$champ]['class'] .= " html_note";
            $this->textarea($champ, $validation, $DEBUG);
        } else {
            $this->htmlstatic($champ, $validation, $DEBUG);
        }
    }
*/
    function html_conservation($champ, $validation, $DEBUG = false) {
        if(!isset($this->select[$champ]['class'])) {
            $this->select[$champ]['class'] = "";
        }
        if (!$this->correct) {
            $this->select[$champ]['class'] .= " html_conservation";
            $this->textarea($champ, $validation, $DEBUG);
        } else {
            $this->htmlstatic($champ, $validation, $DEBUG);
        }
    }

    function html_controle_acces($champ, $validation, $DEBUG = false) {
        if(!isset($this->select[$champ]['class'])) {
            $this->select[$champ]['class'] = "";
        }
        if (!$this->correct) {
            $this->select[$champ]['class'] .= " html_controle_acces";
            $this->textarea($champ, $validation, $DEBUG);
        } else {
            $this->htmlstatic($champ, $validation, $DEBUG);
        }
    }

    function html_tracabilite($champ, $validation, $DEBUG = false) {
        if(!isset($this->select[$champ]['class'])) {
            $this->select[$champ]['class'] = "";
        }
        if (!$this->correct) {
            $this->select[$champ]['class'] .= " html_tracabilite";
            $this->textarea($champ, $validation, $DEBUG);
        } else {
            $this->htmlstatic($champ, $validation, $DEBUG);
        }
    }

    function html_protection($champ, $validation, $DEBUG = false) {
        if(!isset($this->select[$champ]['class'])) {
            $this->select[$champ]['class'] = "";
        }
        if (!$this->correct) {
            $this->select[$champ]['class'] .= " html_protection";
            $this->textarea($champ, $validation, $DEBUG);
        } else {
            $this->htmlstatic($champ, $validation, $DEBUG);
        }
    }
    
    function html_sauvegarde($champ, $validation, $DEBUG = false) {
        if(!isset($this->select[$champ]['class'])) {
            $this->select[$champ]['class'] = "";
        }
        if (!$this->correct) {
            $this->select[$champ]['class'] .= " html_sauvegarde";
            $this->textarea($champ, $validation, $DEBUG);
        } else {
            $this->htmlstatic($champ, $validation, $DEBUG);
        }
    }

    function html_chiffrement($champ, $validation, $DEBUG = false) {
        if(!isset($this->select[$champ]['class'])) {
            $this->select[$champ]['class'] = "";
        }
        if (!$this->correct) {
            $this->select[$champ]['class'] .= " html_chiffrement";
            $this->textarea($champ, $validation, $DEBUG);
        } else {
            $this->htmlstatic($champ, $validation, $DEBUG);
        }
    }

    function html_securite_technique($champ, $validation, $DEBUG = false) {
        if(!isset($this->select[$champ]['class'])) {
            $this->select[$champ]['class'] = "";
        }
        if (!$this->correct) {
            $this->select[$champ]['class'] .= " html_securite_technique";
            $this->textarea($champ, $validation, $DEBUG);
        } else {
            $this->htmlstatic($champ, $validation, $DEBUG);
        }
    }

    function html_securite_organisationnelle($champ, $validation, $DEBUG = false) {
        if(!isset($this->select[$champ]['class'])) {
            $this->select[$champ]['class'] = "";
        }
        if (!$this->correct) {
            $this->select[$champ]['class'] .= " html_securite_organisationnelle";
            $this->textarea($champ, $validation, $DEBUG);
        } else {
            $this->htmlstatic($champ, $validation, $DEBUG);
        }
    }

}
?>
