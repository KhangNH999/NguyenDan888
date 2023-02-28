<?php
$sql_edit_par_contest = "SELECT * FROM thamgiasukien WHERE mathamgia = '$_GET[mathamgia]' LIMIT 1";
$query_edit_par_contest = mysqli_query($mysqli, $sql_edit_par_contest);
?>

<p class="title-handle">Sửa tham gia sự kiện</p>
<table class="main-handle">
    <?php
    while ($row = mysqli_fetch_array($query_edit_par_contest)) {
    ?>
    <!-- Add enctype for post file -->
    <form
        action="modules/participation-contest/handle.php?mathamgia=<?php echo $_GET['mathamgia'] ?>&id_user=<?php echo $_GET['id_user'] ?>"
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
            <td>Vị trí tham gia</td>
            <td>
                <select name="vitrithamgia">
                    <option value="1" <?php echo ($row['vitrithamgia'] == 1) ? 'selected' : ''; ?>>
                        Đội 1</option>
                    <option value="2" <?php echo ($row['vitrithamgia'] == 2) ? 'selected' : ''; ?>>
                        Dự bị 1</option>
                    <option value="3" <?php echo ($row['vitrithamgia'] == 3) ? 'selected' : ''; ?>>
                        Đội 2</option>
                    <option value="4" <?php echo ($row['vitrithamgia'] == 4) ? 'selected' : ''; ?>>
                        Dự bị 2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suathamgiasukien" value="Sửa tham gia sự kiện"></td>
        </tr>
    </form>
    <?php
    }
    ?>
</table>