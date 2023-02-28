<?php
include('../../../../config/config.php');

$macuocthi = $_POST['macuocthi'];

if (isset($_POST['xoasukien'])) {
    $sql_delete = "DELETE FROM cuocthi WHERE macuocthi = '" . $macuocthi . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../../index.php?quanly=quanlycuocthi');
}


if (isset($_POST['suasukien'])) {
    header('Location: ../../../../index.php?quanly=suasukien&&id_contest=' . $macuocthi);
}