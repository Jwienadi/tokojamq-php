<?php
require_once('../config.php');
if($_POST){
    $p=$_POST;
  

    $kode=$p['promo'];
$query="SELECT * from promo_code where kode_promo='".$kode."';";
$result = mysqli_query($con,$query) or die(mysql_error());
$hasil = mysqli_fetch_assoc($result);
$rows=mysqli_num_rows($result);
if ($rows==1){
echo $hasil['jumlah_promo'];
}else {
    echo "0";
}
}
?>