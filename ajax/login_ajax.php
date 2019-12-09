<?php
session_start();
require_once('../config.php');



 if($_POST){
    $p=$_POST;
  

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