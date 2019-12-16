<?php
    /*$base_url = "http://localhost/tokojamq/tokojamq-php/";
    $servername = "jmswijaya.com";
    $username 	= "isb18";
    $password 	= "Isb_2018";
    $dbname 	= "store18_1";*/
    $ip_server = $_SERVER['SERVER_ADDR'];

    if(($ip_server=='127.0.0.1')||($ip_server=="::1")){
        $base_url = "http://localhost/tokojamq/tokojamq-php/";
        $servername = "jmswijaya.com";
        $username 	= "isb18";
        $password 	= "Isb_2018";
        $dbname 	= "store18_1";
    } else {
        $base_url = "http://tokojamq.xyz/";
        $servername = "tokojamq.xyz/phpmyadmin";
        $username 	= "melisa";
        $password 	= "melisa";
        $dbname 	= "tokojamq";
    }

    $con = new mysqli($servername, $username, $password,$dbname);
    
   
    
?>