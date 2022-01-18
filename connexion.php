<?php

session_start();
require 'connexionDB.php';

if(isset($_POST['connexion'])){
    connectLogin($_POST['login'], $_POST['password']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion || Museum</title>
</head>
<body>
<form action="" method="post">
    <label for="name">Login :</label>
    <input type="text" id="login" name="login">
    <label for="msg">Mot de passe :</label>
    <input type="password" id="pass" name="password" required>

    <button class="#" type="submit" name="connexion">Log in</button>
</form>
</body>
</html>