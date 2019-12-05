<?php 
session_start();
require_once('config.php');
include("function.php");
?>

<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Welcome to TokoJamQ!</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/FONTAWESOME/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="assets/css/headerfooter.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">
  <link href="assets/css/shop-homepage.css" rel="stylesheet">
  <script src="assets/vendor/jquery/jquery.min.js"></script>

</head>

<body>
  <?php
 if(!isset($_SESSION['user_id'])){

   
    header("Location: index.php");
  } else {

 $cmd = " SELECT concat(m.nama_merk,' ',p.nama_product) as 'judul_barang',w.warna,p.harga_jual as 'harga_barang' ,bp.jumlah_barang, bp.product_warna_id ,bp.id_barang_penjualan 
 from barang_penjualan bp, transaksi_penjualan tp, product_warna pw, product p, warna w, merk m 
 where pw.product_id=p.product_id and pw.warna_id=w.warna_id and p.merk_id=m.merk_id and bp.id_transaksi_penjualan=tp.id_transaksi_penjualan and bp.product_warna_id=pw.product_warna_id and status=0 and user_id=".$_SESSION['user_id'].";";
 
 $all_result 	= mysqli_query($con,$cmd) or die(mysqli_error($con));
 $count_all_item = mysqli_num_rows($all_result);
 //$responsenoitem="No Item In Cart Now. <a href="">Shop Now</a>"

 $products = null;
 if ($count_all_item >= 1){
     while($row = mysqli_fetch_assoc($all_result)) {
         $products[] = $row;
     }
 }
 $_SESSION['cart']=$products;
 // If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['jumlah_barang']) && is_numeric($_POST['product_id']) && is_numeric($_POST['jumlah_barang'])) {
  // Set the post variables so we easily identify them, also make sure they are integer
  $product_id = (int)$_POST['product_id'];
  $quantity = (int)$_POST['jumlah_barang'];
  // Prepare the SQL statement, we basically are checking if the product exists in our databaser
  $stmt = $pdo->prepare('SELECT * FROM products WHERE id = '$product_id'');
  $stmt->execute([$_POST['product_id']]);
  // Fetch the product from the database and return the result as an Array
  $product = $stmt->fetch(PDO::FETCH_ASSOC);
  // Check if the product exists (array is not empty)
  if ($product && $quantity > 0) {
      // Product exists in database, now we can create/update the session variable for the cart
      if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
          if (array_key_exists($product_id, $_SESSION['cart'])) {
              // Product exists in cart so just update the quanity
              $_SESSION['cart'][$product_id] += $quantity;
          } else {
              // Product is not in cart so add it
              $_SESSION['cart'][$product_id] = $quantity;
          }
      } else {
          // There are no products in cart, this will add the first product to cart
          $_SESSION['cart'] = array($product_id => $quantity);
      }
  }
  // Prevent form resubmission...
  header('location: cart');
  exit;
  ?>

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
        <form class="example col-md-6" action="action_page.php">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search" style="font-size: 130%;"></i></button>
        </form>

        <!--SEARCH BAR-->
        <!--header-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-grow: 0;">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#" style="color: white; font-size: 150%;"><i class="fas fa-heart"></i><span
                  class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color: white; font-size: 150%;"><i
                  class="fas fa-shopping-cart"></i></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" style="color: white;font-size: 150%; padding-top:0;;">
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
      <!--cart-->

      <!-- End -->
      <div id='refresh'>
      </div>
      <div class="pb-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5 mt-5">

              <!-- Shopping cart table -->
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 bg-light">
                        <div class="p-2 px-3 text-uppercase">Product</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Price</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Quantity</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Remove</div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
					               foreach($products as $product){
                                       
	                    ?>
                    <tr>
                      <th scope="row" class="border-0">
                        <div class="p-2">
                          <img src="assets/img/products/<?php echo $product['product_warna_id']; ?>.jpg" alt=""
                            width="70" class="img-fluid rounded shadow-sm">
                          <div class="ml-3 d-inline-block align-middle">
                            <h5 class="mb-0"> <a href="#"
                                class="text-dark d-inline-block align-middle"><?php echo $product['judul_barang']; ?></a>
                            </h5><span
                              class="text-muted font-weight-normal font-italic d-block"><?php echo $product['warna']; ?></span>
                          </div>
                        </div>
                      </th>
                      <td class="border-0 align-middle"><strong>Rp. <?php $price = $product['harga_barang'];
							                	echo number_format($price,2); 
							                  ?>
                        </strong>
                      </td>
                      <td class="border-0 align-middle"><strong> <input class="nud-qty" type="number" name="quantity"
                            min="1" max="5" value="<?php echo $product['jumlah_barang']; ?>"
                            data-id_barang="<?php echo $product['product_warna_id']?>"></strong></td>
                      <td class="border-0 align-middle"><a href="#" class="text-dark btn-delete"
                          data-id_barang='<?php echo $product['product_warna_id']?>'
                          data-id_bp='<?php echo $product['id_barang_penjualan']?>'><i class="fa fa-trash"></i></a></td>
                      <?php };?>
                    </tr>

                  </tbody>
                </table>
              </div>
              <!-- End -->
            </div>
          </div>

          <div class="row py-5 p-4 bg-white rounded shadow-sm">

            <div class="col-lg-6">
              <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
              <div class="p-4">
                <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have
                  entered.</p>
                <ul class="list-unstyled mb-4">
                  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order
                      Subtotal </strong><strong>$390.00</strong></li>
                  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and
                      handling</strong><strong>$10.00</strong></li>
                  <li class="d-flex justify-content-between py-3 border-bottom"><strong
                      class="text-muted">Tax</strong><strong>$0.00</strong></li>
                  <li class="d-flex justify-content-between py-3 border-bottom"><strong
                      class="text-muted">Total</strong>
                    <h5 class="font-weight-bold">$400.00</h5>
                  </li>
                </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--cart wrapper-->
  </div>
  </div>
  <style>
    body {
      background: #eecda3;
      background: -webkit-linear-gradient(to right, #a3c6ee, #2b78b6);
      background: linear-gradient(to right, #a3c6ee, #2b78b6);
      min-height: 100vh;
    }
  </style>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

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
    //jquery
    $(document).ready(function () {

      $('.btn-delete').on('click', function () {
        
        var idbarang = $(this).data('id_barang');
        var idbp = $(this).data('id_bp');
        //alert(idbarang);
        $.ajax({
          url: 'ajax/delete_ajax.php',
          method: 'POST',
          data: {
            id_barang: idbarang,
            id_bp: idbp
          },
          datatype: "html",
          //success: function (result) {
           // $('#refresh').html(result);
         // }
        });
        location.reload(true);
      });

      $('.nud-qty').on('change', function () {
        //alert($(this).val());
        var idbarang = $(this).data('id_barang');
        var qtybarang = $(this).val();
        //alert(idbarang);
        $.ajax({
          url: 'ajax/update_ajax.php',
          method: 'POST',
          data: {
            id_barang: idbarang,
            qty: qtybarang
          },
          datatype: "html",
         // success: function () {
            //$('#refresh').html(result);
            // location.reload(true);
           // alert("suksess bre");
          //}

        });

      });

    });
  </script>

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
            <p style="text-align:center; color:white; font-weight: 500;">Copyright TokoJamQ ©2019 All rights reserved
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php };?>
</body>

</html>