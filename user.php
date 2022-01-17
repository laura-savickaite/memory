<?php

class User {
    private $_id;
    public $_login;
    public $_password;
    public $_password2;

    public function __construct($login, $password, $password2){
        $this->login = $login;
        $this->password = $password;
        $this->password2 = $password2;
    }

    public function register($login, $password){
        $this->login = $login;
        $this->password = $password;
    }

}
?>