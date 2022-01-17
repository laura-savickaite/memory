<?php

$host='localhost';
$user='root';
$password='';
$dbname='memory';

$dsn='mysql:host='.$host.'; dbname='.$dbname.'; charset=utf8';

class manipulationDB {

    function signIn ($login, $password){
        //ce login sera le POST et pareil pour le password
        
        $pdo=new PDO($dsn, $user, $password);

        $login = $_POST['login'];
        $password = $_POST['password'];
        
    }

}

?>