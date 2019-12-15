<?php 
session_start();
require_once('../config.php');
if (!isset($_GET['merk'])){
 header("Location: indexadmin.php?merk=all&sort=default");
}
$sql = "SELECT  pw.product_warna_id as 'foto',nama_merk as 'merk',nama_product as 'nama',warna,stok 
from product_warna pw,product p,warna w,merk m 
where pw.product_id=p.product_id and m.merk_id=p.merk_id and w.warna_id=pw.warna_id";

if (isset($_GET['merk'])){
  $hasilmerk = $_GET['merk']; 

      if($hasilmerk!="all"){
        $sql .=" and m.merk_id='".$hasilmerk."'";
}}
if (isset($_GET['sort'])){
  $sql .=" order by";;
  $hasilsort =$_GET['sort']; 
  //echo $hasilsort;
  if($hasilsort=="default"){
    $sql .=" pw.product_warna_id ";
  }
  if($hasilsort=="stok"){
    $sql .=" pw.stok desc ";
  }
  if($hasilsort=="baru"){
    $sql .=" p.tanggal_input";
  }}

//echo $sql;
$result = mysqli_query($con,$sql) or die(mysqli_error());

$sql1="select * from merk;";
$merkresult=mysqli_query($con,$sql1) or die(mysqli_error());
while ($row=mysqli_fetch_assoc($merkresult)){
  $merks[]=$row;
}
//print_r($merks);

//for($i = 0; $i < mysql_num_fields($result); $i++) {
  //$field_info = mysql_fetch_field($result, $i);
  //echo "<th>{$field_info}</th>";
//}

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
    <!--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">-->
      <!--<div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>-->
    <!--</form>-->

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link " href="../index.php" role="button">
          <i class="fas fa-globe-americas"></i> GO TO WEBSITE

        </a>
        <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>-->
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
        <a class="nav-link" href="rep_barangbaru.php">
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
      <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.html">Login</a>
          <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>-->
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Stok Barang</div>
          <div class="card-body">
            <form action='' method='GET' class="pilihan" >
              <Select class="mb-2" name="merk" >
                <option value="all" <?php if(!isset($_GET['merk'])){ echo"selected";} ?><?php if($_GET['merk'] == "all"){ echo"selected";} ?> >Show All</option>
                <?php foreach ($merks as $merk) { ?>
                <option value="<?php echo $merk['merk_id']; ?>" <?php if((isset ($_GET['merk'])) && $_GET['merk'] == $merk['merk_id']){ echo"selected";} ?>><?php echo $merk['nama_merk']; ?></option>
                <?php }?>
              </select>
              <Select class="mb-2" name="sort">
              <option value="default" <?php if(!isset($_GET['sort'])){ echo"selected";} ?>>Default</option>
              <option value="stok" <?php if($_GET['sort'] == 'stok'){ echo"selected";} ?>>Stok Terbanyak</option>
              <option value="baru" <?php if($_GET['sort'] == 'baru'){ echo"selected";}  ?>>Barang Terbaru</option>
              </select>
              <button type="submit">Filter</button>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    
                      <?php
                 /* foreach ($field_info) {
                    echo "<th>{$field_info}</th>";
                  }*/
                  /*for($i = 0; $i < mysqli_num_fields($result); $i++) {
                    $field_info = mysqli_fetch_field($result, $i);
                    echo "<th>".$field_info."</th>";*/
                   /* foreach($row as $field => $value) {
                      echo '<th>'.htmlentities($field).'</th>';
                  }*/
                
                  $fields=mysqli_fetch_fields($result);
                  foreach ($fields as $field) {
                    echo "<th>$field->name</th>";
                  }
                
                  ?>
                      <!--<th>
                    <th>Position</th>
                    <th>Id product</th>
                    <th>Nama Product</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>-->
                    </tr>
                  </thead>
                  <!--<tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </tfoot> -->
                  <tbody>
                    <?php
                foreach ($products as $product) {
                  $id=$product['foto'];
                  $merk=$product['merk'];
                  $nama=$product['nama'];
                  $warna=$product['warna'];
                  $stok=$product['stok'];

                ?>
                    <tr>
                      <td><img src="../assets/img/products/<?php echo $id;?>.jpg" alt="Image" style="width:60px; height:60px;"></td>
                      <td><?php echo $merk; ?></td>
                      <td><?php echo $nama; ?></td>
                      <td><?php echo $warna; ?></td>
                      <td><?php echo $stok; ?></td>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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

  <script>

  function reload(val){
      location.reload(true);
    }
  </script>
</body>

</html>
