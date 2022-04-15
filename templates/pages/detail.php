<?php
  include "../../php/connect.php";  
  
  $prodictId = $_GET["product"];
  $query = "SELECT * FROM ecom_products WHERE id=$prodictId";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
  <?php
  include '../partials/head.php'
  ?>

  <body>
    <?php
    include '../partials/header.php' ;
    ?>

    <div class="container detail-page main">
      <div class="row">
        <div class="col-xs-12 product-card">
        <img src="<?php echo  $row["image_url"]?>" alt="<?php echo  $row["name"]?>">
        <h3><?php echo  $row["name"]?></h3>
        <p>$<?php echo  $row["price"]?></p>
        <p class="description"><?php echo  $row["description"]?></p>
        <a data-id="<?php echo trim($row["id"])?>" class="btn-red add-to-cart">add to cart</a>
        </div>
      </div>
    </div>

    <?php
    include('../partials/footer.php');
    ?>
  </body>

</html>