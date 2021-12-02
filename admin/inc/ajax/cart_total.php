<?php
session_start();
include_once("db.php");
include("../functions.php");
$t = 0;
foreach ($_SESSION['cart'] as $key => $value) {
    $product = getProductByID($key);
    $p = mysqli_fetch_assoc($product);
    $qty = $value['qty'];
    $total = ($p['selling_price']) * $qty;
    $t += $total;
}
echo $t;
