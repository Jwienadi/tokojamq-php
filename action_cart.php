<?php
session_start();
require_once('config.php');
//if (isset($_POST)){
  if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
        } else {
  
          //query cek apakah udh punya barang ini apa belom
   $cmd = "SELECT concat(m.nama_merk,' ',p.nama_product) as 'judul_barang',w.warna,p.harga_jual as 'harga_barang' ,bp.jumlah_barang, bp.product_warna_id as 'id' ,bp.id_barang_penjualan as 'idbp'
   from barang_penjualan bp, transaksi_penjualan tp, product_warna pw, product p, warna w, merk m 
   where pw.product_id=p.product_id and pw.warna_id=w.warna_id and p.merk_id=m.merk_id and bp.id_transaksi_penjualan=tp.id_transaksi_penjualan and bp.product_warna_id=pw.product_warna_id and bp.product_warna_id='".$product_id."' and bp.status=0 and tp.user_id='".$_SESSION['user_id']."';";
   
   //$cektransaksi= "SELECT * FROM transaksi_penjualan t where id_transaksi_penjualan='$_GET[id_transaksi_penjualan]'"
   $all_result 	= mysqli_query($con,$cmd) or die(mysqli_error($con));
   $ketemu = mysqli_num_rows($all_result);
  //echo $ketemu;
   $products = null;
   if ($ketemu != 0){
       while($row = mysqli_fetch_assoc($all_result)) {
           $products[] = $row;
       }
   }
   
   $idbp=$products[0]['idbp'];
  /*$cmd_product = "SELECT * FROM products_warna where product_warna_id='".$_GET['product_warna_id']."';";
  $cmd_product = "SELECT * FROM products_warna where product_warna_id='".$_GET['id']."';";
  $sql_product = mysqli_query($con, $cmd_product);
  $row_product = mysqli_fetch_assoc($sql_product);*/
  //$harga_satuan = $row_product['harga_jual'];
  $querytransaksi="select id_transaksi_penjualan from transaksi_penjualan where user_id='".$_SESSION['user_id']."' and status_pembayaran=0;";
  $runquerytransaksi=mysqli_query($con,$querytransaksi) or die(mysqli_error($con));
  $adatransaksi = mysqli_num_rows($runquerytransaksi);
  if ($adatransaksi==0){
   
    $inserttrans="INSERT INTO `transaksi_penjualan`( `user_id`, `bank_id`, `status_pembayaran`, `detail_pengiriman_id`, `tanggal_transaksi`, `subtotal_transaksi`, `total_transaksi`, `kode_promo`) 
    VALUES ('".$_SESSION['user_id']."',null,0,null,null,null,null,null)";
    $runinsert=mysqli_query($con,$inserttrans) or die(mysqli_error($con));

    $querytransaksi2="select id_transaksi_penjualan from transaksi_penjualan where user_id='".$_SESSION['user_id']."' and status_pembayaran=0;";
    $runquerytransaksi2=mysqli_query($con,$querytransaksi2) or die(mysqli_error($con));
    $transaksiid=mysqli_fetch_assoc($runquerytransaksi2);
  }else{
    
    $transaksiid=mysqli_fetch_assoc($runquerytransaksi);
  }
 
  if ($ketemu==0){
    //echo "aa";
   
    //echo $transaksiid;
      // kalau barang belum ada, maka di jalankan perintah insert
     // $subtotal = $harga_satuan * 1;
     //if (isset($_GET['id'])){
   
      $sql="INSERT INTO barang_penjualan(id_transaksi_penjualan,`status`,product_warna_id,jumlah_barang)
      values ('".$transaksiid['id_transaksi_penjualan']."', 0, '".$_GET['id']."' ,".$_GET['qty'].");";
   
      $createsql=mysqli_query($con,$sql) or die(mysqli_error($con));
     // }
     /*$q1="SELECT bp.id_barang_penjualan, tp.id_transaksi_penjualan, bp.product_warna_id, jumlah_barang, status, tp.user_id, status_pembayaran
     from transaksi_penjualan tp, barang_penjualan bp, user u, product_warna pw
     where bp.id_transaksi_penjualan=tp.id_transaksi_penjualan and pw.product_warna_id=bp.product_warna_id
     and u.user_id=tp.user_id and tp.user_id=1 and status=0 and status_pembayaran=0;";
      $jadi=mysqli_query($con,$q1) or die(mysqli_error($con));

     $id_bp = $_GET['id_barang_penjualan'];
     $id_tp = $_GET['id_transaksi_penjualan'];*/

     /*$tambah= "INSERT INTO barang_penjualan(id_barang_penjualan,id_transaksi_penjualan,`status`,product_warna_id,jumlah_barang)
          VALUES ('$_GET['id_barang_penjualan']', '$_GET['id_transaksi_penjualan']' , 0, '".$_GET['id']."' ', '".$_GET['stok']."');";
     mysqli_query($con, $tambah);
     die ();*/

     /*$ples="INSERT INTO transaksi_penjualan (user_id, status_pembayaran) values ('$_SESSION['user_id']',0);";
     mysqli_query($con, $ples);
     die ();*/
     // $tmp_cmd = "INSERT INTO barang_penjualan(id_barang_penjualan,id_transaksi_penjualan,`status`,product_warna_id,jumlah_barang)
             //     VALUES ('', 1, 0, '".$_GET['id']."' ', '".$_GET['stok']."');";
     // echo $tmp_cmd;
      //mysqli_query($con, $tmp_cmd);
     // die();
  } else {
      //  kalau barang ada, maka di jalankan perintah update

    $queryupdate="UPDATE barang_penjualan
    SET jumlah_barang=jumlah_barang + ".$_GET['qty']."
    WHERE id_barang_penjualan ='".$idbp."' AND product_warna_id='".$_GET['id']."' and `status`=0 and id_transaksi_penjualan=".$transaksiid['id_transaksi_penjualan'].";";
echo $queryupdate;
$runupdatee=mysqli_query($con,$queryupdate) or die(mysqli_error($con));
      
  }   
  header('Location: cart.php');
   $_SESSION['cart']=$products;
  }
 }
//}
?>