<?php
require_once('config.php');
?>
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

if(isset($_SESSION["user_id"])){
  $query="SELECT first_name from user where user_id='".$_SESSION['user_id']."';";
  
  $result = mysqli_query($con,$query) or die(mysqli_error());
  $rows = mysqli_num_rows($result);
	if($rows==1){
          while ($row = $result->fetch_assoc()) {
            $nama = $row['first_name'];
  }}
    echo "<span class='roboto' style='letter-spacing:1px;'> <b>Welcome,".$nama."!</b></span><a class='dropdown-item' href='logout.php'>LOG OUT</a>";
  }
    else 
      echo "<a class='dropdown-item' href='login.php'>LOG IN</a> <div class='dropdown-divider'></div><a class='dropdown-item' href='signup.php'>SIGN UP</a>";
    
?>
               
              </div>
            </li>
          </ul>
        </div>
      </nav>
    