<p class="title-handle">Thêm báo cáo sân</p>
<table class="main-handle">
    <!-- Add enctype for post file -->
    <form action="modules/report-pitch/handle.php?id_user=<?php echo $_GET['id_user'] ?>" method="post"
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
            <td>Sân</td>
            <td>
                <select name="masan" id="masan">
                    <?php
                    $sql_pitch = "SELECT * FROM san";
                    $query_pitch = mysqli_query($mysqli, $sql_pitch);
                    while ($row_pitch = mysqli_fetch_array($query_pitch)) {
                    ?>
                    <option value="<?php echo $row_pitch['masan'] ?>">
                        <?php echo $row_pitch['tensan'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nội dung báo cáo</td>
            <td><textarea name="noidungbaocaosan" id="noidungbaocaosan" cols="50" rows="3"
                    oninput="ktNoiDungBaoCaoSan()"></textarea>
                <p id="loi-noidungbaocaosan" class="notify-error" style="display: block;">* Vui lòng nhập nội dung
                    báo cáo!
                </p>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrangbaocaosan" id="tinhtrangbaocaosan">
                    <option value="0">Chưa duyệt</option>
                    <option value="1">Đã duyệt</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="thembaocaosan" value="Thêm báo cáo sân"></td>
        </tr>
    </form>
</table>
<script src="modules/report-pitch/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_SESSION['vali_report_pitch']) && $_SESSION['vali_report_pitch'] == 1) {
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
        <?php unset($_SESSION['vali_report_pitch']); ?>
    }
})
</script>
<?php
}
?>