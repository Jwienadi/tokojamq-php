<?php 
session_start();
require_once('../config.php');

$sql = "SELECT m.nama_merk as 'merk',p.nama_product as 'nama',warna, tanggal_input as 'Tanggal Masuk'
FROM product_warna pw, product p,warna w,merk m
WHERE pw.product_id=p.product_id and pw.warna_id=w.warna_id and p.merk_id=m.merk_id;";

if (isset($_REQUEST['merk'])){
  $hasilmerk = stripslashes($_REQUEST['merk']); 
  $hasilmerk = mysqli_real_escape_string($con,$hasilmerk);
 
      if($hasilmerk!="all"){
        $sql .=" and m.merk_id='".$hasilmerk."';";
        //echo $sql;
        //echo $hasilmerk;
}
}
$result = mysqli_query($con,$sql) or die(mysqli_error());
$sql1="select * from merk;";
$merkresult=mysqli_query($con,$sql1) or die(mysqli_error());

while ($row=mysqli_fetch_assoc($merkresult)){
  $merks[]=$row;
}


if (isset($_REQUEST['Tanggal Masuk'])){
  $hasiltanggal = stripslashes($_REQUEST['Tanggal Masuk']); 
  $hasiltanggal = mysqli_real_escape_string($con,$hasiltanggal);
 
      if($hasiltanggal!="all"){
        $sql .=" and m.merk_id='".$hasiltanggal."';";
        //echo $sql;
        //echo $hasilmerk;
}
}
$hasil = mysqli_query($con,$sql) or die(mysqli_error());
$tanggal="SELECT day(tanggal_input) as 'tanggal', month(tanggal_input) as 'bulan', year(tanggal_input) as 'tahun'
FROM product p;";
$tanggalresult=mysqli_query($con,$tanggal) or die(mysqli_error());

while ($row=mysqli_fetch_assoc($tanggalresult)){
  $tanggals[]=$row;
}

$product=null;
//if($count_all_item>=1){
  while($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Admin Area</a>

    <!--<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>-->

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <!--<div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>-->
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link " href="../index.php"  role="button" >
        <i class="fas fa-globe-americas"></i> GO TO WEBSITE 
        </a>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="indexadmin.php">
          <!--<i class="fas fa-fw fa-tachometer-alt"></i>-->
          <span>Stok Barang</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="rep_transaksi.php">
          <!--<i class="fas fa-fw fa-table"></i>-->
          <span>Daftar Barang Baru</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="rep_datauser.php">
          <!--<i class="fas fa-fw fa-table"></i>-->
          <span>Daftar Data User</span>
        </a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="datauser.php">
          <!--<i class="fas fa-fw fa-table"></i>-->
          <span>Report 4</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="datauser.php">
          <!--<i class="fas fa-fw fa-table"></i>-->
          <span>Report 5</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="datauser.php">
          <!--<i class="fas fa-fw fa-table"></i>-->
          <span>Report 6</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="datauser.php">
          <!--<i class="fas fa-fw fa-table"></i>-->
          <span>Report 7</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="datauser.php">
          <!--<i class="fas fa-fw fa-table"></i>-->
          <span>Report 8</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="datauser.php">
          <!--<i class="fas fa-fw fa-table"></i>-->
          <span>Report 9</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="datauser.php">
          <!--<i class="fas fa-fw fa-table"></i>-->
          <span>Report 10</span>
        </a>
      </li>
    </ul>
       
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Daftar Barang Baru</div>
          <div class="card-body">
          <form action='' method='POST' class="pilihan" >
              <Select class="mb-2" name="merk" >
                <option value="all"<?php if(!isset($_REQUEST['merk'])){ echo"selected";} ?> >Show All</option>
                <?php foreach ($merks as $merk) { ?>
                <option value="<?php echo $merk['merk_id']; ?>" <?php if($_REQUEST['merk'] == $merk['merk_id']){ echo"selected";} ?>><?php echo $merk['nama_merk']; ?></option>
                <?php }?>
              </select>
            <form action='' method='POST' class="pilih" >
              <Select class="mb-2" name="tanggal" >
                <option value="all"<?php if(!isset($_REQUEST['Tanggal Masuk'])){ echo"selected";} ?> >Show All</option>
                <?php foreach ($tanggals as $tgl) { ?>
                <option value="<?php echo $tgl['tanggal']; ?>" <?php if($_REQUEST['Tanggal Masuk'] == $merk['tanggal']){ echo"selected";} ?>><?php echo $merk['tanggal']; ?></option>
                <?php }?>
              </select>
              <button type="submit">Filter</button>

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <?php
                  $fields=mysqli_fetch_fields($result);
                  foreach ($fields as $field) {
                    echo "<th>$field->name</th>";
                  }
                  ?>
                  </tr>
                </thead>
        
                <tbody>
                <?php
                foreach ($products as $product) {
                  $merk=$product['merk'];
                  $nama=$product['nama'];
                  $warna=$product['warna'];
                  $tglmsk=$product['Tanggal Masuk'];
                ?>
                  <tr>
                    <td><?php echo $merk; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $warna; ?></td>
                    <td><?php echo $tglmsk; ?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            </form>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Tokojamq 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="assets/vendor/chart.js/Chart.min.js"></script>
  <script src="assets/vendor/datatables/jquery.dataTables.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="assets/js/demo/datatables-demo.js"></script>
  <script src="assets/js/demo/chart-area-demo.js"></script>

</body>

</html>
