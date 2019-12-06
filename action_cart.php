<?php
if (isset($_POST)){
  if(isset($_GET['id'])){
    if(!isset($_SESSION['user_id'])){
      header("Location: index.php");
    } else {
  
   $cmd = " SELECT concat(m.nama_merk,' ',p.nama_product) as 'judul_barang',w.warna,p.harga_jual as 'harga_barang' ,bp.jumlah_barang, bp.product_warna_id ,bp.id_barang_penjualan 
   from barang_penjualan bp, transaksi_penjualan tp, product_warna pw, product p, warna w, merk m 
   where pw.product_id=p.product_id and pw.warna_id=w.warna_id and p.merk_id=m.merk_id and bp.id_transaksi_penjualan=tp.id_transaksi_penjualan and bp.product_warna_id=pw.product_warna_id and status=0 and user_id=".$_SESSION['user_id'].";";
   
   $all_result 	= mysqli_query($con,$cmd) or die(mysqli_error($con));
   $ketemu = mysqli_num_rows($all_result);
  
   $products = null;
   if ($ketemu >= 1){
       while($row = mysqli_fetch_assoc($all_result)) {
           $products[] = $row;
       }
   }
   $cmd_product = "SELECT * FROM products where id='$_GET[id]'";
  $sql_product = mysqli_query($con, $cmd_product);
  $row_product = mysqli_fetch_assoc($sql_product);
  //$harga_satuan = $row_product['harga_jual'];
  if ($ketemu==0){
      // kalau barang belum ada, maka di jalankan perintah insert
     // $subtotal = $harga_satuan * 1;
      $tmp_cmd = "INSERT INTO barang_penjualan(id_barang_penjualan,product_warna_id,jumlah_barang,`status`)
                  VALUES ('$id_bp', '$_GET[id]', '$_POST[stok]', '0')";
      echo $tmp_cmd;
      mysqli_query($con, $tmp_cmd);
      die();
  } else {
      //  kalau barang ada, maka di jalankan perintah update
      mysqli_query($con, "UPDATE barang_penjualan
              SET jumlah_barang = jumlah_barang + 1
              WHERE id_barang_penjualan ='$id_bp' AND id_product='$_GET[id]'");       
  }   
  header('Location: cart.php');
   $_SESSION['cart']=$products;
  }
 }
}
?>