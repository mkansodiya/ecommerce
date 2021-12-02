<?php
session_start();
ob_start();
include("admin/inc/functions.php");
unset($_SESSION["login"]);
unset($_SESSION["user_id"]);
isLogin();
