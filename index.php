<?php
  include "./php/connect.php";
  
?>

<!DOCTYPE html>
<html lang="en">
<?php
include('./templates/partials/head.php')
?>

  <body>
  <?php
  include('./templates/partials/header.php')
  ?>

<div class="container">
  <div class="row mt-4">
    <div class="col-xs-6 col-md-6">
      <?php
      include('./templates/partials/price_filter.php')
      ?>
    </div>
    <div class="col-xs-6 col-md-6 end-xs">
      <?php
        include('./templates/partials/search.php')
      ?>
    </div>
  </div>

  <?php
    $query = "SELECT * from ecom_products";
    $result = mysqli_query($con, $query);
    include('./templates/partials/product_list.php');
  ?>

  </div>

  <?php
    include('./templates/partials/footer.php')
  ?>
  </body>

</html>