<?php
include_once("../../inc/db.php");
$action = $_POST['action'];
if ($action == "find") {
    $cat_id = $_POST['cat_id'];
    $q = "SELECT * FROM categories WHERE id='$cat_id'";
    $r = mysqli_query($con, $q);
    $cat_d = mysqli_fetch_assoc($r);
    $cat_title = $cat_d['cat_title'];
    echo $cat_title;
} elseif ($action == "delete") {
    $cat_id = $_POST['cat_id'];
    $q = "DELETE FROM `categories` WHERE `categories`.`id` = $cat_id";
    $r =  mysqli_query($con, $q);
    echo "Deleted successfully";
} elseif ($action == "update") {
    $cat_id = $_POST['cat_id'];
    $cat_title = $_POST['cat_title'];
    $q = "UPDATE `categories` SET `cat_title` = '$cat_title' WHERE `categories`.`id` = $cat_id";
    $r =  mysqli_query($con, $q);
    if (!$r) {
        $response = 0;
    } else {
        $response = 1;
    }
    echo $response;
} else {
    $cat_title = $_POST['cat_title'];
    $cat_image = $_FILES['cat_image']['name'];
    $cat_tmp_name = $_FILES['cat_image']['tmp_name'];
    $date = date('YY-MM-DDD');
    $response = 0;
    if (empty($cat_title)) {
    } else if (empty($cat_image)) {
    } else {
        move_uploaded_file($cat_tmp_name, "../../../assets/images/categories/" . $cat_image);
        $q = "INSERT INTO `categories` (`id`, `parent_id`, `cat_title`, `cat_image`, `publish_date`, `status`) 
        VALUES (NULL, '0', '$cat_title', '$cat_image',now(), '1')";
        $r = mysqli_query($con, $q);
        if (!$r) {
            $response = 0;
        } else {
            $response = 1;
        }
        echo $response;
    }
}
