<link rel="stylesheet" href="assets/css/userProfile/userProfile.css">
<div id="main-userProfile">
    <div id="left-userProfile">
        <?php
        //Lấy count của blog
        $sql_blog = "SELECT * FROM blog WHERE mataikhoan='$_GET[idAcc]'";
        $row_blog = mysqli_query($mysqli, $sql_blog);
        $count_blog = mysqli_num_rows($row_blog);
        ?>
        <nav id="left-menu">
            <ul>
                <li <?php
                    if ($tam == 'hosonguoidung') {
                        echo 'class="selected"';
                    } else {
                        echo '';
                    } ?>>
                    <a href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $_GET['idAcc'] ?>">
                        <i class="fa-solid fa-circle-user"></i>
                        <span>Thông tin</span>
                    </a>
                </li>
                <li <?php
                    if ($tam == 'quanlysannguoidung') {
                        echo 'class="selected"';
                    } else {
                        echo '';
                    } ?>>
                    <a href="index.php?quanly=quanlysannguoidung&&idAcc=<?php echo $_GET['idAcc'] ?>">
                        <i class="fa-solid fa-calendar-day"></i>
                        <span>Quản lý sân</span>
                    </a>
                </li>
                <li <?php
                    if ($tam == 'blognguoidung') {
                        echo 'class="selected"';
                    } else {
                        echo '';
                    } ?>>
                    <a href="index.php?quanly=blognguoidung&&idAcc=<?php echo $_GET['idAcc'] ?>">
                        <i class="fa-solid fa-book-open"></i>
                        <span>Blog</span>
                        <span class="sum"><?php echo $count_blog; ?></span>
                    </a>
                </li>
                <li <?php
                    if ($tam == 'sukiennguoidung') {
                        echo 'class="selected"';
                    } else {
                        echo '';
                    } ?>>
                    <a href="index.php?quanly=sukiennguoidung&&idAcc=<?php echo $_GET['idAcc'] ?>">
                        <i class="fa-solid fa-calendar-week"></i>
                        <span>Quản lý sự kiện</span>
                    </a>
                </li>
                <li <?php
                    if ($tam == 'danhgianguoidung') {
                        echo 'class="selected"';
                    } else {
                        echo '';
                    } ?>>
                    <a href="index.php?quanly=danhgianguoidung&&idAcc=<?php echo $_GET['idAcc'] ?>">
                        <i class="fa-solid fa-face-laugh"></i>
                        <span>Đánh giá</span>
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
    if ($tam == 'hosonguoidung') {
        include('infoUser.php');
    } elseif ($tam == 'quanlysannguoidung') {
        include('pitchManagerUser.php');
    } elseif ($tam == 'blognguoidung') {
        include('blogUser.php');
    } elseif ($tam == 'sukiennguoidung') {
        include('contestUser.php');
    } elseif ($tam == 'danhgianguoidung') {
        include('ratingUser.php');
    }
    ?>
</div>
<div id="right">
    <?php include('screen/main-sc/recruit-main-sc.php') ?>
</div>