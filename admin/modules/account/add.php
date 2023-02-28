<p class="title-handle">Thêm tài khoản</p>
<table class="main-handle">
    <!-- Add enctype for post file -->
    <form action="modules/account/handle.php?id_user=<?php echo $_GET['id_user'] ?>" method="post"
        enctype="multipart/form-data">
        <tr>
            <td>Tên đăng nhập</td>
            <td><input type="text" name="tendangnhap" id="tendangnhap" oninput="ktTenDangNhap()">
                <p id="loi-tendangnhap" class="notify-error" style="display: block;">* Vui lòng nhập tên đăng nhập!</p>
            </td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="text" name="matkhau" id="matkhau" oninput="ktMatKhau()">
                <p id="loi-matkhau" class="notify-error" style="display: block;">* Vui lòng nhập mật khẩu!</p>
            </td>
        </tr>
        <tr>
            <td>Tên</td>
            <td><input type="text" name="ten" id="ten" oninput="checkNumber()">
                <p id="loi-ten" class="notify-error" style="display: block;">* Vui lòng nhập tên!</p>
            </td>
        </tr>
        <tr>
            <td>Giới tính</td>
            <td>
                <select name="gioitinh" id="gioitinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Ngày sinh</td>
            <td><input type="date" name="ngaysinh"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="diachitaikhoan" id="diachitaikhoan" oninput="ktDiaChiTaiKhoan()">
                <p id="loi-diachitaikhoan" class="notify-error" style="display: block;">* Vui lòng nhập địa chỉ!</p>
            </td>
            </td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" name="sodienthoai" id="sodienthoai" oninput="ktSoDienThoai()">
                <p id="loi-sodienthoai" class="notify-error" style="display: block;">* Vui lòng nhập số điện thoại!</p>
            </td>
            </td>
        </tr>
        <tr>
            <td>Gmail</td>
            <td><input type="text" name="gmail" id="gmail" oninput="ktGmail()">
                <p id="loi-gmail" class="notify-error" style="display: block;">* Vui lòng nhập Gmail!</p>
            </td>
            </td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrangtk" id="tinhtrangtk">
                    <option value="2">Đăng xuất</option>
                    <option value="1">Hoạt động</option>
                    <option value="0">Khóa</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Loại tài khoản</td>
            <td>
                <select name="maloaitaikhoan" id="maloaitaikhoan">
                    <?php
                    $sql_account_type = "SELECT * FROM loaitaikhoan";
                    $query_account_type = mysqli_query($mysqli, $sql_account_type);
                    $sql_per = "SELECT * FROM taikhoan WHERE mataikhoan = '$_GET[id_user]'";
                    $query_per = mysqli_query($mysqli, $sql_per);
                    while ($row = mysqli_fetch_array($query_per)) {
                        $maloaitaikhoan_admin = $row['maloaitaikhoan'];
                    }
                    while ($row_ac_type = mysqli_fetch_array($query_account_type)) {
                    ?>
                    <?php if ($maloaitaikhoan_admin == 1) {
                            if ($row_ac_type['maloaitaikhoan'] != 1 && $row_ac_type['maloaitaikhoan'] != 16) { ?>
                    <option value="<?php echo $row_ac_type['maloaitaikhoan'] ?>">
                        <?php echo $row_ac_type['tenloaitaikhoan'] ?></option>
                    <?php
                            }
                        } else {
                            if ($row_ac_type['maloaitaikhoan'] != 16) {
                            ?>
                    <option value="<?php echo $row_ac_type['maloaitaikhoan'] ?>">
                        <?php echo $row_ac_type['tenloaitaikhoan'] ?></option>
                    <?php
                            }
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themtaikhoan" value="Thêm tài khoản"></td>
        </tr>
    </form>
</table>
<script src="modules/account/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_SESSION['validation_account']) && $_SESSION['validation_account'] == 1) {
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
        <?php unset($_SESSION['validation_account']); ?>
    }
})
</script>
<?php
}
//Kiểm tra Tên
if (isset($_SESSION['validation_account']) && $_SESSION['validation_account'] == 2) {
?>
<script>
Swal.fire({
    title: 'Thất bại!',
    text: "Bạn nhập sai định dạng tên!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['validation_account']); ?>
    }
})
</script>
<?php
}
//Kiểm tra số điện thoại
if (isset($_SESSION['validation_account']) && $_SESSION['validation_account'] == 3) {
?>
<script>
Swal.fire({
    title: 'Thất bại!',
    text: "Bạn nhập sai định dạng số điện thoại!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['validation_account']); ?>
    }
})
</script>
<?php
}
//Kiểm tra gmail
if (isset($_SESSION['validation_account']) && $_SESSION['validation_account'] == 4) {
?>
<script>
Swal.fire({
    title: 'Thất bại!',
    text: "Bạn nhập sai định dạng gmail!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['validation_account']); ?>
    }
})
</script>
<?php
}
?>