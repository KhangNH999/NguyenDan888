<?php
$mataikhoan = isset($_SESSION['id_khachhang']) ? $_SESSION['id_khachhang'] : '';
if (isset($_POST['confirm-pass'])) {
    $matkhau_cu = md5($_POST['old-pass']);
    $matkhau_moi = md5($_POST['new-pass']);
    $sql = "SELECT * FROM taikhoan WHERE mataikhoan='" . $mataikhoan . "' AND matkhau='" . $matkhau_cu . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $sql_update = mysqli_query($mysqli, "UPDATE taikhoan SET matkhau='" . $matkhau_moi . "' WHERE mataikhoan='" . $mataikhoan . "'");
?>
<script>
alert("Thay đổi mật khẩu thành công !");
</script>
<?php
    } else {
    ?>
<script>
window.location.href = "index.php?quanly=trangcuatoi";
alert("Tài khoản hoặc mật khẩu cũ không đúng, vui lòng nhập lại.");
</script>
<?php
    }
}
//Lấy count của blog
$sql_blog = "SELECT * FROM blog WHERE mataikhoan='" . $mataikhoan . "'";
$row_blog = mysqli_query($mysqli, $sql_blog);
$count_blog = mysqli_num_rows($row_blog);

//Kiểm tra đã đăng nhập chưa
if ($mataikhoan == '') {
    ?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}
?>
<div id="main-personal">
    <div id="left-personal">
        <nav id="left-menu">
            <?php
            $tam = (isset($_GET['quanly'])) ? $_GET['quanly'] : '';
            ?>
            <?php
            $sql_check_position = "SELECT maloaitaikhoan FROM taikhoan WHERE mataikhoan = $mataikhoan";
            $query_check_position = mysqli_query($mysqli, $sql_check_position);
            while ($row = mysqli_fetch_array($query_check_position)) {
                $loaitaikhoan = $row['maloaitaikhoan'];
            }
            ?>
            <?php if ($loaitaikhoan == 3) { ?>
            <ul>
                <li>
                    <?php
                        $sql_khunggio = "SELECT * FROM san WHERE mataikhoan = '$mataikhoan' AND tinhtrangkhunggio = 0";
                        $query_khunggio = mysqli_query($mysqli, $sql_khunggio);
                        $sql_tinhtrangsan = "SELECT * FROM san WHERE mataikhoan = '$mataikhoan' AND tinhtrangsan = 0 AND tinhtrangkhunggio = 1";
                        $query_tinhtrangsan = mysqli_query($mysqli, $sql_tinhtrangsan);
                        if (mysqli_fetch_array($query_khunggio) != null) { ?>
                    <a href="index.php?quanly=taosanbuoc2">
                        <i class="fa-solid fa-calendar-plus"></i>
                        <span>Tạo đặt sân</span>
                    </a>
                    <?php } else if (mysqli_fetch_array($query_tinhtrangsan) != null) { ?>
                    <a href="index.php?quanly=taosanbuoc3">
                        <i class="fa-solid fa-calendar-plus"></i>
                        <span>Tạo đặt sân</span>
                    </a>
                    <?php
                        } else { ?>
                    <a href="index.php?quanly=taosan">
                        <i class="fa-solid fa-calendar-plus"></i>
                        <span>Tạo đặt sân</span>
                    </a>
                    <?php
                        }
                        ?>
                </li>
                <li <?php echo ($tam == 'duyetdatsan') ? 'class="selected"' : ''; ?>>
                    <a href="index.php?quanly=duyetdatsan">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Duyệt đặt sân</span>
                    </a>
                </li>
                <li <?php echo ($tam == 'quanlysan') ? 'class="selected"' : ''; ?>>
                    <a href="index.php?quanly=quanlysan">
                        <i class="fa-solid fa-calendar-day"></i>
                        <span>Quản lý sân</span>
                    </a>
                </li>
            </ul>
            <?php } ?>
            <ul>
                <li <?php echo ($tam == 'choxacnhanthanhtoan') ? 'class="selected"' : ''; ?>>
                    <a href="index.php?quanly=choxacnhanthanhtoan">
                        <i class="fa-solid fa-circle-pause"></i>
                        <span>Chờ xác nhận</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?quanly=lichsudatsan">
                        <i class="fa-solid fa-credit-card"></i>
                        <span>Lịch sử đặt sân</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="index.php?quanly=taoblog">
                        <i class="fa-solid fa-pen"></i>
                        <span>Tạo Blog</span>
                    </a>
                </li>
                <li <?php echo ($tam == 'blogcuatoi') ? 'class="selected"' : ''; ?>>
                    <a href="index.php?quanly=blogcuatoi">
                        <i class="fa-solid fa-book-open"></i>
                        <span>Blog</span>
                        <span class="sum"><?php echo $count_blog; ?></span>
                    </a>
                </li>
            </ul>
            <ul>
                <?php if ($loaitaikhoan == 3) { ?>
                <li>
                    <a href="index.php?quanly=taosukien">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Tạo sự kiện</span>
                    </a>
                </li>
                <li <?php echo ($tam == 'quanlycuocthi') ? 'class="selected"' : ''; ?>>
                    <a href="index.php?quanly=quanlycuocthi">
                        <i class="fa-solid fa-calendar-week"></i>
                        <span>Quản lý sự kiện</span>
                    </a>
                </li>
                <?php } ?>
                <li <?php echo ($tam == 'lichsuthamgia') ? 'class="selected"' : ''; ?>>
                    <a href="index.php?quanly=lichsuthamgia">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span>Lịch sử tham gia</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li <?php echo ($tam == 'danhgia') ? 'class="selected"' : ''; ?>>
                    <a href="index.php?quanly=danhgia">
                        <i class="fa-solid fa-face-smile"></i>
                        <span>Đánh giá</span>
                    </a>
                </li>
                <li <?php echo ($tam == 'dadanhgia') ? 'class="selected"' : ''; ?>>
                    <a href="index.php?quanly=dadanhgia">
                        <i class="fa-solid fa-face-laugh"></i>
                        <span>Đã đánh giá</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li <?php echo ($tam == 'theodoi') ? 'class="selected"' : ''; ?>>
                    <a href="index.php?quanly=theodoi">
                        <i class="fa-solid fa-star"></i>
                        <span>Theo dõi</span>
                    </a>
                </li>
                <li <?php echo ($tam == 'dabinhluan') ? 'class="selected"' : ''; ?>>
                    <a href="index.php?quanly=dabinhluan">
                        <i class="fa-solid fa-comment"></i>
                        <span>Bình luận</span>
                    </a>
                </li>
                <li <?php echo ($tam == 'yeuthich') ? 'class="selected"' : ''; ?>>
                    <a href="index.php?quanly=yeuthich">
                        <i class="fa-solid fa-heart"></i>
                        <span>Yêu thích</span>
                    </a>
                </li>
                <li <?php echo ($tam == 'baocao') ? 'class="selected"' : ''; ?>>
                    <a href="index.php?quanly=baocao">
                        <i class="fa-solid fa-gear"></i>
                        <span>Báo cáo</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <?php
    if (isset($_GET['quanly'])) {
        $tam = $_GET['quanly'];
    } else {
        $tam = '';
    }
    if ($tam == 'trangcuatoi') {
        include('center-personal/my-account.php');
    } elseif ($tam == 'theodoi') {
        include('center-personal/follow-pitch.php');
    } elseif ($tam == 'blogcuatoi') {
        include('center-personal/blog-personal.php');
    } elseif ($tam == 'quanlysan') {
        include('center-personal/manager-pitch.php');
    } elseif ($tam == 'danhgia') {
        include('center-personal/rating.php');
    } elseif ($tam == 'quanlycuocthi') {
        include('center-personal/contest-personal.php');
    } elseif ($tam == 'lichsuthamgia') {
        include('center-personal/participation-history.php');
    } elseif ($tam == 'dadanhgia') {
        include('center-personal/rating-user.php');
    } elseif ($tam == 'yeuthich') {
        include('center-personal/favorite.php');
    } elseif ($tam == 'baocao') {
        include('center-personal/report.php');
    } elseif ($tam == 'dabinhluan') {
        include('center-personal/commented.php');
    } elseif ($tam == 'choxacnhanthanhtoan') {
        include('center-personal/wait-payment.php');
    } elseif ($tam == 'duyetdatsan') {
        include('center-personal/wait-payment-own.php');
    }
    ?>
</div>
<!-- Handle event click change-pass button -->
<script src="screen/personal-sc/change-pass.js"></script>
<div id="right">
    <?php include('screen/main-sc/recruit-main-sc.php') ?>
</div>