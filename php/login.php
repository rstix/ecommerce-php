<?php
  session_start();
  include 'connect.php';

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