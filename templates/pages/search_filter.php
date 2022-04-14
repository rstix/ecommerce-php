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