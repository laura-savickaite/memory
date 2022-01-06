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

    session_start();

class Image {
    public $_face;
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

$foundPairs=array();

if(isset($_POST['startgame'])){

    shuffle($faceUpArray); 

    $_SESSION['start']=$faceUpArray;

    $_SESSION['clickcounter']=0;
}
if(isset($_POST['restartgame'])){
    session_destroy();
}

if (isset($_POST['face'])){

    $_SESSION['clickcounter']=$_SESSION['clickcounter']+1;
    $click = $_SESSION['clickcounter'];
    $valeur = $_POST['face'];
    //     echo $click.'<br>';
    //     echo $valeur;
    // var_dump($_SESSION['clickedID']);
        //tous les nombres pairs tu vas vérifier:
    if ($click % 2 == 0){
        
        if ($_SESSION['clickedID'] == $valeur){
            echo 'cartes identiques'; 
              
            if (!isset($_SESSION["foundpairs"])){
                $_SESSION["foundpairs"] = [];
            }
            $i = 0;
            foreach ($_SESSION["foundpairs"] as $key => $value) {
                $i++;
            }
            if (isset($_SESSION["foundpairs"])){
                $_SESSION["foundpairs"][$i] = $valeur;
                $foundPairs = $_SESSION["foundpairs"];
            }
            var_dump($_SESSION["foundpairs"][$i]);
        }else{
            echo 'cartes non identiques';
        }
    }
    $_SESSION['clickedID'] = $valeur;
    //refais étape par étape avant click, premier click etc... session tjs un train de retard donc retente, si comprend pas pk la session à la fin : j'ouvre la page, je ne clique sur rien : rien ne se passe. Je clique sur une carte -> la session clickcounter se lance, click prend la valeur 1, valeur prend la valeur de la carte, la boucle ne va pas dans le if, et straight à dire que la session clickedID va prendre la valeur. Ensuite je clique une nouvelle fois, la session clickedID a tjs une valeur stockée, je refais toute la boucle from Post['face'] etc... $valeur a une nouvelle valeur : celle de la nouvelle carte cliquée et SEULEMENT LA je rentre dans la boucle if click modulo de 2, dans ce cas, je lui dis : la session que tu avais au tour précédant, que tu as stocké, tu vas me la comparer avec la nouvelle valeur que tu t'es stocké dans $valeur. Une fois que la boucle se termine, je lui redis que Session clickedId aura du coup à nouveau la nouvelle valeur qui est stockée dans valeur etc...etc...



    if($click == 2){
        $_SESSION['clickcounter']=0;
    }   
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

    <form action="" method="post">
    <?php 
        if(isset($_SESSION['start'])){
            foreach($_SESSION['start'] as $faceUp) { 
                if(in_array($faceUp->_identifiant, $foundPairs)) {
                    ?>
                        <img src="<?php echo $faceUp->_face ?>">
                <?php        
                }else{ 
                    ?>
                        <button type="submit" name="face" value="<?php echo $faceUp->_identifiant ?>">
                            <img src="<?php echo $faceUp->_face ?>">
                        </button>
                    <?php

                }
                 
            }
        } 
  
        ?>           
    </form>

</body>
</html>

<!-- pour choisir dans l'array que quelques pairs -->
<!-- for ($i = 0 ; $i < 3 ; $i ++)

{

    echo "<td align = 'center'> <img src = \"" ;

    echo $faceUpArray [$i] ;

    echo " \" width = '115' height = '115' </td>" ;

}

    ?> -->
