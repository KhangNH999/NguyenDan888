<?php
if (isset($_GET['action']) && $_GET['query']) {
    $tam = $_GET['action'];
    $query = $_GET['query'];
} else {
    $tam = '';
    $query = '';
}

$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
?>
<ul class="admin-list" data-aos="fade-right">
    <li <?php if ($tam == 'quanlyloaitaikhoan' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-users" style="padding:6px 6px 6px 4px"></i>
        <a href="index.php?action=quanlyloaitaikhoan&query=main&id_user=<?php echo $id_user ?>">Quản lý loại tài
            khoản</a>
    </li>
    <li <?php if ($tam == 'quanlytaikhoan' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-circle-user"></i>
        <a href="index.php?action=quanlytaikhoan&query=main&id_user=<?php echo $id_user ?>">Quản lý tài khoản</a>
    </li>
    <li <?php if ($tam == 'quanlysan' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-at"></i>
        <a href="index.php?action=quanlysan&query=main&id_user=<?php echo $id_user ?>">Quản lý sân</a>
    </li>
    <li <?php if ($tam == 'quanlylichsudatsan' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-clock-rotate-left"></i>
        <a href="index.php?action=quanlylichsudatsan&query=main&id_user=<?php echo $id_user ?>">Quản lý lịch sử đặt
            sân</a>
    </li>
    <li <?php if ($tam == 'quanlysukien' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-brands fa-squarespace"></i>
        <a href="index.php?action=quanlysukien&query=main&id_user=<?php echo $id_user ?>">Quản lý sự kiện</a>
    </li>
    <li <?php if ($tam == 'quanlythamgiasukien' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-angles-left"></i>
        <a href="index.php?action=quanlythamgiasukien&query=main&id_user=<?php echo $id_user ?>">Quản lý tham gia sự
            kiện</a>
    </li>
    <li <?php if ($tam == 'quanlyblog' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-blog"></i>
        <a href="index.php?action=quanlyblog&query=main&id_user=<?php echo $id_user ?>">Quản lý blog</a>
    </li>
    <li <?php if ($tam == 'quanlybinhluansan' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-comment-dots"></i>
        <a href="index.php?action=quanlybinhluansan&query=main&id_user=<?php echo $id_user ?>">Quản lý bình luận sân</a>
    </li>
    <li <?php if ($tam == 'quanlybinhluansukien' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-comment-medical"></i>
        <a href="index.php?action=quanlybinhluansukien&query=main&id_user=<?php echo $id_user ?>">Quản lý bình luận sự
            kiện</a>
    </li>
    <li <?php if ($tam == 'quanlybinhluanblog' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-brands fa-microblog"></i>
        <a href="index.php?action=quanlybinhluanblog&query=main&id_user=<?php echo $id_user ?>">Quản lý bình luận
            blog</a>
    </li>
    <li <?php if ($tam == 'quanlytheodoi' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-star"></i>
        <a href="index.php?action=quanlytheodoi&query=main&id_user=<?php echo $id_user ?>">Quản lý theo dõi</a>
    </li>
    <li <?php if ($tam == 'quanlyyeuthichsan' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-heart"></i>
        <a href="index.php?action=quanlyyeuthichsan&query=main&id_user=<?php echo $id_user ?>">Quản lý yêu thích sân</a>
    </li>
    <li <?php if ($tam == 'quanlyyeuthichblog' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-thumbs-up"></i>
        <a href="index.php?action=quanlyyeuthichblog&query=main&id_user=<?php echo $id_user ?>">Quản lý yêu thích
            blog</a>
    </li>
    <li <?php if ($tam == 'quanlythongbao' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-bell"></i>
        <a href="index.php?action=quanlythongbao&query=main&id_user=<?php echo $id_user ?>">Quản lý thông báo</a>
    </li>
    <li <?php if ($tam == 'quanlydanhgia' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-face-smile"></i>
        <a href="index.php?action=quanlydanhgia&query=main&id_user=<?php echo $id_user ?>">Quản lý đánh giá</a>
    </li>
    <li <?php if ($tam == 'quanlybaocaosan' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-circle-check"></i>
        <a href="index.php?action=quanlybaocaosan&query=main&id_user=<?php echo $id_user ?>">Quản lý báo cáo sân</a>
    </li>
    <li <?php if ($tam == 'quanlybaocaoblog' && ($query == 'main' || $query == 'add' || $query == 'edit')) {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-solid fa-square-check"></i>
        <a href="index.php?action=quanlybaocaoblog&query=main&id_user=<?php echo $id_user ?>">Quản lý báo cáo blog</a>
    </li>
    <li <?php if ($tam == 'quanlytuvankhachhang') {
            echo 'class="selected"';
        } else {
            echo '';
        } ?>>
        <i class="fa-sharp fa-solid fa-comments"></i>
        <a href="index.php?action=quanlytuvankhachhang&query=main&id_user=<?php echo $id_user ?>">Tư vấn khách hàng</a>
    </li>
</ul>