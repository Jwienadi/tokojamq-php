<?php
    require_once('config.php');
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title> TokoJamQ Log In </title>
    <!-- Bootstrap core CSS -->
    <base href='<?php echo $base_url; ?>'>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/FONTAWESOME/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="assets/css/headerfooter.css" rel="stylesheet">
  <link href="assets/css/login.css" rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">
  <link href="assets/css/shop-homepage.css" rel="stylesheet">
</head>

<body>
<?php
	
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
                <a href="#" class="list-group-item list-group-item-action bg-light">Contact Us</a>
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
                <a href="index.php" class="col-md-3" ><img src="assets/img/logo.png" style="width: 100%;"></a>
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
                              aria-haspopup="true" aria-expanded="false"
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
            <div class="container">
                <div class="row">
                  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                      <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" id="form-signin-ajax" action="" method="post" name="login">
                          <div class="form-label-group">
                            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                            <label for="inputEmail">Email address</label>
                          </div>
            
                          <div class="form-label-group">
                            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                          </div>
            
                          <div id="error_notif" >
                            Username/Password Salah!
                          </div>
           
                          <input name="submit" type="submit" value="Login" class="btn btn-lg btn-primary btn-block text-uppercase" />
                          <br>
                          <p style="text-align:Center;">Not registered yet? <a href='signup.php'>Register Here</a></p>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <!-- Bootstrap core JavaScript -->
            <script src="assets/vendor/jquery/jquery.min.js"></script>
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/vendor/jquery/jquery.min.js"></script>
            <!-- Menu Toggle Script -->
            <script>
                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });

                $(document).ready(function () {

              $('#form-signin-ajax').submit(function(e) {
              var form = this;
              //alert("woi");
             e.preventDefault();
              var email = $("#inputEmail").val();
              var password = $("#inputPassword").val();
          
              $.ajax({
                 type: 'POST',
                 url: 'ajax/login_ajax.php',
                  data: {
                  email: email,
                  password: password
                 },
                 success: function(data) {
                  // alert(data);
            // do your PHP login and echo 1 if authentication was successfull
            if(data === "1") {
              location.href="index.php";
            } else {
            // show alert or something that user has wrong credentials ...
           
                $("#error_notif").show();
            }
        }
    });
});

});
            </script>
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
            <style>
              #error_notif{
    display: none;
    color: red;
    text-align: center;
    padding-bottom:10px;
  }
              </style>
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
  </ul></div></div>

  <div class="row">
  <div class="col-12">
  <div class="copyright">
  <p style="text-align:center; color:white; font-weight: 500;">Copyright TokoJamQ ©2019 All rights reserved  </p>
  </div></div></div></div></div>  
  <?php ?>
</body>
</html>