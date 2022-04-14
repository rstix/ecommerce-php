<?php
  include "../../php/connect.php";  
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

  <div class="container signup">
    <div class="row center-xs">
      <div class="col-xs-10 col-sm-6 col-md-4 col-lg-3">
        <h2>Sign Up</h2>
        <form action="./create_user.php" method="post">
          <label for="name">Name</label>
          <input type="text" name="name" id="name">
          <label for="email">Email</label>
          <input type="email" name="email" id="email">
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
          <button class="btn-red" type="submit">sign up</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>