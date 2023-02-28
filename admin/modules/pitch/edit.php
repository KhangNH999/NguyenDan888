<?php
$sql_edit_pitch = "SELECT * FROM san WHERE masan = '$_GET[masan]' LIMIT 1";
$query_edit_pitch = mysqli_query($mysqli, $sql_edit_pitch);
?>

<p class="title-handle">Sửa sân</p>
<table class="main-handle">
    <?php
    while ($row = mysqli_fetch_array($query_edit_pitch)) {
    ?>
    <!-- Add enctype for post file -->
    <form action="modules/pitch/handle.php?masan=<?php echo $_GET['masan'] ?>&id_user=<?php echo $_GET['id_user'] ?>"
        method="post" enctype="multipart/form-data">
        <tr>
            <td>Tên sân</td>
            <td><textarea name="tensan" id="tensan" cols="50" rows="3"
                    oninput="ktTenSan()"><?php echo $row['tensan'] ?></textarea>
                <p id="loi-tensan" class="notify-error" style="display: none;">* Vui lòng nhập tên sân!</p>
            </td>
        </tr>
        <tr>
            <td>Tiêu đề sân</td>
            <td><textarea name="tieudesan" id="tieudesan" cols="50" rows="3"
                    oninput="ktTieuDeSan()"><?php echo $row['tieudesan'] ?></textarea>
                <p id="loi-tieudesan" class="notify-error" style="display: none;">* Vui lòng nhập tiêu đề sân!</p>
            </td>
        </tr>
        <tr>

            <td>Khung giờ</td>
            <td>
                <!-- Khung giờ 1 -->
                <?php
                    $sql_get_time_pitch_1 = "SELECT * FROM khunggio WHERE masan = $row[masan] AND thutukhunggio = 1 LIMIT 1";
                    $query_get_time_pitch_1 = mysqli_query($mysqli, $sql_get_time_pitch_1);
                    $count_get_time_pitch_1 = mysqli_num_rows($query_get_time_pitch_1);
                    if ($count_get_time_pitch_1 > 0) {
                        while ($row_get_time_pitch_1 = mysqli_fetch_array($query_get_time_pitch_1)) {
                    ?>
                <div class="frame-time">
                    <p>* Khung giờ 1:</p>
                    <input type="time" name="giobatdau1" value="<?php echo $row_get_time_pitch_1['giobatdau'] ?>">
                    ~
                    <input type="time" name="gioketthuc1" value="<?php echo $row_get_time_pitch_1['gioketthuc'] ?>">
                </div>
                <?php
                        }
                    } else {
                        ?>
                <div class="frame-time">
                    <p>* Khung giờ 1:</p>
                    <input type="time" name="giobatdau1" class="input-time-start">
                    <span>~</span>
                    <input type="time" name="gioketthuc1" class="input-time-end">
                </div>
                <?php } ?>
                <!-- Khung giờ 2 -->
                <?php
                    $sql_get_time_pitch_2 = "SELECT * FROM khunggio WHERE masan = $row[masan] AND thutukhunggio = 2 LIMIT 1";
                    $query_get_time_pitch_2 = mysqli_query($mysqli, $sql_get_time_pitch_2);
                    $count_get_time_pitch_2 = mysqli_num_rows($query_get_time_pitch_2);
                    if ($count_get_time_pitch_2 > 0) {
                        while ($row_get_time_pitch_2 = mysqli_fetch_array($query_get_time_pitch_2)) {
                    ?>
                <div class="frame-time">
                    <p>* Khung giờ 2:</p>
                    <input type="time" name="giobatdau2" value="<?php echo $row_get_time_pitch_2['giobatdau'] ?>">
                    ~
                    <input type="time" name="gioketthuc2" value="<?php echo $row_get_time_pitch_2['gioketthuc'] ?>">
                </div>
                <?php }
                    } else { ?>
                <div class="frame-time">
                    <p>* Khung giờ 2:</p>
                    <input type="time" name="giobatdau2" class="input-time-start" id="time-start-2"
                        oninput="unLockTime3();" <?php ($count_get_time_pitch_1 > 0) ? '' : 'disabled' ?>>
                    <span>~</span>
                    <input type="time" name="gioketthuc2" class="input-time-end" id="time-end-2"
                        oninput="unLockTime3();" <?php ($count_get_time_pitch_1 > 0) ? '' : 'disabled' ?>>
                </div>
                <?php } ?>
                <!-- Khung giờ 3 -->
                <?php
                    $sql_get_time_pitch_3 = "SELECT * FROM khunggio WHERE masan = $row[masan] AND thutukhunggio = 3 LIMIT 1";
                    $query_get_time_pitch_3 = mysqli_query($mysqli, $sql_get_time_pitch_3);
                    $count_get_time_pitch_3 = mysqli_num_rows($query_get_time_pitch_3);
                    if ($count_get_time_pitch_3 > 0) {
                        while ($row_get_time_pitch_3 = mysqli_fetch_array($query_get_time_pitch_3)) {
                    ?>
                <div class="frame-time">
                    <p>* Khung giờ 3:</p>
                    <input type="time" name="giobatdau3" value="<?php echo $row_get_time_pitch_3['giobatdau'] ?>">
                    ~
                    <input type="time" name="gioketthuc3" value="<?php echo $row_get_time_pitch_3['gioketthuc'] ?>">
                </div>
                <?php }
                    } else { ?>
                <div class="frame-time">
                    <p>* Khung giờ 3:</p>
                    <input type="time" name="giobatdau3" class="input-time-start" id="time-start-3"
                        oninput="unLockTime4();" <?php echo ($count_get_time_pitch_2 > 0) ? '' : 'disabled'; ?>>
                    <span>~</span>
                    <input type="time" name="gioketthuc3" class="input-time-end" id="time-end-3"
                        oninput="unLockTime4();" <?php echo ($count_get_time_pitch_2 > 0) ? '' : 'disabled'; ?>>
                </div>
                <?php } ?>
                <!-- Khung giờ 4 -->
                <?php
                    $sql_get_time_pitch_4 = "SELECT * FROM khunggio WHERE masan = $row[masan] AND thutukhunggio = 4 LIMIT 1";
                    $query_get_time_pitch_4 = mysqli_query($mysqli, $sql_get_time_pitch_4);
                    $count_get_time_pitch_4 = mysqli_num_rows($query_get_time_pitch_4);
                    if ($count_get_time_pitch_4 > 0) {
                        while ($row_get_time_pitch_4 = mysqli_fetch_array($query_get_time_pitch_4)) {
                    ?>
                <div class="frame-time">
                    <p>* Khung giờ 4:</p>
                    <input type="time" name="giobatdau4" value="<?php echo $row_get_time_pitch_4['giobatdau'] ?>">
                    ~
                    <input type="time" name="gioketthuc4" value="<?php echo $row_get_time_pitch_4['gioketthuc'] ?>">
                </div>
                <?php }
                    } else { ?>
                <div class="frame-time">
                    <p>* Khung giờ 4:</p>
                    <input type="time" name="giobatdau4" class="input-time-start" id="time-start-4"
                        oninput="unLockTime5();" <?php echo ($count_get_time_pitch_3 > 0) ? '' : 'disabled'; ?>>
                    <span>~</span>
                    <input type="time" name="gioketthuc4" class="input-time-end" id="time-end-4"
                        oninput="unLockTime5();" <?php echo ($count_get_time_pitch_3 > 0) ? '' : 'disabled'; ?>>
                </div>
                <?php } ?>
                <!-- Khung giờ 5 -->
                <?php
                    $sql_get_time_pitch_5 = "SELECT * FROM khunggio WHERE masan = $row[masan] AND thutukhunggio = 5 LIMIT 1";
                    $query_get_time_pitch_5 = mysqli_query($mysqli, $sql_get_time_pitch_5);
                    $count_get_time_pitch_5 = mysqli_num_rows($query_get_time_pitch_5);
                    if ($count_get_time_pitch_5 > 0) {
                        while ($row_get_time_pitch_5 = mysqli_fetch_array($query_get_time_pitch_5)) {
                    ?>
                <div class="frame-time">
                    <p>* Khung giờ 5:</p>
                    <input type="time" name="giobatdau5" value="<?php echo $row_get_time_pitch_5['giobatdau'] ?>">
                    ~
                    <input type="time" name="gioketthuc5" value="<?php echo $row_get_time_pitch_5['gioketthuc'] ?>">
                </div>
                <?php }
                    } else { ?>
                <div class="frame-time">
                    <p>* Khung giờ 5:</p>
                    <input type="time" name="giobatdau5" class="input-time-start" id="time-start-5"
                        oninput="unLockTime6();" <?php echo ($count_get_time_pitch_4 > 0) ? '' : 'disabled'; ?>>
                    <span>~</span>
                    <input type="time" name="gioketthuc5" class="input-time-end" id="time-end-5"
                        oninput="unLockTime6();" <?php echo ($count_get_time_pitch_4 > 0) ? '' : 'disabled'; ?>>
                </div>
                <?php } ?>
                <!-- Khung giờ 6 -->
                <?php
                    $sql_get_time_pitch_6 = "SELECT * FROM khunggio WHERE masan = $row[masan] AND thutukhunggio = 6 LIMIT 1";
                    $query_get_time_pitch_6 = mysqli_query($mysqli, $sql_get_time_pitch_6);
                    $count_get_time_pitch_6 = mysqli_num_rows($query_get_time_pitch_6);
                    if ($count_get_time_pitch_6 > 0) {
                        while ($row_get_time_pitch_6 = mysqli_fetch_array($query_get_time_pitch_6)) {
                    ?>
                <div class="frame-time">
                    <p>* Khung giờ 6:</p>
                    <input type="time" name="giobatdau6" value="<?php echo $row_get_time_pitch_6['giobatdau'] ?>">
                    ~
                    <input type="time" name="gioketthuc6" value="<?php echo $row_get_time_pitch_6['gioketthuc'] ?>">
                </div>
                <?php }
                    } else { ?>
                <div class="frame-time">
                    <p>* Khung giờ 6:</p>
                    <input type="time" name="giobatdau6" class="input-time-start" id="time-start-6"
                        <?php echo ($count_get_time_pitch_5 > 0) ? '' : 'disabled'; ?>>
                    <span>~</span>
                    <input type="time" name="gioketthuc6" class="input-time-end" id="time-end-6"
                        <?php echo ($count_get_time_pitch_5 > 0) ? '' : 'disabled'; ?>>
                </div>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>Giá thuê</td>
            <td><input type="text" name="giathue" id="giathue" oninput="checkNumber()"
                    value="<?php echo $row['giathue'] ?>">
                <p id="loi-giathue" class="notify-error" style="display: none;">* Vui lòng nhập giá thuê!</p>
            </td>
        </tr>
        <tr>
            <td>Địa chỉ sân</td>
            <td><input type="text" name="diachisan" id="diachisan" oninput="ktDiaChiSan()"
                    value="<?php echo $row['diachisan'] ?>">
                <p id="loi-diachisan" class="notify-error" style="display: none;">* Vui lòng nhập địa chỉ sân!</p>
            </td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea name="noidungsan" id="noidungsan" cols="50" oninput="ktNoiDungSan()"
                    rows="3"><?php echo $row['noidungsan'] ?></textarea>
                <p id="loi-noidungsan" class="notify-error" style="display: block;">* Bắt buộc!</p>
            </td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanhsan">
                <img src="modules/pitch/uploads-pitch/<?php echo $row['hinhanhsan'] ?>"
                    alt="<?php echo $row['hinhanhsan'] ?>" width="50px">
            </td>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td>
                <select name="mataikhoan" id="mataikhoan">
                    <?php
                        $sql_account = "SELECT * FROM taikhoan WHERE maloaitaikhoan = 3";
                        $query_account = mysqli_query($mysqli, $sql_account);
                        while ($row_ac = mysqli_fetch_array($query_account)) {
                            if ($row_ac['mataikhoan'] == $row['mataikhoan']) {
                        ?>
                    <option selected value="<?php echo $row_ac['mataikhoan'] ?>">
                        <?php echo $row_ac['tendangnhap'] ?></option>
                    <?php
                            } else {
                            ?>
                    <option value="<?php echo $row_ac['mataikhoan'] ?>">
                        <?php echo $row_ac['tendangnhap'] ?></option>
                    <?php
                            }
                        }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suasan" value="Sửa sân"></td>
        </tr>
    </form>
    <?php
    }
    ?>
</table>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('noidungsan');
</script>
<script src="modules/pitch/handle-validation.js"></script>
<script src="modules/pitch/handle-validation-time.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_SESSION['vali_pitch']) && $_SESSION['vali_pitch'] == 1) {
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
        <?php unset($_SESSION['vali_pitch']); ?>
    }
})
</script>
<?php
}
//Kiểm tra trống
if (isset($_SESSION['vali_pitch']) && $_SESSION['vali_pitch'] == 2) {
?>
<script>
Swal.fire({
    title: 'Thất bại!',
    text: "Giá thuê bị sai định dạng!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['vali_pitch']); ?>
    }
})
</script>
<?php
}
?>