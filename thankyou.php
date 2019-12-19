<?php 
session_start();
require_once('config.php');
include("function.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title> TokoJamQ Privacy Policy </title>
    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/FONTAWESOME/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
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
        
 <?php 
isloggedin($con);
?>
                            </div>
                          </li>
                    </ul>
                </div>
            </nav>
            <div class="isipp p-5 m-5">
                <br><br>
                <h1 class="col-md-6">THANK YOU</h1>
                <h2> for shopping at TOKOJAMQ</h2>
                <br>
                <h2 class><a href="index.php">Back to Home</a></h2>
                
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
    </ul></div></div>
  
    <div class="row">
    <div class="col-12">
    <div class="copyright">
    <p style="text-align:center; color:white; font-weight: 500;">Copyright TokoJamQ ©2019 All rights reserved  </p>
    </div></div></div></div></div>

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