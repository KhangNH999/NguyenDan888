<?php
include('../../../config/config.php');

$noidungbaocao = $_POST['noidungbaocaosan'];
$mataikhoan = $_POST['mataikhoan'];
$masan = $_POST['masan'];

if (isset($_POST['reportsetpitch'])) {
    $sql_report = "INSERT INTO baocaosan(mataikhoan, masan, noidungbaocaosan, thoigianbaocaosan, tinhtrangbaocaosan) 
        VALUE('" . $mataikhoan . "','" . $masan . "','" . $noidungbaocao . "', NOW() ,0)";
    mysqli_query($mysqli, $sql_report);
    header('Location: ../../../index.php?quanly=chitietdatsan&&reportsetpitch=success&&idSan=' . $masan . '');
}