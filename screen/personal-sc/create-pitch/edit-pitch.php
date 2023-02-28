<link rel="stylesheet" href="assets/css/personal/create-pitch.css">
<div class="create-pitch">
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
        <form action="screen/personal-sc/create-pitch/handle-edit.php" method="post" enctype="multipart/form-data">
            <div class="edit-post">
                <?php
                $mataikhoan = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
                $masan = (isset($_GET['id_pitch'])) ? $_GET['id_pitch'] : '';
                $sql = "SELECT * FROM san WHERE masan = '" . $masan . "'";
                $query = mysqli_query($mysqli, $sql);
                while ($row = mysqli_fetch_array($query)) {
                ?>
                <input type="text" name="masan" value="<?php echo $masan ?>" style="display:none">
                <div class="field">
                    <div class="th">
                        <span>Tên sân</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="text" id="input-namepitch" name="tensan" maxlength="100"
                            placeholder="Nhập tên sân trong vòng 100 ký tự ..." oninput="ktTenSan();"
                            value="<?php echo $row['tensan'] ?>">
                        <div class="mess" id="mess-input-namepitch">* Đúng yêu cầu</div>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Tiêu đề</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="text" id="input-title" name="tieudesan" maxlength="100"
                            placeholder="Nhập tiêu đề trong vòng 100 ký tự ..." oninput="ktTieuDeSan();"
                            value="<?php echo $row['tieudesan'] ?>">
                        <div class="mess" id="mess-input-title">* Đúng yêu cầu</div>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Khung giờ 1</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <?php
                            $sql_get_time_pitch_1 = "SELECT * FROM khunggio WHERE masan = $row[masan] AND thutukhunggio = 1 LIMIT 1";
                            $query_get_time_pitch_1 = mysqli_query($mysqli, $sql_get_time_pitch_1);
                            $count_get_time_pitch_1 = mysqli_num_rows($query_get_time_pitch_1);
                            if ($count_get_time_pitch_1 > 0) {
                                while ($row_get_time_pitch_1 = mysqli_fetch_array($query_get_time_pitch_1)) {
                            ?>
                        <input type="time" name="giobatdau1" class="input-time-start"
                            value="<?php echo $row_get_time_pitch_1['giobatdau'] ?>">
                        <span>~</span>
                        <input type="time" name="gioketthuc1" class="input-time-end"
                            value="<?php echo $row_get_time_pitch_1['gioketthuc'] ?>">
                        <?php }
                            } else {
                                ?>
                        <input type="time" name="giobatdau1" class="input-time-start">
                        <span>~</span>
                        <input type="time" name="gioketthuc1" class="input-time-end">
                        <?php } ?>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Khung giờ 2</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <?php
                            $sql_get_time_pitch_2 = "SELECT * FROM khunggio WHERE masan = $row[masan] AND thutukhunggio = 2 LIMIT 1";
                            $query_get_time_pitch_2 = mysqli_query($mysqli, $sql_get_time_pitch_2);
                            $count_get_time_pitch_2 = mysqli_num_rows($query_get_time_pitch_2);
                            if ($count_get_time_pitch_2 > 0) {
                                while ($row_get_time_pitch_2 = mysqli_fetch_array($query_get_time_pitch_2)) {
                            ?>
                        <input type="time" name="giobatdau2" class="input-time-start"
                            value="<?php echo $row_get_time_pitch_2['giobatdau'] ?>">
                        <span>~</span>
                        <input type="time" name="gioketthuc2" class="input-time-end"
                            value="<?php echo $row_get_time_pitch_2['gioketthuc'] ?>">
                        <?php }
                            } else { ?>
                        <input type="time" name="giobatdau2" class="input-time-start" id="time-start-2"
                            oninput="unLockTime3();" <?php ($count_get_time_pitch_1 > 0) ? '' : 'disabled' ?>>
                        <span>~</span>
                        <input type="time" name="gioketthuc2" class="input-time-end" id="time-end-2"
                            oninput="unLockTime3();" <?php ($count_get_time_pitch_1 > 0) ? '' : 'disabled' ?>>
                        <?php } ?>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Khung giờ 3</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <?php
                            $sql_get_time_pitch_3 = "SELECT * FROM khunggio WHERE masan = $row[masan] AND thutukhunggio = 3 LIMIT 1";
                            $query_get_time_pitch_3 = mysqli_query($mysqli, $sql_get_time_pitch_3);
                            $count_get_time_pitch_3 = mysqli_num_rows($query_get_time_pitch_3);
                            if ($count_get_time_pitch_3 > 0) {
                                while ($row_get_time_pitch_3 = mysqli_fetch_array($query_get_time_pitch_3)) {
                            ?>
                        <input type="time" name="giobatdau3" class="input-time-start"
                            value="<?php echo $row_get_time_pitch_3['giobatdau'] ?>">

                        <span>~</span>
                        <input type="time" name="gioketthuc3" class="input-time-end"
                            value="<?php echo $row_get_time_pitch_3['gioketthuc'] ?>">
                        <?php }
                            } else { ?>
                        <input type="time" name="giobatdau3" class="input-time-start" id="time-start-3"
                            oninput="unLockTime4();" <?php echo ($count_get_time_pitch_2 > 0) ? '' : 'disabled'; ?>>
                        <span>~</span>
                        <input type="time" name="gioketthuc3" class="input-time-end" id="time-end-3"
                            oninput="unLockTime4();" <?php echo ($count_get_time_pitch_2 > 0) ? '' : 'disabled'; ?>>
                        <?php } ?>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Khung giờ 4</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <?php
                            $sql_get_time_pitch_4 = "SELECT * FROM khunggio WHERE masan = $row[masan] AND thutukhunggio = 4 LIMIT 1";
                            $query_get_time_pitch_4 = mysqli_query($mysqli, $sql_get_time_pitch_4);
                            $count_get_time_pitch_4 = mysqli_num_rows($query_get_time_pitch_4);
                            if ($count_get_time_pitch_4 > 0) {
                                while ($row_get_time_pitch_4 = mysqli_fetch_array($query_get_time_pitch_4)) {
                            ?>
                        <input type="time" name="giobatdau4" class="input-time-start"
                            value="<?php echo $row_get_time_pitch_4['giobatdau'] ?>">
                        <span>~</span>
                        <input type="time" name="gioketthuc4" class="input-time-end"
                            value="<?php echo $row_get_time_pitch_4['gioketthuc'] ?>">
                        <?php }
                            } else { ?>
                        <input type="time" name="giobatdau4" class="input-time-start" id="time-start-4"
                            oninput="unLockTime5();" <?php echo ($count_get_time_pitch_3 > 0) ? '' : 'disabled'; ?>>
                        <span>~</span>
                        <input type="time" name="gioketthuc4" class="input-time-end" id="time-end-4"
                            oninput="unLockTime5();" <?php echo ($count_get_time_pitch_3 > 0) ? '' : 'disabled'; ?>>
                        <?php } ?>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Khung giờ 5</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <?php
                            $sql_get_time_pitch_5 = "SELECT * FROM khunggio WHERE masan = $row[masan] AND thutukhunggio = 5 LIMIT 1";
                            $query_get_time_pitch_5 = mysqli_query($mysqli, $sql_get_time_pitch_5);
                            $count_get_time_pitch_5 = mysqli_num_rows($query_get_time_pitch_5);
                            if ($count_get_time_pitch_5 > 0) {
                                while ($row_get_time_pitch_5 = mysqli_fetch_array($query_get_time_pitch_5)) {
                            ?>
                        <input type="time" name="giobatdau5" class="input-time-start"
                            value="<?php echo $row_get_time_pitch_5['giobatdau'] ?>">
                        <span>~</span>
                        <input type="time" name="gioketthuc5" class="input-time-end"
                            value="<?php echo $row_get_time_pitch_5['gioketthuc'] ?>">
                        <?php }
                            } else { ?>
                        <input type="time" name="giobatdau5" class="input-time-start" id="time-start-5"
                            oninput="unLockTime6();" <?php echo ($count_get_time_pitch_4 > 0) ? '' : 'disabled'; ?>>
                        <span>~</span>
                        <input type="time" name="gioketthuc5" class="input-time-end" id="time-end-5"
                            oninput="unLockTime6();" <?php echo ($count_get_time_pitch_4 > 0) ? '' : 'disabled'; ?>>
                        <?php } ?>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Khung giờ 6</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <?php
                            $sql_get_time_pitch_6 = "SELECT * FROM khunggio WHERE masan = $row[masan] AND thutukhunggio = 6 LIMIT 1";
                            $query_get_time_pitch_6 = mysqli_query($mysqli, $sql_get_time_pitch_6);
                            $count_get_time_pitch_6 = mysqli_num_rows($query_get_time_pitch_6);
                            if ($count_get_time_pitch_6 > 0) {
                                while ($row_get_time_pitch_6 = mysqli_fetch_array($query_get_time_pitch_6)) {
                            ?>
                        <input type="time" name="giobatdau6" class="input-time-start"
                            value="<?php echo $row_get_time_pitch_6['giobatdau'] ?>">
                        <span>~</span>
                        <input type="time" name="gioketthuc6" class="input-time-end"
                            value="<?php echo $row_get_time_pitch_6['gioketthuc'] ?>">
                        <?php }
                            } else { ?>
                        <input type="time" name="giobatdau6" class="input-time-start" id="time-start-6"
                            <?php echo ($count_get_time_pitch_5 > 0) ? '' : 'disabled'; ?>>
                        <span>~</span>
                        <input type="time" name="gioketthuc6" class="input-time-end" id="time-end-6"
                            <?php echo ($count_get_time_pitch_5 > 0) ? '' : 'disabled'; ?>>
                        <?php } ?>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Giá thuê</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="text" id="input-price" name="giathue" oninput="ktGiaThue();"
                            placeholder="Nhập giá thuê không quá 10 triệu đồng ..."
                            value="<?php echo $row['giathue'] ?>">
                        <div class="mess" id="mess-input-price">* Đúng yêu cầu</div>
                    </div>
                </div>
                <div class="field">
                    <div class="th">
                        <span>Địa chỉ</span>
                        <span class="required">*</span>
                    </div>
                    <div class="td">
                        <input type="text" id="input-street" name="diachisan" placeholder="Nhập địa chỉ sân ..."
                            oninput="ktDiaChiSan();" value="<?php echo $row['diachisan'] ?>">
                        <div class="mess" id="mess-input-street">* Đúng yêu cầu</div>
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
                            oninput="ktNoiDungSan();"><?php echo $row['noidungsan'] ?></textarea>
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
                        <img id="image-create-pitch" width="150px"
                            src="admin/modules/pitch/uploads-pitch/<?php echo $row['hinhanhsan'] ?>">
                    </div>
                </div>
                <?php
                }
                ?>
                <ul class="submit">
                    <li>
                        <input type="submit" class="new-submit btn" name="taosanbuoc1" id="create-pitch"
                            value="Hoàn tất chỉnh sửa" disabled>
                    </li>
                </ul>
            </div>
        </form>
    </section>
</div>
<!-- tích hợp ckeditor cho văn bản -->
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
<script src="screen/personal-sc/create-pitch/handle-validation-step2.js"></script>
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