<?php
session_start();
include_once("db.php");
include("../functions.php");
$email = sqlSafe($_POST['email']);
$password = sqlSafe($_POST['password']);
$type = sqlSafe($_POST['type']);

$q = "SELECT * FROM users WHERE user_email= '$email'";
$r = mysqli_query($con, $q);
$response = array();
if (mysqli_num_rows($r) < 1) {
    $response = ["status" => 0, "type" => $type];
} else {
    $user_data = mysqli_fetch_assoc($r);
    $user_password = $user_data['user_password'];
    if ($password === $user_password) {
        // set session  
        $_SESSION["login"] = true;
        $_SESSION["user_id"] = $user_data['user_id'];

        $user_permission =  $user_data['user_permission'];
        $response = ["status" => 1, "user_permission" => $user_permission];
    } else {
        $response = ["status" => 0];
    }
}
print_r(json_encode($response));
