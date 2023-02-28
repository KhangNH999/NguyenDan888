<?php
include('../../../config/config.php');

session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$mataikhoan = $_POST['mataikhoan'];
$mablog = $_POST['mablog'];
$noidungbinhluanblog = $_POST['noidungbinhluanblog'];



if (isset($_POST['thembinhluanblog'])) {
    if ($noidungbinhluanblog == '') {
        $_SESSION['vali_comment_blog'] = 1;
?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlybinhluanblog&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Add
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql_add = "INSERT INTO binhluanblog(mataikhoan, mablog, noidungbinhluanblog, thoigianbinhluanblog) 
        VALUE('" . $mataikhoan . "','" . $mablog . "','" . $noidungbinhluanblog . "','" . date("Y-m-d H:i:s") . "')";
        mysqli_query($mysqli, $sql_add);
        $_SESSION['vali_comment_blog'] = 10;
        header('Location: ../../index.php?action=quanlybinhluanblog&query=main&id_user=' . $_GET['id_user']);
    }
} elseif (isset($_POST['suabinhluanblog'])) {
    if ($noidungbinhluanblog == '') {
        $_SESSION['vali_comment_blog'] = 1;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlybinhluanblog&query=edit&mabinhluanblog=<?php echo $_GET['mabinhluanblog'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Edit
        $sql_update = "UPDATE binhluanblog SET mataikhoan='" . $mataikhoan . "', mablog='" . $mablog . "',
        noidungbinhluanblog='" . $noidungbinhluanblog . "'
        WHERE mabinhluanblog = '$_GET[mabinhluanblog]'";
        mysqli_query($mysqli, $sql_update);
        $_SESSION['vali_comment_blog'] = 11;
        header('Location: ../../index.php?action=quanlybinhluanblog&query=main&id_user=' . $_GET['id_user']);
    }
} else {
    $id = $_GET['mabinhluanblog'];
    //Delete        
    $sql_delete = "DELETE FROM binhluanblog WHERE mabinhluanblog = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_comment_blog'] = 12;
    header('Location: ../../index.php?action=quanlybinhluanblog&query=main&id_user=' . $_GET['id_user']);
}