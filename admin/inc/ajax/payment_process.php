<?php
include_once("db.php");
include("../functions.php");
$order_id = $_POST['order_id'];
$razorpay_payment_id = $_POST['payment_id'];

updatePayStatus($order_id);


$q = "UPDATE `orders` SET `payment_id` = '$razorpay_payment_id', `order_status` = 'Processing' WHERE `orders`.`order_id` = $order_id";
$r = mysqli_query($con, $q);
if ($r) {
    echo "Payment success";
} else {
    echo mysqli_error($con) . "id= " . $order_id . $razorpay_payment_id;
}
