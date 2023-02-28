<?php
include('../../../config/config.php');
session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$matknguoidung = $_POST['matknguoidung'];
$matkdanhgia = $_POST['matkdanhgia'];
$sosao = $_POST['sosao'];
$noidungdanhgia = $_POST['noidungdanhgia'];

date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_POST['themdanhgia'])) {
    if ($sosao == '') {
        $_SESSION['vali_rating'] = 1;
?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlydanhgia&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else if (!(is_numeric($sosao)) || $sosao < 1 || $sosao > 5) {
        $_SESSION['vali_rating'] = 2;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlydanhgia&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Add
        $sql_add = "INSERT INTO danhgia (matknguoidung, matkdanhgia, sosao, noidungdanhgia, thoigiandanhgia) 
        VALUE('" . $matknguoidung . "','" . $matkdanhgia . "','" . $sosao . "','" . $noidungdanhgia . "', '" . date("Y-m-d H:i:s") . "')";
        mysqli_query($mysqli, $sql_add);
        $_SESSION['vali_rating'] = 10;
        header('Location: ../../index.php?action=quanlydanhgia&query=main&id_user=' . $_GET['id_user']);
    }
} elseif (isset($_POST['suadanhgia'])) {
    if ($sosao == '') {
        $_SESSION['vali_rating'] = 1;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlydanhgia&query=edit&madanhgia=<?php echo $_GET['madanhgia'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else if (!(is_numeric($sosao)) || $sosao < 1 || $sosao > 5) {
        $_SESSION['vali_rating'] = 2;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlydanhgia&query=edit&madanhgia=<?php echo $_GET['madanhgia'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Edit
        $sql_update = "UPDATE danhgia SET matknguoidung='" . $matknguoidung . "', matkdanhgia='" . $matkdanhgia . "',
    sosao ='" . $sosao . "', noidungdanhgia ='" . $noidungdanhgia . "', thoigiandanhgia ='" . date("Y-m-d H:i:s") . "' WHERE madanhgia = '$_GET[madanhgia]'";
        mysqli_query($mysqli, $sql_update);
        $_SESSION['vali_rating'] = 11;
        header('Location: ../../index.php?action=quanlydanhgia&query=main&id_user=' . $_GET['id_user']);
    }
} else {
    $id = $_GET['madanhgia'];
    //Delete        
    $sql_delete = "DELETE FROM danhgia WHERE madanhgia = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_rating'] = 12;
    header('Location: ../../index.php?action=quanlydanhgia&query=main&id_user=' . $_GET['id_user']);
}