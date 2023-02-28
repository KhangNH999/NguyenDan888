<link rel="stylesheet" href="assets/css/emailVerification/emailVerification.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra đường dẫn
if (isset($_SESSION['id_khachhang'])) {
?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}
?>
<?php
if (isset($_POST["acess-email"])) {
    $codeVerification = $_POST["codeVerification"];
    $sql = "SELECT * FROM taikhoan WHERE gmail='$_GET[email]' and maxacnhantaikhoan = '" . $codeVerification . "'  LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $sql_update = mysqli_query($mysqli, "UPDATE taikhoan SET matkhau='$_GET[matkhau]' WHERE gmail='$_GET[email]'");
?>
<script>
window.location.href = "index.php?forgotPassword=success";
</script>
<?php
    } else {
    ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Lỗi',
    text: 'Mã xác nhận tài khoản bị sai. Vui lòng nhập lại.',
})
</script>
<?php
    }
}
?>
<form action="" autocomplete="off" method="post">
    <div id="box-email-verification">
        <div id="email-verification">
            <div class="title-email-verify">
                <img src="assets/images/icons/mailing.gif" alt="Ảnh" style="width: 34px; height: 34px;">
                <span style="margin-left: 4px;">VUI LÒNG NHẬP MÃ XÁC NHẬN EMAIL CỦA BẠN</span>
            </div>
            <div id="input_verify">
                <input type="text" name="codeVerification" id=input_code placeholder='Nhập mã xác nhận email ...'
                    required>
                <input type="submit" value="Xác nhận" name="acess-email" id="btn_verify">
            </div>
            <div id="help">
                * Hướng dẫn: Mã xác nhận đã được gửi vào email của bạn. Bạn hãy vào trang email của bạn để lấy mã xác
                nhận.
            </div>
        </div>
    </div>
</form>