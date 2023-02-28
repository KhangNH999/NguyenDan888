<!-- Xử lý xóa blog -->
<?php
include('../../../../config/config.php');

$mablog = (isset($_POST['mablogcuatoi'])) ? $_POST['mablogcuatoi'] : '';

if (isset($_POST['suablog'])) {
    header('Location: ../../../../index.php?quanly=suablog&&id_blog=' . $mablog);
}

if (isset($_POST['xoablog'])) {
    $sql_del_comment = "DELETE FROM binhluanblog WHERE mablog = '$mablog'";
    $sql_del_like = "DELETE FROM luotyeuthichblog WHERE mablog = '$mablog'";
    //Delete img old
    $sql_img = "SELECT * FROM blog WHERE mablog = '" . $mablog . "' LIMIT 1";
    $query_img = mysqli_query($mysqli, $sql_img);
    while ($row = mysqli_fetch_array($query_img)) {
        unlink('../../../../admin/modules/blog/uploads-blog/' . $row['hinhanhblog']);
    }
    $sql_delete = "DELETE FROM blog WHERE mablog = '" . $mablog . "'";
    mysqli_query($mysqli, $sql_del_comment);
    mysqli_query($mysqli, $sql_del_like);
    mysqli_query($mysqli, $sql_delete);

    header('Location: ../../../../index.php?quanly=blogcuatoi');
}
?>