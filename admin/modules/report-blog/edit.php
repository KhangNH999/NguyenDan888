<?php
$sql_edit = "SELECT * FROM baocaoblog WHERE mabaocaoblog = '$_GET[mabaocaoblog]' LIMIT 1";
$query_edit = mysqli_query($mysqli, $sql_edit);
?>

<p class="title-handle">Sửa báo cáo blog</p>
<table class="main-handle">
    <?php
    while ($row = mysqli_fetch_array($query_edit)) {
    ?>
    <!-- Add enctype for post file -->
    <form
        action="modules/report-blog/handle.php?mabaocaoblog=<?php echo $_GET['mabaocaoblog'] ?>&id_user=<?php echo $_GET['id_user'] ?>"
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
            <td>Blog</td>
            <td>
                <select name="mablog" id="mablog">
                    <?php
                        $sql_blog = "SELECT * FROM blog";
                        $query_blog = mysqli_query($mysqli, $sql_blog);
                        while ($row_blog = mysqli_fetch_array($query_blog)) {
                            if ($row_blog['mablog'] == $row['mablog']) {
                        ?>
                    <option selected value="<?php echo $row_blog['mablog'] ?>">
                        <?php echo $row_blog['tieudeblog'] ?></option>
                    <?php
                            } else {
                            ?>
                    <option value="<?php echo $row_blog['mablog'] ?>">
                        <?php echo $row_blog['tieudeblog'] ?></option>
                    <?php
                            }
                        }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nội dung báo cáo</td>
            <td><textarea name="noidungbaocaoblog" id="noidungbaocaoblog" cols="50" rows="3"
                    oninput="ktNoiDungBaoCaoBlog()"><?php echo $row['noidungbaocaoblog'] ?></textarea>
                <p id="loi-noidungbaocaoblog" class="notify-error" style="display: none;">* Vui lòng nhập nội dung
                    báo cáo!
                </p>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrangbaocaoblog" id="tinhtrangbaocaoblog">
                    <?php
                        if ($row['tinhtrangbaocaoblog'] == 1) {
                        ?>
                    <option value="1" selected>Đã duyệt</option>
                    <option value="0">Chưa duyệt</option>
                    <?php
                        } else {
                        ?>
                    <option value="1">Đã duyệt</option>
                    <option value="0" selected>Chưa duyệt</option>
                    <?php
                        }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suabaocaoblog" value="Sửa báo cáo sân"></td>
        </tr>
    </form>
    <?php
    }
    ?>
</table>
<script src="modules/report-blog/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_SESSION['vali_report_blog']) && $_SESSION['vali_report_blog'] == 1) {
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
        <?php unset($_SESSION['vali_report_blog']); ?>
    }
})
</script>
<?php
}
?>