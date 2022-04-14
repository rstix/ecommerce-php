<?php
  include "../../php/connect.php";  
  
  $uid = $_POST["uid"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $zipcode = $_POST["zip"];
  $refid = uniqid(time()."_");


  $pids = $_POST['pids'];
  $idsArr = explode(',', $pids);
  $qtyArr = array_count_values($idsArr);

  foreach ($qtyArr as $pid => $qty) {
    $sql = "INSERT INTO ecom_order (uid, pid, qty, refid, name, email, address, city, zipcode)
      VALUES ('$uid', '$pid','$qty','$refid', '$name','$email','$address','$city','$zipcode')";
    $con->query($sql);
  }


  // $sql = "INSERT INTO ecom_order (uid, pid, qty, refid, name, email, address, city, zipcode)
  // VALUES ('$uid', 'Doe','$refid', '$name','$email','$address','$city','$zipcode')";
  // $con->query($sql);

  $con->close();
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

    <script>
      localStorage.clear()
    </script>
  </body>

</html>