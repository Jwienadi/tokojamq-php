<?php 
session_start();
require_once('config.php');
$con=mysqli_connect("localhost","root","","tokojamqfix");

if(isset($_GET['merk'])){
    //..
} else{
    header('Location: pioneer.php?merk=pioneer');
}

$brand = strtolower($_GET["merk"]);
	$cmd_extra = "AND lower(nama_merk)='".$brand."'";
	$cmd = "SELECT p.product_id, p.product_name, p.hpp, m.nama_merk
    from product p, merk m
    where p.merk_id=m.merk_id $cmd_extra";
	
	$all_result 	= mysqli_query($con,$cmd) or die(mysqli_error($con));
	$count_all_item = mysqli_num_rows($all_result);

	$max_item 		= 10; //Max item in one page
	$page 			= isset($_GET['page'])? (int)$_GET["page"]:1; //contoh IF INLINE
	//echo $page;
	$start 			= ($page>1) ? (($page * $max_item) - $max_item) : 0; //contoh IF INLINE
	//echo $start;
	
	$cmd 			= $cmd." LIMIT $start, $max_item";
    //echo $cmd;
    $limit_result 	= mysqli_query($con,$cmd) or die(mysqli_error($con));

	$count_pages 	= ceil($count_all_item / $max_item); 

	$products = null;
	if ($count_all_item >= 1){
		while($row = mysqli_fetch_assoc($limit_result)) {
			$products[] = $row;
		}
    }
//True Type
$brand_truetype = "";
$cmd2 = "SELECT m.nama_merk FROM merk m WHERE lower(m.nama_merk) = '$brand'";
//echo $cmd2
$temp_result = mysqli_query($con,$cmd2) or die(mysqli_error($con));
$total_item = mysqli_num_rows($temp_result);
if ($total_item ==1){
    $item = mysqli_fetch_assoc($temp_result);
    $brand_truetype = $item['nama_merk'];
}
?>

<?php
//$halaman = 2; //batasan halaman
//$page = isset($_GET['4'])? (int)$_GET["2"]:1;
//$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
//$query = mysqli_query($con,"select * from product LIMIT $mulai, $halaman");
//$sql = mysqli_query($con,"select * from product");
//$total = mysqli_num_rows($sql);
//$pages = ceil($total/$halaman); 
//for ($i=1; $i<=$pages ; $i++){ ?>

<?php
//$sql = mysqli_query($con,"select * from product");
//$result = $con -> query($sql);
//if ($result -> num_rows >0) {
 //   while ($row = $result -> fetch_assoc()){
   // $id = $row['id'];
    //echo "<img src='assets/img/pioneer".$id.".jpg'>";
   // }
   // } else {
   // echo "Error: ". $sql. "<br>" . $con->error;
   // }    ?>

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

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title> Toko JamQ Products </title>
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
                        <li><a href="pioneer.html">Pioneer</a></li> <br>
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

                                <a class="dropdown-item" href="login.php">LOG IN</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="signup.php">SIGN UP</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!--products woee-->
            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
                    <ul class="nav navbar-nav">
                        <li class='<?php echo ($brand=='pioneer') ? "active" : "" ?>'>
							<a href="product.php?brand=pioneer">Pioneer</a>
						</li>
                        <li class='<?php echo ($brand=='esti loren') ? "active" : "" ?>'>
							<a href="product.php?brand=estiloren">Esti Loren</a>
						</li>
                        <li class='<?php echo ($brand=='timestar') ? "active" : "" ?>'>
                            <a href="product.php?brand=timestar">Time Star</a>
                        </li>
                        <li class='<?php echo ($brand=='dekko') ? "active" : "" ?>'>
                            <a href="product.php?brand=dekko">Dekko</a>
                        </li>
                        <li class='<?php echo ($brand=='asako') ? "active" : "" ?>'>
                            <a href="product.php?brand=asako">Asako</a>
                        </li>
                        <li class='<?php echo ($brand=='edison') ? "active" : "" ?>'>
                            <a href="product.php?brand=edison">Edison</a>
                        </li>
                        <li class='<?php echo ($brand=='pagol') ? "active" : "" ?>'>
                            <a href="product.php?brand=pagol">Pagol</a>
                        </li>
                        <li class='<?php echo ($brand=='sakana') ? "active" : "" ?>'>
                            <a href="product.php?brand=sakana">Sakana</a>
                        </li>
                    </ul>

            <div class="container" style="padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
            <div class='row col-md-12'>
                <h1>Products of <?php echo $brand_truetype; ?></h1>
            </div>
			<div class='row' style='margin:0px auto;'>
				<?php 
					foreach($products as $product){
						$id = $product['product_warna_id'];
				?>
					<div class='col-md-2 col-xs-offset-1 text-center border-list'>
						<img src='assets/img/products/<?php echo $id; ?>.jpg' class='img-responsive object-fit'/>
						<h4><?php echo $product['product.product_name']; ?></h4>
						<p class='small'>
							<?php echo $product['merk.nama_merk']; ?>
						</p>
						<p>
							Rp. 
							<?php 
								$price = $product['harga_jual'];
								echo number_format($price,2); 
							?>
						</p>
					</div>
				<?php } ?>
			</div>
			<div class='row text-center'>
				<div class="btn-group">
					<?php
						if ($page>1){
							$prev_page = $page-1;
							//echo "Prev: ".$prev_page;
					?>
						<a href='product.php?brand=<?php echo $brand; ?>&page=<?php echo $prev_page; ?>' class="btn btn-default" title='Previous'>
							<i class='glyphicon glyphicon-chevron-left'></i>
							Previous
						</a>
					<?php } ?>
					<?php
						for ($i=1; $i<=$count_pages; $i++){
							$flag_class = "";
							if ($page==$i){
								$flag_class = "active";
							}
							if($i==1){
								echo "<a href='product.php?brand=$brand&page=$i' class='btn btn-default $flag_class' title='First'>$i</a>";
							} else if($i==$count_pages) {
								echo "<a href='product.php?brand=$brand&page=$i' class='btn btn-default $flag_class' title='Last'>$i</a>";
							} else {
								echo "<a href='product.php?brand=$brand&page=$i' class='btn btn-default $flag_class' title='Page $i'>$i</a>";
							}
						}
					?>
					<?php
						if ($page<$count_pages){
							$next_page = $page+1;
							//echo "Next: ".$next_page;
							echo "<a href='product.php?brand=$brand&page=$next_page' class='btn btn-default' title='Next'>
										Next
										<i class='glyphicon glyphicon-chevron-right'></i>
									</a>";
						}
					?>
				</div>
				<?php
                    echo "<p>&nbsp;</p>";
                    echo "Brand = ".$brand_truetype."<br/>";
					echo "Current Page = ".$page."<br/>";
					echo "Next Page = ".$next_page."<br/>";
					echo "Prev Page = ".$prev_page."<br/>";
				?>
			</div>
			
            <script>
			$(document).ready(function(){
				//alert('ready');
			});
		</script>
                
              <!--  <h1>Products > Pioneer</h1>
            <div class="row">
                <div class="col-lg-3 col-md-3 mb-4">
                  <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="assets/img/pioneer/2110.png" alt=""></a>
                    <div class="card-body">
                      <h4 class="card-title">
                        <a href="detail product.html">Pioneer 2110 Wood Motif</a>
                      </h4>
                      <h5>Rp 65.000</h5>
                    </div>
                    <div class="card-footer middle">
                        <button class="item-card-button" href><i class="fas fa-heart"></i></button>
                        <span class="vertical-line"></span>
                        <button class="item-card-button"><i class="fas fa-cart-plus"></i></button>
                    </div>
                </div>
            </div> -->
                

            <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
            <div class="container">
                <h3 class="h3">shopping Demo-1 </h3>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="#">
                                    <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-1.jpg">
                                    <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-2.jpg">
                                </a>
                                <ul class="social">
                                    <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                    <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                    <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                <span class="product-new-label">Sale</span>
                                <span class="product-discount-label">20%</span>
                            </div>
                            <ul class="rating">
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star disable"></li>
                            </ul>
                            <div class="product-content">
                                <h3 class="title"><a href="#">Women's Blouse</a></h3>
                                <div class="price">$16.00
                                    <span>$20.00</span>
                                </div>
                                <a class="add-to-cart" href="">+ Add To Cart</a>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="#">
                                    <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-3.jpg">
                                    <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-4.jpg">
                                </a>
                                <ul class="social">
                                    <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                    <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                    <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                <span class="product-new-label">Sale</span>
                                <span class="product-discount-label">50%</span>
                            </div>
                            <ul class="rating">
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                            </ul>
                            <div class="product-content">
                                <h3 class="title"><a href="#">Men's Plain Tshirt</a></h3>
                                <div class="price">$5.00
                                    <span>$10.00</span>
                                </div>
                                <a class="add-to-cart" href="">+ Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="#">
                                    <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-5.jpg">
                                    <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-6.jpg">
                                </a>
                                <ul class="social">
                                    <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                    <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                    <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                <span class="product-new-label">Sale</span>
                                <span class="product-discount-label">50%</span>
                            </div>
                            <ul class="rating">
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                            </ul>
                            <div class="product-content">
                                <h3 class="title"><a href="#">Men's Plain Tshirt</a></h3>
                                <div class="price">$5.00
                                    <span>$10.00</span>
                                </div>
                                <a class="add-to-cart" href="">+ Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="#">
                                    <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-7.jpg">
                                    <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-8.jpg">
                                </a>
                                <ul class="social">
                                    <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                    <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                    <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                <span class="product-new-label">Sale</span>
                                <span class="product-discount-label">50%</span>
                            </div>
                            <ul class="rating">
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                            </ul>
                            <div class="product-content">
                                <h3 class="title"><a href="#">Men's Plain Tshirt</a></h3>
                                <div class="price">$5.00
                                    <span>$10.00</span>
                                </div>
                                <a class="add-to-cart" href="">+ Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr> -->

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
                                <li><a href="pioneer.php">Pioneer</a></li>
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

                    body {
	padding-top: 70px;
}

.border-list{
	box-shadow: 0px 0px 3px 0px #d4d4d4;
	margin: 0px 18px 20px;
}

.object-fit{
	/*object-fit:cover;
	overflow: hidden;*/
	width:100%;
}
                </style>
</body>
</html>