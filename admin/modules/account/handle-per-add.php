<?php
include('../../../config/config.php');
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$mataikhoan = (isset($_GET['mataikhoan'])) ? $_GET['mataikhoan'] : '';

$sql_update = "UPDATE taikhoan SET yeucaunangquyen = 3, maloaitaikhoan = 3 WHERE mataikhoan = '$mataikhoan'";
mysqli_query($mysqli, $sql_update);

//Add notify
$sql_add_notify = "INSERT INTO thongbao (mataikhoan, noidungthongbao, thoigianthongbao, tinhtrangthongbao) 
        VALUE('" . $mataikhoan . "','Yêu cầu nâng quyền của bạn đã được xác nhận thành công!','" . date("Y-m-d H:i:s") . "','0')";
mysqli_query($mysqli, $sql_add_notify);

header('Location: ../../index.php?action=quanlytaikhoan&query=main&id_user=' . $id_user);