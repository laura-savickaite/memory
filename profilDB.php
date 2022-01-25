<?php

function isLoginUsed ($login){

require 'bdd_connect.php';

$login = $_POST['ulogin'];

$loginRecherche=$pdo -> prepare('SELECT `login` FROM `utilisateurs` WHERE `login`=:login');
$loginRecherche -> execute(['login' => $login]);
$resultlogRecherche = $loginRecherche->fetch(PDO::FETCH_ASSOC);
var_dump($resultlogRecherche);


    if($resultlogRecherche !== false){
        foreach($resultlogRecherche as $log){
            if ($log !== $_SESSION['user']['login']){
                $loginExistant = 1;
                echo "Ce nom d'utilisateur est déjà pris.";
            }
        }
    }
}

function loginUpdate($login){
    require('bdd_connect.php');

    $updateLogin=$pdo -> prepare("UPDATE `utilisateurs` SET `login`='".$_POST['ulogin']."',`password`='".$_SESSION['user']['password']."' WHERE login='".$_SESSION['user']['login']."'");
    $updateLogin -> execute();

    // $updateLogin=$pdo -> prepare('SELECT `login` FROM `utilisateurs` WHERE `login`=:login');
    // $updateLogin -> execute();
    // $resultUpdateLogin = $updateLogin->fetch(PDO::FETCH_OBJ);

    
    $_SESSION['user']['login'] = $_POST['ulogin'];

}

function passUpdate($password){
    require('bdd_connect.php');

    $updatePassword=$pdo -> prepare("UPDATE `utilisateurs` SET `password`='".$_POST['umdp']."' WHERE login='".$_SESSION['user']['login']."'");
    $updatePassword -> execute();
}

function update($login, $password){

require('bdd_connect.php');

$update=$pdo -> prepare("UPDATE `utilisateurs` SET `login`='".$_POST['ulogin']."',`password`='".$_POST['umdp']."' WHERE login='".$_SESSION['user']['login']."'");
$update -> execute();
}


?>