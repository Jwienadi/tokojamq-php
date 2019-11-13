<?php
    $base_url = "http://localhost/tokojamq/tokojamq-php/";
    $servername = "jmswijaya.com";
    $username 	= "isb18";
    $password 	= "Isb_2018";
    $dbname 	= "store18_1";

    $con = new mysqli($servername, $username, $password,$dbname);
    
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    
?>