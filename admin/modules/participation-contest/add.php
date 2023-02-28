<p class="title-handle">Thêm tham gia sự kiện</p>
<table class="main-handle">
    <!-- Add enctype for post file -->
    <form action="modules/participation-contest/handle.php?id_user=<?php echo $_GET['id_user'] ?>" method="post"
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
            <td>Sự kiện</td>
            <td>
                <select name="masukien" id="masukien">
                    <?php
                    $sql_contest = "SELECT * FROM sukien";
                    $query_contest = mysqli_query($mysqli, $sql_contest);
                    while ($row_contest = mysqli_fetch_array($query_contest)) {
                    ?>
                    <option value="<?php echo $row_contest['masukien'] ?>">
                        <?php echo $row_contest['tieudesukien'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Vị trí tham gia</td>
            <td>
                <select name="vitrithamgia">
                    <option value="1">Đội 1</option>
                    <option value="2">Dự bị 1</option>
                    <option value="3">Đội 2</option>
                    <option value="4">Dự bị 2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themthamgiasukien" value="Thêm tham gia sự kiện"></td>
        </tr>
    </form>
</table>