<?php 
session_start();
require_once('../config.php');
if (!isset($_GET['merk'])){
header("Location: rep_barangbaru.php?merk=all&sort=default");
}
$sql = "SELECT m.nama_merk as 'merk',p.nama_product as 'nama',warna, tanggal_input
FROM product_warna pw, product p,warna w,merk m
WHERE pw.product_id=p.product_id and pw.warna_id=w.warna_id and p.merk_id=m.merk_id";

if (isset($_GET['merk'])){
  $hasilmerk = $_GET['merk']; 

      if($hasilmerk!="all"){
        $sql .=" and m.merk_id='".$hasilmerk."'";
}}
// Date filter
if(isset($_POST['but_search'])){
  $fromDate = $_POST['fromDate'];
  $endDate = $_POST['endDate'];

  if(!empty($fromDate) && !empty($endDate)){
    $sql .= " and tanggal_input 
                  between '".$fromDate."' and '".$endDate."' ";
  }
}
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
$record = mysqli_query($con,$sql) or die(mysqli_error());

$sql1="select * from merk;";
$merkresult=mysqli_query($con,$sql1) or die(mysqli_error());
while ($row=mysqli_fetch_assoc($merkresult)){
  $merks[]=$row;
}

$product=null;
//if($count_all_item>=1){
  while($row = mysqli_fetch_assoc($record)) {
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  <!--<script>
  $( function() {
    var dateFormat = "dd/mm/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          changeYear: true,
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script> -->
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
      <a class="nav-link" href="rep_pengiriman.php">
          <!--<i class="fas fa-fw fa-table"></i>-->
          <span>Pengiriman Barang</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="rep_uangtransaksi.php">
          <!--<i class="fas fa-fw fa-table"></i>-->
          <span>Keuangan</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="rep_penjualan.php">
          <!--<i class="fas fa-fw fa-table"></i>-->
          <span>Penjualan</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="rep_topspender.php">
          <!--<i class="fas fa-fw fa-table"></i>-->
          <span>Top Spender</span>
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
              
              <!--<label for="from">From</label>
              <input type="text" id="from" name="from">
              <label for="to">to</label>
              <input type="text" id="to" name="to">
              <button type="submit">Search</button>-->
              
              <!-- Script -->
            <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
            <script src='jquery-3.3.1.js' type='text/javascript'></script>
            <script src='jquery-ui.min.js' type='text/javascript'></script>
            <script type='text/javascript'>
            $(document).ready(function(){
              $('.dateFilter').datepicker({
                  dateFormat: "yy-mm-dd"
              });
            });
            </script>

            <!-- Search filter -->
            <br>
            <form method='post' action=''>
              Start Date <input type='text' class='dateFilter' name='fromDate' value='<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>'>
          
              End Date <input type='text' class='dateFilter' name='endDate' value='<?php if(isset($_POST['endDate'])) echo $_POST['endDate']; ?>'>

              <input type='submit' name='but_search' value='Search'>
            </form>

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <?php
                  $fields=mysqli_fetch_fields($record);
                  foreach ($fields as $field) {
                    echo "<th>$field->name</th>";
                  }
                  ?>
                  </tr>
                </thead>
                    <?php 
               // echo $emp_query;
                // Sort
                //$emp_query .= " ORDER BY tanggal_input DESC";
               //$hasil= mysqli_num_rows($qhasil);

               $qhasil = mysqli_query($con,$sql);
                // Check records found or not
                if (mysqli_num_rows($qhasil) > 0){
                  while($empRecord = mysqli_fetch_assoc($qhasil)){
                
                //foreach ($qhasil as $product) {
                  $merk=$empRecord['merk'];
                  $nama=$empRecord['nama'];
                  $warna=$empRecord['warna'];
                  $tglmsk=$empRecord['tanggal_input'];
                
                  echo "<tr>";
                  echo "<td>". $merk ."</td>";
                  echo "<td>". $nama ."</td>";
                  echo "<td>". $warna ."</td>";
                 echo "<td>". $tglmsk ."</td>";
                  echo "</tr>";
                //}
                  }
                }
                  else{
                    echo "<tr>";
                    echo "<td colspan='4'>No record found.</td>";
                    echo "</tr>"; 
                }
                ?>
                
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
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- Demo scripts for this page-->
  <script src="assets/js/demo/datatables-demo.js"></script>
  <script src="assets/js/demo/chart-area-demo.js"></script>

</body>

</html>
