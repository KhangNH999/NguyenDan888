<?php
include('../../../config/config.php');

session_start();
$mataikhoan = $_POST['mataikhoan'];
$masukien = $_POST['masukien'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_POST['doimot'])) {
    $_SESSION['dathamgia'] = 1;
    $sql_add = "INSERT INTO thamgiasukien(masukien, mataikhoan, thoigianthamgia, vitrithamgia, tinhtrangthamgia) 
    VALUE('" . $masukien . "','" . $mataikhoan . "','" . date("Y-m-d H:i:s") . "','1','1')";
    mysqli_query($mysqli, $sql_add);
    header('Location: ../../../index.php?quanly=chitietsukien&idsukien=' . $masukien);
} else if (isset($_POST['doihai'])) {
    $_SESSION['dathamgia'] = 3;
    $sql_add = "INSERT INTO thamgiasukien(masukien, mataikhoan, thoigianthamgia, vitrithamgia, tinhtrangthamgia) 
    VALUE('" . $masukien . "','" . $mataikhoan . "','" . date("Y-m-d H:i:s") . "','3','1')";
    mysqli_query($mysqli, $sql_add);
    header('Location: ../../../index.php?quanly=chitietsukien&idsukien=' . $masukien);
} else if (isset($_POST['dubimot'])) {
    $_SESSION['dathamgia'] = 2;
    $sql_add = "INSERT INTO thamgiasukien(masukien, mataikhoan, thoigianthamgia, vitrithamgia, tinhtrangthamgia) 
    VALUE('" . $masukien . "','" . $mataikhoan . "','" . date("Y-m-d H:i:s") . "','2','1')";
    mysqli_query($mysqli, $sql_add);
    header('Location: ../../../index.php?quanly=chitietsukien&idsukien=' . $masukien);
} else if (isset($_POST['dubihai'])) {
    $_SESSION['dathamgia'] = 4;
    $sql_add = "INSERT INTO thamgiasukien(masukien, mataikhoan, thoigianthamgia, vitrithamgia, tinhtrangthamgia) 
    VALUE('" . $masukien . "','" . $mataikhoan . "','" . date("Y-m-d H:i:s") . "','4','1')";
    mysqli_query($mysqli, $sql_add);
    header('Location: ../../../index.php?quanly=chitietsukien&idsukien=' . $masukien);
}