<?php
include('../../../config/config.php');
session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';


if (isset($_POST['laykhunggio'])) {
    $masan = $_POST['masan'];
    $ngaydat = $_POST['ngaydat'];
    if ($ngaydat == '') {
        $_SESSION['null_date'] = 1;
        header('Location: ../../index.php?action=quanlylichsudatsan&query=add&id_user=' . $_GET['id_user']);
    } else {
        header('Location: ../../index.php?action=quanlylichsudatsan&query=add&id_user=' . $_GET['id_user'] . '&idSan=' . $masan . '&ngaydat=' . $ngaydat);
    }
}

if (isset($_POST['laykhunggiosua'])) {
    $malichsu = $_POST['malichsu'];
    $ngaydat = $_POST['ngaydat'];
    if ($ngaydat == '') {
        $_SESSION['null_date'] = 1;
        header('Location: ../../index.php?action=quanlylichsudatsan&query=edit&malichsu=' . $malichsu . '&id_user=' . $_GET['id_user']);
    } else {
        header('Location: ../../index.php?action=quanlylichsudatsan&query=edit&malichsu=' . $malichsu . '&id_user=' . $_GET['id_user'] . '&ngaydatsan=' . $ngaydat);
    }
}