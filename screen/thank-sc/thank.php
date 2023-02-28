<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="assets/css/thank/thank.css">
<div id="center-thank">
    <p>Cảm ơn bạn đã đặt sân tại trang Web của chúng tôi, chúng tôi sẽ liên hệ với bạn sớm nhất.<a
            href="index.php?quanly=lichsudatsan">Xem lịch sử
            đặt sân</a></p>

</div>
<!-- Kiểm tra giao dịch thành công-->
<?php
if (isset($_GET['giaodich']) && $_GET['giaodich'] == 'thanhcong') {
?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Thành công',
    text: 'Giao dịch thành công.',
})
setTimeout(function() {
    window.location.href = "index.php?quanly=camon";
}, 3000);
</script>
<?php
}
?>