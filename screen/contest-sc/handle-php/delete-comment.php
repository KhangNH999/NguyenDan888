<?php
include('../../../config/config.php');

$mabinhluansukien = $_POST['mabinhluansukien'];
$masukien = $_POST['masukien'];

if (isset($_POST['xoabinhluansukien'])) {
    $sql_delete = "DELETE FROM binhluansukien WHERE mabinhluansukien = '" . $mabinhluansukien . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location: ../../../index.php?quanly=chitietsukien&idsukien=' . $masukien . '#contest-comment');
}