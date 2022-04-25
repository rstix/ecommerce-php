<?php
include "../../php/connect.php";

$user_id = $_SESSION["uid"];
$user_name = $_SESSION["uname"];
$user_email = $_SESSION["uemail"];

$ref = $_GET['ref'];

$sql = "SELECT refid, price, qty FROM ecom_order, ecom_products WHERE ecom_order.pid=ecom_products.id and refid=$ref";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<?php
include '../partials/head.php'
?>

<body>
  <?php
  include '../partials/header.php';
  ?>

  <div class="container account main mt-4">

  </div>

  <?php
  include('../partials/footer.php');
  ?>
</body>

</html>