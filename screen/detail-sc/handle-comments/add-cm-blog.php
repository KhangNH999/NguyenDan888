<?php
include('../../../config/config.php');

$mataikhoan = $_POST['mataikhoan'];
$mablog = $_POST['mablog'];
$noidungbinhluanblog = $_POST['noidungbinhluanblog'];

if (isset($_POST['dangbinhluan'])) {
    if ($noidungbinhluanblog == '') {
?>
<script type="text/javascript">
window.location.href = "../../../index.php?quanly=chitietblog&&idchitietblog=<?php echo $mablog ?>&vali=9#comments";
</script>
<?php
    } else {
        //Add
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql_add = "INSERT INTO binhluanblog(mataikhoan, mablog, noidungbinhluanblog, thoigianbinhluanblog) 
        VALUE('" . $mataikhoan . "','" . $mablog . "','" . $noidungbinhluanblog . "','" . date("Y-m-d H:i:s") . "')";
        mysqli_query($mysqli, $sql_add);
        header('Location: ../../../index.php?quanly=chitietblog&&idchitietblog=' . $mablog . '#comments');
    }
}