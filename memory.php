<!-- 
I- plusieurs images sont présentées, une image est présentée deux fois, elles sont arrangées sous forme de tableau 
    a) créer un tableau avec les images stockées
    b) créer une boucle disant que chaque image doit être doublée
    c) display ces images dans un tableau html // à voir

II- leur ordre est randomnisé selon la partie == chaque nouvelle partie (une nouvelle session crée lors de l'appui d'un bouton "jouer") -> nouvel ordre.
    a) créer une session lorsque le start est appuyé : session jeu
    b) si c'est un utilisateur connecté, alors rajouté l'id-utilisateurs sinon, non
    c) si une session jeu existante, alors shuffle les cartes et les garder dans cet ordre-ci

III- deux clics possibles :: 
     -soit les deux images cliquées ne sont pas pareilles alors echo "ok"
     -soit les deux images cliquées sont pareilles alors echo "pas ok"

     a) créer une boucle pour compter le nombre de clics
     b) si les deux clics correspondent aux mêmes images : "ok" -- sinon "pas ok"

IV- quand le dos est cliqué -> l'image se retourne => face. La face n'est présentée que si et seulement si le dos est cliqué
    a)
    b)
    c)
-->

<?php

require 'card.php';
session_start();

$lucifer = new Image ("Images/lucifer.png", "Images/dos.jpeg", 1, 1);
// var_dump($lucifer -> _face);
$reading = new Image ("Images/reading.png", "Images/dos.jpeg", 2, 1);
$renaissance = new Image ("Images/renaissance.png", "Images/dos.jpeg", 3, 1);
$spring1 = new Image ("Images/spring1.png", "Images/dos.jpeg", 4, 1);
$spring2 = new Image ("Images/spring2.png", "Images/dos.jpeg", 5, 1);
$spring3 = new Image ("Images/spring3.png", "Images/dos.jpeg", 6, 1);
$luciferBis = new Image ("Images/lucifer.png", "Images/dos.jpeg", 7, 1);
$readingBis = new Image ("Images/reading.png", "Images/dos.jpeg", 8, 1);
$renaissanceBis = new Image ("Images/renaissance.png", "Images/dos.jpeg", 9, 1);
$spring1Bis = new Image ("Images/spring1.png", "Images/dos.jpeg", 10, 1);
$spring2Bis = new Image ("Images/spring2.png", "Images/dos.jpeg", 11, 1);
$spring3Bis = new Image ("Images/spring3.png", "Images/dos.jpeg", 12, 1);

$faceUpArray = array($lucifer, $reading, $renaissance, $spring1, $spring2,
$spring3, $luciferBis, $readingBis, $renaissanceBis, $spring1Bis, $spring2Bis, $spring3Bis);

// $foundPairs=array();

if(isset($_POST['startgame'])){
    shuffle($faceUpArray); 

    $_SESSION['start']=$faceUpArray;

    $_SESSION['clickcounter']=0;
}
if(isset($_POST['restartgame'])){
    session_destroy();
}

if(isset($_POST['submit'])){

$_SESSION['clickcounter']=$_SESSION['clickcounter']+1;
$click = $_SESSION['clickcounter'];
$valeur = $_POST['identifiant'];


$_SESSION['start'][$_POST['index']]->tournerCarte($_SESSION['start'][$_POST['index']]);

$_SESSION['start'][$_POST['index']]->foundPairs($_SESSION['start'][$_POST['index']]);


// $counter=0;
// for ($i=0; $i < count($_SESSION['pairs']); $i++){
//     $counter++;
// }
// if($counter > 2){


//     foreach($_SESSION['pairs'] as $infoCarte){
//         $infoCarte->_retourner = 1; 
//     }
//     unset($_SESSION['pairs']);
// }

// echo $counter;

    echo "<pre>";
    var_dump($_SESSION['pairs']);
    echo "</pre>";

// if ($click % 2 == 0){
        
//     if ($_SESSION['clickedID'] == $valeur){
//         echo 'cartes identiques'; 
        
        
//     }else{
//         echo 'cartes non identiques'; 
//     }
// }
// $_SESSION['clickedID'] = $valeur;

 }

// echo ($_SESSION['clickedID']);
/* var_dump($_SESSION['start']); */

?>


<!doctype html>
<html lang="eng">
<head>
  <meta charset="utf-8">
  <title>Memory game</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="" method="post">
        <button type="submit" name="startgame">Start game</button>
    </form>

    <form action="" method="post">
        <button type="submit" name="restartgame">Restart game</button>
    </form>

    
    <?php 
        if(isset($_SESSION['start'])){
            foreach($_SESSION['start'] as $key => $value) { 
                /* var_dump($value); */
                ?>
                <form action="" method='POST'>
                        <input type="hidden" name="retourner" value="<?= $value->_retourner ?>"/>
                        <input type="hidden" name="identifiant" value="<?= $value->_identifiant ?>"/>
                        <input type="hidden" name="index" value="<?= $key ?>"/>
                <?php
                    if($value->_retourner == 1){
                ?>
                        <button type="submit" name="submit">
                            <img src="<?= $value->_back ?>" width="200px">
                        </button>                        
                    </form>
                <?php
                        }elseif($value->_retourner == 2) {     
                ?> 
                <img src="<?= $value->_face ?>" width="200px">
              <?php  
                            }
                        }
                    }
                
        // echo "<br>";
        // echo "<pre>";
        // var_dump($_SESSION['start']);
        // echo "</pre>";
            ?>

</body>
</html>