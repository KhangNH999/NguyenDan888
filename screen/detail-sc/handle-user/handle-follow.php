<?php
include('../../../config/config.php');

$matheodoi = $_POST['matheodoi'];
$mataikhoan = $_POST['mataikhoan'];
$masan = $_POST['masan'];

if (isset($_POST['unfollow'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $sql_add = "INSERT INTO theodoi(mataikhoan, masan, thoigiantheodoi) 
        VALUE('" . $mataikhoan . "','" . $masan . "','" . date("Y-m-d H:i:s") . "')";
    mysqli_query($mysqli, $sql_add);
    header('Location: ../../../index.php?quanly=chitietdatsan&&idSan=' . $masan . '');
}

if (isset($_POST['follow'])) {
    $sql_delete = "DELETE FROM theodoi WHERE matheodoi = '" . $matheodoi . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../index.php?quanly=chitietdatsan&&idSan=' . $masan . '');
}