<?php
include('../../../../config/config.php');

$madanhgia = $_POST['madanhgia'];

if (isset($_POST['xoadanhgia'])) {
    $sql_delete = "DELETE FROM danhgia WHERE madanhgia = '" . $madanhgia . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../../index.php?quanly=dadanhgia');
}