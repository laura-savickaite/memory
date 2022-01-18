<?php

    function isLoginUsed ($login){

        $host='localhost';
        $user='root';
        $password='';
        $dbname='memory';

        $dsn='mysql:host='.$host.'; dbname='.$dbname.'; charset=utf8';

        $pdo=new PDO($dsn, $user, $password);

        $login = $_POST['login'];

        $loginRecherche=$pdo -> prepare('SELECT `login` FROM `utilisateurs` WHERE `login`=:login');
        $loginRecherche -> execute(['login' => $login]);
        $resultlogRecherche = $loginRecherche->fetch(PDO::FETCH_ASSOC);


        if($resultlogRecherche !== false){
            echo "Ce nom d'utilisateur est déjà pris.";
            $validation=false;
        }else{
            signIn($_POST['login'], $_POST['password']);
        }
    }

    function signIn ($login, $password){
        //ce login sera le POST et pareil pour le password
        $host='localhost';
        $user='root';
        $password='';
        $dbname='memory';

        $dsn='mysql:host='.$host.'; dbname='.$dbname.'; charset=utf8';
        $pdo=new PDO($dsn, $user, $password);

        $login = $_POST['login'];
        $password = $_POST['password'];

        $insertDB=$pdo -> prepare('INSERT INTO utilisateurs SET login=:login, password=:password');
        $insertDB -> execute(['login' => $login, 'password' => $password]);
    
        
    }



?>