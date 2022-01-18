<?php

function connectLogin($login){

    $host='localhost';
    $user='root';
    $password='';
    $dbname='memory';

    $dsn='mysql:host='.$host.'; dbname='.$dbname.'; charset=utf8';

    $pdo=new PDO($dsn, $user, $password);


    $login=$_POST['login'];

    $loginCo=$pdo -> prepare('SELECT `login` FROM `utilisateurs` WHERE `login`=:login');
    $loginCo -> execute(['login' => $login]);
    $resultLogCo = $loginCo->fetch(PDO::FETCH_ASSOC);


    if($resultLogCo !== false){
        connectPassword($_POST['login'], $_POST['password']);
    }else{
        echo "Login ou mdp faux.";
    }

}

function connectPassword($login, $password){

    $host='localhost';
    $user='root';
    $password='';
    $dbname='memory';

    $dsn='mysql:host='.$host.'; dbname='.$dbname.'; charset=utf8';

    $pdo=new PDO($dsn, $user, $password);

    $login=$_POST['login'];
    $password=$_POST['password'];

    $passCo=$pdo -> prepare('SELECT `password` FROM `utilisateurs` WHERE `login`=:login');
    $passCo -> execute(['login' => $login]);
    $resultPassCo = $passCo->fetch(PDO::FETCH_OBJ);

        if($password !== ($resultPassCo->password)){
            echo "Login ou mdp faux.";
        }else{

            $idCo=$pdo -> prepare('SELECT `id` FROM `utilisateurs` WHERE `login`=:login');
            $idCo -> execute(['login' => $login]);
            $resultIdCo = $idCo->fetch(PDO::FETCH_OBJ);

            $id = $resultIdCo->id;

            $user = new User($id, $login);
            $_SESSION['id'] = $id;
            $_SESSION['login'] = $login;

            var_dump($_SESSION);
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