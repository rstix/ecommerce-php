<?php
  include "../../php/connect.php";  
  
  $prodictId = $_GET["product"];
  $query = "SELECT * FROM ecom_products WHERE id=$prodictId";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
  // var_dump($result)

  $sql = "INSERT INTO ecom_order (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com')";
?>

<!DOCTYPE html>
<html lang="en">
  <?php
  include('../partials/head.php')
  ?>

  <body>
    <?php
    include('../partials/header.php');
    ?>

    <div class="container confirmation">
      <div class="row">
        <div class="col-xs-12">

        </div>
      </div>
    </div>

    <?php
    include('../partials/footer.php');
    ?>
  </body>

</html>