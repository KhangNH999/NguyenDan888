<?php
$malichsu = (isset($_GET['malichsu'])) ? $_GET['malichsu'] : '';
$sql_edit_setpitch_his = "SELECT * FROM lichsudatsan WHERE malichsu = $malichsu LIMIT 1";
$query_edit_setpitch_his = mysqli_query($mysqli, $sql_edit_setpitch_his);
?>

<p class="title-handle">Sửa lịch sử đặt sân</p>
<?php
while ($row = mysqli_fetch_array($query_edit_setpitch_his)) {
?>
<table class="main-handle" style="margin-bottom: 20px;">
    <form action="modules/setpitch-his/handle-time.php?&id_user=<?php echo $_GET['id_user'] ?>" method="post">
        <tr>
            <td>Sân</td>
            <td>
                <?php
                    $idSan = (isset($_GET['idSan'])) ? $_GET['idSan'] : $row['masan'];
                    $ngaydat = (isset($_GET['ngaydatsan'])) ? $_GET['ngaydatsan'] : $row['ngaydat'];
                    $sql_pitch = "SELECT * FROM san WHERE masan = $idSan";
                    $query_pitch = mysqli_query($mysqli, $sql_pitch);
                    while ($row_pitch = mysqli_fetch_array($query_pitch)) {
                    ?>
                <input value="<?php echo $row_pitch['tieudesan'] ?>" disabled>
                <?php
                    }
                    ?>
            </td>
        </tr>
        <tr>
            <?php
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $min_day = date('Y-m-d');
                ?>
            <td>Ngày đặt</td>
            <td><input type="date" name="ngaydat" min="<?php echo $min_day ?>"
                    value="<?php echo ($ngaydat != '') ? $ngaydat : ''; ?>" onchange="hiddenTable();"></td>
        </tr>
        <input type="hidden" name="malichsu" value="<?php echo $malichsu ?>">
        <tr>
            <td colspan="2">
                <input type="submit" name="laykhunggiosua" value="Tiếp tục">
            </td>
        </tr>
    </form>
</table>
<?php
    if ($ngaydat != '') {
    ?>
<table class="main-handle" id="table-step-2">
    <!-- Add enctype for post file -->
    <form action="modules/setpitch-his/handle.php?&id_user=<?php echo $_GET['id_user'] ?>" method="post"
        enctype="multipart/form-data">
        <input type="hidden" name="malichsu" value="<?php echo $malichsu ?>">
        <input type="hidden" name="ngaydat" value="<?php echo $ngaydat ?>">
        <tr>
            <td>Khung giờ</td>
            <td>
                <div style="margin-bottom: 10px;">
                    <!-- Khung giờ 1 -->
                    <?php
                            $sql_get_time_pitch_1 = "SELECT * FROM khunggio WHERE masan = $idSan AND thutukhunggio = 1 LIMIT 1";
                            $query_get_time_pitch_1 = mysqli_query($mysqli, $sql_get_time_pitch_1);
                            while ($row_get_time_pitch_1 = mysqli_fetch_array($query_get_time_pitch_1)) {
                                $sql_check_time_1 = "SELECT * FROM lichsudatsan 
                                            WHERE masan = $row_get_time_pitch_1[masan] 
                                            AND makhunggio = $row_get_time_pitch_1[makhunggio] 
                                            AND ngaydat = '$ngaydat' LIMIT 1";
                                $query_check_time_1 = mysqli_query($mysqli, $sql_check_time_1);
                                $count_check_time_1 = mysqli_num_rows($query_check_time_1);
                                if ($count_check_time_1 > 0) {
                                    while ($row_check_time_1 = mysqli_fetch_array($query_check_time_1)) {
                                        $xacnhandatsan1 = $row_check_time_1['xacnhandatsan'];
                                    }
                                } else {
                                    $xacnhandatsan1 = 0;
                                }
                            ?>
                    <span class="input-time <?php echo ($xacnhandatsan1 == 2) ? 'time-lock' : ''; ?>">
                        <input type="radio" name="group_time" value="<?php echo $row_get_time_pitch_1['makhunggio'] ?>"
                            <?php echo ($xacnhandatsan1 == 2) ? 'disabled' : ''; ?>>
                        <?php echo date("H:i", strtotime($row_get_time_pitch_1['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_1['gioketthuc'])) ?></span>
                    <?php } ?>
                    <!-- Khung giờ 2 -->
                    <?php
                            $sql_get_time_pitch_2 = "SELECT * FROM khunggio WHERE masan = $idSan AND thutukhunggio = 2 LIMIT 1";
                            $query_get_time_pitch_2 = mysqli_query($mysqli, $sql_get_time_pitch_2);
                            while ($row_get_time_pitch_2 = mysqli_fetch_array($query_get_time_pitch_2)) {
                                $sql_check_time_2 = "SELECT * FROM lichsudatsan 
                                            WHERE masan = $row_get_time_pitch_2[masan] 
                                            AND makhunggio = $row_get_time_pitch_2[makhunggio] 
                                            AND ngaydat = '$ngaydat' LIMIT 1";
                                $query_check_time_2 = mysqli_query($mysqli, $sql_check_time_2);
                                $count_check_time_2 = mysqli_num_rows($query_check_time_2);
                                if ($count_check_time_2 > 0) {
                                    while ($row_check_time_2 = mysqli_fetch_array($query_check_time_2)) {
                                        $xacnhandatsan2 = $row_check_time_2['xacnhandatsan'];
                                    }
                                } else {
                                    $xacnhandatsan2 = 0;
                                }
                            ?>
                    <span class="input-time <?php echo ($xacnhandatsan2 == 2) ? 'time-lock' : ''; ?>">
                        <input type="radio" name="group_time" value="<?php echo $row_get_time_pitch_2['makhunggio'] ?>"
                            <?php echo ($xacnhandatsan2 == 2) ? 'disabled' : ''; ?>>
                        <?php echo date("H:i", strtotime($row_get_time_pitch_2['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_2['gioketthuc'])) ?></span>
                    <?php } ?>
                    <!-- Khung giờ 3 -->
                    <?php
                            $sql_get_time_pitch_3 = "SELECT * FROM khunggio WHERE masan = $idSan AND thutukhunggio = 3 LIMIT 1";
                            $query_get_time_pitch_3 = mysqli_query($mysqli, $sql_get_time_pitch_3);
                            while ($row_get_time_pitch_3 = mysqli_fetch_array($query_get_time_pitch_3)) {
                                $sql_check_time_3 = "SELECT * FROM lichsudatsan 
                                            WHERE masan = $row_get_time_pitch_3[masan] 
                                            AND makhunggio = $row_get_time_pitch_3[makhunggio] 
                                            AND ngaydat = '$ngaydat' LIMIT 1";
                                $query_check_time_3 = mysqli_query($mysqli, $sql_check_time_3);
                                $count_check_time_3 = mysqli_num_rows($query_check_time_3);
                                if ($count_check_time_3 > 0) {
                                    while ($row_check_time_3 = mysqli_fetch_array($query_check_time_3)) {
                                        $xacnhandatsan3 = $row_check_time_3['xacnhandatsan'];
                                    }
                                } else {
                                    $xacnhandatsan3 = 0;
                                }
                            ?>
                    <span class="input-time <?php echo ($xacnhandatsan3 == 2) ? 'time-lock' : ''; ?>">
                        <input type="radio" name="group_time" value="<?php echo $row_get_time_pitch_3['makhunggio'] ?>"
                            <?php echo ($xacnhandatsan3 == 2) ? 'disabled' : ''; ?>>
                        <?php echo date("H:i", strtotime($row_get_time_pitch_3['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_3['gioketthuc'])) ?></span>
                    <?php } ?>
                </div>
                <div>
                    <!-- Khung giờ 4 -->
                    <?php
                            $sql_get_time_pitch_4 = "SELECT * FROM khunggio WHERE masan = $idSan AND thutukhunggio = 4 LIMIT 1";
                            $query_get_time_pitch_4 = mysqli_query($mysqli, $sql_get_time_pitch_4);
                            while ($row_get_time_pitch_4 = mysqli_fetch_array($query_get_time_pitch_4)) {
                                $sql_check_time_4 = "SELECT * FROM lichsudatsan 
                                            WHERE masan = $row_get_time_pitch_4[masan] 
                                            AND makhunggio = $row_get_time_pitch_4[makhunggio] 
                                            AND ngaydat = '$ngaydat' LIMIT 1";
                                $query_check_time_4 = mysqli_query($mysqli, $sql_check_time_4);
                                $count_check_time_4 = mysqli_num_rows($query_check_time_4);
                                if ($count_check_time_4 > 0) {
                                    while ($row_check_time_4 = mysqli_fetch_array($query_check_time_4)) {
                                        $xacnhandatsan4 = $row_check_time_4['xacnhandatsan'];
                                    }
                                } else {
                                    $xacnhandatsan4 = 0;
                                }
                            ?>
                    <span class="input-time <?php echo ($xacnhandatsan4 == 2) ? 'time-lock' : ''; ?>">
                        <input type="radio" name="group_time" value="<?php echo $row_get_time_pitch_4['makhunggio'] ?>"
                            <?php echo ($xacnhandatsan4 == 2) ? 'disabled' : ''; ?>>
                        <?php echo date("H:i", strtotime($row_get_time_pitch_4['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_4['gioketthuc'])) ?></span>
                    <?php } ?>
                    <!-- Khung giờ 5 -->
                    <?php
                            $sql_get_time_pitch_5 = "SELECT * FROM khunggio WHERE masan = $idSan AND thutukhunggio = 5 LIMIT 1";
                            $query_get_time_pitch_5 = mysqli_query($mysqli, $sql_get_time_pitch_5);
                            while ($row_get_time_pitch_5 = mysqli_fetch_array($query_get_time_pitch_5)) {
                                $sql_check_time_5 = "SELECT * FROM lichsudatsan 
                                            WHERE masan = $row_get_time_pitch_5[masan] 
                                            AND makhunggio = $row_get_time_pitch_5[makhunggio] 
                                            AND ngaydat = '$ngaydat' LIMIT 1";
                                $query_check_time_5 = mysqli_query($mysqli, $sql_check_time_5);
                                $count_check_time_5 = mysqli_num_rows($query_check_time_5);
                                if ($count_check_time_5 > 0) {
                                    while ($row_check_time_5 = mysqli_fetch_array($query_check_time_5)) {
                                        $xacnhandatsan5 = $row_check_time_5['xacnhandatsan'];
                                    }
                                } else {
                                    $xacnhandatsan5 = 0;
                                }
                            ?>
                    <span class="input-time <?php echo ($xacnhandatsan5 == 2) ? 'time-lock' : ''; ?>">
                        <input type="radio" name="group_time" value="<?php echo $row_get_time_pitch_5['makhunggio'] ?>"
                            <?php echo ($xacnhandatsan5 == 2) ? 'disabled' : ''; ?>>
                        <?php echo date("H:i", strtotime($row_get_time_pitch_5['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_5['gioketthuc'])) ?></span>
                    <?php } ?>
                    <!-- Khung giờ 6 -->
                    <?php
                            $sql_get_time_pitch_6 = "SELECT * FROM khunggio WHERE masan = $idSan AND thutukhunggio = 6 LIMIT 1";
                            $query_get_time_pitch_6 = mysqli_query($mysqli, $sql_get_time_pitch_6);
                            while ($row_get_time_pitch_6 = mysqli_fetch_array($query_get_time_pitch_6)) {
                                $sql_check_time_6 = "SELECT * FROM lichsudatsan 
                                            WHERE masan = $row_get_time_pitch_6[masan] 
                                            AND makhunggio = $row_get_time_pitch_6[makhunggio] 
                                            AND ngaydat = '$ngaydat' LIMIT 1";
                                $query_check_time_6 = mysqli_query($mysqli, $sql_check_time_6);
                                $count_check_time_6 = mysqli_num_rows($query_check_time_6);
                                if ($count_check_time_6 > 0) {
                                    while ($row_check_time_6 = mysqli_fetch_array($query_check_time_6)) {
                                        $xacnhandatsan6 = $row_check_time_6['xacnhandatsan'];
                                    }
                                } else {
                                    $xacnhandatsan6 = 0;
                                }
                            ?>
                    <span class="input-time <?php echo ($xacnhandatsan6 == 2) ? 'time-lock' : ''; ?>">
                        <input type="radio" name="group_time" value="<?php echo $row_get_time_pitch_6['makhunggio'] ?>"
                            <?php echo ($xacnhandatsan6 == 2) ? 'disabled' : ''; ?>>
                        <?php echo date("H:i", strtotime($row_get_time_pitch_6['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_6['gioketthuc'])) ?></span>
                    <?php } ?>
            </td>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td>
                <?php
                        $sql_account = "SELECT * FROM taikhoan WHERE mataikhoan = $row[mataikhoan]";
                        $query_account = mysqli_query($mysqli, $sql_account);
                        while ($row_ac = mysqli_fetch_array($query_account)) {
                        ?>
                <input value="<?php echo $row_ac['ten'] ?>" disabled>
                <?php
                        }
                        ?>

            </td>
        </tr>
        <tr>
            <td>Ngày/Giờ đã chọn</td>
            <td>
                <div style="display: flex; ">
                    <div class="input-time time-added"><?php echo $row['ngaydat'] ?></div>
                    <?php
                            $sql_time = "SELECT * FROM khunggio WHERE makhunggio = $row[makhunggio]";
                            $query_time = mysqli_query($mysqli, $sql_time);
                            while ($row_time = mysqli_fetch_array($query_time)) {
                            ?>
                    <div class="input-time time-added">
                        <?php echo date("H:i", strtotime($row_time['giobatdau'])) . ' - ' . date("H:i", strtotime($row_time['gioketthuc'])) ?>
                    </div>
                    <?php } ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Hình thức thanh toán</td>
            <td><input type="text" name="hinhthucthanhtoan" step="2" id="hinhthucthanhtoan"
                    value="<?php echo $row['hinhthucthanhtoan'] ?>" oninput="ktHinhThucThanhToan()">
                <p id="loi-hinhthucthanhtoan" class="notify-error" style="display: none;">* Vui lòng nhập hình thức
                    thanh toán!
                </p>
            </td>
        </tr>
        <tr>
            <td>Tình trạng lịch sử</td>
            <td>
                <select name="xacnhanthanhtoan" id="xacnhanthanhtoan">
                    <option value="0" <?php echo ($row['xacnhandatsan'] == 0) ? 'selected' : ''; ?>>Yêu cầu đặt sân
                    </option>
                    <option value="1" <?php echo ($row['xacnhandatsan'] == 1) ? 'selected' : ''; ?>>Chờ thanh toán
                    </option>
                    <option value="2" <?php echo ($row['xacnhandatsan'] == 2) ? 'selected' : ''; ?>>Đã thanh toán
                    </option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="sualichsudatsan" value="Sửa lịch sử đặt sân"></td>
        </tr>
    </form>
</table>
<?php
    }
}
?>
<script src="modules/setpitch-his/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_SESSION['vali_his']) && $_SESSION['vali_his'] == 1) {
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
        <?php unset($_SESSION['vali_his']); ?>
    }
})
</script>
<?php
}
?>