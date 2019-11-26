<?php 
session_start();
require_once('config.php');
include("function.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact Us TokoJamQ!</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/FONTAWESOME/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="assets/css/headerfooter.css" rel="stylesheet">
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
                                <?php
                                isloggedin(); 
                                ?>
                              
                            
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="isipp" style="padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
                <h1>Contact Us</h1>
                <img style="float:right;" src="assets/img/kartunamafix.jpg">
                <h4>Address: <br>
                    Pusat Grosir Surabaya (PGS)
                    </br>Lantai Dasar Blok H5 No 6-8 Surabaya</h4>
                <h4> Phone Number: (031) 52405089
                    <br> Whatsapp: 08159686049</h4>
                <h4> Email: tokojamq@gmail.com</h4>
                <h4> Website: tokojamq.co.id</h4>
                <h2>Get in Touch with us! :)</h2>
                <div class="row block-9">
                    <div class="col-md-6 pr-md-5">
                        <form action="#">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea name="" id="" cols="30" rows="7" class="form-control"
                                    placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=pgs&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>Google Maps
                                Generator by <a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 500px;
                                    width: 600px;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 500px;
                                    width: 600px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
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