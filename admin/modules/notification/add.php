<p class="title-handle">Thêm thông báo</p>
<table class="main-handle">
    <!-- Add enctype for post file -->
    <form action="modules/notification/handle.php?id_user=<?php echo $_GET['id_user'] ?>" method="post"
        enctype="multipart/form-data">
        <tr>
            <td>Tài khoản</td>
            <td>
                <select name="mataikhoan" id="mataikhoan">
                    <?php
                    $sql_account = "SELECT * FROM taikhoan WHERE maloaitaikhoan != 1 AND maloaitaikhoan != 16";
                    $query_account = mysqli_query($mysqli, $sql_account);
                    while ($row_ac = mysqli_fetch_array($query_account)) {
                    ?>
                    <option value="<?php echo $row_ac['mataikhoan'] ?>">
                        <?php echo $row_ac['tendangnhap'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nội dung thông báo</td>
            <td><textarea name="noidungthongbao" id="noidungthongbao" cols="50" rows="3"
                    oninput="ktNoiDungThongBao()"></textarea>
                <p id="loi-noidungthongbao" class="notify-error" style="display: block;">* Vui lòng nhập nội dung
                    thông báo!
                </p>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrangthongbao" id="tinhtrangthongbao">
                    <option value="0">Chưa xem</option>
                    <option value="1">Đã xem</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themthongbao" value="Thêm thông báo"></td>
        </tr>
    </form>
</table>
<script src="modules/notification/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_SESSION['vali_notification']) && $_SESSION['vali_notification'] == 1) {
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
        <?php unset($_SESSION['vali_notification']); ?>
    }
})
</script>
<?php
}
?>