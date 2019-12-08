<?php
session_start();
require_once('../config.php');

/*// If form submitted, insert values into the database.
if(isset($_SESSION['user_id'])){
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
          $query = "SELECT user_id FROM `user` WHERE email='$email' and password='".sha1($password)."'";
          $result = mysqli_query($con,$query) or die(mysql_error());
          $rows = mysqli_num_rows($result);
          if($rows==1){
    while ($row = $result->fetch_assoc()) {
      $_SESSION['user_id'] = $row['user_id'];
  }
    echo "1";
    //header("Location: index.php"); // Redirect user to index.php
    
          } else {
            echo "1";
 }}};*/

 if($_POST){
    $p=$_POST;
   /* echo "<pre>";
    print_r($p);
    echo "</pre>";*/

    $email=$p['email'];
    $password=$p['password'];
    $query = "SELECT user_id FROM `user` WHERE email='$email' and password='".sha1($password)."'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
          if($rows==1){
            while ($row = $result->fetch_assoc()) {
                $_SESSION['user_id'] = $row['user_id'];
            }
            echo "1";
          } else {
              echo "0";
          }
        
 }
?>