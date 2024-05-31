<?php

    try {
        //Host
        define("HOST", "localhost");

        //DBName
        define("DBNAME", "dollpins");

        //User
        define("USER", "root");

        //Password
        define('PASS', '');

        $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //if ($conn == true) echo "Connection established";
        
    } catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
        return "Error: ".$e->getMessage();
    }

?>