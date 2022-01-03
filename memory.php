<!-- 
* plusieurs images sont présentées, il y a des pairs, elles sont arrangées sous forme de tableau 
* leur ordre est randomnisé selon la partie == chaque nouvelle partie (une nouvelle session crée lors de l'appui d'un bouton "jouer") -> nouvel ordre.
* quand le dos est cliqué -> l'image se retourne => face. La face n'est présentée que si et seulement si le dos est cliqué
 * deux clics possibles :: 
     -soit les deux images cliquées ne sont pas pareilles alors se retournent
     -soit les deux images cliquées sont pareilles alors ne se retournent plus 
-->

<?php

class Image {
    public $_face;
    public $_size;
}

function __construct ($face, $size){
    $this -> _face = $face;
    $this -> _size = $size;
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
    <!-- <img src="Images/lucifer.png">
    <img src="Images/lucifer.png">
    <img src="Images/renaissance.png">
    <img src="Images/renaissance.png"> -->

</body>
</html>