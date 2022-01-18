<?php
    $host='localhost';
    $user='root';
    $password='';
    $dbname='memory';

    $dsn='mysql:host='.$host.'; dbname='.$dbname.'; charset=utf8';

    $pdo=new PDO($dsn, $user, $password);
?>