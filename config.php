<?php
    $base_url = "http://localhost/tokojamq/tokojamq-php/";
    $servername = "localhost";
    $username 	= "root";
    $password 	= "";
    $dbname 	= "tokojamq";

    $conn = new mysqli($servername, $username, $password,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>