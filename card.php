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

    public function retournerCarte ($test){
        $test->_retourner = 1;

    }

    public function foundPairs ($uniqueCarte){

        $id_carte = $uniqueCarte->_identifiant;
        $_SESSION['pairs']["$id_carte"] = $uniqueCarte;
        $face = $_SESSION['pairs']["$id_carte"]->_face;
        $retourner = $_SESSION['pairs']["$id_carte"]->_retourner;

        

        $counter=0;
        for ($i=0; $i < count($_SESSION['pairs']); $i++){
            $counter++;
        }
        if($_SESSION['clickcounter'] % 2 == 0){
        
            $_SESSION['found']=0;
            // $_SESSION['signal']=0;               

            if($_SESSION['face'] == $face){
                $_SESSION['found']=1;
                
                
                // $_SESSION['foundcards']++;

            }else {           
                
                if(!isset($notfound)){
                  $notfound=array();  
                }

                // echo 'DOIT RETOURNER LES CARTES';
                $_SESSION['signal'] = 1;
                // echo 'signal == '.$_SESSION['signal'];

                // var_dump($_SESSION['pairs']);

                  array_push($notfound, $_SESSION['pairs']);  
                  echo "<meta http-equiv='refresh' content='1;URL=memory.php'>";
                //   header('Refresh:2; url = memory.php');
                    foreach($notfound as $value){
                        foreach($value as $test){
                            // echo "<meta http-equiv='refresh' content='1;URL=memory.php'>";
                            // $test->_retourner = 1;
                        }
                    }         
            }

            // if($_SESSION['signal'] == 1){  
            //     echo "<meta http-equiv='refresh' content='1;URL=memory.php'>";
            //     $_SESSION['signal']=0;   
            //     // retournerCarte($_SESSION['pairs']);
            //     foreach($_SESSION['pairs'] as $infoCarte){
            //     $infoCarte->_retourner = 1;
            //     }         
            // }

            // var_dump($_SESSION['signal']);

            if(isset($_SESSION['found'])){
                if(isset($_SESSION['foundcards'])){
                    if($_SESSION['foundcards'] == ((count($_SESSION['start'])/2))){
                        echo "ok";
                    }
                }
            }

            unset($_SESSION['pairs']); 
        }
        $_SESSION['face'] = $face;
        // var_dump($_SESSION['pairs']);
    }


    
 
}





?>