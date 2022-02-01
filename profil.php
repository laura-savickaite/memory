<?php

session_start();
// var_dump($_SESSION['user']);

require_once 'profilDB.php';
require_once 'top.php';

// var_dump($_SESSION['user']['id']);

if(!isset($_SESSION['user'])){
    header('Location: connexion.php');
}

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
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <title>Profil || Museum</title>
</head>
<body>
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
<main>
    <article class="profil">
        <section class="profil-form">
            <form action="" method="post">
                <label for="name">Login: </label>
                <input type="text" name="ulogin" id="loginn" value="<?= $_SESSION['user']['login']; ?>">  

                <label for="name">Mot de passe: </label>
                <input type="password" name="umdp" id="mdp">


                <button type="submit" name="update">Update</button>

            </form>
        </section>
        <section class="profil-top">
            <table>
                <thead>
                    <tr>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($_SESSION['myTop'] as $link) { 
                        echo "<tr>";  
                        echo "<td>".$link."</td>";
                    }                         
                ?>
                </tbody>
            </table>
        </section>
    </article>
</main>
</body>
</html>

