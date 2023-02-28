<?php
include('../../../config/config.php');
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$id = $_GET['masan'];
$sql_img = "SELECT * FROM san WHERE masan = '$id' LIMIT 1";
$query_img = mysqli_query($mysqli, $sql_img);
while ($row = mysqli_fetch_array($query_img)) {
    $mataikhoan = $row['mataikhoan'];
    unlink('uploads-pitch/' . $row['hinhanhsan']);
}

//Delete
$sql_delete_time = "DELETE FROM khunggio WHERE masan = '$id'";
$sql_delete = "DELETE FROM san WHERE masan = '$id'";

mysqli_query($mysqli, $sql_delete_time);
mysqli_query($mysqli, $sql_delete);


date_default_timezone_set('Asia/Ho_Chi_Minh');
//Add notify
$sql_add_notify = "INSERT INTO thongbao (mataikhoan, noidungthongbao, thoigianthongbao, tinhtrangthongbao) 
        VALUE('" . $mataikhoan . "','Sân bạn yêu cầu tạo sân đã bị hủy!','" . date("Y-m-d H:i:s") . "','0')";
mysqli_query($mysqli, $sql_add_notify);

header('Location: ../../index.php?action=quanlysan&query=main&id_user=' . $id_user);