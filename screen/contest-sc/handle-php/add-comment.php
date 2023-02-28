<?php
include('../../../config/config.php');

$mataikhoan = $_POST['mataikhoan'];
$masukien = $_POST['masukien'];
$noidungbinhluansukien = $_POST['noidungbinhluansukien'];
date_default_timezone_set('Asia/Ho_Chi_Minh');

if (isset($_POST['guibinhluansukien'])) {
    $sql_add = "INSERT INTO binhluansukien(mataikhoan, masukien, noidungbinhluansukien, thoigianbinhluansukien) 
    VALUE('" . $mataikhoan . "','" . $masukien . "','" . $noidungbinhluansukien . "','" . date("Y-m-d H:i:s") . "')";
    mysqli_query($mysqli, $sql_add);
    header('Location: ../../../index.php?quanly=chitietsukien&idsukien=' . $masukien . '#contest-comment');
}