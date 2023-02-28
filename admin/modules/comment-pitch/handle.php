<?php
include('../../../config/config.php');

session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';

$mataikhoan = $_POST['mataikhoan'];
$masan = $_POST['masan'];
$noidungbinhluansan = $_POST['noidungbinhluansan'];



if (isset($_POST['thembinhluansan'])) {
    if ($noidungbinhluansan == '') {
        $_SESSION['vali_comment_pitch'] = 1;
?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlybinhluansan&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Add
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql_add = "INSERT INTO binhluansan(mataikhoan, masan, noidungbinhluansan, thoigianbinhluansan) 
        VALUE('" . $mataikhoan . "','" . $masan . "','" . $noidungbinhluansan . "','" . date("Y-m-d H:i:s") . "')";
        mysqli_query($mysqli, $sql_add);
        $_SESSION['vali_comment_pitch'] = 10;
        header('Location: ../../index.php?action=quanlybinhluansan&query=main&id_user=' . $_GET['id_user']);
    }
} elseif (isset($_POST['suabinhluansan'])) {
    if ($noidungbinhluansan == '') {
        $_SESSION['vali_comment_pitch'] = 1;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlybinhluansan&query=edit&mabinhluansan=<?php echo $_GET['mabinhluansan'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Edit
        $sql_update = "UPDATE binhluansan SET mataikhoan='" . $mataikhoan . "', masan='" . $masan . "',
        noidungbinhluansan='" . $noidungbinhluansan . "'
        WHERE mabinhluansan = '$_GET[mabinhluansan]'";
        mysqli_query($mysqli, $sql_update);
        $_SESSION['vali_comment_pitch'] = 11;
        header('Location: ../../index.php?action=quanlybinhluansan&query=main&id_user=' . $_GET['id_user']);
    }
} else {
    $id = $_GET['mabinhluansan'];
    //Delete        
    $sql_delete = "DELETE FROM binhluansan WHERE mabinhluansan = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_comment_pitch'] = 12;
    header('Location: ../../index.php?action=quanlybinhluansan&query=main&id_user=' . $_GET['id_user']);
}