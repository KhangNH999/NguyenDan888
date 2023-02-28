<?php
include('../../../config/config.php');
session_start();
$mataikhoan = $_POST['mataikhoan'];
$tensan = $_POST['tensan'];
$tieudesan = $_POST['tieudesan'];
$giathue = $_POST['giathue'];
$diachisan = $_POST['diachisan'];
$noidungsan = $_POST['noidungsan'];
//Handle img
$hinhanhsan = $_FILES['hinhanhsan']['name'];
$hinhanhsan_tmp = $_FILES['hinhanhsan']['tmp_name'];
$hinhanhsan_time = time() . '_' . $hinhanhsan;

if (isset($_POST['taosanbuoc1'])) {
    if ($noidungsan == '') {
        $_SESSION['error_null'] = 1;
        header('Location: ../../../index.php?quanly=taosan');
    } else {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if ($hinhanhsan != '') {
            $sql_add = "INSERT INTO san(tensan, tieudesan, thoigiantaosan, giathue, diachisan, noidungsan, hinhanhsan, tinhtrangsan , mataikhoan, tinhtrangkhunggio) 
        VALUE('" . $tensan . "','" . $tieudesan . "','" . date("Y-m-d H:i:s") . "','" . $giathue . "','" . $diachisan . "',
        '" . $noidungsan . "','" . $hinhanhsan_time . "','0','" . $mataikhoan . "','0')";
        } else {
            $sql_add = "INSERT INTO san(tensan, tieudesan, thoigiantaosan, giathue, diachisan, noidungsan, tinhtrangsan , mataikhoan, tinhtrangkhunggio) 
        VALUE('" . $tensan . "','" . $tieudesan . "','" . date("Y-m-d H:i:s") . "','" . $giathue . "','" . $diachisan . "',
        '" . $noidungsan . "','0','" . $mataikhoan . "','0')";
        }
        mysqli_query($mysqli, $sql_add);
        move_uploaded_file($hinhanhsan_tmp, '../../../admin/modules/pitch/uploads-pitch/' . $hinhanhsan_time);
        header('Location: ../../../index.php?quanly=taosanbuoc2');
    }
}