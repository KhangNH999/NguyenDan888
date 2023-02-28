<p class="title-handle">Thêm sự kiện</p>
<table class="main-handle">
    <!-- Add enctype for post file -->
    <form action="modules/contest/handle.php?id_user=<?php echo $_GET['id_user'] ?>" method="post"
        enctype="multipart/form-data">
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
            <td>Tiêu đề sự kiện</td>
            <td><textarea name="tieudesukien" id="tieudesukien" cols="50" rows="3"
                    oninput="ktTieuDeSuKien();"></textarea>
                <p id="loi-tieudesukien" class="notify-error" style="display: block;">* Vui lòng nhập tiêu đề sự kiện!
                </p>
            </td>
        </tr>
        <tr>
            <td>Địa điểm sự kiện</td>
            <td><input type="text" name="diadiemsukien" id="diadiemsukien" oninput="ktDiaDiemSuKien();">
                <p id="loi-diadiemsukien" class="notify-error" style="display: block;">* Vui lòng nhập địa điểm sự kiện!
                </p>
            </td>
        </tr>
        <tr>
            <td>Thời gian hết hạn</td>
            <td><input type="datetime-local" name="ngayhethanthamgia" id="ngayhethanthamgia" step="2"
                    oninput="ktNgayHetHan();">
                <p id="loi-ngayhethanthamgia" class="notify-error" style="display: block;">* Vui lòng chọn thời gian hết
                    hạn!
                </p>
            </td>
        </tr>
        <tr>
            <td>Phần thưởng</td>
            <td><input type="text" name="phanthuong" id="phanthuong" oninput="ktPhanThuong();">
                <p id="loi-phanthuong" class="notify-error" style="display: block;">* Vui lòng nhập phần thưởng!
                </p>
            </td>
        </tr>
        <tr>
            <td>Tên đội một</td>
            <td><input type="text" name="tendoimot" id="tendoimot" oninput="ktTenDoiMot();">
                <p id="loi-tendoimot" class="notify-error" style="display: block;">* Vui lòng nhập tên đội một!
                </p>
            </td>
        </tr>
        <tr>
            <td>Tên đội hai</td>
            <td><input type="text" name="tendoihai" id="tendoihai" oninput="ktTenDoiHai();">
                <p id="loi-tendoihai" class="notify-error" style="display: block;">* Vui lòng nhập tên đội hai!
                </p>
            </td>
        </tr>
        <tr>
            <td>Số lượng cầu thủ</td>
            <td>
                <select name="soluongcauthu">
                    <option value="10">10 người</option>
                    <option value="12">12 người</option>
                    <option value="14">14 người</option>
                    <option value="16">16 người</option>
                    <option value="18">18 người</option>
                    <option value="20">20 người</option>
                    <option value="22">22 người</option>
                    <option value="24">24 người</option>
                    <option value="26">26 người</option>
                    <option value="28">28 người</option>
                    <option value="30">30 người</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Số lượng cầu thủ dự bị</td>
            <td>
                <select name="soluongdubi">
                    <option value="10">10 người</option>
                    <option value="12">12 người</option>
                    <option value="14">14 người</option>
                    <option value="16">16 người</option>
                    <option value="18">18 người</option>
                    <option value="20">20 người</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themsukien" value="Thêm sự kiện"></td>
        </tr>
    </form>
</table>
<script src="modules/contest/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_SESSION['vali_contest']) && $_SESSION['vali_contest'] == 1) {
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
        <?php unset($_SESSION['vali_contest']); ?>
    }
})
</script>
<?php
}
?>