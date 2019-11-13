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
    <link href="assets/css/override.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="assets/css/shop-homepage.css" rel="stylesheet">
  
  </head>
  
  <body>
  
    <div class="d-flex" id="wrapper">
  
 <!-- Sidebar -->
 <div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading"> <img src="assets/img/q hitam.png"> </div>
    <div class="list-group list-group-flush">
      <!--<a href="#" class="list-group-item list-group-item-action bg-light">Products</a>-->
      <button class="dropdown-btn list-group-item list-group-item-action bg-light" style="background-color: transparent; border: 0;"> Products
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container" >
        <ul class="link-list">
           <li><a href="#">Pioneer</a></li> <br>
           <li><a href="#">Esti Loren</a></li><br>
           <li><a href="#">Asako</a></li><br>
           <li><a href="#">Esa</a></li><br>
           <li><a href="#">Edison</a></li><br>
           <li><a href="#">Esa</a></li>
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
      <a href="index.php" class="col-md-3" ><img src="assets/img/logo.png" style="width: 100%;"></a>
      <!--SEARCH BAR-->
      <!-- Load icon library -->
      <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

      <!-- The form 2-->
      <form class="example col-md-6" action="action_page.php" >
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"
              style="color: white;font-size: 150%;">
              <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
              style="text-align: center;">
             
              <a class="dropdown-item" href="login.php">LOG IN</a>
          
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="signin.php">SIGN UP</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!--cart-->
   
      <!-- End -->
    
      <div class="pb-5">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
        
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
                        <tr>
                          <th scope="row" class="border-0">
                            <div class="p-2">
                              <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                              <div class="ml-3 d-inline-block align-middle">
                                <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Timex Unisex Originals</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: Watches</span>
                              </div>
                            </div>
                          </th>
                          <td class="border-0 align-middle"><strong>$79.00</strong></td>
                          <td class="border-0 align-middle"><strong>3</strong></td>
                          <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <div class="p-2">
                              <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-3_cexmhn.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                              <div class="ml-3 d-inline-block align-middle">
                                <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">Lumix camera lense</a></h5><span class="text-muted font-weight-normal font-italic">Category: Electronics</span>
                              </div>
                            </div>
                          </th>
                          <td class="align-middle"><strong>$79.00</strong></td>
                          <td class="align-middle"><strong>3</strong></td>
                          <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <div class="p-2">
                              <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-2_qxjis2.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                              <div class="ml-3 d-inline-block align-middle">
                                <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block">Gray Nike running shoe</a></h5><span class="text-muted font-weight-normal font-italic">Category: Fashion</span>
                              </div>
                            </div>
                            <td class="align-middle"><strong>$79.00</strong></td>
                            <td class="align-middle"><strong>3</strong></td>
                            <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- End -->
                </div>
              </div>
        
              <div class="row py-5 p-4 bg-white rounded shadow-sm">
                <div class="col-lg-6">
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                  <div class="p-4">
                    <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                    <div class="input-group mb-4 border rounded-pill p-2">
                      <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
                      <div class="input-group-append border-0">
                        <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                      </div>
                    </div>
                  </div>
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                  <div class="p-4">
                    <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
                    <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                  <div class="p-4">
                    <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                    <ul class="list-unstyled mb-4">
                      <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>$390.00</strong></li>
                      <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li>
                      <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>$0.00</strong></li>
                      <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
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
      
     </script>

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
  <li><a href="contact.php">Contact Us</a></li>
  <li><a href="privacy policy.php">Privacy Policy</a></li>
  <li><a href="tnc.php">Terms and Condition</a></li>
  <li><a href="faq.php">FAQ</a></li>
  </ul></div></div>

  <div class="row">
  <div class="col-12">
  <div class="copyright">
  <p style="text-align:center; color:white; font-weight: 500;">Copyright TokoJamQ ©2019 All rights reserved  </p>
  </div></div></div></div></div>
  
    </body>
</html>