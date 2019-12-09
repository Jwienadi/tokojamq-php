<?php
    /*
    Author: Javed Ur Rehman
    Website: http://www.allphptricks.com/
    */
    require_once('config.php');
    include("auth.php");
    include("function.php");

    $q1 = "SELECT product_warna_id, concat(m.nama_merk,' ',p.nama_product,' ',warna) as 'judul_barang',harga_jual as 'harga_barang' 
    FROM product_warna pw, product p,warna w,merk m 
    WHERE pw.product_id=p.product_id and pw.warna_id=w.warna_id and p.merk_id=m.merk_id and m.merk_id='m1'";

    $all_result 	= mysqli_query($con,$q1) or die(mysqli_error($con));
    $count_all_item = mysqli_num_rows($all_result);
    $max_item 		= 4; //Max item in one page
    $page 			= isset($_GET['page'])? (int)$_GET["page"]:1; //contoh IF INLINE
    //echo $page;
    $start 			= ($page>1) ? (($page * $max_item) - $max_item) : 0; //contoh IF INLINE
    //echo $start;
    $q1 			= $q1." LIMIT $start, $max_item";
    $limit_result 	= mysqli_query($con,$q1) or die(mysqli_error($con));
    $products = null;
    if ($count_all_item >= 1){
        while($row = mysqli_fetch_assoc($limit_result)) {
            $products[] = $row;
        }
    }

    $q2 = "SELECT product_warna_id, concat(m.nama_merk,' ',p.nama_product,' ',warna) as 'judul_barang',harga_jual as 'harga_barang' 
    FROM product_warna pw, product p,warna w,merk m 
    WHERE pw.product_id=p.product_id and pw.warna_id=w.warna_id and p.merk_id=m.merk_id and m.merk_id='m2'";

    $semua2	= mysqli_query($con,$q2) or die(mysqli_error($con));
    $hitungsemua2 = mysqli_num_rows($semua2);
    $max_item 		= 4; //Max item in one page
    $page 			= isset($_GET['page'])? (int)$_GET["page"]:1; //contoh IF INLINE
    //echo $page;
    $start 			= ($page>1) ? (($page * $max_item) - $max_item) : 0; //contoh IF INLINE
    //echo $start;
    $q2 			= $q2." LIMIT $start, $max_item";
    $limit2 	= mysqli_query($con,$q2) or die(mysqli_error($con));
    $barang2 = null;
    if ($hitungsemua2 >= 1){
        while($row = mysqli_fetch_assoc($limit2)) {
            $barang2[] = $row;
        }
    }

    $q3 = "SELECT product_warna_id, concat(m.nama_merk,' ',p.nama_product,' ',warna) as 'judul_barang',harga_jual as 'harga_barang' 
    FROM product_warna pw, product p,warna w,merk m 
    WHERE pw.product_id=p.product_id and pw.warna_id=w.warna_id and p.merk_id=m.merk_id and m.merk_id='m4'";

    $semua3	= mysqli_query($con,$q3) or die(mysqli_error($con));
    $hitungsemua3 = mysqli_num_rows($semua3);
    $max_item 		= 4; //Max item in one page
    $page 			= isset($_GET['page'])? (int)$_GET["page"]:1; //contoh IF INLINE
    //echo $page;
    $start 			= ($page>1) ? (($page * $max_item) - $max_item) : 0; //contoh IF INLINE
    //echo $start;
    $q3 			= $q3." LIMIT $start, $max_item";
    $limit3 	= mysqli_query($con,$q3) or die(mysqli_error($con));
    $barang3 = null;
    if ($hitungsemua3 >= 1){
        while($row = mysqli_fetch_assoc($limit3)) {
            $barang3[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<base href='<?php echo $base_url; ?>'>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Welcome to TokoJamQ!</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/FONTAWESOME/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="assets/css/indexcontent.css" rel="stylesheet">
  <link href="assets/css/itemcard.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">
  <link href="assets/css/shop-homepage.css" rel="stylesheet">
  <link href="assets/css/headerfooter.css" rel="stylesheet">
</head>

<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"> <img src="assets/img/q hitam.png"> </div>
      <div class="list-group list-group-flush">
        <!--<a href="#" class="list-group-item list-group-item-action bg-light">Products</a>-->
        <button class="dropdown-btn list-group-item list-group-item-action bg-light"
          style="background-color: transparent; border: 0;">
          <a href="product.php">Products</a>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container" style="display: none;">
          <ul class="link-list">
            <li><a href="pioneer.php">Pioneer</a></li> <br>
            <li><a href="estiloren.php">Esti Loren</a></li><br>
            <li><a href="asako.php">Asako</a></li><br>
            <li><a href="pagol.php">Pagol</a></li><br>
            <li><a href="edison.php">Edison</a></li><br>
          </ul>

        </div>
        <a href="privacy policy.php" class="list-group-item list-group-item-action bg-light">Privacy Policy</a>
        <a href="tnc.php" class="list-group-item list-group-item-action bg-light">Terms and Condition</a>
        <a href="faq.php" class="list-group-item list-group-item-action bg-light">FAQ</a>
        <a href="contact.php" class="list-group-item list-group-item-action bg-light">Contact Us</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <!--button sidebar-->
        <button class="btn btn-primary" id="menu-toggle"
          style="background-color: transparent; color: white; border: none; font-size: 150%;">
          <i class="fas fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!--logo-->
        <a href="index.php" class="col-md-3"><img src="assets/img/logo.png" style="width: 100%;"></a>
        <!--SEARCH BAR-->
        <!-- Load icon library -->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

        <!-- The form 2-->
        <form class="example col-md-6" action="product.php" method="GET">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search" style="font-size: 130%;"></i></button>
        </form>

        <!--SEARCH BAR-->
        <!--header-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-grow: 0;">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
           
            <li class="nav-item">
              <a class="nav-link" href="cart.php" style="color: white; font-size: 150%;"><i
                  class="fas fa-shopping-cart"></i></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" style="color: white;font-size: 150%;">
                <i class="fas fa-user"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                style="text-align: center;">
                <?php
              isloggedin($con);
                ?>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    
    <!--CAROUSELL-->
      <div class="container-fluid container-fluid-no">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="assets/img/wallpaper.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="assets/img/wallpaper2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="assets/img/wallpaper3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <!--Carousel Wrapper-->
      <!--ITEM SLIDER-->
      <div class="container my-4">

        <hr class="my-4">

        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
          <!--Slides-->
          <div class="carousel-inner" role="listbox">

            <!--First slide-->
            <div class="carousel-item active">
            <div class='row' style='margin:0px auto;'>
                <?php 
                foreach($barang2 as $brg2){
                  $id2 = $brg2['product_warna_id'];
                ?>
                    <div class="col-lg-3 col-md-3 mb-4">
                        <div class="card h-100">
                            <a href= "detail product.php?id=<?php echo $id2; ?>"><img class="card-img-top" src="assets/img/products/<?php echo $id2; ?>.jpg"
                                    alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="detail product.php?id=<?php echo $id2; ?>"><?php echo $brg2['judul_barang']; ?> </a>
                                </h4>
                                <h5>Rp. <?php 
                                  $price = $brg2['harga_barang'];
                                  echo number_format($price,2); 
                                ?></h5>
                            </div>
                            <div class="card-footer middle">
                            <button class="item-card-button" href><i class="fas fa-heart"></i></button>
                            <span class="vertical-line"></span>
                            <button class="item-card-button"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div> 
              <!--<div class="row">
                <div class="col-lg-3 col-md-3 mb-4">
                  <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="assets/img/products/pw1.jpg" alt=""></a>
                    <div class="card-body">
                      <h4 class="card-title">
                        <a href="detail product.php">Pioneer 2110 Wood Motif</a>
                      </h4>
                      <h5>Rp 65.000</h5>
                    </div>
                    <div class="card-footer middle">
                      <button class="item-card-button" href><i class="fas fa-heart"></i></button>
                      <span class="vertical-line"></span>
                      <button class="item-card-button"><i class="fas fa-cart-plus"></i></button>
                    </div>
                  </div>
                </div>-->

            <!--Second slide-->
            <div class="carousel-item">
            <div class='row' style='margin:0px auto;'>
                <?php 
                foreach($products as $product){
                  $id = $product['product_warna_id'];
                ?>
                    <div class="col-lg-3 col-md-3 mb-4">
                        <div class="card h-100">
                            <a href= "detail product.php?id=<?php echo $id; ?>"><img class="card-img-top" src="assets/img/products/<?php echo $id; ?>.jpg"
                                    alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="detail product.php?id=<?php echo $id; ?>"><?php echo $product['judul_barang']; ?> </a>
                                </h4>
                                <h5>Rp. <?php 
                                  $price = $product['harga_barang'];
                                  echo number_format($price,2); 
                                ?></h5>
                            </div>
                            <div class="card-footer middle">
                            <button class="item-card-button" href><i class="fas fa-heart"></i></button>
                            <span class="vertical-line"></span>
                            <button class="item-card-button"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div>
              <!--<div class="row">
                <div class="col-lg-3 col-md-3 mb-4">
                  <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="assets/img/esti loren/2043black.jpg" alt=""></a>
                    <div class="card-body">
                      <h4 class="card-title">
                        <a href="#">Esti Loren 2043 Black</a>
                      </h4>
                      <h5>Rp 75.000</h5>
                    </div>
                    <div class="card-footer middle">
                      <button class="item-card-button" href><i class="fas fa-heart"></i></button>
                      <span class="vertical-line"></span>
                      <button class="item-card-button"><i class="fas fa-cart-plus"></i></button>
                    </div>
                  </div>
                </div>-->

            <!--Third slide-->
            <div class="carousel-item">
            <div class='row' style='margin:0px auto;'>
                <?php 
                foreach($barang3 as $brg3){
                  $id3 = $brg3['product_warna_id'];
                ?>
                    <div class="col-lg-3 col-md-3 mb-4">
                        <div class="card h-100">
                            <a href= "detail product.php?id=<?php echo $id3; ?>"><img class="card-img-top" src="assets/img/products/<?php echo $id3; ?>.jpg"
                                    alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="detail product.php?id=<?php echo $id3; ?>"><?php echo $brg3['judul_barang']; ?> </a>
                                </h4>
                                <h5>Rp. <?php 
                                  $price = $brg3['harga_barang'];
                                  echo number_format($price,2); 
                                ?></h5>
                            </div>
                            <div class="card-footer middle">
                            <button class="item-card-button" href><i class="fas fa-heart"></i></button>
                            <span class="vertical-line"></span>
                            <button class="item-card-button"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div>               
            <!--/.Third slide-->

          </div>
          <!--/.Slides-->
          <div class="Controls-bottom">
            <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i
                class="fas fa-chevron-circle-left"></i></i></a>
            <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
                class="fas fa-chevron-circle-right"></i></i></a>
          </div>
        </div>
        <!--/.Carousel Wrapper-->

      </div>
      <!--ITEM SLIDER WRAPPER-->

      <!--MERK
    <div class="row">
      <div class="col-md-4 col-sm-4 col-sms-12">
        <div class="col col1 branded merk-button">
          <a href="#"><img src="assets/img/1202 b.png" alt="block" class="resize"></a>
          <div class="banner-text bottom-left-merk">
            <h2>SAKANA</h2>
            <a href="#" target="_blank">View Collection</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-sms-12">
        <div class="col col2">
          <a href="#"><img src="assets/img/1202 b.png" alt="block1" class="resize"></a>
          <div class="banner-text">
            <h2>DEKKO</h2>
            <a href="#" target="_blank">View Collection</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-sms-12">
        <div class="col col3">
          <a href="#"><img src="assets/img/1202 b.png" alt="block2" class="resize"></a>
          <div class="banner-text">
            <h2>ASAKO</h2>
            <a href="#" target="_blank">View Collection</a>
          </div>
        </div>
      </div>
    </div>
    MERK WRAPPER-->

      <!--footer kita-->
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-2">
              <p class="mb-4"><img src="assets/img/q putih.png" alt="Image" class="img-fluid"></p>
            </div>
            <div class="col-lg-3">
              <h3 class="footer-heading"><span><a href="product.php">Our Products</a></span></h3>
              <ul class="list-unstyled">
                <li><a href="pioneer.php">Pioneer</a></li>
                <li><a href="estiloren.php">Esti Loren</a></li>
                <li><a href="asako.php">Asako</a></li>
                <li><a href="pagol.php">Pagol</a></li>
                <li><a href="edison.php">Edison</a></li>
              </ul>
            </div>

            <div class="col-lg-3">
              <h3 class="footer-heading"><span>Contact</span></h3>
              <ul class="list-unstyled">
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="privacy policy.php">Privacy Policy</a></li>
                <li><a href="tnc.php">Terms and Condition</a></li>
                <li><a href="faq.php">FAQ</a></li>
              </ul>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="copyright">
                <p style="text-align:center; color:white; font-weight: 500;">Copyright TokoJamQ ©2019 All rights
                  reserved </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

  </script>
  <style>
    .resize {
      width: 50%;
      height: 50%;
    }
  </style>

  <script>
    /* buat dropdown products 
  /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }
  </script>
</body>
</html>
