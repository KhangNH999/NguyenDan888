<p class="title-handle">Thêm bình luận blog</p>
<table class="main-handle">
    <!-- Add enctype for post file -->
    <form action="modules/comment-blog/handle.php?id_user=<?php echo $_GET['id_user'] ?>" method="post"
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
            <td>Tiêu đề blog</td>
            <td>
                <select name="mablog" id="mablog">
                    <?php
                    $sql_blog = "SELECT * FROM blog";
                    $query_blog = mysqli_query($mysqli, $sql_blog);
                    while ($row_blog = mysqli_fetch_array($query_blog)) {
                    ?>
                    <option value="<?php echo $row_blog['mablog'] ?>">
                        <?php echo $row_blog['tieudeblog'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nội dung bình luận</td>
            <td><textarea name="noidungbinhluanblog" id="noidungbinhluanblog" cols="50" rows="3"
                    oninput="ktNoiDungBinhLuanBlog()"></textarea>
                <p id="loi-noidungbinhluanblog" class="notify-error" style="display: block;">* Vui lòng nhập nội dung
                    bình luận!
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="thembinhluanblog" value="Thêm bình luận blog"></td>
        </tr>
    </form>
</table>
<script src="modules/comment-blog/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_SESSION['vali_comment_blog']) && $_SESSION['vali_comment_blog'] == 1) {
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
        <?php unset($_SESSION['vali_comment_blog']); ?>
    }
})
</script>
<?php
}
?>