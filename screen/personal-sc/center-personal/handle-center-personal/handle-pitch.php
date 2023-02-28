<?php
include('../../../../config/config.php');

$masan = (isset($_POST['masancuatoi'])) ? $_POST['masancuatoi'] : '';

if (isset($_POST['suasan'])) {
    header('Location: ../../../../index.php?quanly=suasan&&id_pitch=' . $masan);
}

if (isset($_POST['xoasan'])) {
    $sql_del_comment = "DELETE FROM binhluansan WHERE masan = '" . $masan . "'";
    $sql_del_follow = "DELETE FROM theodoi WHERE masan = '" . $masan . "'";
    $sql_del_like = "DELETE FROM luotyeuthichsan WHERE masan = '" . $masan . "'";
    $sql_del_time = "DELETE FROM khunggio WHERE masan = '" . $masan . "'";
    //Delete img old
    $sql_img = "SELECT * FROM san WHERE masan = '" . $masan . "' LIMIT 1";
    $query_img = mysqli_query($mysqli, $sql_img);
    while ($row = mysqli_fetch_array($query_img)) {
        unlink('../../../../admin/modules/pitch/uploads-pitch/' . $row['hinhanhsan']);
    }
    $sql_delete = "DELETE FROM san WHERE masan = '" . $masan . "'";
    mysqli_query($mysqli, $sql_del_comment);
    mysqli_query($mysqli, $sql_del_follow);
    mysqli_query($mysqli, $sql_del_like);
    mysqli_query($mysqli, $sql_del_time);
    mysqli_query($mysqli, $sql_delete);

    header('Location: ../../../../index.php?quanly=quanlysan');
}