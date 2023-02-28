<p class="title-handle">Thêm đánh giá</p>
<table class="main-handle">
    <!-- Add enctype for post file -->
    <form action="modules/rating/handle.php?id_user=<?php echo $_GET['id_user'] ?>" method="post"
        enctype="multipart/form-data">
        <tr>
            <td>Tài khoản đánh giá</td>
            <td>
                <select name="matknguoidung" id="matknguoidung">
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
            <td>Tài khoản được đánh giá</td>
            <td>
                <select name="matkdanhgia" id="matkdanhgia">
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
            <td>Đánh giá</td>
            <td><input type="text" name="sosao" id="sosao" oninput="ktDanhGia()">
                <p id="loi-danhgia" class="notify-error" style="display: block;">* Vui lòng nhập số sao (1 - 5)!
                </p>
            </td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea name="noidungdanhgia" id="noidungdanhgia" cols="50" rows="3"
                    oninput="ktNoiDungDanhGia()"></textarea>
                <p id="loi-noidungdanhgia" class="notify-error" style="display: block;">* Vui lòng nhập nội dung đánh
                    giá!
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themdanhgia" value="Thêm đánh giá"></td>
        </tr>
    </form>
</table>
<script src="modules/rating/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_SESSION['vali_rating']) && $_SESSION['vali_rating'] == 1) {
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
        <?php unset($_SESSION['vali_rating']); ?>
    }
})
</script>
<?php
}
//Kiểm tra trống
if (isset($_SESSION['vali_rating']) && $_SESSION['vali_rating'] == 2) {
?>
<script>
Swal.fire({
    title: 'Thất bại!',
    text: "Số sao bị sai định dạng!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['vali_rating']); ?>
    }
})
</script>
<?php
}
?>