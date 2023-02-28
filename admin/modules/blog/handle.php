<?php
include('../../../config/config.php');

session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$mataikhoan = $_POST['mataikhoan'];
$tieudeblog = $_POST['tieudeblog'];
$noidungblog = $_POST['noidungblog'];
//Handle Image
$hinhanhblog = $_FILES['hinhanhblog']['name'];
$hinhanhblog_tmp = $_FILES['hinhanhblog']['tmp_name'];
$hinhanhblog_time = time() . '_' . $hinhanhblog;

$tinhtrangblog = $_POST['tinhtrangblog'];



if (isset($_POST['themblog'])) {
    if ($tieudeblog == '' || $noidungblog == '') {
        $_SESSION['validation_blog'] = 1;
?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlyblog&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Add
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if ($hinhanhblog != '') {
            $sql_add = "INSERT INTO blog(mataikhoan, tieudeblog, noidungblog, hinhanhblog, thoigiantaoblog, tinhtrangblog) 
        VALUE('" . $mataikhoan . "','" . $tieudeblog . "','" . $noidungblog . "','" . $hinhanhblog_time . "','" . date("Y-m-d H:i:s") . "','" . $tinhtrangblog . "')";
        } else {
            $sql_add = "INSERT INTO blog(mataikhoan, tieudeblog, noidungblog, thoigiantaoblog, tinhtrangblog) 
            VALUE('" . $mataikhoan . "','" . $tieudeblog . "','" . $noidungblog . "','" . date("Y-m-d H:i:s") . "','" . $tinhtrangblog . "')";
        }
        mysqli_query($mysqli, $sql_add);
        move_uploaded_file($hinhanhblog_tmp, 'uploads-blog/' . $hinhanhblog_time);
        $_SESSION['validation_blog'] = 10;
        header('Location: ../../index.php?action=quanlyblog&query=main&id_user=' . $_GET['id_user']);
    }
} elseif (isset($_POST['suablog'])) {
    if ($tieudeblog == '' || $noidungblog == '') {
        $_SESSION['validation_blog'] = 1;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlyblog&query=edit&mablog=<?php echo $_GET['mablog'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Edit
        if ($hinhanhblog != '') {
            move_uploaded_file($hinhanhblog_tmp, 'uploads-blog/' . $hinhanhblog_time);
            $sql_update = "UPDATE blog SET mataikhoan='" . $mataikhoan . "', tieudeblog='" . $tieudeblog . "', noidungblog='" . $noidungblog . "',
        hinhanhblog='" . $hinhanhblog_time . "', tinhtrangblog='" . $tinhtrangblog . "'
        WHERE mablog = '$_GET[mablog]'";
            //Delete img old
            $sql_img = "SELECT * FROM blog WHERE mablog = '$_GET[mablog]' LIMIT 1";
            $query_img = mysqli_query($mysqli, $sql_img);
            while ($row = mysqli_fetch_array($query_img)) {
                unlink('uploads-blog/' . $row['hinhanhblog']);
            }
        } else {
            $sql_update = "UPDATE blog SET mataikhoan='" . $mataikhoan . "', tieudeblog='" . $tieudeblog . "', noidungblog='" . $noidungblog . "',
        tinhtrangblog='" . $tinhtrangblog . "'
        WHERE mablog = '$_GET[mablog]'";
        }
        mysqli_query($mysqli, $sql_update);
        $_SESSION['validation_blog'] = 11;
        header('Location: ../../index.php?action=quanlyblog&query=main&id_user=' . $_GET['id_user']);
    }
} else {
    $id = $_GET['mablog'];
    //Delete file img
    $sql_img = "SELECT * FROM blog WHERE mablog = '$id' LIMIT 1";
    $query_img = mysqli_query($mysqli, $sql_img);
    while ($row = mysqli_fetch_array($query_img)) {
        unlink('uploads-blog/' . $row['hinhanhblog']);
    }
    //Delete
    $sql_delete_comment = "DELETE FROM binhluanblog WHERE mablog = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete_comment);
    $sql_delete_like = "DELETE FROM luotyeuthichblog WHERE mablog = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete_like);
    $sql_delete = "DELETE FROM blog WHERE mablog = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['validation_blog'] = 12;
    header('Location: ../../index.php?action=quanlyblog&query=main&id_user=' . $_GET['id_user']);
}