<?php

function connectLogin($login){

    require 'bdd_connect.php';

    $login=$_POST['login'];

    $loginCo=$pdo -> prepare('SELECT `login` FROM `utilisateurs` WHERE `login`=:login');
    $loginCo -> execute(['login' => $login]);
    $resultLogCo = $loginCo->fetch(PDO::FETCH_ASSOC);


    if($resultLogCo !== false){
        connectPassword($_POST['login'], $_POST['password']);
    }else{
        $_SESSION['errorco']= "Login ou mdp faux.";
    }

}

function connectPassword($login, $password){

    require 'bdd_connect.php';

    $login=$_POST['login'];
    $password=$_POST['password'];

    $passCo=$pdo -> prepare('SELECT `password` FROM `utilisateurs` WHERE `login`=:login');
    $passCo -> execute(['login' => $login]);
    $resultPassCo = $passCo->fetch(PDO::FETCH_OBJ);

        if($password !== ($resultPassCo->password)){
            $_SESSION['errorco']= "Login ou mdp faux.";
        }else{

            $idCo=$pdo -> prepare('SELECT `id` FROM `utilisateurs` WHERE `login`=:login');
            $idCo -> execute(['login' => $login]);
            $resultIdCo = $idCo->fetch(PDO::FETCH_OBJ);

            $id = $resultIdCo->id;

            $user = new User($id, $login);

            $_SESSION['user']['id'] = $id;
            $_SESSION['user']['login'] = $login;
            $_SESSION['user']['password'] = $password;

            header('Location:index.php');
        }
    } 


class User {

    public $_id;
    public $_login;

    function __construct($id, $login){
        $this->_id = $id;
        $this->_login = $login;

    }

}


?>