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

    $score=0;
 
}
if(isset($_POST['restartgame'])){
    session_destroy();
}

if (!isset($_SESSION['indexShowed']))
    $_SESSION['indexShowed'] = array();
if (!isset($_SESSION['signal']))
    $_SESSION['signal'] = -1;

if (isset($_SESSION['signal']) && $_SESSION['signal'] == 1){
    $_SESSION['signal'] = 0;
    $_SESSION['start'][$_SESSION['indexShowed'][0]]->retournerCarte($_SESSION['start'][$_SESSION['indexShowed'][0]]);
    $_SESSION['start'][$_SESSION['indexShowed'][1]]->retournerCarte($_SESSION['start'][$_SESSION['indexShowed'][1]]);
    unset($_SESSION['indexShowed']);
    $_SESSION['indexShowed'] = array();

}
else if(count($_SESSION['indexShowed']) == 2){
    $_SESSION['found']=1;
    @$_SESSION['foundcards']++;  
    unset($_SESSION['indexShowed']);
    $_SESSION['indexShowed'] = array();

}

var_dump($_SESSION['indexShowed']);

if(isset($_POST['submit'])){

array_push($_SESSION['indexShowed'],$_POST['index']);
// var_dump($_SESSION['indexShowed']);
$_SESSION['start'][$_POST['index']]->tournerCarte($_SESSION['start'][$_POST['index']]);


$_SESSION['clickcounter']=$_SESSION['clickcounter']+1;
    echo $_SESSION['clickcounter']; 

 }

?>


<!doctype html>
<html lang="eng">
<head>
  <meta charset="utf-8">
  <title>Memory game</title>
  <link rel="stylesheet" href="memory.css">
</head>
<body>

    <form action="" method="post">
        <button type="submit" name="startgame">Start game</button>
    </form>

    <form action="" method="post">
        <button type="submit" name="restartgame">Restart game</button>
    </form>

    <div class="table-memory">
    <?php 
        if(isset($_SESSION['start'])){
            foreach($_SESSION['start'] as $key => $value) { 
                ?>
                <form action="" method='post'>
                <?php
                    // var_dump($value->_retourner);

                    if($value->_retourner == 1){
                ?>                    
                        <input type="hidden" name="retourner" value="<?= $value->_retourner ?>"/>
                        <input type="hidden" name="identifiant" value="<?= $value->_identifiant ?>"/>
                        <input type="hidden" name="index" value="<?= $key ?>"/>
                        <button type="submit" name="submit">
                            <img src="<?= $value -> _back; ?>" width="100px">
                        </button>                    
                    </form>
                <?php
                        }elseif($value->_retourner == 2) {     
                ?> 
                    <img src="<?= $value -> _face; ?>" width="100px">
              <?php  
                                if (isset($_POST['index']))
                                $_SESSION['start'][$_POST['index']]->foundPairs($_SESSION['start'][$_POST['index']]);
 
                        }
                    }

                }
                
            ?>
    </div>
</body>
</html>
