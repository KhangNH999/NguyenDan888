<?php
$sql_edit_account = "SELECT * FROM taikhoan WHERE mataikhoan = '$_GET[mataikhoan]' LIMIT 1";
$query_edit_account = mysqli_query($mysqli, $sql_edit_account);
?>

<p class="title-handle">Sửa tài khoản</p>
<table class="main-handle">
    <?php
    while ($row = mysqli_fetch_array($query_edit_account)) {
    ?>
    <!-- Add enctype for post file -->
    <form
        action="modules/account/handle.php?mataikhoan=<?php echo $_GET['mataikhoan'] ?>&id_user=<?php echo $_GET['id_user'] ?>"
        method="post" enctype="multipart/form-data">
        <tr>
            <td>Tên đăng nhập</td>
            <td><input type="text" name="tendangnhap" value="<?php echo $row['tendangnhap'] ?>" id="tendangnhap"
                    oninput="ktTenDangNhap()">
                <p id="loi-tendangnhap" class="notify-error" style="display: none;">* Vui lòng nhập tên đăng nhập!</p>
            </td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="text" name="matkhau" value="<?php echo $row['matkhau'] ?>" id="matkhau"
                    oninput="ktMatKhau()">
                <p id="loi-matkhau" class="notify-error" style="display: none;">* Vui lòng nhập mật khẩu!</p>
            </td>
        </tr>
        <tr>
            <td>Tên</td>
            <td><input type="text" name="ten" value="<?php echo $row['ten'] ?>" id="ten" oninput="checkNumber()">
                <p id="loi-ten" class="notify-error" style="display: none;">* Vui lòng nhập tên!</p>
            </td>
        </tr>
        <tr>
            <td>Giới tính</td>
            <td>
                <select name="gioitinh" id="gioitinh">
                    <?php
                        if ($row['gioitinh'] == 'Nam') {
                        ?>
                    <option value="Nam" selected>Nam</option>
                    <option value="Nữ">Nữ</option>
                    <?php
                        } else {
                        ?>
                    <option value="Nam">Nam</option>
                    <option value="Nữ" selected>Nữ</option>
                    <?php
                        }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Ngày sinh</td>
            <td><input type="date" name="ngaysinh" value="<?php echo $row['ngaysinh'] ?>"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="diachitaikhoan" value="<?php echo $row['diachitaikhoan'] ?>"
                    id="diachitaikhoan" oninput="ktDiaChiTaiKhoan()">
                <p id="loi-diachitaikhoan" class="notify-error" style="display: none;">* Vui lòng nhập địa chỉ!</p>
            </td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" name="sodienthoai" value="<?php echo $row['sodienthoai'] ?>" id="sodienthoai"
                    oninput="ktSoDienThoai()">
                <p id="loi-sodienthoai" class="notify-error" style="display: none;">* Vui lòng nhập số điện thoại!</p>
            </td>
        </tr>
        <tr>
            <td>Gmail</td>
            <td><input type="text" name="gmail" value="<?php echo $row['gmail'] ?>" id="gmail" oninput="ktGmail()">
                <p id="loi-gmail" class="notify-error" style="display: none;">* Vui lòng nhập Gmail!</p>
            </td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanh">
                <img src="modules/account/uploads-ac/<?php echo $row['hinhanh'] ?>" alt="<?php echo $row['hinhanh'] ?>"
                    width="50px">
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrangtk" id="tinhtrangtk">
                    <?php
                        if ($row['tinhtrangtk'] == 2) {
                        ?>
                    <option value="2" selected>Đăng xuất</option>
                    <option value="1">Hoạt động</option>
                    <option value="0">Khóa</option>
                    <?php
                        } else if ($row['tinhtrangtk'] == 1) {
                        ?>
                    <option value="2">Đăng xuất</option>
                    <option value="1" selected>Hoạt động</option>
                    <option value="0">Khóa</option>
                    <?php
                        } else {
                        ?>
                    <option value="2">Đăng xuất</option>
                    <option value="1">Hoạt động</option>
                    <option value="0" selected>Khóa</option>
                    <?php
                        }
                        ?>
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
                        while ($row_admin = mysqli_fetch_array($query_per)) {
                            $maloaitaikhoan_admin = $row_admin['maloaitaikhoan'];
                        }
                        while ($row_ac_type = mysqli_fetch_array($query_account_type)) {
                        ?>
                    <?php if ($maloaitaikhoan_admin == 1) {
                                if ($row_ac_type['maloaitaikhoan'] != 1 && $row_ac_type['maloaitaikhoan'] != 16) { ?>
                    <option value="<?php echo $row_ac_type['maloaitaikhoan'] ?>"
                        <?php echo ($row_ac_type['maloaitaikhoan'] == $row['maloaitaikhoan']) ? 'selected' : ''; ?>>
                        <?php echo $row_ac_type['tenloaitaikhoan'] ?></option>
                    <?php
                                }
                            } else {
                                if ($row_ac_type['maloaitaikhoan'] != 16) {
                                ?>
                    <option value="<?php echo $row_ac_type['maloaitaikhoan'] ?>"
                        <?php echo ($row_ac_type['maloaitaikhoan'] == $row['maloaitaikhoan']) ? 'selected' : ''; ?>>
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
            <td colspan="2"><input type="submit" name="suataikhoan" value="Sửa tài khoản"></td>
        </tr>
    </form>
    <?php
    }
    ?>
</table>
<script src="modules/account/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_GET['validation_account']) && $_GET['validation_account'] == 1) {
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
if (isset($_GET['validation_account']) && $_GET['validation_account'] == 2) {
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
if (isset($_GET['validation_account']) && $_GET['validation_account'] == 3) {
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
if (isset($_GET['validation_account']) && $_GET['validation_account'] == 4) {
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