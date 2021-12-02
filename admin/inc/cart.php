

<?php
session_start();


// class add_to_cart

// {

//     function addProduct($pid, $qty)
//     {

//         $_SESSION['cart'][$pid]['qty'] = $qty;
//     }
//     function updateProduct($pid, $qty)
//     {
//         if (isset($_SESSION['cart'][$pid])) {
//             $_SESSION['cart'][$pid]['qty'] = $qty;
//         }
//     }
//     function removeProduct($pid)
//     {
//         if (isset($_SESSION['cart'][$pid])) {
//             unset($_SESSION['cart'][$pid]['qty']);
//         }
//     }
//     function emptyCart()
//     {
//         unset($_SESSION['cart']);
//     }
// }
require("functions.php");
$pid = $_POST['pid'];
$qty = $_POST['qty'];
$type = $_POST['type'];
// $type = $_POST['type'];

$cart = new add_to_cart();
if ($type == "add") {
    $cart->addProduct($pid, $qty);
    echo $items_in_cart = count($_SESSION['cart']);
} else if ($type == "remove") {
    $cart->removeProduct($pid);
    echo $items_in_cart = count($_SESSION['cart']);
} else if ($type == "update") {
    $cart->updateProduct($pid, $qty);
    echo $items_in_cart = count($_SESSION['cart']);
} else if ($type == "editCart") {
    $p =  getProductByID($pid);
    $p_arr = mysqli_fetch_assoc($p);
    // array_push($p_arr, $qty);
    $p_json = json_encode($p_arr);
    print_r($p_json);
}

//echo $items_in_cart = count($_SESSION['cart']);

//echo $cart->totalCartProduct();
// $_SESSION["cart"]["car"] = "hello";
// echo ($_SESSION["cart"]["car"]);
// echo $items_in_cart = count($_SESSION['cart']);
