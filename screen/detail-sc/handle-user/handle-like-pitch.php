<?php
include('../../../config/config.php');

$mayeuthichsan = $_POST['mayeuthichsan'];
$mataikhoan = $_POST['mataikhoan'];
$masan = $_POST['masan'];

if (isset($_POST['unlike'])) {
    $sql_add = "INSERT INTO luotyeuthichsan(mataikhoan, masan) 
        VALUE('" . $mataikhoan . "','" . $masan . "')";
    mysqli_query($mysqli, $sql_add);
    header('Location: ../../../index.php?quanly=chitietdatsan&&idSan=' . $masan . '');
}

if (isset($_POST['like'])) {
    $sql_delete = "DELETE FROM luotyeuthichsan WHERE mayeuthichsan = '" . $mayeuthichsan . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../index.php?quanly=chitietdatsan&&idSan=' . $masan . '');
}