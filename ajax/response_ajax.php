<?php
session_start();
require_once('../config.php');
if($_POST){
    $p=$_POST;
    $idbarang=$p['id_barang'];
    $qtybarang=$p['qty'];

    foreach($_SESSION['cart'] as $key=>$value) {
        $item_cart=$value;
        if($item_cart['product_warna_id']==$idbarang){
            $_SESSION['cart'][$key]['jumlah_barang']=$qtybarang;
        }
    }

//echo"<h1>BERHASIL UPDATE ID=$idbarang dengan qty=$qtybarang !</h1>";
$query="UPDATE barang_penjualan bp,transaksi_penjualan tp 
SET bp.jumlah_barang='$qtybarang' 
where bp.id_transaksi_penjualan=tp.id_transaksi_penjualan 
and product_warna_id=$idbarang and user_id=".$_SESSION['user_id'].";";
//echo $query;
if (mysqli_query($con, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}}

//mysqli_close($con);
?>