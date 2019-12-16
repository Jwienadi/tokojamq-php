<?php
session_start();
require_once('config.php');
//if (isset($_POST)){
  if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
        } else {
  
   $cmd = "SELECT concat(m.nama_merk,' ',p.nama_product) as 'judul_barang',w.warna,p.harga_jual as 'harga_barang' ,bp.jumlah_barang, bp.product_warna_id as 'id' ,bp.id_barang_penjualan 
   from barang_penjualan bp, transaksi_penjualan tp, product_warna pw, product p, warna w, merk m 
   where pw.product_id=p.product_id and pw.warna_id=w.warna_id and p.merk_id=m.merk_id and bp.id_transaksi_penjualan=tp.id_transaksi_penjualan and bp.product_warna_id=pw.product_warna_id and bp.product_warna_id='".$product_id."' and bp.status=0 and tp.user_id='".$_SESSION['user_id']."';";
   
   //$cektransaksi= "SELECT * FROM transaksi_penjualan t where id_transaksi_penjualan='$_GET[id_transaksi_penjualan]'"
   $all_result 	= mysqli_query($con,$cmd) or die(mysqli_error($con));
   $ketemu = mysqli_num_rows($all_result);
  //echo $ketemu;
   $products = null;
   if ($ketemu >= 1){
       while($row = mysqli_fetch_assoc($all_result)) {
           $products[] = $row;
       }
   }
  /*$cmd_product = "SELECT * FROM products_warna where product_warna_id='".$_GET['product_warna_id']."';";
  $cmd_product = "SELECT * FROM products_warna where product_warna_id='".$_GET['id']."';";
  $sql_product = mysqli_query($con, $cmd_product);
  $row_product = mysqli_fetch_assoc($sql_product);*/
  //$harga_satuan = $row_product['harga_jual'];

  if ($ketemu==0){
      // kalau barang belum ada, maka di jalankan perintah insert
     // $subtotal = $harga_satuan * 1;
     //if (isset($_GET['id'])){
      $sql="INSERT INTO barang_penjualan(id_transaksi_penjualan,`status`,product_warna_id,jumlah_barang)
      values (1, 0, '".$_GET['id']."' ,".$_GET['qty'].");";
      echo $sql;
      $createsql=mysqli_query($con,$sql) or die(mysqli_error($con));
     // }
     // $tmp_cmd = "INSERT INTO barang_penjualan(id_barang_penjualan,id_transaksi_penjualan,`status`,product_warna_id,jumlah_barang)
             //     VALUES ('', 1, 0, '".$_GET['id']."' ', '".$_GET['stok']."');";
     // echo $tmp_cmd;
      //mysqli_query($con, $tmp_cmd);
     // die();
  } else {
      //  kalau barang ada, maka di jalankan perintah update
    /*$queryupdate="UPDATE barang_penjualan
    SET jumlah_barang=jumlah_barang + '$_GET['qty']'
    WHERE id_barang_penjualan ='$id_bp' AND product_warna_id='$_GET['id']'"
      mysqli_query($con,$queryupdate);       */
  }   
  header('Location: cart.php');
   $_SESSION['cart']=$products;
  }
 }
//}
?>