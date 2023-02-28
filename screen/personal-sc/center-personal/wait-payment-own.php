<link rel="stylesheet" href="assets/css/personal/wait-payment.css">
<?php
//Kiểm tra đường dẫn
$matk = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';


$sql_type = "SELECT maloaitaikhoan FROM taikhoan WHERE mataikhoan = $matk";
$query_type = mysqli_query($mysqli, $sql_type);
while ($row_type = mysqli_fetch_array($query_type)) {
    $maloaitaikhoan = $row_type['maloaitaikhoan'];
}

if ($matk == '' || $maloaitaikhoan == 2) {
?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}

?>
<div class="wait-payment-personal">
    <div class="title-wait-payment">
        <i class="fa-solid fa-circle-check"></i>
        <span>Duyệt đặt sân</span>
    </div>
    <div class="wait-payment-container">
        <div class="title-container">
            Duyệt yêu cầu
        </div>
        <div class="box-data">
            <ul>
                <?php
                $mataikhoan = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
                $list_wait_payment = "SELECT * FROM lichsudatsan, san, taikhoan, khunggio 
                WHERE lichsudatsan.mataikhoan = taikhoan.mataikhoan 
                AND lichsudatsan.masan = san.masan 
                AND lichsudatsan.makhunggio = khunggio.makhunggio 
                AND lichsudatsan.xacnhandatsan = 0
                AND san.mataikhoan = '$mataikhoan'
                ORDER BY lichsudatsan.malichsu DESC";
                $query_wait_payment = mysqli_query($mysqli, $list_wait_payment);
                $exis_wait_payment = mysqli_num_rows($query_wait_payment);
                if ($exis_wait_payment > 0) {
                    while ($row_wait_payment = mysqli_fetch_array($query_wait_payment)) {
                ?>
                <li>
                    <div class="control-wait-payment">
                        <form
                            action="screen/personal-sc/center-personal/handle-center-personal/handle-wait-payment-own.php"
                            method="post">
                            <input type="text" name="malichsu" style="display: none;"
                                value="<?php echo $row_wait_payment['malichsu'] ?>">
                            <button type="submit" class="confirm-btn-wait-payment" name="duyetyeucau"
                                title="Duyệt yêu cầu" style="height: 50%;"
                                onclick="return confirm('Bạn có muốn duyệt yêu cầu đặt sân này?')">
                                <i class="fa-solid fa-circle-check"></i>
                            </button>
                            <button type="submit" class="del-btn-wait-payment" name="huyyeucau" title="Hủy yêu cầu"
                                style="height: 50%;" onclick="return confirm('Bạn có muốn hủy yêu cầu đặt sân này?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-data">
                            <i class="fa-solid fa-paperclip"></i>
                            <a href="index.php?quanly=chitietdatsan&&idSan=<?php echo $row_wait_payment['masan'] ?>">
                                <?php echo $row_wait_payment['tieudesan'] ?>
                            </a>
                        </div>
                        <div class="title-data">
                            <i class="fa-solid fa-user"></i>
                            <img src="admin/modules/account/uploads-ac/<?php echo $row_wait_payment['hinhanh'] ?>"
                                alt="Ảnh">
                            <a href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_wait_payment['mataikhoan'] ?>"
                                style="font-size: 14px; font-weight: 300;">
                                <?php echo $row_wait_payment['ten'] ?>
                            </a>
                        </div>
                        <div class="content-data">
                            <i class="fa-sharp fa-solid fa-quote-right"></i>
                            <span
                                class="child-data"><?php echo date("d-m-Y", strtotime($row_wait_payment['ngaydat'])) ?></span>
                            <span
                                class="child-data"><?php echo date("H:i", strtotime($row_wait_payment['giobatdau'])) . ' - ' . date("H:i", strtotime($row_wait_payment['gioketthuc'])) ?></span>
                        </div>
                        <div class="content-data">
                            <i class="fa-solid fa-ellipsis"></i>
                            <a href="index.php?quanly=thanhtoan&&idSan=<?php echo $row_wait_payment['masan'] ?>&&idKhunggio=<?php echo $row_wait_payment['makhunggio'] ?>&&ngaydatsan=<?php echo $row_wait_payment['ngaydat'] ?>"
                                class="<?php echo ($row_wait_payment['xacnhandatsan'] == 0) ? 'lock-link' : 'open-link'; ?>">
                                Yêu cầu duyệt</a>
                        </div>
                        <div class="time-data">
                            <span><?php echo date('d-m-Y &#10059 H:i:s', strtotime($row_wait_payment['thoigiantaodatsan'])) ?></span>
                            <i class="fa-sharp fa-solid fa-clock"></i>
                        </div>
                    </div>
                </li>
                <?php
                    }
                } else {
                    ?>
                <li>
                    <div class="control-wait-payment">
                        <form action="" method="post">
                            <button type="submit" class="none-btn-wait-payment">
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-none">
                            Bạn chưa có yêu cầu đặt sân nào!
                        </div>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="wait-payment-container">
        <div class="title-container">
            Đợi thanh toán
        </div>
        <div class="box-data">
            <ul>
                <?php
                $mataikhoan = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
                $list_wait_payment = "SELECT * FROM lichsudatsan, san, taikhoan, khunggio 
                WHERE lichsudatsan.mataikhoan = taikhoan.mataikhoan 
                AND lichsudatsan.masan = san.masan 
                AND lichsudatsan.makhunggio = khunggio.makhunggio 
                AND lichsudatsan.xacnhandatsan = 1
                AND san.mataikhoan = '$mataikhoan'
                ORDER BY lichsudatsan.malichsu DESC";
                $query_wait_payment = mysqli_query($mysqli, $list_wait_payment);
                $exis_wait_payment = mysqli_num_rows($query_wait_payment);
                if ($exis_wait_payment > 0) {
                    while ($row_wait_payment = mysqli_fetch_array($query_wait_payment)) {
                ?>
                <li>
                    <div class="control-wait-payment">
                        <form
                            action="screen/personal-sc/center-personal/handle-center-personal/handle-wait-payment-own.php"
                            method="post">
                            <input type="text" name="malichsu" style="display: none;"
                                value="<?php echo $row_wait_payment['malichsu'] ?>">
                            <button type="submit" class="del-btn-wait-payment" name="huychothanhtoan"
                                title="Hủy chờ thanh toán đặt sân"
                                onclick="return confirm('Bạn có muốn hủy chờ thanh toán đặt sân này?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-data">
                            <i class="fa-solid fa-paperclip"></i>
                            <a href="index.php?quanly=chitietdatsan&&idSan=<?php echo $row_wait_payment['masan'] ?>">
                                <?php echo $row_wait_payment['tieudesan'] ?>
                            </a>
                        </div>
                        <div class="title-data">
                            <i class="fa-solid fa-user"></i>
                            <img src="admin/modules/account/uploads-ac/<?php echo $row_wait_payment['hinhanh'] ?>"
                                alt="Ảnh">
                            <a href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_wait_payment['mataikhoan'] ?>"
                                style="font-size: 14px; font-weight: 300;">
                                <?php echo $row_wait_payment['ten'] ?>
                            </a>
                        </div>
                        <div class="content-data">
                            <i class="fa-sharp fa-solid fa-quote-right"></i>
                            <span
                                class="child-data"><?php echo date("d-m-Y", strtotime($row_wait_payment['ngaydat'])) ?></span>
                            <span
                                class="child-data"><?php echo date("H:i", strtotime($row_wait_payment['giobatdau'])) . ' - ' . date("H:i", strtotime($row_wait_payment['gioketthuc'])) ?></span>
                        </div>
                        <div class="content-data">
                            <i class="fa-solid fa-ellipsis"></i>
                            <a href="index.php?quanly=thanhtoan&&idSan=<?php echo $row_wait_payment['masan'] ?>&&idKhunggio=<?php echo $row_wait_payment['makhunggio'] ?>&&ngaydatsan=<?php echo $row_wait_payment['ngaydat'] ?>"
                                class="<?php echo ($row_wait_payment['xacnhandatsan'] == 0) ? 'lock-link' : 'open-link'; ?>"
                                style="pointer-events: none;">
                                Đợi thanh toán</a>
                        </div>
                        <div class="time-data">
                            <span><?php echo date('d-m-Y &#10059 H:i:s', strtotime($row_wait_payment['thoigiantaodatsan'])) ?></span>
                            <i class="fa-sharp fa-solid fa-clock"></i>
                        </div>
                    </div>
                </li>
                <?php
                    }
                } else {
                    ?>
                <li>
                    <div class="control-wait-payment">
                        <form action="" method="post">
                            <button type="submit" class="none-btn-wait-payment">
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-none">
                            Bạn chưa có yêu cầu đặt sân nào!
                        </div>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_SESSION['his_exist']) && $_SESSION['his_exist'] == 1) { ?>
<script>
Swal.fire({
    title: 'Lỗi!',
    text: "Đã có người đặt khung giờ này rồi!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['his_exist']); ?>
    }
})
</script>
<?php } ?>