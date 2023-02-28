<link rel="stylesheet" href="assets/css/paymentMOMO/paymentMOMO.css" />
<?php
//Kiểm tra đường dẫn
$matk = isset($_SESSION['id_khachhang']) ? $_SESSION['id_khachhang'] : '';
$idSan = isset($_GET['idSan']) ? $_GET['idSan'] : '';
$idKhunggio = isset($_GET['idKhunggio']) ? $_GET['idKhunggio'] : '';
$ngaydatsan = isset($_GET['ngaydatsan']) ? $_GET['ngaydatsan'] : '';
$sql = "SELECT * FROM lichsudatsan WHERE masan = $idSan AND mataikhoan = $matk AND ngaydat='$ngaydatsan' AND makhunggio = $idKhunggio";
$query = mysqli_query($mysqli, $sql);
$count = mysqli_num_rows($query);

while ($row = mysqli_fetch_array($query)) {
    $status = $row['xacnhandatsan'];
}

if ($matk == '') {
?>
<script>
window.location.href = "index.php?quanly=dangnhap";
</script>
<?php
}

if ($count == 0 || $status != 1) {
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
//-----------------------------------------
$sql_payment = "SELECT * FROM lichsudatsan, san, taikhoan, khunggio 
WHERE lichsudatsan.mataikhoan = taikhoan.mataikhoan 
AND lichsudatsan.masan = san.masan 
AND lichsudatsan.makhunggio = khunggio.makhunggio 
AND lichsudatsan.masan='$_GET[idSan]' 
AND lichsudatsan.makhunggio = '$_GET[idKhunggio]'
AND lichsudatsan.ngaydat = '$_GET[ngaydatsan]' LIMIT 1";
$query_payment = mysqli_query($mysqli, $sql_payment);
while ($row_payment = mysqli_fetch_array($query_payment)) {
    ?>
<script type="text/javascript">
window.close();
</script>
<div id="center-payment">
    <div class="payment-pitch">
        <div class="title-info-pay">
            <img src="assets/images/icons/document.gif" alt="Ảnh" style="width: 30px; height: 30px;">
            <span style="margin-left: 4px;">Thông tin thanh toán</span>
        </div>
        <table>
            <tr>
                <th>Tên sân:</th>
                <td><input type="text" name="" id="input_info" value="<?php echo $row_payment['tensan'] ?>" disabled />
                </td>
            </tr>
            <tr>
                <th>Giá thuê sân:</th>
                <td><input type="text" name="" id="input_info"
                        value="<?php echo number_format($row_payment['giathue'], 0, ',', '.') ?> vnđ" disabled /></td>
            </tr>
            <tr>
                <th>Ngày đặt:</th>
                <td><input type="text" name="" id="input_info"
                        value="<?php echo date("d/m/Y", strtotime($row_payment['ngaydat'])) ?>" disabled /></td>
            </tr>
            <tr>
                <th>Khung giờ:</th>
                <td><input type="text" name="" id="input_info"
                        value="<?php echo date("H:i", strtotime($row_payment['giobatdau'])) . ' - ' . date("H:i", strtotime($row_payment['gioketthuc'])) ?>"
                        disabled /></td>
            </tr>
        </table>
        <div class="title-choosepay">
            <img src="assets/images/icons/pay-per-click.gif" alt="Ảnh" style="width: 30px; height: 30px;">
            <span style="margin-left: 4px;">Chọn phương thức thanh toán</span>
        </div>
        <div id="apply-payment">
            <div id="MoMo">
                <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                    action="screen/paymentMOMO-sc/paymentProMOMO.php">
                    <input type="hidden" name="masan" value="<?php echo $row_payment['masan'] ?>" />
                    <input type="hidden" name="giathue" value="<?php echo $row_payment['giathue'] ?>" />
                    <input type="hidden" name="ngaydat" value="<?php echo $row_payment['ngaydat'] ?>" />
                    <input type="hidden" name="makhunggio" value="<?php echo $row_payment['makhunggio'] ?>" />
                    <input type="image" src="assets/images/payment/MoMo_Logo.png" class="payment-MoMo" />
                    <!-- <a href="screen/paymentMOMO-sc/paymentProMOMO.php" class="payment-input">Xác nhận</a> -->
                    <p>MoMo</p>
                </form>
            </div>
            <div id="VnPay">
                <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                    action="screen/VnPay-sc/VnPay.php">
                    <input type="hidden" name="masan" value="<?php echo $row_payment['masan'] ?>" />
                    <input type="hidden" name="giathue" value="<?php echo $row_payment['giathue'] ?>" />
                    <input type="hidden" name="ngaydat" value="<?php echo $row_payment['ngaydat'] ?>" />
                    <input type="hidden" name="makhunggio" value="<?php echo $row_payment['makhunggio'] ?>" />
                    <input type="submit" src="assets/images/payment/vnpay.png" class="payment-VnPay" name="redirect" />
                    <!-- <a href="screen/paymentMOMO-sc/paymentProMOMO.php" class="payment-input">Xác nhận</a> -->
                    <p>VnPay</p>
                </form>
            </div>
        </div>
        <a href="index.php?quanly=choxacnhanthanhtoan" class="payment-cancel-input">Quay
            lại</a>
    </div>
</div>
<?php
    $_SESSION['masan'] = $row_payment['masan'];
    $_SESSION['ngaydat'] = $row_payment['ngaydat'];
    $_SESSION['makhunggio'] = $row_payment['makhunggio'];
}
?>
<div id="right">
    <?php include('screen/main-sc/recruit-main-sc.php') ?>
</div>