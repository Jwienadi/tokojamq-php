<?php
function isloggedin(){
if(isset($_SESSION["name"])){
    echo "<span class='roboto' style='letter-spacing:1px;'> <b>Welcome,".$_SESSION['name']."!</b></span><a class='dropdown-item' href='logout.php'>LOG OUT</a>";
  }
    else {
      echo "<a class='dropdown-item' href='login.php'>LOG IN</a> <div class='dropdown-divider'></div><a class='dropdown-item' href='signup.php'>SIGN UP</a>";
    }}
?>

