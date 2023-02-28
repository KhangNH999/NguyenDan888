<?php
include('../../../config/config.php');
$mablog = $_POST['mablog'];
$tieudeblog = $_POST['title'];
$noidungblog = $_POST['noidung'];
//xuly hinh anh
$hinhanhblog = $_FILES['hinhanh']['name'];
$hinhanhblog_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanhblog_time = time() . '_' . $hinhanhblog;

if (isset($_POST['complete-blog'])) {
    if ($noidungblog == '') {
        session_start();
        $_SESSION['error_null'] = 1;
        header('Location: ../../../index.php?quanly=suablog&&id_blog=' . $mablog);
    } else {
        if ($hinhanhblog != '') {
            move_uploaded_file($hinhanhblog_tmp, '../../../admin/modules/blog/uploads-blog/' . $hinhanhblog_time);
            $sql_update = "UPDATE blog SET tieudeblog='" . $tieudeblog . "', noidungblog='" . $noidungblog . "',
        hinhanhblog='" . $hinhanhblog_time . "'
        WHERE mablog = '" . $mablog . "'";
            //Delete img old
            $sql_img = "SELECT * FROM blog WHERE mablog = '" . $mablog . "' LIMIT 1";
            $query_img = mysqli_query($mysqli, $sql_img);
            while ($row = mysqli_fetch_array($query_img)) {
                unlink('../../../admin/modules/blog/uploads-blog/' . $row['hinhanhblog']);
            }
        } else {
            $sql_update = "UPDATE blog SET tieudeblog='" . $tieudeblog . "', noidungblog='" . $noidungblog . "'
        WHERE mablog = '" . $mablog . "'";
        }
        mysqli_query($mysqli, $sql_update);
        header('Location: ../../../index.php?quanly=blogcuatoi');
    }
}