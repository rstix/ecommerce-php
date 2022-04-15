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

    <div class="container main">

    <div class="row mt-4">
      <div class="col-xs-6 col-md-6">
        <?php
        include('../partials/price_filter.php')
        ?>
      </div>
      <div class="col-xs-6 col-md-6 end-xs">
        <?php
          include('../partials/search.php')
        ?>
      </div>
    </div>

      <?php
        include('../partials/product_list.php');
      ?>

    </div>

    <?php
    include('../partials/footer.php')
    ?>
  </body>
</html>