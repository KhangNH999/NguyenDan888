<?php

include('../../../config/config.php');

$matknguoidung = $_POST['matknguoidung'];
$matkdanhgia = $_POST['matkdanhgia'];

$noidungdanhgia = $_POST['noidungdanhgia'];

$matknguoidung_get = $_GET['matknguoidung'];
$matkdanhgia_get = $_GET['matkdanhgia'];

date_default_timezone_set('Asia/Ho_Chi_Minh');
if ($matknguoidung == 0) {
    header('Location: ../../../index.php?quanly=dangnhap');
} else {
    $sql_isset = "SELECT * FROM danhgia WHERE matknguoidung = $matknguoidung AND matkdanhgia = $matkdanhgia LIMIT 1";
    $query_isset = mysqli_query($mysqli, $sql_isset);
    $count_isset = mysqli_num_rows($query_isset);
    if ($count_isset > 0) {
        //Đánh giá 1 sao
        if (isset($_POST['motsao'])) {
            $sql_update = "UPDATE danhgia SET sosao='1', thoigiandanhgia = '" . date("Y-m-d H:i:s") . "' WHERE matknguoidung = $matknguoidung AND matkdanhgia = $matkdanhgia";
            mysqli_query($mysqli, $sql_update);
            header('Location: ../../../index.php?quanly=danhgianguoidung&&idAcc=' . $matkdanhgia);
        }
        //Đánh giá 2 sao
        if (isset($_POST['haisao'])) {
            $sql_update = "UPDATE danhgia SET sosao='2', thoigiandanhgia = '" . date("Y-m-d H:i:s") . "' WHERE matknguoidung = $matknguoidung AND matkdanhgia = $matkdanhgia";
            mysqli_query($mysqli, $sql_update);
            header('Location: ../../../index.php?quanly=danhgianguoidung&&idAcc=' . $matkdanhgia);
        }
        //Đánh giá 3 sao
        if (isset($_POST['basao'])) {
            $sql_update = "UPDATE danhgia SET sosao='3', thoigiandanhgia = '" . date("Y-m-d H:i:s") . "' WHERE matknguoidung = $matknguoidung AND matkdanhgia = $matkdanhgia";
            mysqli_query($mysqli, $sql_update);
            header('Location: ../../../index.php?quanly=danhgianguoidung&&idAcc=' . $matkdanhgia);
        }
        //Đánh giá 4 sao
        if (isset($_POST['bonsao'])) {
            $sql_update = "UPDATE danhgia SET sosao='4', thoigiandanhgia = '" . date("Y-m-d H:i:s") . "' WHERE matknguoidung = $matknguoidung AND matkdanhgia = $matkdanhgia";
            mysqli_query($mysqli, $sql_update);
            header('Location: ../../../index.php?quanly=danhgianguoidung&&idAcc=' . $matkdanhgia);
        }
        //Đánh giá 5 sao
        if (isset($_POST['namsao'])) {
            $sql_update = "UPDATE danhgia SET sosao='5', thoigiandanhgia = '" . date("Y-m-d H:i:s") . "' WHERE matknguoidung = $matknguoidung AND matkdanhgia = $matkdanhgia";
            mysqli_query($mysqli, $sql_update);
            header('Location: ../../../index.php?quanly=danhgianguoidung&&idAcc=' . $matkdanhgia);
        }
    } else {
        if (isset($_POST['motsao'])) {
            $sql_add = "INSERT INTO danhgia (matknguoidung, matkdanhgia, sosao, thoigiandanhgia) VALUE('" . $matknguoidung . "','" . $matkdanhgia . "', '1','" . date("Y-m-d H:i:s") . "')";
            mysqli_query($mysqli, $sql_add);
            header('Location: ../../../index.php?quanly=danhgianguoidung&&idAcc=' . $matkdanhgia);
        }
        if (isset($_POST['haisao'])) {
            $sql_add = "INSERT INTO danhgia (matknguoidung, matkdanhgia, sosao, thoigiandanhgia) VALUE('" . $matknguoidung . "','" . $matkdanhgia . "', '2','" . date("Y-m-d H:i:s") . "')";
            mysqli_query($mysqli, $sql_add);
            header('Location: ../../../index.php?quanly=danhgianguoidung&&idAcc=' . $matkdanhgia);
        }
        if (isset($_POST['basao'])) {
            $sql_add = "INSERT INTO danhgia (matknguoidung, matkdanhgia, sosao, thoigiandanhgia) VALUE('" . $matknguoidung . "','" . $matkdanhgia . "', '3','" . date("Y-m-d H:i:s") . "')";
            mysqli_query($mysqli, $sql_add);
            header('Location: ../../../index.php?quanly=danhgianguoidung&&idAcc=' . $matkdanhgia);
        }
        if (isset($_POST['bonsao'])) {
            $sql_add = "INSERT INTO danhgia (matknguoidung, matkdanhgia, sosao, thoigiandanhgia) VALUE('" . $matknguoidung . "','" . $matkdanhgia . "', '4','" . date("Y-m-d H:i:s") . "')";
            mysqli_query($mysqli, $sql_add);
            header('Location: ../../../index.php?quanly=danhgianguoidung&&idAcc=' . $matkdanhgia);
        }
        if (isset($_POST['namsao'])) {
            $sql_add = "INSERT INTO danhgia (matknguoidung, matkdanhgia, sosao, thoigiandanhgia) VALUE('" . $matknguoidung . "','" . $matkdanhgia . "', '5','" . date("Y-m-d H:i:s") . "')";
            mysqli_query($mysqli, $sql_add);
            header('Location: ../../../index.php?quanly=danhgianguoidung&&idAcc=' . $matkdanhgia);
        }
    }
}

if (isset($_POST['guinoidungdanhgia'])) {
    $sql_update = "UPDATE danhgia SET noidungdanhgia='" . $noidungdanhgia . "', thoigiandanhgia = '" . date("Y-m-d H:i:s") . "' WHERE matknguoidung = $matknguoidung_get AND matkdanhgia = $matkdanhgia_get";
    mysqli_query($mysqli, $sql_update);
    header('Location: ../../../index.php?quanly=danhgianguoidung&&idAcc=' . $matkdanhgia_get);
}