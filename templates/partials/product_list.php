<div class="row product-list">
  <?php
    if (mysqli_num_rows($result) > 0) {

      while($row = mysqli_fetch_assoc($result)) {
        ?>

        <div class="col-xs-4 col-md-3 col-lg-2">
          <div class="product-card mt-3">
          <?php echo $home_dir?>
            <a href="<?php echo $home_url;?>/templates/pages/detail.php?product=<?php echo trim($row["id"])?>">
              <img src="<?php echo  $row["image_url"]?>" alt="<?php echo  $row["name"]?>">
              <h3><?php echo  $row["name"]?></h3>
              <p>$<?php echo  $row["price"]?></p>
              <a data-id='<?php echo trim($row["id"])?>' class="btn-red add-to-cart">add to cart</a>
            </a>
          </div>
          
        </div>
        <?php

      }
    } else {
      echo "0 results";
    }
    
    mysqli_close($con);
  ?>
</div>