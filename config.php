<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'poke-3000';


    $db = new mysqli($servername, $username, $password, $dbname);

    if(!$db) {
        die("Connection failed: " . $error);
    } else {
        // echo 'Connected';
    }
 
?>