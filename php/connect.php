<?php
session_start();
$con = new mysqli('webdev.cs.umt.edu', 'rs183327', 'jeithepei1Aile1onaeV3eeph4xohk', 'rs183327');

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$home_url = 'http://webdev.cs.umt.edu/~rs183327/ecommerce';
// $home_url = 'http://localhost:8006';