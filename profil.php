<?php

session_start();

require_once 'profilDB.php';
require_once 'top.php';

// var_dump($_SESSION['user']['id']);

myResults($_SESSION['user']['id']);
myTop($_SESSION['user']['id']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil || Museum</title>
</head>
<body>
    
</body>
</html>

