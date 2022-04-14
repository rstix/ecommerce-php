<?php
  include 'connect.php';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "INSERT INTO ecom_customer (name, email, password)
    VALUES ('$name','$email','$password')";

  $con->query($sql); 

  header('Location: ../index.php');
?>
