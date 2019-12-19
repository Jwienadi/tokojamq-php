<?php
session_start();
require_once('../config.php');

 if($_POST){
   $idtp=$_POST['idtp'];
   $bankid=$_POST['bankid'];
   $alamat=$_POST['alamat'];
   $subtot=$_POST['subtot'];
   $tot=$_POST['tot'];
   $kodepromo=$_POST['kodepromo'];
   $ongkir=$_POST['ongkir'];
   $nama=$_POST['nama'];
   $notelp=$_POST['notelp'];
   $kota=$_POST['kota'];
   $prov=$_POST['prov'];
   //echo $prov."yay";

    //$pay=$_POST['$p['pay'];
    /*$query =$_POST[' "SELECT * FROM bank WHERE bank_name=$_POST[''$pay'";
    $result =$_POST[' mysqli_query($con'];$query) or die(mysql_error());
    $hasilpay=$_POST['mysqli_fetch_assoc($result);
    $kalimathasil=$_POST['"Transfer ".$hasilpay['bank_name']."=$_POST[' No. Rekening ".$hasilpay['no_rek']." a/n ".$hasilpay['nama_rek'].".";
    echo $kalimathasil;*/
   //----------------------------------------------------------------
   //$queryselectalamat="select * from alamat where user_id=$_SESSION['user_id']";
   
   $queryinsertalamat="INSERT INTO `alamat`(`user_id`, `alamat_user`, `provinsi_user`, `kota_user`, `kecamatan_user`, `kodepos_user`) 
   VALUES ('".$_SESSION['user_id']."','".$alamat."','".$prov."','".$kota."',null,null)";
  $runinsertalamat=mysqli_query($con,$queryinsertalamat) or die(mysql_error());
   //echo $queryinsertalamat;

   $queryinsertdetailpengiriman="INSERT INTO `detail_pengiriman`(`pengiriman_id`, `no_resi_pengiriman`, `tanggal_pengiriman`, `tanggal_sampai`, `biaya_pengiriman`, `nama_penerima`, `no_telp_penerima`, `alamat_user`, `kota_user`, `kodepos_user`, `provinsi_user`, `kecamatan_user`) 
   VALUES (1,null,null,null,'$ongkir','$nama','$notelp','$alamat','$kota',null,'$prov',null)";
   $runinsertdp=mysqli_query($con,$queryinsertdetailpengiriman) or die(mysql_error());
  
   $queryselectdetailpengiriman="select detail_pengiriman_id as 'id' from detail_pengiriman where alamat_user='$alamat' and kota_user='$kota' and provinsi_user='$prov' and nama_penerima='$nama' and no_telp_penerima='$notelp'";
   $hasilselectdp=mysqli_query($con,$queryselectdetailpengiriman) or die(mysql_error());
   $iddp=mysqli_fetch_assoc($hasilselectdp);
   //echo $iddp['id'];
   //echo $queryselectdetailpengiriman;
   //fetch assoc dulu
   $queryupdatetransaksipenjualan="update transaksi_penjualan tp,barang_penjualan bp set tp.bank_id='$bankid',tp.status_pembayaran=1,tp.detail_pengiriman_id='".$iddp['id']."',tp.tanggal_transaksi=CURRENT_TIMESTAMP,tp.subtotal_transaksi=$subtot,tp.total_transaksi=$tot,tp.kode_promo='$kodepromo' where tp.id_transaksi_penjualan=bp.id_transaksi_penjualan and tp.user_id='".$_SESSION['user_id']."' and bp.status=0 and tp.status_pembayaran=0 and tp.id_transaksi_penjualan=$idtp;";
   //echo $queryupdatetransaksipenjualan;
   $runupdatetp=mysqli_query($con,$queryupdatetransaksipenjualan) or die(mysqli_error());
   
   //masih ngeBUG

   $queryupdatebarangpenjualan="update transaksi_penjualan tp,barang_penjualan bp set bp.status=1 where tp.id_transaksi_penjualan=bp.id_transaksi_penjualan and tp.user_id='".$_SESSION['user_id']."' and bp.status=0 and tp.status_pembayaran=1 and bp.id_transaksi_penjualan='$idtp';";
   $runupdatebp=mysqli_query($con,$queryupdatebarangpenjualan) or die(mysql_error());
 //echo $queryupdatebarangpenjualan;
  }
?>