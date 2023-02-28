<?php
include('../../../config/config.php');

$mabinhluanblog = $_POST['mabinhluanblog'];
$mablog = $_POST['mablog'];

if (isset($_POST['xoabinhluanblog'])) {
    $sql_delete = "DELETE FROM binhluanblog WHERE mabinhluanblog = '" . $mabinhluanblog . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../index.php?quanly=chitietblog&&idchitietblog=' . $mablog . '#comments');
}