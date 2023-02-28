<?php
include('../../../config/config.php');

$mabinhluansan = $_POST['mabinhluansan'];
$masan = $_POST['masan'];

if (isset($_POST['xoabinhluan'])) {
    $sql_delete = "DELETE FROM binhluansan WHERE mabinhluansan = '" . $mabinhluansan . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../index.php?quanly=chitietdatsan&&idSan=' . $masan . '#comments');
}