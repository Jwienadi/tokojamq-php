<?php 
session_start();
require_once('config.php');
include ('API/API.php');
?>
<?php
$query="select first_name,last_name,email"

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>Toko JamQ Checkout Form</title>
  <!-- Bootstrap core CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/FONTAWESOME/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="assets/css/indexcontent.css" rel="stylesheet">
  <link href="assets/css/itemcard.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">
  <link href="assets/css/shop-homepage.css" rel="stylesheet">
  <link href="assets/css/headerfooter.css" rel="stylesheet">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

  <!-- Custom styles for this template -->
  <link href="form-validation.css" rel="stylesheet">
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
            <li><a href="pioneer.php">Pioneer</a></li><br>
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
                aria-haspopup="true" aria-expanded="false" style="color: white;font-size: 150%;">
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

      <!-- CHECKOUT COY -->
      <main id="main" role="main">
        <section id="checkout-container">
          <div class="container">
            <h1> Toko JamQ Checkout Form </h1>
            <div class="row py-2">
              <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-muted">Your cart</span>
                  <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Subtotal</h6>
                      <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$12</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Shipping fee</h6>
                      <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted" id="ongkir">$8</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Third item</h6>
                      <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$5</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                      <h6 class="my-0">Promo code</h6>
                      <small>EXAMPLE CODE</small>
                    </div>
                    <span class="text-success">-$5</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
                  </li>
                </ul>
                <form class="card p-2">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                  </div>
                </form>
                <!--<div class="payment-methods">
                            <p class="pt-4 mb-2">Payment Options</p>
                            <hr>
                            <label class="heading">Pilihan transfer bank:</label>
                            <?php //$query = "SELECT * FROM bank"; ?>
                            <br> <input name="radio" type="radio" value="echo bank id">echo bank name, no rek, nama rek
                            <br> <input name="radio" type="radio" value="Radio 2">Radio 2
                            <br> <input name="radio" type="radio" value="Radio 3">Radio 3
                            <?php //include'radio_value.php'; ?>
                            <br> <input name="submit" type="submit" value="Get Selected Values">
                        </div> -->
              </div>
              <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form name="form1" class="needs-validation" novalidate>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="firstName">First name</label>
                      <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="lastName">Last name</label>
                      <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
                  </div>

                  <!--<div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Username" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div> -->

                  <div class="mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Adress..." required>
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>

                  <!--<div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>-->

                  <div class="row">
                    <!-- <div class="col-md-5 mb-3">
              <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option>Indonesia</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>-->
                    <div class="col-md-4 mb-3">
                      
                        <label for="state">Province</label>
                        <select class="custom-select d-block w-100" id="state"  required>
                          <?php 
                //$api_getprovince();
                foreach ($dataprovinsi as $dprov) {
               
                 ?>
                          <option value="<?php echo $dprov['idprovinsi'];?>"><?php echo $dprov['namaprovinsi'];?>
                          </option>
                          <?php }; ?>
                          <?php /*api_getprovince();
                  foreach ($dataprovinsi as $datap){
                    echo "<h1>".$datap['idprovinsi']."</h1>";
                  
                  ?>
                          <option data-idprovinsi="<?php echo $datap['idprovinsi'];?>">
                            <?php echo $datap['namaprovinsi'];?></option>
                          <?php };*/ ?>
                          <!--<option>East Java</option>-->
                        </select>
                        <div class="invalid-feedback">
                          Please provide a valid province.
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                      <label for="city">Kota</label>
                      <select class="custom-select d-block w-100" id="city" required>

                      </select>
                      <div class="invalid-feedback">
                        Please provide a valid city.
                      </div>
                    </div>
                
                <!-- <div class="col-md-3 mb-3">
                <label for="zip">Postal Code</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Postal code required.
                </div>
              </div>-->
                <div class="col-md-5 mb-3">
                  <label for="phone">Recipient Mobile Phone</label>
                  <input type="text" class="form-control" id="phone" placeholder="" required>
                  <div class="invalid-feedback">
                    Recipient Mobile Phone required.
                  </div>
                </div>
              </div>

              <hr class="mb-4">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="same-address">
                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing
                  address</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="save-info">
                <label class="custom-control-label" for="save-info">Save this information for next time</label>
              </div>
              <hr class="mb-4">
            </div>
          </div>

          <h4 class="mb-3">Select Courier</h4>
          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
              <label class="custom-control-label" for="credit">JNE</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="debit">Wahana</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="paypal">Pos Indonesia</label>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-name">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
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
            <p style="text-align:center; color:white; font-weight: 500;">Copyright TokoJamQ ©2019
              All rights reserved </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!--================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>-->
  <!--<script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>-->
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict';

      window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();

    //rajaongkir
    $(document).ready(function () {
      $(function () {
    $("#state").change();
});

    $('#state').change(function () {
    var state =$(this).val();
     // alert(state);
      
      $.ajax({
              url: 'ajax/city_ajax.php',
              method: 'POST',
              data: {
                state:state
              },
              success: function(data) {
                //alert(data);
                var res = JSON.parse(data);
                //hasilnya object object
               //alert(res[0][rajaongkir][results]);
               $( "#city" ).empty();
               $.each(res.rajaongkir.results, function(index, val) {
                //Fc alert(val.city_name);
                //alert("<select value="+val.city_id+">"+val.city_name+"</select>");
                $( "#city" ).append( "<option value='"+val.city_id+"'>"+val.city_name+"</option>" );
                
                 
                });
                $("#city").change();
               //alert( res.rajaongkir.results[0].city_name);
               //alert("A");                                                      
              
               //alert(JSON.stringify(data));
              }
            })
    })

    //ongkire
    $('#city').change(function () {
    var city =$(this).val();
    //alert(city);
      
      $.ajax({
              url: 'ajax/ongkir_ajax.php',
              method: 'POST',
              data: {
                city:city
              },
              success: function(data) {
                //alert(data);
                var res = JSON.parse(data);
                //alert( res.rajaongkir.results[0].costs[0].cost[0].value);
                $('#ongkir').text("Rp. "+res.rajaongkir.results[0].costs[0].cost[0].value);
                //hasilnya object object
               //alert(res[0][rajaongkir][results]);
              /* $( "#city" ).empty();
               $.each(res.rajaongkir.results, function(index, val) {
                //Fc alert(val.city_name);
                //alert("<select value="+val.city_id+">"+val.city_name+"</select>");
                $( "#city" ).append( "<option value='"+val.city_id+"'>"+val.city_name+"</option>" );*/

                 
               // });
               //alert( res.rajaongkir.results[0].city_name);
               //alert("A");                                                      
              
               //alert(JSON.stringify(data));
              }
            })
    })
    });
    /*
     function ajaxfunction{
      var cat_id=document.getElementById('state').value;
      
      }

      $(document).ready(function () {
            $('#state').change(function () {
              //Mengambil value dari option select provinsi kemudian parameternya
              //dikirim menggunakan ajax
              var prov = $('#state').val();
             // $('#provinsi_nama').val($('#state option:selected').text());
              $("#kurir").prop('selectedIndex', 0);
             // $("#jenis").html('');
              //$("#harga").val('');
              //$("#estimasi").val('');
              //$("#totalkeseluruhan").val('');
              $.ajax({
                type: 'GET',
                url: 'http://localhost:88/dapursalamku/c/cek_kabupaten.php',
                data: 'province_id=' + prov,
                success: function (data) {

                  $("#provinsiku").val(prov);
                  //jika data berhasil didapatkan, tampilkan ke dalam option select
                  kabupaten
                  $("#kabupaten").html(data);
                  $('#kabupaten_nama').val($('#kabupaten option:selected').text());
                }
              });
            });
            $("#kabupaten").change(function () {
              $('#kabupaten_nama').val($('#kabupaten option:selected').text());
              $("#kurir").prop('selectedIndex', 0);
              $("#jenis").html('');
              $("#harga").val('');
              $("#estimasi").val('');
              $("#totalkeseluruhan").val('');
            });*/
  </script>
</body>

</html>
