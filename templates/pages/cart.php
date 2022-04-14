<?php
  include "../../php/connect.php";
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

      $query = "SELECT * from ecom_products where id in ($ids)";
      $result = mysqli_query($con, $query);
    ?>

    <div class="container cart mt-4">
      <div class="row">
        <div class="col-xs-12 d-flex headers">
          <span class="name">Product</span>
          <span class="qty">Quantity</span>
          <span class="price">Price</span>
        </div>
        <?php
          if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="col-xs-12">
                <div class="product-line">
                    <span class="name"><?php echo $row["name"]?> <span class="small-price"> - $<?php echo $row["price"]?></span></span>
                    <span class="qty"><?php echo $qtyArr[strval(trim($row["id"]))]?></span>
                    <span class="price">$<?php 
                      $totalPriceItem = $qtyArr[strval(trim($row["id"]))]*$row["price"];
                      $totalPrice = $totalPrice + $totalPriceItem;
                      echo $totalPriceItem;
                      ?>
                    </span>
                  </a>
                </div>
                
              </div>
              <?php
      
            }
          } else {
            echo "You have nothing in you cart.";
          }
          
         
          // mysqli_close($con);
        ?>
        <div class="col-xs-12 end-xs total-price">
          $<?php  echo $totalPrice;?>
        </div>
      </div>

        
          <form class="row mt-3" action="" method="post">
            <div class="col-xs-6 col-md-4 input-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" value="<?php echo isset($user_name) ? $user_name : ''; ?>">
            </div>
            <div class="col-xs-6 col-md-4 input-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" value="<?php echo isset($user_email) ? $user_email : ''; ?>">
            </div>
            <div class="col-xs-6 col-md-4 input-group">
              <label for="adress">Address line</label>
              <input type="text" name="adress" id="adress">
            </div>
            <div class="col-xs-6 col-md-4 input-group">
              <label for="city">City</label>
              <input type="text" name="city" id="city">
            </div>
            <div class="col-xs-6 col-md-4 input-group">
              <label for="zip">Zip code</label>
              <input type="text" name="zip" id="zip">
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
        


    </div>

    <?php
    include('../partials/footer.php')
    ?>
  </body>

</html>