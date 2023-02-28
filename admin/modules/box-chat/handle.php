<?php

include('../../../config/config.php');
$id_user = $_GET['id_user'];
$userID = $_POST['userID'];
$content = $_POST['noidungchat'];
if (isset($_POST['guibinhluantuvan'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $add_data_comment =
        "INSERT INTO tuvankhachhang 
        (mataikhoangui, mataikhoannhan, noidungtuvan, thoigiantuvan, tinhtrangtuvan, tinhtrangtinnhan)
        VALUE('58','" . $userID . "','" . $content . "','" . date("Y-m-d H:i:s") . "','1','0')";
    mysqli_query($mysqli, $add_data_comment);
    header('Location: ../../index.php?action=quanlytuvankhachhang&query=main&userID=' . $userID . '&id_user=' . $id_user);
}