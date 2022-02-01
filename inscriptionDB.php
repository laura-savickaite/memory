<?php

    function isLoginUsed ($login){

        require 'bdd_connect.php';

        $login = $_POST['login'];

        $loginRecherche=$pdo -> prepare('SELECT `login` FROM `utilisateurs` WHERE `login`=:login');
        $loginRecherche -> execute(['login' => $login]);
        $resultlogRecherche = $loginRecherche->fetch(PDO::FETCH_ASSOC);


        if($resultlogRecherche !== false){
            $_SESSION['error'] = "Ce nom d'utilisateur est déjà pris.";
            $validation=false;
        }else{
            signIn($_POST['login'], $_POST['password']);
        }
    }

    function signIn ($login, $password){
        
        require 'bdd_connect.php';

        $login = $_POST['login'];
        $password = $_POST['password'];

        $insertDB=$pdo -> prepare('INSERT INTO utilisateurs SET login=:login, password=:password');
        $insertDB -> execute(['login' => $login, 'password' => $password]);
    
        
    }



?>