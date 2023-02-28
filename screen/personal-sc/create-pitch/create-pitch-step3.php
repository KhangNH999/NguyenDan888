<?php
//Kiểm tra đường dẫn
$matk = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';


$sql_type = "SELECT * FROM taikhoan WHERE mataikhoan = $matk";
$query_type = mysqli_query($mysqli, $sql_type);
while ($row_type = mysqli_fetch_array($query_type)) {
    $maloaitaikhoan = $row_type['maloaitaikhoan'];
}

$sql_get_masan = "SELECT * FROM san WHERE mataikhoan = $matk AND tinhtrangkhunggio = 1 LIMIT 1";
$query_get_masan = mysqli_query($mysqli, $sql_get_masan);
while ($row_get_masan = mysqli_fetch_array($query_get_masan)) {
    $masan = $row_get_masan['masan'];
}
if ($masan == '') {
?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}

if ($matk == '' || $maloaitaikhoan == 2) {
?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}
?>

<link rel="stylesheet" href="assets/css/personal/create-pitch.css">
<div class="create-pitch">
    <ul class="post-step">
        <li class="now">
            <span class="step">1</span>
            <p>Nhập thông tin tạo sân</p>
        </li>
        <li class="dot now">
            <i class="fa-solid fa-ellipsis"></i>
        </li>
        <li class="now">
            <span class="step">2</span>
            <p>Chọn khung giờ</p>
        </li>
        <li class="dot now">
            <i class="fa-solid fa-ellipsis"></i>
        </li>
        <li class="now">
            <span class="step">2</span>
            <p>Đợi xác nhận thông tin</p>
        </li>
    </ul>
    <section class="post">
        <div class="title-step2">
            <h3>Quá trình tạo sân đang thực hiện</h3>
        </div>
        <div class="content-step2">
            <h3>Admin đang xác nhận thông tin ...</h3>
            <h3>Hệ thống sẽ tự động chuyển hướng khi xác nhận xong</h3>
        </div>
    </section>
</div>