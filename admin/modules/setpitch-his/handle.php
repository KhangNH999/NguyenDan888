<?php
include('../../../config/config.php');

session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$mataikhoan = $_POST['mataikhoan'];
$masan = $_POST['masan'];
$ngaydat = $_POST['ngaydat'];
$makhunggio = $_POST['group_time'];
$hinhthucthanhtoan = $_POST['hinhthucthanhtoan'];
$mataikhoan = $_POST['mataikhoan'];
$xacnhanthanhtoan = $_POST['xacnhanthanhtoan'];

$malichsu = $_POST['malichsu'];

if (isset($_POST['themlichsudatsan'])) {
    if ($hinhthucthanhtoan == '' || $makhunggio == '') {
        $_SESSION['vali_his'] = 1;
?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlylichsudatsan&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Add
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql_add = "INSERT INTO lichsudatsan(mataikhoan, masan, makhunggio, thoigiantaodatsan, ngaydat, hinhthucthanhtoan, tinhtranglichsu, xacnhandatsan) 
        VALUE('" . $mataikhoan . "','" . $masan . "','" . $makhunggio . "','" . date("Y-m-d H:i:s") . "','" . $ngaydat . "','" . $hinhthucthanhtoan . "','1','" . $xacnhanthanhtoan . "')";
        mysqli_query($mysqli, $sql_add);
        $_SESSION['vali_his'] = 10;
        header('Location: ../../index.php?action=quanlylichsudatsan&query=main&id_user=' . $_GET['id_user']);
    }
} elseif (isset($_POST['sualichsudatsan'])) {
    if ($hinhthucthanhtoan == '') {
        $_SESSION['vali_his'] = 1;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlylichsudatsan&query=edit&malichsu=<?php echo $_GET['malichsu'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Edit
        if ($makhunggio == '') {
            $sql_update = "UPDATE lichsudatsan SET ngaydat='" . $ngaydat . "',
        hinhthucthanhtoan='" . $hinhthucthanhtoan . "', xacnhandatsan='" . $xacnhanthanhtoan . "'
        WHERE malichsu = '$malichsu'";
        } else {
            $sql_update = "UPDATE lichsudatsan SET ngaydat='" . $ngaydat . "', makhunggio = '" . $makhunggio . "',
        hinhthucthanhtoan='" . $hinhthucthanhtoan . "', xacnhandatsan='" . $xacnhanthanhtoan . "'
        WHERE malichsu = '$malichsu'";
        }
        mysqli_query($mysqli, $sql_update);
        $_SESSION['vali_his'] = 11;
        header('Location: ../../index.php?action=quanlylichsudatsan&query=main&id_user=' . $_GET['id_user']);
    }
} else {
    $id = $_GET['malichsu'];
    //Delete        
    $sql_delete = "DELETE FROM lichsudatsan WHERE malichsu = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_his'] = 12;
    header('Location: ../../index.php?action=quanlylichsudatsan&query=main&id_user=' . $_GET['id_user']);
}