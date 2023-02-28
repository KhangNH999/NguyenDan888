<?php
include('../../../config/config.php');
session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$mataikhoan = $_POST['mataikhoan'];
$mablog = $_POST['mablog'];
$noidungbaocaoblog = $_POST['noidungbaocaoblog'];
$tinhtrangbaocaoblog = $_POST['tinhtrangbaocaoblog'];



if (isset($_POST['thembaocaoblog'])) {
    if ($noidungbaocaoblog == '') {
        $_SESSION['vali_report_blog'] = 1;
?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlybaocaoblog&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Add
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql_add = "INSERT INTO baocaoblog(mataikhoan, mablog, noidungbaocaoblog, thoigianbaocaoblog, tinhtrangbaocaoblog) 
        VALUE('" . $mataikhoan . "','" . $mablog . "','" . $noidungbaocaoblog . "','" . date("Y-m-d H:i:s") . "', 0)";
        mysqli_query($mysqli, $sql_add);
        $_SESSION['vali_report_blog'] = 10;
        header('Location: ../../index.php?action=quanlybaocaoblog&query=main&id_user=' . $_GET['id_user']);
    }
} elseif (isset($_POST['suabaocaoblog'])) {
    if ($noidungbaocaoblog == '') {
        $_SESSION['vali_report_blog'] = 1;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlybaocaoblog&query=edit&mabaocaoblog=<?php echo $_GET['mabaocaoblog'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Edit
        $sql_update = "UPDATE baocaoblog SET mataikhoan='" . $mataikhoan . "', mablog='" . $mablog . "',
        noidungbaocaoblog='" . $noidungbaocaoblog . "', tinhtrangbaocaoblog = '" . $tinhtrangbaocaoblog . "'
        WHERE mabaocaoblog = '$_GET[mabaocaoblog]'";
        mysqli_query($mysqli, $sql_update);
        $_SESSION['vali_report_blog'] = 11;
        header('Location: ../../index.php?action=quanlybaocaoblog&query=main&id_user=' . $_GET['id_user']);
    }
} else {
    $id = $_GET['mabaocaoblog'];
    //Delete        
    $sql_delete = "DELETE FROM baocaoblog WHERE mabaocaoblog = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_report_blog'] = 12;
    header('Location: ../../index.php?action=quanlybaocaoblog&query=main&id_user=' . $_GET['id_user']);
}