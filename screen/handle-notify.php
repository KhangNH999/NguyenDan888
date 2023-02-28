<?php

include('../config/config.php');

$mataikhoan = $_POST['mataikhoan'];
$url = $_POST['maurl'];

$sql_update_notify = "UPDATE thongbao SET tinhtrangthongbao = 1 WHERE mataikhoan = $mataikhoan";
mysqli_query($mysqli, $sql_update_notify);

header('Location:' . $url);