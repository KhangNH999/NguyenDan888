<!-- xử lý khi nhấp vào ảnh sẽ hiện ra -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function chooseFile(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image-edit-acc').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}
</script>
<?php
//Kiểm tra đường dẫn
$matk = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
if ($matk == '') {
?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}
?>

<?php
if (isset($_POST['hoantat'])) {
    $ten = $_POST['name'];
    $gioitinh = $_POST['sex'];
    $ngaysinh = $_POST['birthday'];
    $diachi = $_POST['address'];
    $dienthoai = $_POST['phone'];
    $gmail = $_POST['gmail'];
    $mataikhoan = $_SESSION['id_khachhang'];
    //xuly hinh anh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time() . '_' . $hinhanh;
    //sua
    if (!empty($_FILES['hinhanh']['name'])) {
        move_uploaded_file($hinhanh_tmp, 'admin/modules/account/uploads-ac/' . $hinhanh);
        $sql_update = "UPDATE taikhoan SET ten='" . $ten . "',gioitinh='" . $gioitinh . "',ngaysinh='" . $ngaysinh . "',diachitaikhoan='" . $diachi . "',sodienthoai='" . $dienthoai . "',gmail='" . $gmail . "',hinhanh='" . $hinhanh . "' WHERE mataikhoan='" . $mataikhoan . "'";
        //xoa hinh anh cu
        $sql = "SELECT * FROM taikhoan WHERE mataikhoan = '" . $mataikhoan . "' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('admin/modules/account/uploads-ac/' . $row['hinhanh']);
        }
    } else {
        $sql_update = "UPDATE taikhoan SET ten='" . $ten . "',gioitinh='" . $gioitinh . "',ngaysinh='" . $ngaysinh . "',diachitaikhoan='" . $diachi . "',sodienthoai='" . $dienthoai . "',gmail='" . $gmail . "' WHERE mataikhoan='" . $mataikhoan . "'";
    }
    mysqli_query($mysqli, $sql_update);
?>
<script>
window.location.href = "index.php?quanly=trangcuatoi";
alert("Cập nhật hồ sơ thành công!");
</script>
<?php
}
//hien thi thong tin trang ca nhan
$mataikhoan = isset($_SESSION['id_khachhang']) ? $_SESSION['id_khachhang'] : '';
$sql_edit_account = "SELECT * FROM taikhoan WHERE mataikhoan='" . $mataikhoan . "'";
$query_edit_account = mysqli_query($mysqli, $sql_edit_account);
while ($row = mysqli_fetch_array($query_edit_account)) {
?>
<link rel="stylesheet" href="assets/css/personal/edit-account.css">
<script src="https://kit.fontawesome.com/a818068831.js" crossorigin="anonymous"></script>
<form action="" method="post" enctype="multipart/form-data">
    <div id="edit-account">
        <h3>
            <i class="fa-solid fa-circle-user"></i>
            <span>Hồ sơ</span>
        </h3>
        <div class="img-ac w15">
            <div>
                <span class="label">Ảnh</span>
            </div>
            <input type="file" name="hinhanh" class="input-img-account" onchange="chooseFile(this)"
                accept="image/gif, image/jpeg, image/png">
            <img id="image-edit-acc" src="admin/modules/account/uploads-ac/<?php echo $row['hinhanh'] ?>" width="150px">
        </div>
        <div class="name-ac w15">
            <div>
                <span class="label">Tên <span class="obligatory">(Bắt buộc)</span></span>
            </div>
            <input type="text" id="input-name" class="group-input" name="name" placeholder="Nhập tên"
                value="<?php echo $row['ten'] ?>" required>
        </div>
        <div class="sex-birthday w15">
            <div class="part">
                <div>
                    <span class="label">Giới tính</span>
                </div>
                <?php
                    if ($row['gioitinh'] == "Nam") {
                    ?>
                <select name="sex" id="sex-ac">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
                <?php
                    } else {
                    ?>
                <select name="sex" id="sex-ac">
                    <option value="Nữ">Nữ</option>
                    <option value="Nam">Nam</option>
                </select>
                <?php
                    }
                    ?>
            </div>
            <div class="part">
                <div>
                    <span class="label">Ngày sinh</span>
                </div>
                <input type="date" id="input-birthday" name="birthday" value="<?php echo $row['ngaysinh'] ?>" required>
            </div>
        </div>
        <div class="address-ac w15">
            <div>
                <span class="label">Địa chỉ</span>
            </div>
            <input type="text" id="input-address" class="group-input" name="address" placeholder="Nhập địa chỉ"
                value="<?php echo $row['diachitaikhoan'] ?>" required>
        </div>
        <div class="phone-gmail w15">
            <div class="part">
                <div>
                    <span class="label">Số điện thoại</span>
                </div>
                <input type="text" pattern="[0-9]+" id="input-phone" maxlength="10" name="phone"
                    placeholder="Nhập số điện thoại" value="<?php echo $row['sodienthoai'] ?>" required>
            </div>

            <div class="part">
                <div>
                    <span class="label">Gmail</span>
                </div>
                <input type="text" id="input-gmail" name="gmail" placeholder="Nhập Gmail"
                    value="<?php echo $row['gmail'] ?>" required>
            </div>
        </div>
        <ul class="submit">
            <li>
                <input type="submit" value="Hoàn tất" name="hoantat" id="new-submit">
                <!-- <a href="" class="new-submit btn">Hoàn tất</a> -->
            </li>
        </ul>
    </div>
</form>
<?php
}
?>