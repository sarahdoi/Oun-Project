<?php
    define("DBHOST","localhost");
    define("DBUSER","root");
    define("DBPWD","");
    define("DBNAME","oun");


    $con = mysqli_connect( DBHOST , DBUSER , DBPWD , DBNAME );
    if (!$con )
    die('can not connect to db'.mysql_error());
    else
    echo('connection to db is successful');
?>
