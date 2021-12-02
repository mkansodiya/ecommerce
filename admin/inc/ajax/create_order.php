<?php
session_start();
include("db.php");
include("../functions.php");

$user_id = $_SESSION['user_id'];
$payment_type = $_POST['payment-group'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_no = $_POST['phone_no'];
$email = $_POST['email'];
$country = $_POST['country'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$pin_code = $_POST['pin_code'];





$total = $_POST['total'];
$response = array();
if (isset($_SESSION['cart'])) {
    if ($payment_type != "COD") {
        $q = "INSERT INTO `orders` (`order_email`,`order_id`, `order_user_id`, `first_name`, `last_name`, `phone_no`, `country`, `address`, `city`, `state`, `pin_code`, `order_total`, `payment_method`, `payment_status`, `order_status`, `order_date`) 
VALUES ('$email', NULL, '$user_id', '$first_name', '$last_name', '$phone_no', '$country', '$address', '$city', '$state', '$pin_code', '$total', '$payment_type', '0', 'Payment Pending', now())";
        $r = mysqli_query($con, $q);
    } else {
        $q = "INSERT INTO `orders` (`order_email`,`order_id`, `order_user_id`, `first_name`, `last_name`, `phone_no`, `country`, `address`, `city`, `state`, `pin_code`, `order_total`, `payment_method`, `payment_status`, `order_status`, `order_date`) 
VALUES ('$email', NULL, '$user_id', '$first_name', '$last_name', '$phone_no', '$country', '$address', '$city', '$state', '$pin_code', '$total', '$payment_type', '0', 'Processing', now())";

        $r = mysqli_query($con, $q);
    }

    if ($r) {
        $order_id = mysqli_insert_id($con);
        // inserting order detail
        foreach ($_SESSION['cart'] as $key => $value) {
            $product = getProductByID($key);
            $p = mysqli_fetch_assoc($product);
            $qty = $value['qty'];
            $price = $p['selling_price'];
            $total = ($p['selling_price']) * $qty;
            $q1 = "INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `product_qty`, `price`, `order_date`) 
    VALUES (NULL, '$order_id','$key','$qty','$price',now())";
            $r1 = mysqli_query($con, $q1);
            if ($r1) {
                unset($_SESSION['cart']);
                $response = ["status" => 1, "order_id" => $order_id, "payment_type" => $payment_type];
            } else {
                $response = ["status" => 0, "order_id" => $order_id, "payment_type" => $payment_type];
            }
        }
    } else {
        $response = ["status" => 0, "payment_type" => $payment_type];
    }
}
print_r(json_encode($response));

//print_r($_POST);
