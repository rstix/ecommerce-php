<?php
include "../../php/connect.php";

$user_id = $_SESSION["uid"];
$user_name = $_SESSION["uname"];
$user_email = $_SESSION["uemail"];

$ref = $_GET['ref'];

$sql = "SELECT * FROM ecom_order, ecom_products WHERE ecom_order.pid=ecom_products.id and refid='$ref'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result)
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

  <div class="container order main mt-4">

    <div class="row start-xs mb-4">
      <div class="col-xs-12">
        <div class="customer">
          <h2 class="mb-3">Order <?php echo $ref ?></h2>
          <h3 class="mb-1">Customer</h3>
          <p><?php echo $user_name ?></p>
          <p><?php echo $user_email ?></p>
        </div>
      </div>
    </div>

    <div class="row start-xs mb-4">
      <div class="col-xs-12">
        <div class="address">
          <h3 class="mb-1">Address</h3>
          <p><?php echo $row['address'] ?></p>
          <p><?php echo $row['city'] . ', ' . $row['zipcode'] ?></p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 d-flex headers mb-2">
        <span class="name">Product</span>
        <span class="unit">Unit Price</span>
        <span class="qty">Quantity</span>
        <span class="price">Total Price</span>
      </div>
      <?php
      if (mysqli_num_rows($result) > 0) {
        do {
      ?>
      <div class="col-xs-12 product-line d-flex mb-2">
        <span class="name">
          <a href="<?php echo $home_url . '/templates/pages/detail.php?product=' . $row["pid"]; ?>">
            <?php echo $row["name"] ?>
          </a>
        </span>
        <span class="small-price">
          $<?php echo $row["price"] ?></span>
        <span class="qty"><?php echo $row["qty"] ?></span>
        <span class="price">
          $<?php
                $totalPriceItem = $row["qty"] * $row["price"];
                $totalPrice = $totalPrice + $totalPriceItem;
                echo $totalPriceItem;
                ?>
        </span>
      </div>
      <?php
        } while ($row = mysqli_fetch_assoc($result));
      }
      ?>

      <div class="col-xs-offset-4 col-xs-8 d-flex total-price">
        <span>Total</span>
        <span class="price">$<?php echo $totalPrice; ?></span>
      </div>

    </div>

  </div>

  <?php
  include('../partials/footer.php');
  ?>
</body>

</html>