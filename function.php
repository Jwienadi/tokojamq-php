
<?php
function isloggedin($con){

if(isset($_SESSION["email"])){
  $query="SELECT first_name from user where email='".$_SESSION['email']."';";
  
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
    };
?>

