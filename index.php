<?php

require 'bdd_connect.php';

session_start();

// if(isset($_SESSION)){
//     var_dump($_SESSION['user']);
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
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
    <article class="landing-page">
        <section class="carousel-wrapper">
            <div class="carousel">
                <img src="Images/header.jpeg" width="500px">
                <img src="Images/header2.jpeg" width="500px"> 
                <img src="Images/header3.jpeg" width="500px">  
            </div>
        </section>
            <h1 class="titre-index">Museum of Classical Paintings</h1>
        <section class="texte-index">
            <p>The museum of Classical Paintings celebrates its first anniversary of its Renaissance Art exposition. For this occasion, come play a little game of Memory and challenge the best!</p>
            <button id="bouton-index" type="button">Let's play <span id="arrow">→</span></button>
        </section>
    </article>
    <article class="museum-news">
        <section class="row">
            <div>lol</div>
            <div>lol</div>
        </section>
        <section class="row">
            <div>lol</div>
            <div>lol</div>
        </section>
        <section class="row">
            <div>lol</div>
            <div>lol</div>
        </section>
    </article>
    </main>

    <footer>
        <a href="#"><img src="Images/github.svg" width="50px"></a>
    </footer>
</body>
</html>