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
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <title>Connexion || Museum</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="accueil-jeu.php">Game</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li>
                    <form action="deconnexion.php" method="post">
                        <button class="#" type="submit" name="deco">
                            Deconnexion
                        </button>
                    </form>
                </li>
            </ul>
        </nav>      
    </header>
    <main>
        <article class="inscription-page">
            <section class="form">
                <form action="" method="post">
                    <label for="name">Login :</label>
                    <input type="text" id="login" name="login">
                    <label for="msg">Mot de passe :</label>
                    <input type="password" id="pass" name="password" required>

                    <button class="#" type="submit" name="connexion">Log in</button>
                </form>
                <div class="errors">
                    UC
                </div>
            </section>
            <section class="icons-header">
                <img src="Images/header-connexion.jpeg">  
                <img src="Images/header-connexion2.jpeg"> 
            </section>
        </article>
    </main>
</body>
</html>