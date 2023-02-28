<?php
include('../../../../config/config.php');

$malichsu = $_POST['malichsu'];

if (isset($_POST['xoalichsudatsan'])) {
    $sql_delete = "DELETE FROM lichsudatsan WHERE malichsu = '" . $malichsu . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../../index.php?quanly=choxacnhanthanhtoan');
}