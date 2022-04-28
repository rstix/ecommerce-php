<?php
include "../../php/connect.php";

$uid = $_POST["uid"];
$name = $_POST["name"];
$email = $_POST["email"];
$address = $_POST["address"];
$city = $_POST["city"];
$zipcode = $_POST["zip"];
$refid = uniqid(time() . "_");
echo $uid;


$pids = $_POST['pids'];
$idsArr = explode(',', $pids);
$qtyArr = array_count_values($idsArr);

if ($uid == '') {
  $sqlU = "INSERT INTO ecom_customer (name, email, password)
      VALUES ('$name','$email',NULL)";
  mysqli_query($con, $sqlU);
  $uid = mysqli_insert_id($con);
};

foreach ($qtyArr as $pid => $qty) {
  $sql = "INSERT INTO ecom_order (uid, pid, qty, refid, uname, email, address, city, zipcode)
      VALUES ('$uid', '$pid','$qty','$refid', '$name','$email','$address','$city','$zipcode')";
  mysqli_query($con, $sql);
}

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

  <div class="container confirmation mt-5 main">
    <div class="row center-xs mt-5">
      <div class="col-xs-12 center-xs mb-3">
        <h2>Thank you for shopping</h2>
      </div>

      <div class="col-xs-12 col-md-10 col-md-offset-1 mb-1">
        <p>We are processing your order and we will keep you updated.</p>
      </div>

      <div class="col-xs-12 col-md-10 col-md-offset-1 order mb-2">
        <p>In the meantime you can dowload the confirmation <a
            href="<?php echo $home_url . '/templates/pages/order_pdf.php?ref=' . $refid ?>" target="_blank"
            rel="noopener noreferrer">here</a>. </p>
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