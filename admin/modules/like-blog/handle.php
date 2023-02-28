<?php
include('../../../config/config.php');
session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';

$mataikhoan = $_POST['mataikhoan'];
$mablog = $_POST['mablog'];

if (isset($_POST['themyeuthichblog'])) {
    //Add
    $sql_add = "INSERT INTO luotyeuthichblog(mataikhoan, mablog) 
        VALUE('" . $mataikhoan . "','" . $mablog . "')";
    mysqli_query($mysqli, $sql_add);
    $_SESSION['vali_like_blog'] = 10;
    header('Location: ../../index.php?action=quanlyyeuthichblog&query=main&id_user=' . $_GET['id_user']);
} elseif (isset($_POST['suayeuthichblog'])) {
    //Edi
    $sql_update = "UPDATE luotyeuthichblog SET mataikhoan='" . $mataikhoan . "', mablog='" . $mablog . "' 
    WHERE mayeuthichblog = '$_GET[mayeuthichblog]'";
    mysqli_query($mysqli, $sql_update);
    $_SESSION['vali_like_blog'] = 11;
    header('Location: ../../index.php?action=quanlyyeuthichblog&query=main&id_user=' . $_GET['id_user']);
} else {
    $id = $_GET['mayeuthichblog'];
    //Delete        
    $sql_delete = "DELETE FROM luotyeuthichblog WHERE mayeuthichblog = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_like_blog'] = 12;
    header('Location: ../../index.php?action=quanlyyeuthichblog&query=main&id_user=' . $_GET['id_user']);
}