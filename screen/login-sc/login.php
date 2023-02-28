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
if (isset($_POST['dangnhap'])) {
    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = md5($_POST['matkhau']);
    $sql = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "' AND matkhau='" . $matkhau . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    $row_data = mysqli_fetch_array($row);
    $sessionCaptcha = $_SESSION['captcha'];
    $formCaptcha = $_POST['captcha'];
    if ($count > 0 && $sessionCaptcha != $formCaptcha) {
?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Lỗi',
    text: 'Bạn đã nhập sai mã captcha.',
})
</script>
<?php
    } else if ($count > 0 && $sessionCaptcha == $formCaptcha && strncmp($tendangnhap, $row_data['tendangnhap'], strlen($row_data['tendangnhap'])) == 0 && strncmp($matkhau, $row_data['matkhau'], strlen($row_data['matkhau'])) == 0) {
        $update_login = "UPDATE taikhoan SET tinhtrangtk = '1' WHERE mataikhoan = '$row_data[mataikhoan]'";
        $phanquyen = $row_data['maloaitaikhoan'];
        mysqli_query($mysqli, $update_login);
        if ($phanquyen == 1 || $phanquyen == 16) {
            $_SESSION['id_user'] = $row_data['mataikhoan'];
        ?>
<script type="text/javascript">
window.location.href = "admin/index.php?id_user=<?php echo $_SESSION['id_user'] ?>";
</script>
<?php
        } else if ($phanquyen != 0) {
            $_SESSION['tenkhachhang'] = $row_data['tendangnhap'];
            $_SESSION['ten'] = $row_data['ten'];
            $_SESSION['sodienthoai'] = $row_data['sodienthoai'];
            $_SESSION['id_khachhang'] = $row_data['mataikhoan'];
        ?>
<script type="text/javascript">
window.location.href = "index.php?login=success";
</script>
<?php
        } else {
        ?>
<script>
window.location.href =
    "index.php?quanly=xacnhantaikhoandangnhap&&email=<?php echo $row_data['gmail'] ?>&&tendangnhap=<?php echo $tendangnhap ?>&&ten=<?php echo $row_data['ten'] ?>&&sodienthoai=<?php echo $row_data['sodienthoai'] ?>&&idkhachhang=<?php echo $row_data['mataikhoan'] ?>";
</script>
<?php
        }
    } else {
        ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Lỗi',
    text: 'Tên đăng nhập hoặc mật khẩu sai, vui lòng nhập lại.',
})
</script>
<?php
    }
}
?>
<form action="" autocomplete="off" method="post">
    <div class="box-login">
        <div class="login">
            <h2>Đăng nhập</h2>
            <div class="form-group">
                <input type="text" name="tendangnhap" required>
                <label for="">Tên đăng nhập</label>
            </div>
            <div class="form-group">
                <input type="password" name="matkhau" required>
                <label for="">Mật khẩu</label>
            </div>
            <div class="form-group">
                <input class="captcha" type="text" name="captcha" required>
                <label for="">Mã captcha</label>
                <img src="captcha/captcha.php">
            </div>
            <input type="submit" value="Đăng nhập" name="dangnhap" id="btn_login">
            </br>
            <a id="forgot_pw" style="vertical-align: inherit;" href="index.php?quanly=quenmatkhau">Bạn đã quên mật khẩu
                của bạn?</a>
        </div>
    </div>
</form>