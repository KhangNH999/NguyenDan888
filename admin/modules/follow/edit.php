<?php
$sql_edit_follow = "SELECT * FROM theodoi WHERE matheodoi = '$_GET[matheodoi]' LIMIT 1";
$query_edit_follow = mysqli_query($mysqli, $sql_edit_follow);
?>

<p class="title-handle">Sửa theo dõi</p>
<table class="main-handle">
    <?php
    while ($row = mysqli_fetch_array($query_edit_follow)) {
    ?>
    <!-- Add enctype for post file -->
    <form
        action="modules/follow/handle.php?matheodoi=<?php echo $_GET['matheodoi'] ?>&id_user=<?php echo $_GET['id_user'] ?>"
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
            <td>Sân</td>
            <td>
                <select name="masan" id="masan">
                    <?php
                        $sql_pitch = "SELECT * FROM san";
                        $query_pitch = mysqli_query($mysqli, $sql_pitch);
                        while ($row_pitch = mysqli_fetch_array($query_pitch)) {
                            if ($row_pitch['masan'] == $row['masan']) {
                        ?>
                    <option selected value="<?php echo $row_pitch['masan'] ?>">
                        <?php echo $row_pitch['tensan'] ?></option>
                    <?php
                            } else {
                            ?>
                    <option value="<?php echo $row_pitch['masan'] ?>">
                        <?php echo $row_pitch['tensan'] ?></option>
                    <?php
                            }
                        }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suatheodoi" value="Sửa theo dõi"></td>
        </tr>
    </form>
    <?php
    }
    ?>
</table>