<?php
include "../../php/connect.php";
$user_id = $_SESSION["uid"];
$user_name = $_SESSION["uname"];
$user_email = $_SESSION["uemail"];
?>

<!DOCTYPE html>
<html lang="en">
<?php
include('../partials/head.php')
?>

<body>
  <?php
  include('../partials/header.php');

  $ids = $_POST['ids'];

  $idsArr = explode(',', $ids);
  $qtyArr = array_count_values($idsArr);
  $idsClean = $ids == '' ? '-1' : $ids;

  $query = "SELECT * from ecom_products where id in ($idsClean)";
  $result = mysqli_query($con, $query);
  ?>

  <div class="container cart mt-4 main">

    <div class="row">

      <?php
      if (mysqli_num_rows($result) > 0) {
      ?>
      <div class="col-xs-12 d-flex headers">
        <span class="name">Product</span>
        <span class="qty">Quantity</span>
        <span class="price">Price</span>
      </div>
      <?php

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
      <div class="col-xs-12">
        <div class="product-line">
          <span class="name"><?php echo $row["name"] ?> <span class="small-price"> -
              $<?php echo $row["price"] ?></span></span>
          <span class="qty"><?php echo $qtyArr[strval(trim($row["id"]))] ?></span>
          <span class="price">$
            <?php
                $totalPriceItem = $qtyArr[strval(trim($row["id"]))] * $row["price"];
                $totalPrice = $totalPrice + $totalPriceItem;
                echo $totalPriceItem;
                ?>
          </span>
          <img class="remove" src="<?php echo $home_url; ?>/images/icons/icon-trash.svg"
            data-id='<?php echo trim($row["id"]) ?>'>
        </div>

      </div>
      <?php

        }
      } else {
        echo "You have nothing in your cart.";
      }
      if (mysqli_num_rows($result) > 0) {
        ?>
      <div class="col-xs-12 end-xs total-price">
        $<?php echo $totalPrice; ?>
      </div>

    </div>

    <form class="row mt-3" action="<?php echo $home_url; ?>/templates/pages/confirmation.php" method="post">
      <input type="hidden" name="pids" value="<?php echo $ids ?>">
      <input type="hidden" name="uid" value="<?php echo $user_id ?>">
      <?php if ($user_id) { ?>
      <input type="hidden" name="name" value="<?php echo $user_name ?>">
      <input type="hidden" name="email" value="<?php echo $user_email ?>">
      <?php } else { ?>
      <div class="col-xs-6 col-md-4 input-group">
        <label for="name">Name</label>
        <input type="text" required name="name" id="name">
      </div>
      <div class="col-xs-6 col-md-4 input-group">
        <label for="email">Email</label>
        <input type="email" required name="email" id="email">
      </div>
      <?php } ?>
      <div class="col-xs-6 col-md-4 input-group">
        <label for="address">Address line</label>
        <input type="text" required name="address" id="address">
      </div>
      <div class="col-xs-6 col-md-4 input-group">
        <label for="city">City</label>
        <input type="text" required name="city" id="city">
      </div>
      <div class="col-xs-6 col-md-4 input-group">
        <label for="zip">Zip code</label>
        <input type="text" required name="zip" id="zip">
      </div>
      <div class="col-xs-6 col-md-4 input-group"></div>

      <div class="col-xs-12 divide"></div>

      <div class="col-xs-6 col-md-4 input-group">
        <label for="card">Credit card number</label>
        <input type="text" name="card" id="card">
      </div>
      <div class="col-xs-6 col-md-4 input-group">
        <label for="cvc">CVC</label>
        <input type="text" name="cvc" id="cvc">
      </div>

      <div class="col-xs-12 center-xs">
        <button type="submit" class="btn-red">checkout</button>
      </div>

    </form>
    <?php } ?>


  </div>

  </div>

  <?php
  include('../partials/footer.php')
  ?>
</body>

</html>