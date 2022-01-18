<?php

require 'bdd_connect.php';

session_start();

if(isset($_SESSION)){
    var_dump($_SESSION);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum</title>
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Game</a></li>
                <li><a href="#">Top gamers</a></li>
                <li><a href="#">Inscription</a></li>
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
        <img src="Images/header.jpeg" width="100%">
        <div class="texte-index">
            <h1>Museum of XXXXX</h1>
            <p>The museum of XXX fête ses XXXX de son exposition XXXXX pour l'occasion venez jouer un petit jeu de memory pour XXXXXX</p>
            <button></button>
        </div>
    </main>

    <footer>
        <a href="#"><img src="Images/github.png"></a>
    </footer>
</body>
</html>