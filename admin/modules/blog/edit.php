<?php
$sql_edit_blog = "SELECT * FROM blog WHERE mablog = '$_GET[mablog]' LIMIT 1";
$query_edit_blog = mysqli_query($mysqli, $sql_edit_blog);
?>

<p class="title-handle">Sửa blog</p>
<table class="main-handle">
    <?php
    while ($row = mysqli_fetch_array($query_edit_blog)) {
    ?>
    <!-- Add enctype for post file -->
    <form action="modules/blog/handle.php?mablog=<?php echo $_GET['mablog'] ?>&id_user=<?php echo $_GET['id_user'] ?>"
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
            <td>Tiêu đề blog</td>
            <td><textarea name="tieudeblog" id="tieudeblog" cols="50" rows="3" id="tieudeblog"
                    oninput="ktTieuDeBlog()"><?php echo $row['tieudeblog'] ?></textarea>
                <p id="loi-tieudeblog" class="notify-error" style="display: none;">* Vui lòng nhập tiêu đề Blog!
                </p>
            </td>
        </tr>
        <tr>
            <td>Nội dung blog</td>
            <td><textarea name="noidungblog" id="noidungblog" cols="50" rows="3" id="noidungblog"
                    oninput="ktNoiDungBlog()"><?php echo $row['noidungblog'] ?></textarea>
                <p id="loi-noidungblog" class="notify-error" style="display: block;">* Bắt buộc!
                </p>
            </td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanhblog">
                <img src="modules/blog/uploads-blog/<?php echo $row['hinhanhblog'] ?>"
                    alt="<?php echo $row['hinhanhblog'] ?>" width="50px">
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrangblog" id="tinhtrangblog">
                    <?php
                        if ($row['tinhtrangblog'] == 1) {
                        ?>
                    <option value="1" selected>Hoạt động</option>
                    <option value="0">Khóa</option>
                    <?php
                        } else {
                        ?>
                    <option value="1">Hoạt động</option>
                    <option value="0" selected>Khóa</option>
                    <?php
                        }
                        ?>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="suablog" value="Sửa blog"></td>
        </tr>
    </form>
    <?php
    }
    ?>
</table>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('noidungblog');
</script>
<script src="modules/blog/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_SESSION['validation_blog']) && $_SESSION['validation_blog'] == 1) {
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
        <?php unset($_SESSION['validation_blog']); ?>
    }
})
</script>
<?php
}
?>