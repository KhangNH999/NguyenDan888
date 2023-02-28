<?php
include('../../../config/config.php');

$mataikhoan = $_POST['mataikhoan'];
$tieudesukien = $_POST['tieudesukien'];
$thoigianhethan = $_POST['thoigianhethan'];
$diadiemsukien = $_POST['diadiemsukien'];
$tendoimot = $_POST['tendoimot'];
$tendoihai = $_POST['tendoihai'];
$phanthuong = $_POST['phanthuong'];
$soluongcauthu = $_POST['soluongcauthu'];
$soluongdubi = $_POST['soluongdubi'];

if (isset($_POST['xulysukien'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $sql_add =
        "INSERT INTO sukien(mataikhoan, tieudesukien, thoigiantaosukien, diadiemsukien,
        ngayhethanthamgia, phanthuong, tendoimot, tendoihai, soluongcauthu, soluongcauthudubi, tinhtrangsukien) 
        VALUE('" . $mataikhoan . "','" . $tieudesukien . "','" . date("Y-m-d H:i:s") . "','" . $diadiemsukien . "',
        '" . $thoigianhethan . "','" . $phanthuong . "','" . $tendoimot . "','" . $tendoihai . "',
        '" . $soluongcauthu . "','" . $soluongdubi . "', '1')";
    mysqli_query($mysqli, $sql_add);
    header('Location: ../../../index.php?quanly=quanlysukien');
}