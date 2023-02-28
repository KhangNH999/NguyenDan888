<?php
include('../../../../config/config.php');

session_start();
$malichsu = $_POST['malichsu'];
$sql_user = "SELECT * FROM lichsudatsan WHERE malichsu = $malichsu LIMIT 1";
$query_user = mysqli_query($mysqli, $sql_user);
while ($row = mysqli_fetch_array($query_user)) {
    $mataikhoan = $row['mataikhoan'];
}

if (isset($_POST['duyetyeucau'])) {

    $sql_check_his = "SELECT * FROM lichsudatsan WHERE malichsu = $malichsu";
    $query_check_his = mysqli_query($mysqli, $sql_check_his);
    while ($row_check_his = mysqli_fetch_array($query_check_his)) {
        $ngaydat = $row_check_his['ngaydat'];
        $makhunggio = $row_check_his['makhunggio'];
        $masan = $row_check_his['masan'];
    }

    $sql_check_exist = "SELECT * FROM lichsudatsan WHERE ngaydat = '$ngaydat' AND $makhunggio = '$makhunggio' AND masan = '$masan' AND xacnhandatsan = 1";
    $count_check_exist = mysqli_num_rows(mysqli_query($mysqli, $sql_check_exist));

    if ($count_check_exist > 0) {
        $_SESSION['his_exist'] = 1;
        header('Location: ../../../../index.php?quanly=duyetdatsan');
    } else {
        $sql_update = "UPDATE lichsudatsan SET xacnhandatsan = 1 WHERE malichsu = $malichsu";
        mysqli_query($mysqli, $sql_update);
        //Add notify
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql_add_notify = "INSERT INTO thongbao (mataikhoan, noidungthongbao, thoigianthongbao, tinhtrangthongbao) 
        VALUE('" . $mataikhoan . "','Sân bạn yêu cầu đặt sân đã được xác nhận. Vui lòng thanh toán để hoàn tất!','" . date("Y-m-d H:i:s") . "','0')";
        mysqli_query($mysqli, $sql_add_notify);
        header('Location: ../../../../index.php?quanly=duyetdatsan');
    }
}

if (isset($_POST['huyyeucau'])) {
    $sql_delete = "DELETE FROM lichsudatsan WHERE malichsu = '$malichsu'";
    mysqli_query($mysqli, $sql_delete);
    //Add notify
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    //Add notify
    $sql_add_notify = "INSERT INTO thongbao (mataikhoan, noidungthongbao, thoigianthongbao, tinhtrangthongbao) 
    VALUE('" . $mataikhoan . "','Sân bạn yêu cầu đặt đã bị hủy!','" . date("Y-m-d H:i:s") . "','0')";
    mysqli_query($mysqli, $sql_add_notify);
    header('Location: ../../../../index.php?quanly=duyetdatsan');
}


if (isset($_POST['huychothanhtoan'])) {
    $sql_delete = "DELETE FROM lichsudatsan WHERE malichsu = '$malichsu'";
    mysqli_query($mysqli, $sql_delete);
    //Add notify
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    //Add notify
    $sql_add_notify = "INSERT INTO thongbao (mataikhoan, noidungthongbao, thoigianthongbao, tinhtrangthongbao) 
    VALUE('" . $mataikhoan . "','Sân bạn chờ thanh toán đã bị hủy!','" . date("Y-m-d H:i:s") . "','0')";
    mysqli_query($mysqli, $sql_add_notify);
    header('Location: ../../../../index.php?quanly=duyetdatsan');
}