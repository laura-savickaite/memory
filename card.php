<?php

class Image {
    public $_face;
    public $_back;
    public $_identifiant;
    public $_retourner;
    
    public function __construct (string $face, string $back, int $identifiant, int $retourner){
        $this->_face = $face;
        $this->_back = $back;
        $this->_identifiant = $identifiant;
        $this->_retourner = $retourner;
    }
    
    public function tournerCarte ($situation){
        $situation->_retourner = 2;
    }

    public function retournerCarte ($etat){
        $etat ->_retourner = 1;
    }

    public function foundPairs ($uniqueCarte){

        $id_carte = $uniqueCarte->_identifiant;
        $_SESSION['pairs']["$id_carte"] = $uniqueCarte;
        $face = $_SESSION['pairs']["$id_carte"]->_face;
        
        $counter=0;
        for ($i=0; $i < count($_SESSION['pairs']); $i++){
            $counter++;
        }
        if($counter % 2 == 0){
        
            if($_SESSION['face'] == $face){
                echo "ok";
            }else {            
                
                foreach($_SESSION['pairs'] as $infoCarte){
                $infoCarte->_retourner = 1; 
                }  
            } 

            unset($_SESSION['pairs']);
        }
        $_SESSION['face'] = $face;
        
    }

    
}





?>