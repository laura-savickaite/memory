<?php

session_start();
var_dump($_SESSION['user']);

require_once 'profilDB.php';
require_once 'top.php';

// var_dump($_SESSION['user']['id']);

myResults($_SESSION['user']['id']);
myTop($_SESSION['user']['id']);

$loginExistant = 0;
if(isset($_POST['update'])){
   if(!empty($_POST['ulogin']) && empty($_POST['umdp'])){
    isLoginUsed($_POST['ulogin']);
        if($loginExistant !== 1){
            loginUpdate($_POST['ulogin']);   
        }
    } 
    elseif(!empty($_POST['umdp'])){
        passUpdate($_POST['umdp']);
    }
    elseif(!empty($_POST['ulogin']) && !empty($_POST['umdp'])){
        isLoginUsed($_POST['ulogin']);
        if($loginExistant !== 1){
         update($_POST['ulogin'], $_POST['umdp']); 
        }  
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil || Museum</title>
</head>
<body>
<form action="" method="post">
        <label for="name">Login: </label>
        <input type="text" name="ulogin" id="loginn" value="<?= $_SESSION['user']['login']; ?>">  

        <label for="name">Mot de passe: </label>
        <input type="password" name="umdp" id="mdp">


        <button type="submit" name="update">Update</button>

    </form>
</body>
</html>

