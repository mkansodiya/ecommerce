<?php
session_start();
include_once("ajax/db.php");
function sqlSafe($val)
{
    include("ajax/db.php");
    $safe_val = mysqli_escape_string($con, $val);
    return $safe_val;
}
function getProducts($limit = "")
{
    include("ajax/db.php");
    if ($limit != "") {
        $q = "SELECT * FROM products ORDER BY product_id DESC LIMIT $limit";
        $res = mysqli_query($con, $q);
        return $res;
    } else {
        $q = "SELECT * FROM products ORDER BY product_id DESC ";
        $res = mysqli_query($con, $q);
        return $res;
    }
}
function getCategories()
{
    include("ajax/db.php");
    $q = "SELECT * FROM categories ORDER BY id DESC ";
    $res = mysqli_query($con, $q);
    return $res;
}
function getProductByID($id)
{
    include("ajax/db.php");
    $q = "SELECT * FROM products WHERE product_id= $id";
    $res = mysqli_query($con, $q);
    return $res;
}

function getCurrency()
{
    include("ajax/db.php");
    $q = "SELECT * FROM options";
    $res = mysqli_query($con, $q);
    $d = mysqli_fetch_assoc($res);
    $currency = $d['currency'];
    return $currency;
}

// cart functionility

class add_to_cart

{

    function addProduct($pid, $qty)
    {
        if (isset($_SESSION['cart'][$pid])) {
            $a_q =  $_SESSION['cart'][$pid]['qty'];
            $_SESSION['cart'][$pid]['qty'] =  $qty + $a_q;
        } else {
            $_SESSION['cart'][$pid]['qty'] = $qty;
        }
    }
    function updateProduct($pid, $qty)
    {
        if (isset($_SESSION['cart'][$pid])) {
            $_SESSION['cart'][$pid]['qty'] = $qty;
        }
    }
    function removeProduct($pid)
    {
        if (isset($_SESSION['cart'][$pid])) {
            unset($_SESSION['cart'][$pid]);
        }
    }
    function emptyCart()
    {
        unset($_SESSION['cart']);
    }
    function totalCartProduct()
    {
        if (isset($_SESSION['cart'])) {
            echo count($_SESSION['cart']);
        } else {
            echo 0;
        }
    }
}

function isLogin()
{
    $add = $_SERVER['HTTP_HOST'] . "/ecommerce";
    if (isset($_SESSION["login"])) {
        if ($_SERVER['REQUEST_URI'] == "/ecommerce/login.php") {
            header("location: account.php");
        } else {
        }
    } else {
        if ($_SERVER['REQUEST_URI'] == "/ecommerce/login.php") {
        } else {
            header("location: http://$add/login.php");
            die();
        }
    }
}

// function isLogin()
// {
//     if (isset($_SESSION["login"])) {
//         echo "login";
//     } else {
//         echo "not login";
//     }
// }

function getOrder($id)
{
    include("ajax/db.php");
    $q = "SELECT * FROM orders, order_detail WHERE orders.order_id= $id AND order_detail.order_id=$id";
    $r = mysqli_query($con, $q);
    return $r;
}

function logedUserData()
{
    include("ajax/db.php");
    $user_id = $_SESSION['user_id'];
    $q = "SELECT * FROM users WHERE `user_id`='$user_id'";
    $r = mysqli_query($con, $q);
    return ($r);
}
function getUserOrders($user_id)
{
    include("ajax/db.php");
    $q = "SELECT * FROM orders WHERE order_user_id= $user_id ORDER BY order_id DESC";
    $r = mysqli_query($con, $q);
    return $r;
}
function paymentType($oid)
{
    include("ajax/db.php");
    $q = "SELECT * FROM orders WHERE order_id= $oid";
    $r = mysqli_query($con, $q);
    $ptype = mysqli_fetch_assoc($r)['payment_method'];
    return $ptype;
}

function updatePayStatus($oid)
{
    include("ajax/db.php");
    $q = "UPDATE `orders` SET `payment_status` = 1 WHERE `orders`.`order_id` = $oid";
    $r = mysqli_query($con, $q);
}
