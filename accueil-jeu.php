<?php
session_start();
require_once 'top.php';


top();
// var_dump($_SESSION['top']);

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
    <title>Accueil Memory Game</title>
</head>
<body>
<?php if(!isset($_SESSION['user'])){
        ?>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="accueil-jeu.php">Game</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </nav>
    </header>   
    <?php
    }else {
        ?>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="accueil-jeu.php">Game</a></li>
                <li><a href="profil.php">Profil</a></li>
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
    <?php
        }
    ?>
    <main>        

        <article class="img-game">
            <img src="Images/header-game.jpeg" width="100%">
        </article>

        <article class="accueil">
            <section class="entry-game">
                <p>
                    Come enjoy the Memory Game, it has different levels. You should connect to the Museum's website in order to be able to play the game and maybe attend the top.
                </p>
                <button class="gogame" type="submit" name="gogame">
                        <a href="memory.php">Let's play!</a>
                </button>
                
            </section>
            <section class="top-game">
                <table>
                    <thead>
                        <tr>
                            <th>Login</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($_SESSION['top'] as $link) { 
                            echo "<tr>";  
                            echo "<td>".$link['login']."</td>";
                            echo "<td>".$link['score']."</td>";
                        }                         
                    ?>
                    </tbody>
                </table>
            </section>
        </article>
    </main>

</body>
</html>