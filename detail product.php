<?php 
session_start();
require_once('config.php');
?>

<?php
$cmd = ""

$all_result 	= mysqli_query($con,$cmd) or die(mysqli_error($con));
$count_all_item = mysqli_num_rows($all_result);
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
                    style="background-color: transparent; border: 0;"> Products
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <ul class="link-list">
                        <li><a href="#">Pioneer</a></li> <br>
                        <li><a href="#">Esti Loren</a></li><br>
                        <li><a href="#">Asako</a></li><br>
                        <li><a href="#">Esa</a></li><br>
                        <li><a href="#">Edison</a></li><br>
                        <li><a href="#">Esa</a></li>
                    </ul>

                </div>
                <a href="privacy policy.html" class="list-group-item list-group-item-action bg-light">Privacy Policy</a>
                <a href="tnc.html" class="list-group-item list-group-item-action bg-light">Terms and Condition</a>
                <a href="faq.html" class="list-group-item list-group-item-action bg-light">FAQ</a>
                <a href="contact.html" class="list-group-item list-group-item-action bg-light">Contact Us</a>
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
                <a href="index.html" class="col-md-3"><img src="assets/img/logo.png" style="width: 100%;"></a>
                <!--SEARCH BAR-->
                <!-- Load icon library -->
                <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

                <!-- The form 2-->
                <form class="example col-md-6" action="action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search" style="font-size: 130%;"></i></button>
                </form>

                <!--SEARCH BAR-->
                <!--header-->
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-grow: 0;">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#" style="color: white; font-size: 150%;"><i
                                    class="fas fa-heart"></i><span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: white; font-size: 150%;"><i
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

                                <a class="dropdown-item" href="login.html">LOG IN</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="signin.html">SIGN UP</a>
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
						$id = $product['product_warna_id'];
				?>
                    <div class="col-md-6">
                        <img class="img-fluid" src="assets/img/products/<?php echo $id; ?>.jpg style="width: 500px; height: 500px; alt="">
                    </div>

                    <div class="col-md-5">
                        <h3 class="my-3">Product Description</h3>
                        <p>Jam Dinding <?php echo $product['judul_barang']; ?></p>
                        <h5>Rp. <?php $price = $product['harga_barang'];echo number_format($price,2); ?></h5>
                        <h3 class="my-3">Product Details</h3>
                        <br> Diameter: <?php echo $product['diameter']; ?> 
                        <br> <?php echo $product['deskripsi']; ?> 
                        <br>Reseller welcome untuk Surabaya dan sekitarnya, luar kota, luar pulau juga bisa.
                        Pengiriman luar kota dan pulau mengunakan expedisi yang di tunjuk pembeli.
                        Untuk info dan pemesanan bisa menghubungi:
                        Toko JamQ
                        Telp/wa: 08159686049
                    </div>
                </div>
                <!-- Related Projects Row -->
                <h3 class="my-4">Related Products</h3>
                <div class='row' style='margin:0px auto;'>
                    <?php 
					foreach($products as $product){
						$id = $product['product_warna_id'];
				?>
                    <div class="col-lg-3 col-md-3 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top" src="assets/img/products/<?php echo $id; ?>.jpg"
                                    alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="detail product.html"><?php echo $product['judul_barang']; ?> </a>
                                </h4>
                                <h5>Rp. <?php 
								$price = $product['harga_barang'];
								echo number_format($price,2); 
							?></h5>
                            </div>
                            <div class="card-footer middle" style="background-color: white;">
                                <button class="item-card-button" href><i class="fas fa-heart"></i></button>
                                <span class="vertical-line"></span>
                                <button class="item-card-button"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            <!--footer kita-->
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="mb-4"><img src="assets/img/q putih.png" alt="Image" class="img-fluid"></p>
                        </div>
                        <div class="col-lg-3">
                            <h3 class="footer-heading"><span>Our Products</span></h3>
                            <ul class="list-unstyled">
                                <li><a href="#">Pioneer</a></li>
                                <li><a href="#">Esti Loren</a></li>
                                <li><a href="#">Asako</a></li>
                                <li><a href="#">Esa</a></li>
                                <li><a href="#">Edison</a></li>
                                <li><a href="#">Dekko</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3">
                            <h3 class="footer-heading"><span>Contact</span></h3>
                            <ul class="list-unstyled">
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="privacy policy.html">Privacy Policy</a></li>
                                <li><a href="tnc.html">Terms and Condition</a></li>
                                <li><a href="faq.html">FAQ</a></li>
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
</body>
</html>