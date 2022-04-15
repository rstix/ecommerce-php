<?php
  include "../../php/connect.php";
  $user_name = $_SESSION["uname"];

  $query = $_GET['query'];
  $sql = "SELECT * FROM ecom_products WHERE (`name` LIKE '%".$query."%')";
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