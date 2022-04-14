<?php
  $con = new mysqli('webdev.cs.umt.edu','rs183327','jeithepei1Aile1onaeV3eeph4xohk','rs183327')
    or die('Could not connect');
  echo "connected";

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "INSERT INTO ecom_customer (name, email, password)
    VALUES ('$name','$email','$password')";

if ($con->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

?>


<!DOCTYPE html>
<html lang="en">
<?php
include('../partials/head.php')
?>

<body>
  <?php
  include('../partials/header.php');
  ?>

</body>

</html>