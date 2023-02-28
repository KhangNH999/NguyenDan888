<?php
include('../../../config/config.php');
session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$mataikhoan = $_POST['mataikhoan'];
$noidungthongbao = $_POST['noidungthongbao'];
$tinhtrangthongbao = $_POST['tinhtrangthongbao'];



if (isset($_POST['themthongbao'])) {
    if ($noidungthongbao == '') {
        $_SESSION['vali_notification'] = 1;
?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlythongbao&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Add
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql_add = "INSERT INTO thongbao(mataikhoan, noidungthongbao, thoigianthongbao, tinhtrangthongbao) 
        VALUE('" . $mataikhoan . "','" . $noidungthongbao . "','" . date("Y-m-d H:i:s") . "','" . $tinhtrangthongbao . "')";
        mysqli_query($mysqli, $sql_add);
        $_SESSION['vali_notification'] = 10;
        header('Location: ../../index.php?action=quanlythongbao&query=main&id_user=' . $_GET['id_user']);
    }
} elseif (isset($_POST['suathongbao'])) {
    if ($noidungthongbao == '') {
        $_SESSION['vali_notification'] = 1;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlythongbao&query=edit&mathongbao=<?php echo $_GET['mathongbao'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Edit
        $sql_update = "UPDATE thongbao SET mataikhoan='" . $mataikhoan . "',
        noidungthongbao='" . $noidungthongbao . "', tinhtrangthongbao='" . $tinhtrangthongbao . "'
        WHERE mathongbao = '$_GET[mathongbao]'";
        mysqli_query($mysqli, $sql_update);
        $_SESSION['vali_notification'] = 11;
        header('Location: ../../index.php?action=quanlythongbao&query=main&id_user=' . $_GET['id_user']);
    }
} else {
    $id = $_GET['mathongbao'];
    //Delete        
    $sql_delete = "DELETE FROM thongbao WHERE mathongbao = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_notification'] = 12;
    header('Location: ../../index.php?action=quanlythongbao&query=main&id_user=' . $_GET['id_user']);
}