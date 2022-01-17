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


    // echo "<pre>";
    // var_dump($_SESSION['pairs']);
    // echo "</pre>";

 }


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
                
            ?>

</body>
</html>
