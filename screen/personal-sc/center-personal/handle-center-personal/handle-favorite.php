<?php
include('../../../../config/config.php');

$mayeuthichsan = $_POST['mayeuthichsan'];
$mayeuthichblog = $_POST['mayeuthichblog'];


if (isset($_POST['xoayeuthichsan'])) {
    $sql_delete = "DELETE FROM luotyeuthichsan WHERE mayeuthichsan = '" . $mayeuthichsan . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../../index.php?quanly=yeuthich');
}

if (isset($_POST['xoayeuthichblog'])) {
    $sql_delete = "DELETE FROM luotyeuthichblog WHERE mayeuthichblog = '" . $mayeuthichblog . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../../index.php?quanly=yeuthich');
}