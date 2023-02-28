<?php
include('../../../config/config.php');

$mayeuthichblog = $_POST['mayeuthichblog'];
$mataikhoan = $_POST['mataikhoan'];
$mablog = $_POST['mablog'];

if (isset($_POST['unlikeblog'])) {
    $sql_add = "INSERT INTO luotyeuthichblog(mataikhoan, mablog) 
        VALUE('" . $mataikhoan . "','" . $mablog . "')";
    mysqli_query($mysqli, $sql_add);
    header('Location: ../../../index.php?quanly=chitietblog&&idchitietblog=' . $mablog . '');
}

if (isset($_POST['likeblog'])) {
    $sql_delete = "DELETE FROM luotyeuthichblog WHERE mayeuthichblog = '" . $mayeuthichblog . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../index.php?quanly=chitietblog&&idchitietblog=' . $mablog . '');
}