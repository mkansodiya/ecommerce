


<?php
include_once("db.php");

$title = mysqli_escape_string($con, $_POST['title']);
$cat_id = $_POST['cat_id'];

$mrp = $_POST['mrp'];
$selling_price = $_POST['selling_price'];
$stock = -1;
$sku = $_POST['sku'];
$short_desc = mysqli_escape_string($con, $_POST['short_desc']);
$description = mysqli_escape_string($con, $_POST['description']);
$meta_title = mysqli_escape_string($con, $_POST['meta_title']);
$meta_desc = mysqli_escape_string($con, $_POST['meta_desc']);
$meta_keyword = mysqli_escape_string($con, $_POST['meta_keyword']);
$date = date('YY-MM-DD');
$status = 1;

$file_name = $_FILES['image']['name'];

$response = "";

if (empty($title)) {
    $response = "Valid title please";
} else if (empty($selling_price)) {
    $response = "Please enter a valid Price please";
} else if (empty($mrp)) {
    $response = "Please enter a valid MRP ";
} else if (empty($sku)) {
    $response = "Please enter a valid SKU";
} else if (empty($short_desc)) {
    $response = "Please enter a valid Short desc";
} else if (empty($description)) {
    $response = "Please enter Description";
} else if (empty($meta_title)) {
    $response = "Meta title is required";
} else if (empty($meta_desc)) {
    $response = "meta description is required";
} else if (empty($meta_keyword)) {
    $response = "Meta keyword is required";
} else if (empty($file_name)) {
    $response = "Please add an Product image";
} else {
    $target_dir = "../../../assets/images/products/";

    $file_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($file_tmp, $target_dir . $file_name);
    $q = "INSERT INTO `products` (`publish_date`,`product_id`, `cat_id`, `product_name`, `mrp`, `selling_price`, `stock`, `product_image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`)
 VALUES (NOW(),NULL, '1', '$title', '$mrp', '$selling_price', '-1', '$file_name', '$short_desc', '$description', '$meta_title', '$meta_desc', '$meta_keyword', '1')";
    $r = mysqli_query($con, $q);
    if (!$r) {
        $response = 0;
    } else {
        $response = 1;
    }
}


echo $response;
