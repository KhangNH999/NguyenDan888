<link rel="stylesheet" href="assets/css/personal/create-pitch.css">
<?php
//Kiểm tra đường dẫn
$matk = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';


$sql_type = "SELECT maloaitaikhoan FROM taikhoan WHERE mataikhoan = $matk";
$query_type = mysqli_query($mysqli, $sql_type);
while ($row_type = mysqli_fetch_array($query_type)) {
    $maloaitaikhoan = $row_type['maloaitaikhoan'];
}

if ($matk == '' || $maloaitaikhoan == 2) {
?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}

?>
<div class="create-pitch">
    <ul class="post-step">
        <li class="now">
            <span class="step">1</span>
            <p>Nhập thông tin</p>
        </li>
        <li class="dot">
            <i class="fa-solid fa-ellipsis"></i>
        </li>
        <li>
            <span class="step">2</span>
            <p>Chọn khung giờ</p>
        </li>
        <li class="dot">
            <i class="fa-solid fa-ellipsis"></i>
        </li>
        <li>
            <span class="step">3</span>
            <p>Chờ xác nhận</p>
        </li>
    </ul>
    <section class="post">
        <h3>
            <i class="fa-solid fa-pen-to-square"></i>
            <span>Thông tin tạo sân mới</span>
        </h3>
        <div class="rule-link">
            <a href="index.php?quanly=dieukhoan" target="_blank">
                <i class="fa-solid fa-circle-info"></i>
                <span>Điều khoản sử dụng</span>
            </a>
        </div>
        <form action="screen/personal-sc/create-pitch/handle-create.php" method="post" enctype="multipart/form-data">
            <div class="edit-post">
                <?php
                $mataikhoan = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
                ?>
                <input type="text" name="mataikhoan" value="<?php echo $mataikhoan ?>" style="display:none">
                <div class="field">
                    <div class="th">
                        <span>Tên sân</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="text" id="input-namepitch" name="tensan" maxlength="100"
                            placeholder="Nhập tên sân trong vòng 100 ký tự ..." oninput="ktTenSan();">
                        <div class="mess mess-error" id="mess-input-namepitch">* Chưa nhập tên sân</div>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Tiêu đề</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="text" id="input-title" name="tieudesan" maxlength="100"
                            placeholder="Nhập tiêu đề trong vòng 100 ký tự ..." oninput="ktTieuDeSan();">
                        <div class="mess mess-error" id="mess-input-title">* Chưa nhập tiêu đề sân</div>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Giá thuê</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="text" id="input-price" name="giathue" oninput="ktGiaThue(value);"
                            placeholder="Nhập giá thuê không quá 10 triệu đồng ...">
                        <div class="mess mess-error" id="mess-input-price">* Chưa nhập giá thuê</div>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Địa chỉ</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="text" id="input-street" name="diachisan" placeholder="Nhập địa chỉ sân ..."
                            oninput="ktDiaChiSan();">
                        <div class="mess mess-error" id="mess-input-street">* Chưa nhập địa chỉ sân</div>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Nội dung</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <textarea name="noidungsan" id="input-content" rows="10"
                            placeholder="Nhập nội dung trong vòng 10.000 ký tự ..."
                            oninput="ktNoiDungSan();"></textarea>
                        <div class="mess mess-error" id="mess-input-content">* Bắt buộc</div>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Hình ảnh</span>
                    </div>
                    <div class="td">
                        <input type="file" name="hinhanhsan" id="input-image" onchange="chooseFile(this)"
                            accept="image/gif, image/jpeg, image/png">
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span></span>
                    </div>
                    <div class="td">
                        <img id="image-create-pitch" width="150px" src="admin/modules/blog/uploads-blog/download.png">
                    </div>
                </div>
                <ul class="submit">
                    <li>
                        <button type="submit" class="new-submit btn" name="taosanbuoc1" id="create-pitch"
                            onclick="return confirm('Bạn có chắc chắn thông tin nhập vào là đúng?');" disabled>
                            Xác nhận thông tin
                        </button>
                    </li>
                </ul>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('noidungsan');
</script>
<script>
function chooseFile(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image-create-pitch').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}
</script>
<script src="screen/personal-sc/create-pitch/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_SESSION['error_null']) && $_SESSION['error_null'] == 1) { ?>
<script>
Swal.fire({
    title: 'Lỗi nhập dữ liệu!',
    text: "Bạn không được để trống nội dung sân!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['error_null']); ?>
    }
})
</script>
<?php } ?>