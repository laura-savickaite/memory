<?php

class User {
    public $id;
    public $login;

    public function __construct($id, $login){
        $this->_id = $id;
        $this->_login = $login;
    }
    // quand connecté ALORS tu me créés/instancie l'objet utilisateur dans une session
    
    public function register($login, $password){
        $this->_login = $login;
        $this->_password = $password;
    }

}
?>