<?php 
session_start();
require_once('config.php');
include("function.php");
?>

<?php
//$product_id= isset($_GET['id']);
if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    //echo $product_id;
  } else {
   // echo $product_id;
    header('Location:product.php');
  //exit;
  }
$cmd = "SELECT product_warna_id,
concat(m.nama_merk,' ',p.nama_product,' ',warna) as 'judul_barang',harga_jual as 'harga_barang', diameter, deskripsi, stok
FROM product_warna pw, product p,warna w,merk m
WHERE pw.product_id=p.product_id and pw.warna_id=w.warna_id and p.merk_id=m.merk_id and 
product_warna_id= '".$product_id."'";

$all_result 	= mysqli_query($con,$cmd) or die(mysqli_error($con));
$count_all_item = mysqli_num_rows($all_result);

$products = null;
	if ($count_all_item >= 1){
		while($row = mysqli_fetch_assoc($all_result)) {
			$products[] = $row;
		}
    }

    $qrel = "SELECT product_warna_id, concat(m.nama_merk,' ',p.nama_product,' ',warna) as 'judul_barang',harga_jual as 'harga_barang' 
    FROM product_warna pw, product p,warna w,merk m 
    WHERE pw.product_id=p.product_id and pw.warna_id=w.warna_id and p.merk_id=m.merk_id and m.merk_id='m2'";

    $semua2	= mysqli_query($con,$qrel) or die(mysqli_error($con));
    $hitungsemuarel = mysqli_num_rows($semua2);
    $max_item 		= 4; //Max item in one page
    $page 			= isset($_GET['page'])? (int)$_GET["page"]:1; //contoh IF INLINE
    //echo $page;
    $start 			= ($page>1) ? (($page * $max_item) - $max_item) : 0; //contoh IF INLINE
    //echo $start;
    $qrel 			= $qrel." LIMIT $start, $max_item";
    $limitrel 	= mysqli_query($con,$qrel) or die(mysqli_error($con));
    $barangrel = null;
    if ($hitungsemuarel >= 1){
        while($row = mysqli_fetch_assoc($limitrel)) {
            $barangrel[] = $row;
        }
    }

    $q1 = "SELECT product_warna_id, concat(m.nama_merk,' ',p.nama_product,' ',warna) as 'judul_barang',harga_jual as 'harga_barang' 
    FROM product_warna pw, product p,warna w,merk m 
    WHERE pw.product_id=p.product_id and pw.warna_id=w.warna_id and p.merk_id=m.merk_id and m.merk_id='m1'";

    $semuarel1 	= mysqli_query($con,$q1) or die(mysqli_error($con));
    $hitungallrel1 = mysqli_num_rows($semuarel1);
    $max_item 		= 4; //Max item in one page
    $page 			= isset($_GET['page'])? (int)$_GET["page"]:1; //contoh IF INLINE
    //echo $page;
    $start 			= ($page>1) ? (($page * $max_item) - $max_item) : 0; //contoh IF INLINE
    //echo $start;
    $q1 			= $q1." LIMIT $start, $max_item";
    $limitrel1	= mysqli_query($con,$q1) or die(mysqli_error($con));
    $rel1 = null;
    if ($hitungallrel1 >= 1){
        while($row = mysqli_fetch_assoc($limitrel1)) {
            $rel1[] = $row;
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
$_SESSION['cart']=$products;

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/FONTAWESOME/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="assets/css/shop-homepage.css" rel="stylesheet">
    <link href="assets/css/headerfooter.css" rel="stylesheet">
    <title> Toko JamQ Product Detail </title>
    
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
                <div class="dropdown-container">
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

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--logo-->
                <a href="index.php" class="col-md-3"><img src="assets/img/logo.png" style="width: 100%;"></a>

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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="color: white;font-size: 150%;">
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
            <!-- Page Content -->
            <div class="container">

                <!-- isi page detail product woee -->
                <h1 class="my-4">Detail Product</h1>

                <!-- Portfolio Item Row -->
                <div class="row"style='margin:0px auto;'>
                <?php 
					foreach($products as $product){
						$id = $product['product_warna_id'];?>
                    <div class="col-md-6">
                        <img class="img-fluid" src="assets/img/products/<?php echo $id; ?>.jpg" style="width: 500px; height: 500px;" alt="">
                    </div>

                    <div class="col-md-6">
                        <h3 class="my-3">Product Description</h3>
                        <p>Jam Dinding <?php echo $product['judul_barang']; ?></p>
                        <h5>Rp. <?php $price = $product['harga_barang'];echo number_format($price,2); ?></h5>
                        <!--<h5 class="colors">colors:
							<span class="color red not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5> -->
                        <!--<span class="vertical-line"></span>
                        <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"size="4">
                        <button class="item-card-button"><i class="fas fa-cart-plus">Add to Cart</i></button> -->
                        <form method="get" action ="action_cart.php">
                            <input type="number" name="qty" value="1" min="1" max="<?=$product['stok']?>" placeholder="stok" required>
                            <input type="hidden" name="id" value="<?=$product['product_warna_id']?>">
                            <button type="submit">Add To Cart</button>
                        </form>
                            
                       <!-- </form> -->

                        <h3 class="my-3">Product Details</h3>
                        <br> Diameter: <?php echo $product['diameter'];?> cm </br>
                        <br> <?php echo $product['deskripsi']; ?> </br>
                        <br>Reseller welcome untuk Surabaya dan sekitarnya, luar kota, luar pulau juga bisa.
                        Pengiriman luar kota dan pulau mengunakan expedisi yang di tunjuk pembeli.
                        Untuk info dan pemesanan bisa menghubungi:
                        Toko JamQ
                        Telp/wa: 08159686049 </br>
                    </div>
                    <?php } ?>
                </div>
                <!-- Related Projects Row -->
    
    <div class="container my-4">
    <h3 class="my-4">Related Products</h3>
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
                <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item active">
                <div class='row' style='margin:0px auto;'>
                    <?php 
                    foreach($barangrel as $brgrel){
                    $idrel = $brgrel['product_warna_id'];
                    ?>
                        <div class="col-lg-3 col-md-3 mb-4">
                            <div class="card h-100">
                                <a href= "detail product.php?id=<?php echo $idrel; ?>"><img class="card-img-top" src="assets/img/products/<?php echo $idrel; ?>.jpg"
                                        alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail product.php?id=<?php echo $idrel; ?>"><?php echo $brgrel['judul_barang']; ?> </a>
                                    </h4>
                                    <h5>Rp. <?php 
                                    $price = $brgrel['harga_barang'];
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
                <!--Second slide-->
                <div class="carousel-item">
                <div class='row' style='margin:0px auto;'>
                    <?php 
                    foreach($rel1 as $relbrg1){
                    $idrel1 = $relbrg1['product_warna_id'];
                    ?>
                    <div class="col-lg-3 col-md-3 mb-4">
                        <div class="card h-100">
                            <a href= "detail product.php?id=<?php echo $idrel1; ?>"><img class="card-img-top" src="assets/img/products/<?php echo $idrel1; ?>.jpg"
                                    alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="detail product.php?id=<?php echo $idrel1; ?>"><?php echo $relbrg1['judul_barang']; ?> </a>
                                </h4>
                                <h5>Rp. <?php 
                                  $price = $relbrg1['harga_barang'];
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
                            <form action="action_cart.php" method="GET">
                                <input type="number" name="qty" value="1" min="1" max="<?=$product['stok']?>" placeholder="stok" required>
                                <!-- <a href="cart.php"><button type="button" class="item-card-button"><i class="fas fa-cart-plus"></i></button></a>
                               <button type="submit" class="item-card-button"><i class="fas fa-cart-plus"></i></button> -->
                               <input type="hidden" name="id" value="<?php echo $id ?>">
                               <button type="submit" class="item-card-button"><i class="fas fa-cart-plus"></i></button>
                            </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div>
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
                                <p style="text-align:center; color:white; font-weight: 500;">Copyright TokoJamQ ©2019
                                    All rights reserved </p>
                            </div>
                        </div>
                    </div>
                </div>
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
                    nav {
                        background-color: #023373;
                        padding: 0;
                        margin: 0;
                    }

                    button:active {
                        border: none;
                        border-style: none;
                    }

                    /*SEARCHBAR*/
                    * {
                        box-sizing: border-box;
                    }

                    form.example input[type=text] {
                        padding: 10px;
                        font-size: 17px;
                        border: 1px solid grey;
                        float: left;
                        width: 80%;
                        background: #f1f1f1;
                    }

                    /*style sidebar */
                    /*style dropdown submenu sidebar */
                    .link-list {
                        list-style-type: none;
                        text-decoration: none;
                        display: block;
                        text-align: left;
                    }

                    /* On mouse-over */
                    .sidenav a:hover,
                    .dropdown-btn:hover {
                        color: #023373;
                        font-weight: bold;
                    }

                    /* Style the submit button */

                    form.example button {
                        float: left;
                        width: 20%;
                        padding: 10px;
                        background: #2196F3;
                        color: black;
                        font-size: 17px;
                        border: 1px solid grey;
                        border-left: none;
                        /* Prevent double borders */
                        cursor: pointer;
                    }

                    form.example button:hover {
                        background: #0b7dda;
                    }

                    /* Clear floats */
                    form.example::after {
                        content: "";
                        clear: both;
                        display: table;
                    }

                    /*sidebar*/

                    .roboto {
                        font-family: 'Roboto', sans-serif;
                        font-size: 105%;
                    }

                    .link-list>li {
                        list-style-type: none;
                        text-decoration: none;
                        display: block;
                        text-align: left;

                    }

                    /* On mouse-over */
                    .sidenav a:hover,
                    .dropdown-btn:hover {
                        color: #023373;
                        font-weight: bold;
                    }

                    .sidenav a:focus,
                    .dropdown-btn:focus {
                        color: black;
                    }

                    /*carousell*/
                    .my-4 {
                        margin-top: 0 !important;
                    }

                    .container-fluid-no {
                        padding-left: 0;

                    }

                    .addtocart {
                        background-color: #5984bd;
                    }

                    .btn-floating {
                        font-size: 25px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        float: initial;
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