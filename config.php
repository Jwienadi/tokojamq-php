<?php
    $ip_server = $_SERVER['SERVER_ADDR'];

    if(($ip_server=='127.0.0.1')||($ip_server=="::1")){
        $base_url = "http://localhost/tokojamq/tokojamq-php/";
        $servername = "hidden";
        $username 	= "hidden";
        $password 	= "hidden";
        $dbname 	= "hidden";
    } else {
        $base_url = "http://tokojamq.xyz/";
        $servername = "hidden";
        $username 	= "hidden";
        $password 	= "hidden";
        $dbname 	= "hidden";
    }

    $con = new mysqli($servername, $username, $password,$dbname);
    /*if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
     }
       echo "Connected successfully";*/
     
   
    
?>
