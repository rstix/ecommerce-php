<?php
  include "../../php/connect.php";
  $user_name = $_SESSION["uname"];

  $startprice = $_GET['start_price'];
  $endprice = $_GET['end_price'];
  $sql = "SELECT * FROM ecom_products WHERE price BETWEEN $startprice AND $endprice";
  $result = mysqli_query($con,$sql);


?>

<!DOCTYPE html>
<html lang="en">
<?php
  include('../partials/head.php')
?>

  <body>
  <?php
    include('../partials/header.php')
  ?>

    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <?php
            include('../partials/search.php')
          ?>
        </div>
      </div>

      <?php
        include('../partials/price_filter.php');

        include('../partials/product_list.php');
      ?>

    </div>

    <?php
    include('../partials/footer.php')
    ?>
  </body>
</html>