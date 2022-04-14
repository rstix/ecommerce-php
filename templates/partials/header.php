<?php
  $user_name = $_SESSION["uname"];
  $user_id = $_SESSION["uid"];
  ?>

<header class="header">
  <div class="container">
    <div class="row between-xs">

      <div class="col-xs-2 logo">
        <h1><a href="/index.php">Home</a></h1>
      </div>

      <div class="col-xs-10 menu">
        <?php if(isset($user_name)){ ?>
          <div class="dropdown">
          <a class="user-name"><?php echo $user_name ?></a>
            <div class="dropdown-content">
              <a href="/index.php">Account</a>
              <a href="/php/logout.php">Logout</a>
            </div>
          </div>
          
          <!-- <a class="cart-link" href="/templates/pages/cart.php"> -->
          <form action="/templates/pages/cart.php" method="post" class="cart-link">
            <input id="ids" type="hidden" name="ids" value="">
            <img src="/images/icons/shopping_cart.svg" alt="shopping cart" class="shopping-cart" data-q='0'>
          </form>
            
            <!-- <span class="badge"></span> -->
          <!-- </a> -->
        <?php }else{ ?>
          <a href="/templates/pages/login.php">Log in</a>
          <a href="/templates/pages/signup.php">Sign up</a>
          <form action="/templates/pages/cart.php" method="post" class="cart-link">
            <input id="ids" type="hidden" name="ids" value="">
            <img src="/images/icons/shopping_cart.svg" alt="shopping cart" class="shopping-cart" data-q='0'>
          </form>
        <?php } ?>
      </div>

    </div>
  </div>
</header>