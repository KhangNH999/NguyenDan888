<?php
include('../../../config/config.php');

$noidungbaocao = $_POST['noidungbaocaoblog'];
$mataikhoan = $_POST['mataikhoan'];
$mablog = $_POST['mablog'];

if (isset($_POST['reportblog'])) {
    $sql_report = "INSERT INTO baocaoblog(mataikhoan, mablog, noidungbaocaoblog, thoigianbaocaoblog, tinhtrangbaocaoblog) 
        VALUE('" . $mataikhoan . "','" . $mablog . "','" . $noidungbaocao . "', NOW() ,0)";
    mysqli_query($mysqli, $sql_report);
    header('Location: ../../../index.php?quanly=chitietblog&&reportblog=success&&idchitietblog=' . $mablog . '');
}