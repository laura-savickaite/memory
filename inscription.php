<?php
require 'manipulationDB.php';

if(isset($_POST['inscription'])){
    if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password2'])){
        $validation=true;

        if($_POST['password'] == $_POST['password2']){
            //vérifier que le login utilisé n'est pas déjà existant avec une fonction
            isLoginUsed($_POST['login']);

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
    <title>Inscription || Museum</title>
</head>
<body>
    <header>

    </header>

    <main>
        <form action="" method="post">
            <label for="name">Login :</label>
            <input type="text" id="login" name="login">
            <label for="msg">Mot de passe :</label>
            <input type="password" id="pass" name="password" required>
            <label for="msg">Confirmation du mot de passe :</label>
            <input type="password" id="pass2" name="password2" required
            >

            <button class="#" type="submit" name="inscription">Sign in</button>
        </form>
    </main>
</body>
</html>