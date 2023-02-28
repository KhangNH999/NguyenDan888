<?php
include('../../../config/config.php');
session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$mataikhoan = $_POST['mataikhoan'];
$masukien = $_POST['masukien'];
$vitrithamgia = $_POST['vitrithamgia'];

if (isset($_POST['themthamgiasukien'])) {
    //Add
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $sql_add = "INSERT INTO thamgiasukien(mataikhoan, masukien, thoigianthamgia, vitrithamgia, tinhtrangthamgia) 
        VALUE('" . $mataikhoan . "','" . $masukien . "','" . date("Y-m-d H:i:s") . "','" . $vitrithamgia . "','1')";
    mysqli_query($mysqli, $sql_add);
    $_SESSION['vali_par_contest'] = 10;
    header('Location: ../../index.php?action=quanlythamgiasukien&query=main&id_user=' . $_GET['id_user']);
} else if (isset($_POST['suathamgiasukien'])) {
    //Edit
    $sql_update = "UPDATE thamgiasukien SET mataikhoan='" . $mataikhoan . "', masukien='" . $masukien . "',
        vitrithamgia='" . $vitrithamgia . "' WHERE mathamgia = '$_GET[mathamgia]'";
    mysqli_query($mysqli, $sql_update);
    $_SESSION['vali_par_contest'] = 11;
    header('Location: ../../index.php?action=quanlythamgiasukien&query=main&id_user=' . $_GET['id_user']);
} else {
    $id = $_GET['mathamgia'];
    //Delete        
    $sql_delete = "DELETE FROM thamgiasukien WHERE mathamgia = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_par_contest'] = 12;
    header('Location: ../../index.php?action=quanlythamgiasukien&query=main&id_user=' . $_GET['id_user']);
}