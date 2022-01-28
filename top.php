<?php

function myResults ($id_utilisateur){
    require 'bdd_connect.php';

    $searchDB=$pdo -> prepare('SELECT `score` FROM `game` WHERE id_utilisateurs=:id_utilisateur');
    $searchDB -> execute(['id_utilisateur' => $id_utilisateur]);
    $resultSearchMyResults = $searchDB->fetchAll(PDO::FETCH_COLUMN);

    var_dump($resultSearchMyResults);
}

function myTop ($id_utilisateur){
    require 'bdd_connect.php';

    $myTopDB=$pdo -> prepare('SELECT `score` FROM `game` WHERE id_utilisateurs=:id_utilisateur ORDER BY score DESC LIMIT 3');
    $myTopDB -> execute(['id_utilisateur' => $id_utilisateur]);
    $resultSearchMyTop = $myTopDB->fetchAll(PDO::FETCH_COLUMN);

    var_dump($resultSearchMyTop);
}

function top (){
    require 'bdd_connect.php';

    $topDB=$pdo -> prepare('SELECT game.score, utilisateurs.login FROM `utilisateurs` INNER JOIN game ON id_utilisateurs=utilisateurs.id ORDER BY score DESC LIMIT 10');
    $topDB -> execute();
    $resultSearchTop = $topDB->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($resultSearchTop);
    $_SESSION['top']=$resultSearchTop;

}

?>