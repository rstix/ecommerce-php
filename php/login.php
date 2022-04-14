<?php
  session_start();
  $con = new mysqli('webdev.cs.umt.edu','rs183327','jeithepei1Aile1onaeV3eeph4xohk','rs183327')
    or die('Could not connect');
  echo "connected";

  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM ecom_customer WHERE email='$email' and password='$password'";
  $result = mysqli_query($con, $sql);
  

  $row = mysqli_fetch_array($result);


  $_SESSION['uname'] = $row['name'];
  $_SESSION['uid'] = $row['id'];
  $_SESSION['uemail'] = $row['email'];
  header('Location: ../index.php');
?>