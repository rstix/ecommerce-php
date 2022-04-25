<?php
include "../../php/connect.php";

$user_id = $_SESSION["uid"];
$user_name = $_SESSION["uname"];
$user_email = $_SESSION["uemail"];

$ch_name = $_POST['name'];
$ch_email = $_POST['email'];

if ($ch_name or $ch_email) {
  $user_name = $ch_name;
  $user_email = $ch_email;
  $update_sql = "UPDATE ecom_customer SET name='$ch_name', email='$ch_email'  WHERE id=$user_id";
  mysqli_query($con, $update_sql);
}

$sql = "SELECT refid, SUM(price) as  tot_price, qty FROM ecom_order, ecom_products WHERE ecom_order.pid=ecom_products.id and uid=$user_id GROUP BY refid";
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
    <form action="" method="post" class='row'>
      <div class="col-xs-12 mb-3">
        <h2>Account Info</h2>
      </div>
      <div class="col-xs-6 input-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo $user_name ?>">
      </div>
      <div class="col-xs-6 input-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo $user_email ?>">
      </div>
      <div class="col-xs-12 center-xs">
        <button type="submit" class='btn-green'>save</button>
      </div>

    </form>

    <div class="row">
      <div class="col-xs-12 mb-3 mt-3">
        <h2>Your Orders</h2>
      </div>
      <?php
      if (mysqli_num_rows($result) > 0) {
      ?>
      <div class="col-xs-12 d-flex headers">
        <span class="name">Order</span>
        <span class="price">Price</span>
      </div>
      <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
      <div class="col-xs-12">
        <a href="<?php echo $home_url; ?>/templates/pages/order.php?ref=<?php echo $row["refid"] ?>"
          class="product-line">
          <span class="name"><?php echo $row["refid"] ?></span>
          <span class="price">$
            <?php
                echo round($row["tot_price"], 2);
                ?>
          </span>
        </a>

      </div>
      <?php

        }
      } else {
        echo "You have no orders yet.";
      }
      ?>
    </div>
  </div>
  </div>

  <?php
  include('../partials/footer.php');
  ?>
</body>

</html>