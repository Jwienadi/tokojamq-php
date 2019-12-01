<?php
session_start();
require_once('../config.php');
if($_POST){
    //echo "hi";
    $p=$_POST;
    $idbarang=$p['id_barang'];
   // $qtybarang=$p['qty'];
   $idbp=$p['id_bp'];
   //echo "hi";
    foreach($_SESSION['cart'] as $key=>$value) {
        $item_cart=$value;
        if($item_cart['product_warna_id']==$idbarang){
            //$_SESSION['cart'][$key]['jumlah_barang']=$qtybarang;
            $_SESSION['cart'][$key]['id_barang_penjualan']=$idbp;
        }
    }
//echo "hi";
//echo "<h1>BERHASIL UPDATE ID=".$idbarang."  dan dibp=".$idbp." !</h1>";
$query="DELETE barang_penjualan 
from barang_penjualan 
inner join transaksi_penjualan 
on barang_penjualan.id_transaksi_penjualan=transaksi_penjualan.id_transaksi_penjualan 
where product_warna_id='$idbarang' and id_barang_penjualan='$idbp' and status=0";

//echo $query;
if (mysqli_query($con, $query)) {
    echo "Record deleted successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}}

//mysqli_close($con);*/

?>