<?php
$sql_edit_comment_contest = "SELECT * FROM binhluansukien WHERE mabinhluansukien = '$_GET[mabinhluansukien]' LIMIT 1";
$query_edit_comment_contest = mysqli_query($mysqli, $sql_edit_comment_contest);
?>

<p class="title-handle">Sửa bình luận sự kiện</p>
<table class="main-handle">
    <?php
    while ($row = mysqli_fetch_array($query_edit_comment_contest)) {
    ?>
    <!-- Add enctype for post file -->
    <form
        action="modules/comment-contest/handle.php?mabinhluansukien=<?php echo $_GET['mabinhluansukien'] ?>&id_user=<?php echo $_GET['id_user'] ?>"
        method="post" enctype="multipart/form-data">
        <tr>
            <td>Tài khoản</td>
            <td>
                <select name="mataikhoan" id="mataikhoan">
                    <?php
                        $sql_account = "SELECT * FROM taikhoan WHERE maloaitaikhoan != 1 AND maloaitaikhoan != 16";
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
            <td>Sự kiện</td>
            <td>
                <select name="masukien" id="masukien">
                    <?php
                        $sql_contest = "SELECT * FROM sukien";
                        $query_contest = mysqli_query($mysqli, $sql_contest);
                        while ($row_contest = mysqli_fetch_array($query_contest)) {
                            if ($row_contest['masukien'] == $row['masukien']) {
                        ?>
                    <option selected value="<?php echo $row_contest['masukien'] ?>">
                        <?php echo $row_contest['tieudesukien'] ?></option>
                    <?php
                            } else {
                            ?>
                    <option value="<?php echo $row_contest['masukien'] ?>">
                        <?php echo $row_contest['tieudesukien'] ?></option>
                    <?php
                            }
                        }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nội dung bình luận</td>
            <td><textarea name="noidungbinhluansukien" id="noidungbinhluansukien" cols="50" rows="3"
                    oninput="ktNoiDungBinhLuanSuKien()"><?php echo $row['noidungbinhluansukien'] ?></textarea>
                <p id="loi-noidungbinhluansukien" class="notify-error" style="display: none;">* Vui lòng nhập nội dung
                    bình luận!
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suabinhluansukien" value="Sửa bình luận sự kiện"></td>
        </tr>
    </form>
    <?php
    }
    ?>
</table>
<script src="modules/comment-contest/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_SESSION['vali_comment_contest']) && $_SESSION['vali_comment_contest'] == 1) {
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
        <?php unset($_SESSION['vali_comment_contest']); ?>
    }
})
</script>
<?php
}
?>