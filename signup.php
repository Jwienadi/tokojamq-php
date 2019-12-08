<?php
    require_once('config.php')
?>

<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title> TokoJamQ Privacy Policy </title>
    <!-- Bootstrap core CSS -->
    <base href='<?php echo $base_url; ?>'>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/FONTAWESOME/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="assets/css/headerfooter.css" rel="stylesheet" type="text/css">
  <link href="assets/css/signup.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">
  <link href="assets/css/shop-homepage.css" rel="stylesheet">
</head>

<body>
    <div>
<?php

            // If form submitted, insert values into the database.
     
            if (isset($_REQUEST['email'])){
                $firstname = stripslashes($_REQUEST['firstname']); // removes backslashes
                $firstname = mysqli_real_escape_string($con,$firstname); //escapes special characters in a string
                $lastname = stripslashes($_REQUEST['lastname']);
                $lastname = mysqli_real_escape_string($con,$lastname);
                $email = stripslashes($_REQUEST['email']);
                $email = mysqli_real_escape_string($con,$email);
                $phone = stripslashes($_REQUEST['phone']);
                $phone = mysqli_real_escape_string($con,$phone);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con,$password);

             
                $query = "INSERT into `user` (email, first_name, last_name, phone_number,password) VALUES ('$email','$firstname','$lastname','$phone','".sha1($password)."')";
                $result = mysqli_query($con,$query);
                if($result){
                    echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
                }
            }else{
                "<div class='form'><h3>SIGN UP FAIL</h3><br/>Click here to <a href='signup.php'>retry</a></div>"

        ?>
    </div>    
<div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading"> <img src="assets/img/q hitam.png"> </div>
            <div class="list-group list-group-flush">
                <!--<a href="#" class="list-group-item list-group-item-action bg-light">Products</a>-->
                <button class="dropdown-btn list-group-item list-group-item-action bg-light"
                    style="background-color: transparent; border: 0;"> 
                    <a href="product.php">Products </a>
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
                <form class="example col-md-6" action="action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search" style="font-size: 130%;"></i></button>
                </form>

                <!--SEARCH BAR-->
                <!--header-->
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-grow: 0;">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                       
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
                              <a class="dropdown-item" href="signup.php">SIGN UP</a>
                            </div>
                          </li>
                    </ul>
                </div>
            </nav>
         
<!--signup-->
<!-- Navbar-->

<div class="container">
  <div class="row py-5 mt-4 align-items-center">
      <!-- For Demo Purpose -->
      <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
          <img src="https://res.cloudinary.com/mhmd/image/upload/v1569543678/form_d9sh6m.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
          <h1>Create an Account</h1>
          
      </div>

      <!-- Registeration Form -->
   
      <div class="col-md-7 col-lg-6 ml-auto">
          <form name="registration" action="" method="post">
              <div class="row">

                  <!-- First Name -->
                  <div class="input-group col-lg-6 mb-4">
                      <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-user text-muted"></i>
                          </span>
                      </div>
                      <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md" required>
                  </div>

                  <!-- Last Name -->
                  <div class="input-group col-lg-6 mb-4">
                      <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-user text-muted"></i>
                          </span>
                      </div>
                      <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md" required>
                  </div>

                  <!-- Email Address -->
                  <div class="input-group col-lg-12 mb-4">
                      <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-envelope text-muted"></i>
                          </span>
                      </div>
                      <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md" required>
                  </div>

                  <!-- Phone Number -->
                  <div class="input-group col-lg-12 mb-4">
                      <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-phone-square text-muted"></i>
                          </span>
                      </div>
                      <!--<select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                          <option value="">+12</option>
                          <option value="">+10</option>
                          <option value="">+15</option>
                          <option value="">+18</option>
                      </select>-->
                      <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3" required>
                  </div>

                  <!-- Password -->
                  <div class="input-group col-lg-6 mb-4">
                      <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-lock text-muted"></i>
                          </span>
                      </div>
                      <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md" required>
                  </div>

                  <!-- Password Confirmation -->
                  <div class="input-group col-lg-6 mb-4">
                      <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-lock text-muted"></i>
                          </span>
                      </div>
                      <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md" required>
                  </div>

                  <!-- Submit Button -->
                  <div class="form-group col-lg-12 mx-auto mb-0">
    
                      <input type="submit" name="submit" value="Register" class="btn btn-primary btn-block py-2">
                      
                  </div>

                 
                  <!-- Already Registered -->
                  <div class="text-center w-100 p-2" >
                      <p class="text-muted font-weight-bold">Already Registered? <a href="login.php" class="text-primary ml-2">Login</a></p>
                  </div>

              </div>
          </form>
      </div>
  </div>
</div>

<!--signup-wrapper-->
            <!-- Bootstrap core JavaScript -->
            <script src="assets/vendor/jquery/jquery.min.js"></script>
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Menu Toggle Script -->
            <script>
                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
              
$(function () {
    $('input, select').on('focus', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
    });
    $('input, select').on('blur', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
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
                    <p style="text-align:center; color:white; font-weight: 500;">Copyright TokoJamQ ©2019 All rights
                        reserved </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>
</body>
</html>