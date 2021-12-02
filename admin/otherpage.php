<?php



$target_dir = "inc/";
$file_name = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($file_tmp, $target_dir . $file_name);
echo "<h1>File Upload Success</h1>";
