<?php
session_start();
require_once('../config.php');

 if($_POST){
    $p=$_POST;

    $pay=$p['pay'];
    $query = "SELECT * FROM bank WHERE bank_name='$pay'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $hasilpay=mysqli_fetch_assoc($result);
    $kalimathasil="Transfer ".$hasilpay['bank_name'].": No. Rekening ".$hasilpay['no_rek']." a/n ".$hasilpay['nama_rek'].".";
    echo $kalimathasil;
        
 }
?>