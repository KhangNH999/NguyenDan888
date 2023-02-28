<?php
include('../../../../config/config.php');

$mabaocaosan = $_POST['mabaocaosan'];
$mabaocaoblog = $_POST['mabaocaoblog'];


if (isset($_POST['xoabaocaosan'])) {
    $sql_delete = "DELETE FROM baocaosan WHERE mabaocaosan = '" . $mabaocaosan . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../../index.php?quanly=baocao');
}

if (isset($_POST['xoabaocaoblog'])) {
    $sql_delete = "DELETE FROM baocaoblog WHERE mabaocaoblog = '" . $mabaocaoblog . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../../index.php?quanly=baocao');
}