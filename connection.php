<?php
    // create connection
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "webpage";
    // verify connection
    $conn = new mysqli ($servername, $username, $password, $database);

    if ($conn->connect_error){
        die ("Connection failed" . $conn->connect_error);
    }
    // echo "Connection successfully ";
?>