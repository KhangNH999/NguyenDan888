<p class="title-handle">Thêm loại tài khoản</p>
<table class="main-handle">
    <form action="modules/account-type/handle.php?id_user=<?php echo $_GET['id_user'] ?>" method="post">
        <tr>
            <td>Tên loại tài khoản</td>
            <td><input type="text" name="tenloaitaikhoan" id="tenloaitaikhoan" oninput="ktTenLoaiTaiKhoan()">
                <p id="loi-tenloaitaikhoan" class="notify-error" style="display: block;">
                    * Vui lòng nhập tên loại tài khoản!</p>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themloaitaikhoan" value="Thêm loại tài khoản"></td>
        </tr>
    </form>
</table>
<script src="modules/account-type/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_SESSION['validation_type']) && $_SESSION['validation_type'] == 1) {
?>
<script>
Swal.fire({
    title: 'Thất bại!',
    text: "Bạn không được để trống các trường yêu cầu!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['validation_type']); ?>
    }
})
</script>
<?php
}
?>