<?php
include('../../../config/config.php');

$masukien = $_POST['masukien'];
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
    $sql_update =
        "UPDATE sukien SET mataikhoan = '" . $mataikhoan . "', tieudesukien = '" . $tieudesukien . "', diadiemsukien = '" . $diadiemsukien . "', ngayhethanthamgia = '" . $thoigianhethan . "', 
        phanthuong = '" . $phanthuong . "', tendoimot = '" . $tendoimot . "', tendoihai = '" . $tendoihai . "', soluongcauthu = '" . $soluongcauthu . "', soluongcauthudubi = '" . $soluongdubi . "'
        WHERE masukien = '" . $masukien . "'";
    mysqli_query($mysqli, $sql_update);
    header('Location: ../../../index.php?quanly=quanlysukien');
}