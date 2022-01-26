<?php

require_once 'card.php';
require_once 'score.php';
require_once 'level.php';

session_start();

// if(isset($_SESSION)){
//     var_dump($_SESSION['user']);
// }



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
$crown = new Image ("Images/crown.png", "Images/dos.jpeg", 13, 1);
$renaissance1 = new Image ("Images/renaissance1.png", "Images/dos.jpeg", 14, 1);
$eyes = new Image ("Images/eyes.png", "Images/dos.jpeg", 15, 1);
$sunflowers = new Image ("Images/sunflowers.png", "Images/dos.jpeg", 16, 1);
$grec = new Image ("Images/grec.png", "Images/dos.jpeg", 17, 1);
$laurier = new Image ("Images/laurier.png", "Images/dos.jpeg", 18, 1);
$crownBis = new Image ("Images/crown.png", "Images/dos.jpeg", 19, 1);
$renaissance1Bis = new Image ("Images/renaissance1.png", "Images/dos.jpeg", 20, 1);
$eyesBis = new Image ("Images/eyes.png", "Images/dos.jpeg", 21, 1);
$sunflowersBis = new Image ("Images/sunflowers.png", "Images/dos.jpeg", 22, 1);
$grecBis = new Image ("Images/grec.png", "Images/dos.jpeg", 23, 1);
$laurierBis = new Image ("Images/laurier.png", "Images/dos.jpeg", 24, 1);


$faceUpArrayEasy = array($lucifer, $reading, $renaissance, $luciferBis, $readingBis, $renaissanceBis);
$faceUpArrayMedium = array($lucifer, $reading, $renaissance, $spring1, $spring2,
$spring3, $luciferBis, $readingBis, $renaissanceBis, $spring1Bis, $spring2Bis, $spring3Bis);
$faceUpArrayHard = array($lucifer, $reading, $renaissance, $spring1, $spring2,
$spring3, $crown, $renaissance1, $eyes, $sunflowers, $grec, $laurier, $luciferBis, $readingBis, $renaissanceBis, $spring1Bis, $spring2Bis, $spring3Bis, $crownBis, $renaissance1Bis, $eyesBis, $sunflowersBis, $grecBis, $laurierBis);


if(isset($_POST['startgame'])){

    var_dump($_POST['lvl']);

    if($_POST['lvl'] == "easy"){
        lvlShuffle($faceUpArrayEasy);
    }
    elseif($_POST['lvl'] == "medium"){
        lvlShuffle($faceUpArrayMedium);
    }else {
        lvlShuffle($faceUpArrayHard);
    }

    // shuffle($faceUpArray); 

    // $_SESSION['start']=$faceUpArray;

    // $_SESSION['clickcounter']=0;
 
}
if(isset($_POST['restartgame'])){
    unset($_SESSION['indexShowed']);
    unset($_SESSION['start']);
    unset($_SESSION['clickcounter']);
    unset($_SESSION['signal']);
    unset($_SESSION['found']);
    unset($_SESSION['foundcards']);
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
    unset($_SESSION['indexShowed']);
    @$_SESSION['foundcards']++; 
    $_SESSION['indexShowed'] = array();

}

if(isset($_POST['submit'])){
array_push($_SESSION['indexShowed'],$_POST['index']);
// var_dump($_SESSION['indexShowed']);
$_SESSION['start'][$_POST['index']]->tournerCarte($_SESSION['start'][$_POST['index']]);


$_SESSION['clickcounter']=$_SESSION['clickcounter']+1;
    // echo $_SESSION['clickcounter']; 
 }


 if(isset($_SESSION['found'])){
    if(@isset($_SESSION['foundcards'])){
        // var_dump($_SESSION['foundcards']);
        if($_SESSION['foundcards'] == ((count($_SESSION['start'])/2)-1)){ 
            if(!empty($_SESSION['clickcounter'])){
                // var_dump($_SESSION['clickcounter']);
                getScore($_SESSION['clickcounter']);
            }
        }
    }
} 
// var_dump($_SESSION['start']);

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
    <label for="lvl">Choose a level:</label>
        <select id="lvl" name="lvl">
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
        </select>
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
