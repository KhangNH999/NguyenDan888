<p class="title-handle">Thêm sân</p>
<table class="main-handle">
    <!-- Add enctype for post file -->
    <form action="modules/pitch/handle.php?id_user=<?php echo $_GET['id_user'] ?>" method="post"
        enctype="multipart/form-data">
        <tr>
            <td>Tên sân</td>
            <td><textarea name="tensan" id="tensan" cols="50" rows="3" oninput="ktTenSan()"></textarea>
                <p id="loi-tensan" class="notify-error" style="display: block;">* Vui lòng nhập tên sân!</p>
            </td>
        </tr>
        <tr>
            <td>Tiêu đề sân</td>
            <td><textarea name="tieudesan" id="tieudesan" cols="50" rows="3" oninput="ktTieuDeSan()"></textarea>
                <p id="loi-tieudesan" class="notify-error" style="display: block;">* Vui lòng nhập tiêu đề sân!</p>
            </td>
        </tr>
        <tr>
            <td>Khung giờ</td>
            <td>
                <div class="frame-time">
                    <p>* Khung giờ 1:</p>
                    <input type="time" name="giobatdau1" oninput="unLockTime2();" id="time-start-1">
                    ~
                    <input type="time" name="gioketthuc1" oninput="unLockTime2();" id="time-end-1">
                </div>
                <div class="frame-time">
                    <p>* Khung giờ 2:</p>
                    <input type="time" name="giobatdau2" oninput="unLockTime3();" id="time-start-2" disabled>
                    ~
                    <input type="time" name="gioketthuc2" oninput="unLockTime3();" id="time-end-2" disabled>
                </div>
                <div class="frame-time">
                    <p>* Khung giờ 3:</p>
                    <input type="time" name="giobatdau3" oninput="unLockTime4();" id="time-start-3" disabled>
                    ~
                    <input type="time" name="gioketthuc3" oninput="unLockTime4();" id="time-end-3" disabled>
                </div>
                <div class="frame-time">
                    <p>* Khung giờ 4:</p>
                    <input type="time" name="giobatdau4" oninput="unLockTime5();" id="time-start-4" disabled>
                    ~
                    <input type="time" name="gioketthuc4" oninput="unLockTime5();" id="time-end-4" disabled>
                </div>
                <div class="frame-time">
                    <p>* Khung giờ 5:</p>
                    <input type="time" name="giobatdau5" oninput="unLockTime6();" id="time-start-5" disabled>
                    ~
                    <input type="time" name="gioketthuc5" oninput="unLockTime6();" id="time-end-5" disabled>
                </div>
                <div class="frame-time">
                    <p>* Khung giờ 6:</p>
                    <input type="time" name="giobatdau6" id="time-start-6" disabled>
                    ~
                    <input type="time" name="gioketthuc6" id="time-end-6" disabled>
                </div>
            </td>
        </tr>
        <tr>
            <td>Giá thuê</td>
            <td><input type="text" name="giathue" id="giathue" oninput="checkNumber()">
                <p id="loi-giathue" class="notify-error" style="display: block;">* Vui lòng nhập giá thuê!</p>
            </td>
        </tr>
        <tr>
            <td>Địa chỉ sân</td>
            <td><input type="text" name="diachisan" id="diachisan" oninput="ktDiaChiSan()">
                <p id="loi-diachisan" class="notify-error" style="display: block;">* Vui lòng nhập địa chỉ sân!</p>
            </td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea name="noidungsan" id="noidungsan" cols="50" rows="3" oninput="ktNoiDungSan()"></textarea>
                <p id="loi-noidungsan" class="notify-error" style="display: block;">* Bắt buộc!</p>
            </td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanhsan"></td>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td>
                <select name="mataikhoan" id="mataikhoan">
                    <?php
                    $sql_account = "SELECT * FROM taikhoan WHERE maloaitaikhoan = 3";
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
            <td colspan="2"><input type="submit" name="themsan" value="Thêm sân"></td>
        </tr>
    </form>
</table>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('noidungsan');
</script>
<script src="modules/pitch/handle-validation-time.js"></script>
<script src="modules/pitch/handle-validation.js"></script>
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