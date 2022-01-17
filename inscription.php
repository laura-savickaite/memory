<?php
require 'manipulationDB.php';

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
            <input type="text" id="login" name="user_login">
            <label for="msg">Mot de passe :</label>
            <input type="password" id="pass" name="password" required>
            <label for="msg">Confirmation du mot de passe :</label>
            <input type="password" id="pass2" name="password2" required
            >

            <button class="boutoninscription" type="submit" name="inscription">Sign in</button>
        </form>
    </main>
</body>
</html>