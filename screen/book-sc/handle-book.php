<?php
include('../../config/config.php');

session_start();

if (isset($_POST['chonngaydat'])) {
    $masan = $_POST['masan'];
    $ngaydat = $_POST['ngaydat'];
    if ($ngaydat == '') {
        $_SESSION['null_date'] = 1;
        header('Location: ../../index.php?quanly=datlich&&idSan=' . $masan);
    } else {
        header('Location: ../../index.php?quanly=datlich&&idSan=' . $masan . '&&ngaydat=' . $ngaydat);
    }
}

if (isset($_POST['datlich'])) {
    $masan = $_POST['masan'];
    $mataikhoan = $_POST['mataikhoan'];
    $makhunggio = $_POST['group_time'];
    $ngaydat = $_POST['ngaydat'];

    $sql_check_booking = "SELECT * FROM lichsudatsan WHERE mataikhoan = $mataikhoan AND masan = $masan AND makhunggio = $makhunggio AND ngaydat = '$ngaydat' LIMIT 1";
    $query_check_booking = mysqli_query($mysqli, $sql_check_booking);
    $count_check_booking = mysqli_num_rows($query_check_booking);

    $sql_own = "SELECT * FROM san WHERE masan = $masan";
    $sql_own = mysqli_query($mysqli, $sql_own);
    while ($row_own = mysqli_fetch_array($sql_own)) {
        $mataikhoanchusan = $row_own['mataikhoan'];
        $tieudesan = $row_own['tieudesan'];
    }

    $sql_time = "SELECT * FROM khunggio WHERE makhunggio = $makhunggio";
    $sql_time = mysqli_query($mysqli, $sql_time);
    while ($row_time = mysqli_fetch_array($sql_time)) {
        $giobatdau = $row_time['giobatdau'];
        $gioketthuc = $row_time['gioketthuc'];
    }

    $sql_user = "SELECT * FROM taikhoan WHERE mataikhoan = $mataikhoan";
    $sql_user = mysqli_query($mysqli, $sql_user);
    while ($row_user = mysqli_fetch_array($sql_user)) {
        $ten = $row_user['ten'];
    }

    if ($ngaydat == '') {
        $_SESSION['null_date'] = 1;
        header('Location: ../../index.php?quanly=datlich&&idSan=' . $masan);
    } else if ($makhunggio == '') {
        $_SESSION['null_select_time'] = 1;
        header('Location: ../../index.php?quanly=datlich&&idSan=' . $masan);
    } else {
        if ($count_check_booking > 0) {
            $_SESSION['booked'] = 1;
            header('Location: ../../index.php?quanly=datlich&&idSan=' . $masan);
        } else {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $sql_add = "INSERT INTO lichsudatsan(mataikhoan, masan, makhunggio, thoigiantaodatsan, ngaydat, hinhthucthanhtoan, tinhtranglichsu, xacnhandatsan) 
        VALUE ('" . $mataikhoan . "','" . $masan . "','" . $makhunggio . "','" . date("Y-m-d H:i:s") . "','" . $ngaydat . "','Chưa thanh toán','1','0')";
            mysqli_query($mysqli, $sql_add);
            //Add notify
            $mess = "[" . $ten . "] yêu cầu đặt sân: [" . $tieudesan . "] ngày [" . $ngaydat . "] khung giờ [" . date("H:i", strtotime($giobatdau)) . " - " . date("H:i", strtotime($gioketthuc)) . "]";
            $sql_add_notify = "INSERT INTO thongbao (mataikhoan, noidungthongbao, thoigianthongbao, tinhtrangthongbao) 
            VALUE('" . $mataikhoanchusan . "','" . $mess . "','" . date("Y-m-d H:i:s") . "','0')";
            mysqli_query($mysqli, $sql_add_notify);
            $_SESSION['book_success'] = 1;
            header('Location: ../../index.php?quanly=choxacnhanthanhtoan');
        }
    }
}