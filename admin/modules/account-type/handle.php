<?php
include('../../../config/config.php');
session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$tenloaitaikhoan = $_POST['tenloaitaikhoan'];
if (isset($_POST['themloaitaikhoan'])) {
    if ($tenloaitaikhoan == '') {
        $_SESSION['validation_type'] = 1;
?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlyloaitaikhoan&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Add
        $sql_add = "INSERT INTO loaitaikhoan(tenloaitaikhoan) VALUE('" . $tenloaitaikhoan . "')";
        mysqli_query($mysqli, $sql_add);
        $_SESSION['validation_type'] = 10;
        header('Location: ../../index.php?action=quanlyloaitaikhoan&query=main&id_user=' . $_GET['id_user']);
    }
} elseif (isset($_POST['sualoaitaikhoan'])) {
    if ($tenloaitaikhoan == '') {
        $_SESSION['validation_type'] = 1;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlyloaitaikhoan&query=edit&maloaitaikhoan=<?php echo $_GET['maloaitaikhoan'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Edit
        $sql_update = "UPDATE loaitaikhoan SET tenloaitaikhoan='" . $tenloaitaikhoan . "' WHERE maloaitaikhoan = '$_GET[maloaitaikhoan]'";
        mysqli_query($mysqli, $sql_update);
        $_SESSION['validation_type'] = 11;
        header('Location: ../../index.php?action=quanlyloaitaikhoan&query=main&id_user=' . $_GET['id_user']);
    }
} else {
    //Delete
    $id = $_GET['maloaitaikhoan'];
    $sql_delete = "DELETE FROM loaitaikhoan WHERE maloaitaikhoan = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    if (mysqli_query($mysqli, $sql_delete)) {
        $_SESSION['validation_type'] = 12;
        header('Location: ../../index.php?action=quanlyloaitaikhoan&query=main&id_user=' . $_GET['id_user']);
    } else {
        $_SESSION['validation_type'] = 13;
        header('Location: ../../index.php?action=quanlyloaitaikhoan&query=main&id_user=' . $_GET['id_user']);
    }
}