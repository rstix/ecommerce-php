
<form action="/templates/pages/price_filtered.php" class="price-filter" method="GET">
    
    <input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price']; }else{echo "1";} ?>" >
    <input type="text" name="end_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price']; }else{echo "20";} ?>" >
    <button type="submit" class="btn-green ">filter</button>
    <p>Price range</p>
</form>
