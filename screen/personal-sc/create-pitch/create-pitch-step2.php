<link rel="stylesheet" href="assets/css/personal/create-pitch.css">
<?php
//Kiểm tra đường dẫn
$matk = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';


$sql_type = "SELECT * FROM taikhoan WHERE mataikhoan = $matk";
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
        <li class="dot now">
            <i class="fa-solid fa-ellipsis"></i>
        </li>
        <li class="now">
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
        <form action="screen/personal-sc/create-pitch/handle-create-step2.php" method="post"
            enctype="multipart/form-data">
            <div class="edit-post">
                <?php
                $mataikhoan = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
                $sql_get_masan = "SELECT * FROM san WHERE mataikhoan = $mataikhoan AND tinhtrangkhunggio = 0 LIMIT 1";
                $query_get_masan = mysqli_query($mysqli, $sql_get_masan);
                while ($row_get_masan = mysqli_fetch_array($query_get_masan)) {
                    $masan = $row_get_masan['masan'];
                    $tensan = $row_get_masan['tensan'];
                    $tieudesan = $row_get_masan['tieudesan'];
                }
                if ($masan == '') {
                ?>
                <script>
                window.location.href = "index.php?quanly=404error";
                </script>
                <?php
                }
                ?>
                <input type="text" name="masan" value="<?php echo $masan ?>" style="display:none">
                <div class="field">
                    <div class="th">
                        <span>Tên sân</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="text" id="input-namepitch" name="tensan" maxlength="100"
                            value="<?php echo $tensan ?>" disabled>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Tiêu đề sân</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="text" id="input-namepitch" name="tensan" maxlength="100"
                            value="<?php echo $tieudesan ?>" disabled>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Khung giờ 1</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="time" name="giobatdau1" class="input-time-start" oninput="unLockTime2();"
                            id="time-start-1">
                        <span>~</span>
                        <input type="time" name="gioketthuc1" class="input-time-end" oninput="unLockTime2();"
                            id="time-end-1">
                    </div>
                </div>
                <div class=" field">
                    <div class="th">
                        <span>Khung giờ 2</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="time" name="giobatdau2" class="input-time-start" oninput="unLockTime3();"
                            id="time-start-2" disabled>
                        <span>~</span>
                        <input type="time" name="gioketthuc2" class="input-time-end" oninput="unLockTime3();"
                            id="time-end-2" disabled>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Khung giờ 3</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="time" name="giobatdau3" class="input-time-start" oninput="unLockTime4();"
                            id="time-start-3" disabled>
                        <span>~</span>
                        <input type="time" name="gioketthuc3" class="input-time-end" oninput="unLockTime4();"
                            id="time-end-3" disabled>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Khung giờ 4</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="time" name="giobatdau4" class="input-time-start" oninput="unLockTime5();"
                            id="time-start-4" disabled>
                        <span>~</span>
                        <input type="time" name="gioketthuc4" class="input-time-end" oninput="unLockTime5();"
                            id="time-end-4" disabled>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Khung giờ 5</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="time" name="giobatdau5" class="input-time-start" oninput="unLockTime6();"
                            id="time-start-5" disabled>
                        <span>~</span>
                        <input type="time" name="gioketthuc5" class="input-time-end" oninput="unLockTime6();"
                            id="time-end-5" disabled>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Khung giờ 6</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="time" name="giobatdau6" class="input-time-start" id="time-start-6" disabled>
                        <span>~</span>
                        <input type="time" name="gioketthuc6" class="input-time-end" id="time-end-6" disabled>
                    </div>
                </div>
                <ul class="submit">
                    <li>
                        <button type="submit" class="new-submit btn" name="taosanbuoc2" id="create-pitch"
                            onclick="return confirm('Bạn có chắc chắn thông tin nhập vào là đúng?');">
                            Tiếp tục
                        </button>
                    </li>
                </ul>
            </div>
        </form>
    </section>
</div>
<script src="screen/personal-sc/create-pitch/handle-validation-step2.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_SESSION['null_time_1']) && $_SESSION['null_time_1'] == 1) { ?>
<script>
Swal.fire({
    title: 'Lỗi nhập dữ liệu!',
    text: "Bạn không được để trống khung giờ thứ 1!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['null_time_1']); ?>
    }
})
</script>
<?php } ?>