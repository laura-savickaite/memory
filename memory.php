<!-- 
I- plusieurs images sont présentées, une image est présentée deux fois, elles sont arrangées sous forme de tableau 
    a) créer un tableau avec les images stockées
    b) créer une boucle disant que chaque image doit être doublée
    c) display ces images dans un tableau html // à voir

II- leur ordre est randomnisé selon la partie == chaque nouvelle partie (une nouvelle session crée lors de l'appui d'un bouton "jouer") -> nouvel ordre.


III- quand le dos est cliqué -> l'image se retourne => face. La face n'est présentée que si et seulement si le dos est cliqué
    a)
    b)
    c)

IV- deux clics possibles :: 
     -soit les deux images cliquées ne sont pas pareilles alors se retournent
     -soit les deux images cliquées sont pareilles alors ne se retournent plus 
-->

<?php

class Image {
    public $_face;
    public $_size;
    public $_identifiant;
    
    public function __construct (string $face, int $identifiant){
        $this->_face = $face;
        $this->_identifiant = $identifiant;
    }
}


$lucifer = new Image ("Images/lucifer.png", 1);
// var_dump($lucifer -> _face);
$reading = new Image ("Images/reading.png", 2);
$renaissance = new Image ("Images/renaissance.png", 3);
$spring1 = new Image ("Images/spring1.png", 4);
$spring2 = new Image ("Images/spring2.png", 5);
$spring3 = new Image ("Images/spring3.png", 6);

$faceUpArray = array($lucifer, $reading, $renaissance,$spring1, $spring2,
$spring3);
$faceUpArray = array_merge($faceUpArray,$faceUpArray);


//ATTENTION QUAND JE CLIQUE SUR UNE CARTE IL ME REMET LES CARTE DANS L'ORDRE
if(isset($_POST['startgame'])){
    
    // créer une session 
}

    // si une session existante
    shuffle($faceUpArray); 
    if (isset($_POST['face'])){
        echo "ok";
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

    <form action="memory.php" method="post">
        <button type="submit" name="startgame">Start game</button>
    </form>


    <form action="memory.php" method="post">

    <?php 
            foreach($faceUpArray as $faceUp) { 
        ?> 
                <button type="submit" name="face">
                    <img src="<?php echo $faceUp->_face ?>">
                </button>
        <?php
            }
        ?>

    </form>

</body>
</html>