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
	

			session_start();
      // If form submitted, insert values into the database.
      if(isset($_SESSION['name'])){
      //header("Location: login.php");
      //} else {
       
        header("Location: index.php");
      } else {
      
      
			if (isset($_POST['email'])){
				
				$email = stripslashes($_REQUEST['email']); // removes backslashes
				$email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($con,$password);
				
				//Checking is user existing in the database or not
				$query = "SELECT first_name FROM `user` WHERE email='$email' and password='".sha1($password)."'";
				$result = mysqli_query($con,$query) or die(mysql_error());
				$rows = mysqli_num_rows($result);
				if($rows==1){
          while ($row = $result->fetch_assoc()) {
            $_SESSION['name'] = $row['first_name'];
        }
          header("Location: index.php"); // Redirect user to index.php
          
				} else {
					echo "<div class='form'><h3>Email/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
			} else {
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
            <div class="container">
                <div class="row">
                  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                      <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" action="" method="post" name="login">
                          <div class="form-label-group">
                            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                            <label for="inputEmail">Email address</label>
                          </div>
            
                          <div class="form-label-group">
                            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                          </div>
            
                          <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
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
  <?php }}?>
</body>
</html>