<?php
include('../../../config/config.php');
session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$mataikhoan = $_POST['mataikhoan'];
$masan = $_POST['masan'];

if (isset($_POST['themtheodoi'])) {
    //Add
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $sql_add = "INSERT INTO theodoi(mataikhoan, masan, thoigiantheodoi) 
        VALUE('" . $mataikhoan . "','" . $masan . "','" . date("Y-m-d H:i:s") . "')";
    mysqli_query($mysqli, $sql_add);
    $_SESSION['vali_follow'] = 10;
    header('Location: ../../index.php?action=quanlytheodoi&query=main&id_user=' . $_GET['id_user']);
} elseif (isset($_POST['suatheodoi'])) {
    //Edit
    $sql_update = "UPDATE theodoi SET mataikhoan='" . $mataikhoan . "', masan='" . $masan . "'
        WHERE matheodoi = '$_GET[matheodoi]'";
    mysqli_query($mysqli, $sql_update);
    $_SESSION['vali_follow'] = 11;
    header('Location: ../../index.php?action=quanlytheodoi&query=main&id_user=' . $_GET['id_user']);
} else {
    $id = $_GET['matheodoi'];
    //Delete        
    $sql_delete = "DELETE FROM theodoi WHERE matheodoi = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_follow'] = 12;
    header('Location: ../../index.php?action=quanlytheodoi&query=main&id_user=' . $_GET['id_user']);
}