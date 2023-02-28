<link rel="stylesheet" href="assets/css/emailVerification/emailVerification.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (isset($_POST["acess-email"])) {
    $codeVerification = $_POST["codeVerification"];
    $sql = "SELECT * FROM taikhoan WHERE gmail='$_GET[email]' and maxacnhantaikhoan = '" . $codeVerification . "'  LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $sql_update = mysqli_query($mysqli, "UPDATE taikhoan SET maloaitaikhoan=2 WHERE gmail='$_GET[email]'");
        $_SESSION['tenkhachhang'] = $_GET['tendangnhap'];
        $_SESSION['ten'] = $_GET['ten'];
        $_SESSION['sodienthoai'] = $_GET['sodienthoai'];
        $_SESSION['id_khachhang'] = $_GET['idkhachhang'];
?>
<script>
window.location.href = "index.php?dangky=success";
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
                <span style="margin-left: 4px;">VUI LÒNG NHẬP MÃ XÁC NHẬN GMAIL CỦA BẠN</span>
            </div>
            <div id="input_verify">
                <input type="text" name="codeVerification" id=input_code placeholder='Nhập mã xác nhận Gmail ...'
                    required>
                <input type="submit" value="Xác nhận" name="acess-email" id="btn_verify">
            </div>
            <div id="help">
                * Hướng dẫn: Mã xác nhận đã được gửi vào Gmail của bạn. Bạn hãy vào trang Gmail của bạn để lấy mã xác
                nhận.
            </div>
        </div>
    </div>
</form>