<?php
include('../../../config/config.php');
session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$mataikhoan = $_POST['mataikhoan'];
$masan = $_POST['masan'];

if (isset($_POST['themyeuthichsan'])) {
    //Add
    $sql_add = "INSERT INTO luotyeuthichsan(mataikhoan, masan) 
        VALUE('" . $mataikhoan . "','" . $masan . "')";
    mysqli_query($mysqli, $sql_add);
    $_SESSION['vali_like_pitch'] = 10;
    header('Location: ../../index.php?action=quanlyyeuthichsan&query=main&id_user=' . $_GET['id_user']);
} elseif (isset($_POST['suayeuthichsan'])) {
    //Edit
    $sql_update = "UPDATE luotyeuthichsan SET mataikhoan='" . $mataikhoan . "', masan='" . $masan . "'
        WHERE mayeuthichsan = '$_GET[mayeuthichsan]'";
    mysqli_query($mysqli, $sql_update);
    $_SESSION['vali_like_pitch'] = 11;
    header('Location: ../../index.php?action=quanlyyeuthichsan&query=main&id_user=' . $_GET['id_user']);
} else {
    $id = $_GET['mayeuthichsan'];
    //Delete        
    $sql_delete = "DELETE FROM luotyeuthichsan WHERE mayeuthichsan = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_like_pitch'] = 12;
    header('Location: ../../index.php?action=quanlyyeuthichsan&query=main&id_user=' . $_GET['id_user']);
}