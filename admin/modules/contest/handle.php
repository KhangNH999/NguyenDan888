<?php
include('../../../config/config.php');
session_start();

$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$mataikhoan = $_POST['mataikhoan'];
$tieudesukien = $_POST['tieudesukien'];
$diadiemsukien = $_POST['diadiemsukien'];
$ngayhethanthamgia = $_POST['ngayhethanthamgia'];
$phanthuong = $_POST['phanthuong'];
$tendoimot = $_POST['tendoimot'];
$tendoihai = $_POST['tendoihai'];
$soluongcauthu = $_POST['soluongcauthu'];
$soluongdubi = $_POST['soluongdubi'];

if (isset($_POST['themsukien'])) {
    if ($tieudesukien == '' | $diadiemsukien == '' | $ngayhethanthamgia == '' | $phanthuong == '' | $tendoimot == '' | $tendoihai == '' | $soluongcauthu == '' | $soluongdubi == '') {
        $_SESSION['vali_contest'] = 1;
?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlysukien&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Add
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql_add = "INSERT INTO sukien(mataikhoan, tieudesukien, thoigiantaosukien, diadiemsukien, ngayhethanthamgia, phanthuong, tendoimot, tendoihai, soluongcauthu, soluongcauthudubi, tinhtrangsukien) 
        VALUE('" . $mataikhoan . "','" . $tieudesukien . "','" . date("Y-m-d H:i:s") . "','" . $diadiemsukien . "','" . $ngayhethanthamgia . "','" . $phanthuong . "', '" . $tendoimot . "', '" . $tendoihai . "',
        '" . $soluongcauthu . "','" . $soluongdubi . "','1')";
        mysqli_query($mysqli, $sql_add);
        $_SESSION['vali_contest'] = 10;
        header('Location: ../../index.php?action=quanlysukien&query=main&id_user=' . $_GET['id_user']);
    }
} elseif (isset($_POST['suasukien'])) {
    if ($tieudesukien == '' | $diadiemsukien == '' | $ngayhethanthamgia == '' | $phanthuong == '' | $tendoimot == '' | $tendoihai == '' | $soluongcauthu == '' | $soluongdubi == '') {
        $_SESSION['vali_contest'] = 1;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlysukien&query=edit&masukien=<?php echo $_GET['masukien'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Edit
        $sql_update = "UPDATE sukien SET mataikhoan='" . $mataikhoan . "', tieudesukien='" . $tieudesukien . "',
        diadiemsukien='" . $diadiemsukien . "', ngayhethanthamgia='" . $ngayhethanthamgia . "',
        phanthuong='" . $phanthuong . "', tendoimot='" . $tendoimot . "', tendoihai='" . $tendoihai . "',
        soluongcauthu='" . $soluongcauthu . "', soluongcauthudubi='" . $soluongdubi . "'
        WHERE masukien = '$_GET[masukien]'";
        mysqli_query($mysqli, $sql_update);
        $_SESSION['vali_contest'] = 11;
        header('Location: ../../index.php?action=quanlysukien&query=main&id_user=' . $_GET['id_user']);
    }
} else {
    $id = $_GET['masukien'];
    //Delete        
    $sql_delete = "DELETE FROM sukien WHERE masukien = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_contest'] = 12;
    header('Location: ../../index.php?action=quanlysukien&query=main&id_user=' . $_GET['id_user']);
}