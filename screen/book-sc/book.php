<link rel="stylesheet" href="assets/css/book/book.css" />
<?php
//Kiểm tra đường dẫn
$matk = isset($_SESSION['id_khachhang']) ? $_SESSION['id_khachhang'] : '';
$idSan = isset($_GET['idSan']) ? $_GET['idSan'] : '';
$sql = "SELECT * FROM san WHERE masan = $idSan";
$query = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_array($query)) {
    $status = $row['tinhtrangsan'];
}
$time_now = date('H:i:s');
if ($matk == '') {
?>
<script>
window.location.href = "index.php?quanly=dangnhap";
</script>
<?php
}
if ($status == 0) {
?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}
$sql_check_own = "SELECT * FROM san WHERE mataikhoan = $matk";
$query_check_own = mysqli_query($mysqli, $sql_check_own);
while ($row_check_own = mysqli_fetch_array($query_check_own)) {
    if ($idSan == $row_check_own['masan']) {
        $_SESSION['setpitch_error'] = 1;
    ?>
<script>
window.location.href = "index.php?quanly=chitietdatsan&&idSan=<?php echo $idSan ?>";
</script>
<?php
    }
}
//-------------------------------------------------------
$sql_datlich = "SELECT * FROM san WHERE masan='$_GET[idSan]' LIMIT 1";
$query_datlich = mysqli_query($mysqli, $sql_datlich);
while ($row_datlich = mysqli_fetch_array($query_datlich)) {
    ?>
<form action="screen/book-sc/handle-book.php" autocomplete="off" method="post">
    <div id="center-book">
        <div class="title-book">
            <div class="title-book-first">
                <img src="assets/images/icons/alarm.gif" alt="Ảnh" style="width: 30px; height: 30px;">
                <span style="margin-left: 4px;">Đặt lịch</span>
            </div>
            <input type="hidden" name="mataikhoan" value="<?php echo $_SESSION['id_khachhang'] ?>">
            <input type="hidden" name="masan" value="<?php echo $_GET['idSan'] ?>">
            <table>
                <tr>
                    <th>Tên sân:</th>
                    <td><input type="text" name="" class="input-book" value="<?php echo $row_datlich['tensan'] ?>"
                            disabled></td>
                </tr>
                <tr>
                    <th>Giá thuê:</th>
                    <td><input type="text" name="" class="input-book"
                            value="<?php echo number_format($row_datlich['giathue'], 0, ',', '.') ?> vnđ" disabled>
                    </td>
                </tr>
                <tr>
                    <th>Địa điểm:</th>
                    <td><input type="text" name="" class="input-book" value="<?php echo $row_datlich['diachisan'] ?>"
                            disabled>
                    </td>
                </tr>
                <tr>
                    <th>Liên hệ:</th>
                    <td><input type="text" name="lienhe" class="input-book" value="<?php echo $_SESSION['ten'] ?>"
                            disabled>
                    </td>
                </tr>
                <tr>
                    <th>Số điện thoại:</th>
                    <td><input type="text" pattern="[0-9]+" name="sodienthoai" maxlength="10" class="input-book"
                            value="<?php echo $_SESSION['sodienthoai'] ?>" disabled></td>
                </tr>
                <tr>
                    <?php
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $min_day = date('Y-m-d');
                        ?>
                    <th>Chọn ngày</th>
                    <td class="book-date">
                        <input type="date" name="ngaydat" id="date" placeholder="dd-mm-yyyy" class="input-book"
                            min="<?php echo $min_day ?>"
                            value="<?php echo (isset($_GET['ngaydat'])) ? $_GET['ngaydat'] : '' ?>">
                        <button type="submit" name="chonngaydat">Chọn</button>
                    </td>
                </tr>
                <?php if (isset($_GET['ngaydat']) && $_GET['ngaydat'] != '') { ?>
                <tr>
                    <th>Chọn khung giờ</th>
                    <td>
                        <div class="input-book" style="background-color: #fff; padding: 8px 0;">
                            <div style="margin-bottom: 12px;">
                                <!-- Khung giờ 1 -->
                                <?php
                                        $sql_get_time_pitch_1 = "SELECT * FROM khunggio WHERE masan = '$_GET[idSan]' AND thutukhunggio = 1 LIMIT 1";
                                        $query_get_time_pitch_1 = mysqli_query($mysqli, $sql_get_time_pitch_1);
                                        while ($row_get_time_pitch_1 = mysqli_fetch_array($query_get_time_pitch_1)) {
                                            $sql_check_time_1 = "SELECT * FROM lichsudatsan 
                                            WHERE masan = $row_get_time_pitch_1[masan] 
                                            AND makhunggio = $row_get_time_pitch_1[makhunggio] 
                                            AND ngaydat = '$_GET[ngaydat]' LIMIT 1";
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
                                    <input type="radio" name="group_time"
                                        value="<?php echo $row_get_time_pitch_1['makhunggio'] ?>"
                                        <?php echo ($xacnhandatsan1 == 2) ? 'disabled' : ''; ?>>
                                    <?php echo date("H:i", strtotime($row_get_time_pitch_1['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_1['gioketthuc'])) ?></span>
                                <?php } ?>
                                <!-- Khung giờ 2 -->
                                <?php
                                        $sql_get_time_pitch_2 = "SELECT * FROM khunggio WHERE masan = '$_GET[idSan]' AND thutukhunggio = 2 LIMIT 1";
                                        $query_get_time_pitch_2 = mysqli_query($mysqli, $sql_get_time_pitch_2);
                                        while ($row_get_time_pitch_2 = mysqli_fetch_array($query_get_time_pitch_2)) {
                                            $sql_check_time_2 = "SELECT * FROM lichsudatsan 
                                            WHERE masan = $row_get_time_pitch_2[masan] 
                                            AND makhunggio = $row_get_time_pitch_2[makhunggio] 
                                            AND ngaydat = '$_GET[ngaydat]' LIMIT 1";
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
                                    <input type="radio" name="group_time"
                                        value="<?php echo $row_get_time_pitch_2['makhunggio'] ?>"
                                        <?php echo ($xacnhandatsan2 == 2) ? 'disabled' : ''; ?>>
                                    <?php echo date("H:i", strtotime($row_get_time_pitch_2['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_2['gioketthuc'])) ?></span>
                                <?php } ?>
                                <!-- Khung giờ 3 -->
                                <?php
                                        $sql_get_time_pitch_3 = "SELECT * FROM khunggio WHERE masan = '$_GET[idSan]' AND thutukhunggio = 3 LIMIT 1";
                                        $query_get_time_pitch_3 = mysqli_query($mysqli, $sql_get_time_pitch_3);
                                        while ($row_get_time_pitch_3 = mysqli_fetch_array($query_get_time_pitch_3)) {
                                            $sql_check_time_3 = "SELECT * FROM lichsudatsan 
                                            WHERE masan = $row_get_time_pitch_3[masan] 
                                            AND makhunggio = $row_get_time_pitch_3[makhunggio] 
                                            AND ngaydat = '$_GET[ngaydat]' LIMIT 1";
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
                                    <input type="radio" name="group_time"
                                        value="<?php echo $row_get_time_pitch_3['makhunggio'] ?>"
                                        <?php echo ($xacnhandatsan3 == 2) ? 'disabled' : ''; ?>>
                                    <?php echo date("H:i", strtotime($row_get_time_pitch_3['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_3['gioketthuc'])) ?></span>
                                <?php } ?>
                            </div>
                            <div>
                                <!-- Khung giờ 4 -->
                                <?php
                                        $sql_get_time_pitch_4 = "SELECT * FROM khunggio WHERE masan = '$_GET[idSan]' AND thutukhunggio = 4 LIMIT 1";
                                        $query_get_time_pitch_4 = mysqli_query($mysqli, $sql_get_time_pitch_4);
                                        while ($row_get_time_pitch_4 = mysqli_fetch_array($query_get_time_pitch_4)) {
                                            $sql_check_time_4 = "SELECT * FROM lichsudatsan 
                                            WHERE masan = $row_get_time_pitch_4[masan] 
                                            AND makhunggio = $row_get_time_pitch_4[makhunggio] 
                                            AND ngaydat = '$_GET[ngaydat]' LIMIT 1";
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
                                    <input type="radio" name="group_time"
                                        value="<?php echo $row_get_time_pitch_4['makhunggio'] ?>"
                                        <?php echo ($xacnhandatsan4 == 2) ? 'disabled' : ''; ?>>
                                    <?php echo date("H:i", strtotime($row_get_time_pitch_4['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_4['gioketthuc'])) ?></span>
                                <?php } ?>
                                <!-- Khung giờ 5 -->
                                <?php
                                        $sql_get_time_pitch_5 = "SELECT * FROM khunggio WHERE masan = '$_GET[idSan]' AND thutukhunggio = 5 LIMIT 1";
                                        $query_get_time_pitch_5 = mysqli_query($mysqli, $sql_get_time_pitch_5);
                                        while ($row_get_time_pitch_5 = mysqli_fetch_array($query_get_time_pitch_5)) {
                                            $sql_check_time_5 = "SELECT * FROM lichsudatsan 
                                            WHERE masan = $row_get_time_pitch_5[masan] 
                                            AND makhunggio = $row_get_time_pitch_5[makhunggio] 
                                            AND ngaydat = '$_GET[ngaydat]' LIMIT 1";
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
                                    <input type="radio" name="group_time"
                                        value="<?php echo $row_get_time_pitch_5['makhunggio'] ?>"
                                        <?php echo ($xacnhandatsan5 == 2) ? 'disabled' : ''; ?>>
                                    <?php echo date("H:i", strtotime($row_get_time_pitch_5['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_5['gioketthuc'])) ?></span>
                                <?php } ?>
                                <!-- Khung giờ 6 -->
                                <?php
                                        $sql_get_time_pitch_6 = "SELECT * FROM khunggio WHERE masan = '$_GET[idSan]' AND thutukhunggio = 6 LIMIT 1";
                                        $query_get_time_pitch_6 = mysqli_query($mysqli, $sql_get_time_pitch_6);
                                        while ($row_get_time_pitch_6 = mysqli_fetch_array($query_get_time_pitch_6)) {
                                            $sql_check_time_6 = "SELECT * FROM lichsudatsan 
                                            WHERE masan = $row_get_time_pitch_6[masan] 
                                            AND makhunggio = $row_get_time_pitch_6[makhunggio] 
                                            AND ngaydat = '$_GET[ngaydat]' LIMIT 1";
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
                                    <input type="radio" name="group_time"
                                        value="<?php echo $row_get_time_pitch_6['makhunggio'] ?>"
                                        <?php echo ($xacnhandatsan6 == 2) ? 'disabled' : ''; ?>>
                                    <?php echo date("H:i", strtotime($row_get_time_pitch_6['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_6['gioketthuc'])) ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <div id="apply-book">
                <!-- <a href="index.php?quanly=thanhtoan&&idSan=" class="book-input">Đặt
                    lịch</a> -->
                <input type="submit" value="Yêu cầu đặt sân" name="datlich" id="button-book">
                <a href="index.php?quanly=chitietdatsan&&idSan=<?php echo $row_datlich['masan'] ?>"
                    id="button-cancel-book">Hủy</a>
            </div>
        </div>
    </div>
</form>
<?php
}
?>
<div id="right">
    <?php include('screen/main-sc/recruit-main-sc.php') ?>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_SESSION['null_date']) && $_SESSION['null_date'] == 1) { ?>
<script>
Swal.fire({
    title: 'Lỗi nhập dữ liệu!',
    text: "Bạn chưa chọn ngày đặt sân!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['null_date']); ?>
    }
})
</script>
<?php } ?>
<?php if (isset($_SESSION['null_select_time']) && $_SESSION['null_select_time'] == 1) { ?>
<script>
Swal.fire({
    title: 'Lỗi nhập dữ liệu!',
    text: "Bạn chưa chọn khung giờ đặt sân!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['null_select_time']); ?>
    }
})
</script>
<?php } ?>
<?php if (isset($_SESSION['booked']) && $_SESSION['booked'] == 1) { ?>
<script>
Swal.fire({
    title: 'Lỗi!',
    text: "Bạn đã yêu cầu đặt sân khung giờ này rồi!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['booked']); ?>
    }
})
</script>
<?php } ?>