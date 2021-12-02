<?php

require('config.php');

session_start();

require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";
$razorpay_payment_id = $_POST['razorpay_payment_id'];
$order_id = $_POST['order_id'];
if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api($keyId, $keySecret);

    try {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {
    $html = "<script src=\"https://code.jquery.com/jquery-3.6.0.js\"></script><script>
    $.ajax({
        url: \"../admin/inc/ajax/payment_process.php\",
        type: \"POST\",
        data: 'orer_id= + 103 + &payment_id= + $razorpay_payment_id + &order_id= + $order_id',
        success: function(response) {
          console.log(response);
          window.location.href = \"../confirmation.php?order_id=$order_id\";
           
        },
    });</script>";
} else {
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
