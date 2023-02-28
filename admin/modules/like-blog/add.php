<p class="title-handle">Thêm yêu thích Blog</p>
<table class="main-handle">
    <!-- Add enctype for post file -->
    <form action="modules/like-blog/handle.php?id_user=<?php echo $_GET['id_user'] ?>" method="post"
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
            <td colspan="2"><input type="submit" name="themyeuthichblog" value="Thêm yêu thích Blog"></td>
        </tr>
    </form>
</table>