<?php
include('../../../../config/config.php');

$mabinhluansan = $_POST['mabinhluansan'];
$mabinhluanblog = $_POST['mabinhluanblog'];
$mabinhluancuocthi = $_POST['mabinhluancuocthi'];

if (isset($_POST['xoabinhluansan'])) {
    $sql_delete = "DELETE FROM binhluansan WHERE mabinhluansan = '" . $mabinhluansan . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../../index.php?quanly=dabinhluan');
}

if (isset($_POST['xoabinhluanblog'])) {
    $sql_delete = "DELETE FROM binhluanblog WHERE mabinhluanblog = '" . $mabinhluanblog . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../../index.php?quanly=dabinhluan');
}

if (isset($_POST['xoabinhluancuocthi'])) {
    $sql_delete = "DELETE FROM binhluancuocthi WHERE mabinhluancuocthi = '" . $mabinhluancuocthi . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../../index.php?quanly=dabinhluan');
}