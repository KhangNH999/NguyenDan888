<?php
include('../../../config/config.php');
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_user = "SELECT * FROM san WHERE masan = '$_GET[masan]' LIMIT 1";
$query_user = mysqli_query($mysqli, $sql_user);
while ($row = mysqli_fetch_array($query_user)) {
    $mataikhoan = $row['mataikhoan'];
}

$sql_update = "UPDATE san SET tinhtrangsan = 1 WHERE masan = $_GET[masan]";
mysqli_query($mysqli, $sql_update);

//Add notify
date_default_timezone_set('Asia/Ho_Chi_Minh');
$sql_add_notify = "INSERT INTO thongbao (mataikhoan, noidungthongbao, thoigianthongbao, tinhtrangthongbao) 
        VALUE('" . $mataikhoan . "','Sân bạn yêu cầu tạo sân đã thành công. Truy cập Quản lý sân để xem chi tiết!','" . date("Y-m-d H:i:s") . "','0')";
mysqli_query($mysqli, $sql_add_notify);
header('Location: ../../index.php?action=quanlysan&query=main&id_user=' . $id_user);