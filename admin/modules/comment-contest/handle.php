<?php
include('../../../config/config.php');

session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$mataikhoan = $_POST['mataikhoan'];
$masukien = $_POST['masukien'];
$noidungbinhluansukien = $_POST['noidungbinhluansukien'];



if (isset($_POST['thembinhluansukien'])) {
    if ($noidungbinhluansukien == '') {
        $_SESSION['vali_comment_contest'] = 1;
?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlybinhluansukien&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Add
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql_add = "INSERT INTO binhluansukien(mataikhoan, masukien, noidungbinhluansukien, thoigianbinhluansukien) 
        VALUE('" . $mataikhoan . "','" . $masukien . "','" . $noidungbinhluansukien . "','" . date("Y-m-d H:i:s") . "')";
        mysqli_query($mysqli, $sql_add);
        $_SESSION['vali_comment_contest'] = 10;
        header('Location: ../../index.php?action=quanlybinhluansukien&query=main&id_user=' . $_GET['id_user']);
    }
} elseif (isset($_POST['suabinhluansukien'])) {
    if ($noidungbinhluansukien == '') {
        $_SESSION['vali_comment_contest'] = 1;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlybinhluansukien&query=edit&mabinhluansukien=<?php echo $_GET['mabinhluansukien'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Edit
        $sql_update = "UPDATE binhluansukien SET mataikhoan='" . $mataikhoan . "', masukien='" . $masukien . "',
        noidungbinhluansukien='" . $noidungbinhluansukien . "'
        WHERE mabinhluansukien = '$_GET[mabinhluansukien]'";
        mysqli_query($mysqli, $sql_update);
        $_SESSION['vali_comment_contest'] = 11;
        header('Location: ../../index.php?action=quanlybinhluansukien&query=main&id_user=' . $_GET['id_user']);
    }
} else {
    $id = $_GET['mabinhluansukien'];
    //Delete        
    $sql_delete = "DELETE FROM binhluansukien WHERE mabinhluansukien = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_comment_contest'] = 12;
    header('Location: ../../index.php?action=quanlybinhluansukien&query=main&id_user=' . $_GET['id_user']);
}