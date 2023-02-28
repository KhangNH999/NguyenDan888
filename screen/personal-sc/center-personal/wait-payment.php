<link rel="stylesheet" href="assets/css/personal/wait-payment.css">
<div class="wait-payment-personal">
    <div class="title-wait-payment">
        <i class="fa-solid fa-circle-pause"></i>
        <span>Chờ xác nhận thanh toán</span>
    </div>
    <div class="wait-payment-container">
        <div class="box-data">
            <ul>
                <?php
                $mataikhoan = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
                $list_wait_payment = "SELECT * FROM lichsudatsan, san, taikhoan, khunggio 
                WHERE lichsudatsan.mataikhoan = taikhoan.mataikhoan 
                AND lichsudatsan.masan = san.masan 
                AND lichsudatsan.makhunggio = khunggio.makhunggio 
                AND (lichsudatsan.xacnhandatsan = 0
                OR lichsudatsan.xacnhandatsan = 1)
                AND lichsudatsan.mataikhoan = '$mataikhoan'
                ORDER BY lichsudatsan.malichsu DESC";
                $query_wait_payment = mysqli_query($mysqli, $list_wait_payment);
                $exis_wait_payment = mysqli_num_rows($query_wait_payment);
                if ($exis_wait_payment > 0) {
                    while ($row_wait_payment = mysqli_fetch_array($query_wait_payment)) {
                ?>
                <li>
                    <div class="control-wait-payment">
                        <form action="screen/personal-sc/center-personal/handle-center-personal/handle-wait-payment.php"
                            method="post">
                            <input type="text" name="malichsu" style="display: none;"
                                value="<?php echo $row_wait_payment['malichsu'] ?>">
                            <button type="submit" class="del-btn-wait-payment" name="xoalichsudatsan"
                                title="Xóa lịch sử đặt sân"
                                onclick="return confirm('Bạn có muốn xóa lịch sử đặt sân này?')">
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
                                <?php echo ($row_wait_payment['xacnhandatsan'] == 0) ? 'Đang yêu cầu' : 'Có thể thanh toán'; ?></a>
                            <?php if ($row_wait_payment['xacnhandatsan'] == 1) { ?>
                            <span class="child-link">
                                <i class="fa-solid fa-arrow-left"></i> Click vào đây để thanh toán
                            </span>
                            <?php } ?>
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
                            Bạn chưa tạo yêu cầu đặt sân nào!
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
<?php if (isset($_SESSION['book_success']) && $_SESSION['book_success'] == 1) { ?>
<script>
Swal.fire({
    title: 'Thành công!',
    text: "Bạn yêu cầu đặt lịch thành công!",
    icon: 'success',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['book_success']); ?>
    }
})
</script>
<?php } ?>