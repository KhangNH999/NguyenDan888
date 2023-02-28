<?php

include('../../config/config.php');

$userID = $_POST['userID'];
$content_chat = $_POST['content-comment-chat'];
$url = $_POST['maurl'];

if (isset($_POST['guichat'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $update_chat =
        "UPDATE tuvankhachhang SET tinhtrangtuvan = '1' 
    WHERE mataikhoangui = $userID";
    $add_chat =
        "INSERT INTO tuvankhachhang 
    (mataikhoangui, mataikhoannhan, noidungtuvan, thoigiantuvan, tinhtrangtuvan, tinhtrangtinnhan)
    VALUE('" . $userID . "','58','" . $content_chat . "','" . date("Y-m-d H:i:s") . "','2','1')";
    mysqli_query($mysqli, $update_chat);
    mysqli_query($mysqli, $add_chat);
    header('Location:' . $url);
}