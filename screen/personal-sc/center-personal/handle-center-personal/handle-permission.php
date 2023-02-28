<?php
include('../../../../config/config.php');

session_start();
$mataikhoan = $_POST['mataikhoan'];

if (isset($_POST['nangquyen'])) {
    $sql_update = "UPDATE taikhoan SET yeucaunangquyen = 2 WHERE mataikhoan = '$mataikhoan'";
    mysqli_query($mysqli, $sql_update);

    $_SESSION['nangquyen'] = 2;

    header('Location: ../../../../index.php?quanly=trangcuatoi');
}