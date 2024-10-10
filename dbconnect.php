<?php

try {
    $host = "localhost";
    $dbname = "pyae_post";
    $dbuser = "root";
    $dbpassword = "";

    // Data Source Name
    $dsn = "mysql:host=$host;dbname=$dbname"; //mysql ထဲက host ထဲက $host ကို ထုတ်တာ mysql ထဲက dbname ထဲက $dbname ကို ထုတ်တာ
    $conn = new PDO($dsn,$dbuser,$dbpassword); 

    // or

    // $conn = new PDO("mysql:host=$host;dbname=$dbname",$dbuser,$dbpassword);

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    // echo "connection success";
} catch (PDOException $e) {
    die("Connection fail".$e->getMessage());
}