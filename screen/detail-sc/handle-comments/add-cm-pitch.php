<?php
include('../../../config/config.php');

$mataikhoan = $_POST['mataikhoan'];
$masan = $_POST['masan'];
$noidungbinhluansan = $_POST['noidungbinhluansan'];

if (isset($_POST['dangbinhluan'])) {
    if ($noidungbinhluansan == '') {
?>
<script type="text/javascript">
window.location.href = "../../../index.php?quanly=chitietdatsan&&idSan=<?php echo $masan ?>&vali=9#comments";
</script>
<?php
    } else {
        //Add
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql_add = "INSERT INTO binhluansan(mataikhoan, masan, noidungbinhluansan, thoigianbinhluansan) 
        VALUE('" . $mataikhoan . "','" . $masan . "','" . $noidungbinhluansan . "','" . date("Y-m-d H:i:s") . "')";
        mysqli_query($mysqli, $sql_add);
        header('Location: ../../../index.php?quanly=chitietdatsan&&idSan=' . $masan . '#comments');
    }
}