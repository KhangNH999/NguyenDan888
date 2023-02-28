<?php
include('../../../config/config.php');
session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$mataikhoan = $_POST['mataikhoan'];
$masan = $_POST['masan'];
$noidungbaocaosan = $_POST['noidungbaocaosan'];
$tinhtrangbaocaosan = $_POST['tinhtrangbaocaosan'];



if (isset($_POST['thembaocaosan'])) {
    if ($noidungbaocaosan == '') {
        $_SESSION['vali_report_pitch'] = 1;
?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlybaocaosan&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Add
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql_add = "INSERT INTO baocaosan(mataikhoan, masan, noidungbaocaosan, thoigianbaocaosan, tinhtrangbaocaosan) 
        VALUE('" . $mataikhoan . "','" . $masan . "','" . $noidungbaocaosan . "','" . date("Y-m-d H:i:s") . "', 0)";
        mysqli_query($mysqli, $sql_add);
        $_SESSION['vali_report_pitch'] = 10;
        header('Location: ../../index.php?action=quanlybaocaosan&query=main&id_user=' . $_GET['id_user']);
    }
} elseif (isset($_POST['suabaocaosan'])) {
    if ($noidungbaocaosan == '') {
        $_SESSION['vali_report_pitch'] = 1;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlybaocaosan&query=edit&mabaocaosan=<?php echo $_GET['mabaocaosan'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Edit
        $sql_update = "UPDATE baocaosan SET mataikhoan='" . $mataikhoan . "', masan='" . $masan . "',
        noidungbaocaosan='" . $noidungbaocaosan . "', tinhtrangbaocaosan = '" . $tinhtrangbaocaosan . "'
        WHERE mabaocaosan = '$_GET[mabaocaosan]'";
        mysqli_query($mysqli, $sql_update);
        $_SESSION['vali_report_pitch'] = 11;
        header('Location: ../../index.php?action=quanlybaocaosan&query=main&id_user=' . $_GET['id_user']);
    }
} else {
    $id = $_GET['mabaocaosan'];
    //Delete        
    $sql_delete = "DELETE FROM baocaosan WHERE mabaocaosan = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_report_pitch'] = 12;
    header('Location: ../../index.php?action=quanlybaocaosan&query=main&id_user=' . $_GET['id_user']);
}