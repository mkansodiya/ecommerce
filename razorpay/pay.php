<?php

require('config.php');
require('razorpay-php/Razorpay.php');
require('../admin/inc/functions.php');

if (isset($_GET['order_id'])) {
    $order_id = sqlSafe($_GET['order_id']);
    $order_q = getOrder($order_id);
    $order_total = mysqli_fetch_assoc(getOrder($order_id))['order_total'];
    $order_date = mysqli_fetch_assoc(getOrder($order_id))['order_date'];
    //$order_total = mysqli_fetch_assoc(getOrder($order_id))['order_total'];
    $address = mysqli_fetch_assoc(getOrder($order_id))['address'];
    $city = mysqli_fetch_assoc(getOrder($order_id))['city'];
    $state = mysqli_fetch_assoc(getOrder($order_id))['state'];
    $pin_code = mysqli_fetch_assoc(getOrder($order_id))['pin_code'];
    $phone_no = mysqli_fetch_assoc(getOrder($order_id))['phone_no'];
    $email = mysqli_fetch_assoc(getOrder($order_id))['order_email'];
    $country = mysqli_fetch_assoc(getOrder($order_id))['country'];
    $payment_status = mysqli_fetch_assoc(getOrder($order_id))['payment_status'];
    $payment_method = paymentType($order_id);
    $name = mysqli_fetch_assoc(getOrder($order_id))['first_name'] . " " . mysqli_fetch_assoc(getOrder($order_id))['last_name'];
    $product_name =  mysqli_fetch_assoc(getProductByID(mysqli_fetch_assoc(getOrder($order_id))["product_id"]))['product_name'];
}

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         =>  $order_id,
    'amount'          => $order_total * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR') {
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'manual';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true)) {
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $product_name,
    "description"       => $product_name,
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
        "name"              => $name,
        "email"             => $email,
        "contact"           => $phone_no,
    ],
    "notes"             => [
        "address"           => "Hello World",
        "merchant_order_id" => $order_id,
    ],
    "theme"             => [
        "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR') {
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");
