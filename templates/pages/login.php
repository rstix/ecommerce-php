<?php
  include "../../php/connect.php"; 
  
  $e = $_GET['e'];
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

  <div class="container login main">
    <div class="row center-xs">
     <div class="col-xs-12 col-sm-6 col-md-4 ">
        <h2>Log In</h2>
        <form action="<?php echo $home_url;?>/php/login.php" method="post">
          <label for="email">Email</label>
          <input type="email" name="email" id="email">
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
          <button class="btn-red" type="submit">log in</button>
        </form>
        <h4><?php if($e=='not_exist'){
          echo 'Wrong email or password!';
        };?></h4>
      </div>
    </div>
  </div>

  <?php
  include('../partials/footer.php');
  ?>
</body>

</html>