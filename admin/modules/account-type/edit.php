<?php
$sql_edit_account_type = "SELECT * FROM loaitaikhoan WHERE maloaitaikhoan = '$_GET[maloaitaikhoan]' LIMIT 1";
$query_edit_account_type = mysqli_query($mysqli, $sql_edit_account_type);
?>

<p class="title-handle">Sửa loại tài khoản</p>
<table class="main-handle">
    <form
        action="modules/account-type/handle.php?maloaitaikhoan=<?php echo $_GET['maloaitaikhoan'] ?>&id_user=<?php echo $_GET['id_user'] ?>"
        method="post">
        <?php
        while ($row = mysqli_fetch_array($query_edit_account_type)) {
        ?>
        <tr>
            <td>Tên loại tài khoản</td>
            <td><input type="text" value="<?php echo $row['tenloaitaikhoan'] ?>" name="tenloaitaikhoan"
                    id="tenloaitaikhoan" oninput=" ktTenLoaiTaiKhoan()">
                <p id="loi-tenloaitaikhoan" class="notify-error" style="display: none;">
                    * Vui lòng nhập tên loại tài khoản!</p>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="sualoaitaikhoan" value="Sửa loại tài khoản"></td>
        </tr>
        <?php
        }
        ?>
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