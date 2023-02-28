<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HINADA</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/icons/soccer-player.ico" />
    <link rel="stylesheet" href="assets/fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="assets/css/main/style.css">
    <link rel="stylesheet" href="assets/css/main/slider.css">
    <link rel="stylesheet" href="assets/css/main/footer.css">
    <link rel="stylesheet" href="assets/css/effect/snow.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login/login.css">
    <link rel="stylesheet" type="text/css" href="assets/css/regist/registration.css">
    <link rel="stylesheet" type="text/css" href="assets/css/setpitch/setpitch.css">
    <link rel="stylesheet" type="text/css" href="assets/css/setpitch/search-setpitch.css">
    <link rel="stylesheet" href="assets/css/main/news.css">
    <link rel="stylesheet" href="assets/css/main/advisory.css">
    <link rel="stylesheet" href="assets/css/setpitch/detail-setpitch.css" />
    <link rel="stylesheet" href="assets/css/blog/blog.css">
    <link rel="stylesheet" href="assets/css/personal/main-personal.css">
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@500&display=swap" rel="stylesheet">
    <!-- Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        JavaScript Bundle with Popper>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a818068831.js" crossorigin="anonymous"></script>
    <script src="assets/javascript/add-shadow-navigation.js"></script>

</head>

<?php
include("config/config.php");
include("screen/auto-update-history.php");
//Truyền biến thông qua SESSION
session_start();
?>

<body>
    <div id="main">
        <div id="header">
            <div id="logo">
                <a href="index.php" class="content-logo">HINADA</a>
            </div>
        </div>
        <div id="navigation">
            <div id="fix-nav">
                <div class="move-nav">
                    <!-- Navigation -->
                    <div id="nav">
                        <ul id="select">
                            <!-- Xử lý Hover khi nhấn vào mục định hướng -->
                            <?php
                            $tam = (isset($_GET['quanly'])) ? $_GET['quanly'] : '';
                            ?>

                            <li><a href="index.php" class="item-nav 
                            <?php
                            echo ($tam == '') ? 'is-active' : '';
                            ?>"><i class="fa-solid fa-house"></i> Trang chủ</a></li>

                            <li><a href="index.php?quanly=datsan&&type=default" class="item-nav 
                            <?php
                            echo ($tam == "datsan" || $tam == "chitietdatsan") ? 'is-active' : '';
                            ?>"><i class="fa-solid fa-baseball"></i> Sân bóng</a></li>

                            <li><a href="index.php?quanly=sukien" class="item-nav 
                            <?php
                            echo ($tam == "sukien" || $tam == "chitietsukien") ? 'is-active' : '';
                            ?>"><i class="fa-solid fa-trophy"></i> Sự kiện</a>

                            </li>
                            <li><a href="index.php?quanly=blog" class="item-nav 
                            <?php
                            echo ($tam == "blog" || $tam == "chitietblog") ? 'is-active' : '';
                            ?>"><i class="fa-brands fa-blogger"></i> Blog</a></li>

                            <li><a href="index.php?quanly=vechungtoi" class="item-nav 
                            <?php
                            echo ($tam == "vechungtoi") ? 'is-active' : '';
                            ?>"><i class="fa-solid fa-users-between-lines"></i> Giới thiệu</a></li>
                        </ul>

                    </div>
                    <!-- Hiệu ứng mờ khi nhấn đổi mật khẩu -->
                    <div id="overlay"></div>
                    <!-- Begin user-nav -->
                    <div id="user-nav">
                        <form action="index.php?quanly=timkiemnguoidung" method="post">
                            <input type="text" style="display: none;height: 30px;border-radius: 3px;" name="searchUser"
                                id="input-search" placeholder='Tìm người dùng' required>
                        </form>
                        <a id="search-btns">
                            <i class="ti-search"></i>
                        </a>
                        <!-- Xử lý đăng xuất -->
                        <?php
                        if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
                            $mataikhoan = isset($_GET['id_user']) ? $_GET['id_user'] : $_SESSION['id_khachhang'];
                            $update_logout = "UPDATE taikhoan SET tinhtrangtk = '2' WHERE mataikhoan = $mataikhoan";
                            mysqli_query($mysqli, $update_logout);
                            unset($_SESSION['tenkhachhang']);
                            unset($_SESSION['id_khachhang']);
                            unset($_SESSION['ten']);
                            unset($_SESSION['sodienthoai']);
                            unset($_SESSION['id_user']);
                            //session_destroy();
                        }
                        if (isset($_SESSION['tenkhachhang'])) {
                        ?>
                        <!-- Xử lý trang cá nhân -->
                        <li>
                            <a href="#" class="user">
                                <?php
                                    $sql = "SELECT * FROM taikhoan WHERE mataikhoan = $_SESSION[id_khachhang] LIMIT 1";
                                    $query = mysqli_query($mysqli, $sql);
                                    while ($dong = mysqli_fetch_array($query)) {
                                    ?>
                                <img src="admin/modules/account/uploads-ac/<?php echo $dong['hinhanh'] ?>"
                                    alt="<?php echo $dong['hinhanh'] ?>"
                                    style="width:25px; height: 25px; border-radius: 50%; vertical-align: middle; margin: -5px 2px 0px -5px; object-fit: cover;">
                                <?php echo $dong['ten'] ?>
                                <?php } ?>
                            </a>
                            <ul class="sub_user">
                                <li><a href="index.php?quanly=trangcuatoi">Trang của tôi</a></li>
                                <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
                            </ul>
                        </li>
                        <a id="notification"><i class="ti-bell"></i>&nbsp;
                            <!-- Xử lý hiển thị số lượng thông báo mới -->
                            <?php
                                $sql_count_notify = "SELECT * FROM thongbao WHERE mataikhoan = '$_SESSION[id_khachhang]' AND tinhtrangthongbao = 0";
                                $query_count_notify = mysqli_query($mysqli, $sql_count_notify);
                                $count_notify = mysqli_num_rows($query_count_notify);
                                if ($count_notify > 0) {
                                ?>
                            <span class="count-notify"><?php echo $count_notify; ?></span>
                            <?php } ?>
                        </a>
                        <?php
                        } else {
                        ?>
                        <a href="index.php?quanly=dangnhap">
                            <i class="ti-key"></i>
                            Đăng nhập
                        </a>
                        <a href="index.php?quanly=dangky">
                            <i class="ti-marker-alt"></i>
                            Đăng ký
                        </a>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- End user-nav  -->
                </div>
            </div>
        </div>

        <!-- Xử lý đường dẫn trang -->
        <?php
        include("screen/path.php");
        ?>
        <section id="path">
            <div class="w-normal clearfix">
                <div class="path-text" style="display: inline-block; width: max-content;">
                    <span>HINADA</span>
                    <?php
                    if ($_SESSION['path'] != '') {
                    ?>
                    <i class="ti-angle-right"></i>
                    <span>
                        <?php echo $_SESSION['path']; ?>
                    </span>
                    <?php
                    }
                    if ($_SESSION['path2'] != '') {
                    ?>
                    <i class="ti-angle-right"></i>
                    <span>
                        <?php echo $_SESSION['path2']; ?>
                    </span>
                    <?php
                    }
                    if ($_SESSION['path3'] != '') {
                    ?>
                    <i class="ti-angle-right"></i>
                    <span>
                        <?php echo $_SESSION['path3']; ?>
                    </span>
                    <?php
                    }
                    if ($_SESSION['path4'] != '') {
                    ?>
                    <i class="ti-angle-right"></i>
                    <span>
                        <?php echo $_SESSION['path4']; ?>
                    </span>
                    <?php
                    }
                    if ($_SESSION['path5'] != '') {
                    ?>
                    <i class="ti-angle-right"></i>
                    <span>
                        <?php echo $_SESSION['path5']; ?>
                    </span>
                    <?php
                    }
                    ?>
                </div>
                <?php
                include("screen/effect/effect.php");
                ?>
            </div>
        </section>
        <!-- Slider -->
        <?php
        include("screen/slider-sc/slider-ex.php");
        ?>
        <!-- Content -->
        <div id="content" class="w-normal clearfix flex">
            <?php
            include("screen/main.php");
            ?>
        </div>
        <!-- Footer -->
        <div id="footer">
            <div class="container-f">
                <footer class="py1-5">
                    <div class="row">
                        <div class="col-8 col-md-2 mb-3">
                            <h5>Về chúng tôi</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 ">Trang chủ</a></li>
                                <li class="nav-item mb-2"><a href="index.php?quanly=vechungtoi"
                                        class="nav-link p-0 ">Giới thiệu</a></li>
                                <li class="nav-item mb-2"><a href="index.php?quanly=dieukhoan"
                                        class="nav-link p-0 ">Điều khoản</a></li>
                            </ul>
                        </div>

                        <div class="col-8 col-md-2 mb-3" style="line-height: 1.5;">
                            <h5>Nội dung</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="index.php?quanly=datsan&&type=default"
                                        class="nav-link p-0 ">Sân bóng</a></li>
                                <li class="nav-item mb-2"><a href="index.php?quanly=sukien" class="nav-link p-0 ">Sự
                                        kiện</a></li>
                                <li class="nav-item mb-2"><a href="index.php?quanly=blog" class="nav-link p-0 ">Blog</a>
                                </li>
                                <li class="nav-item mb-2"><a
                                        href="index.php?quanly=timkiemnguoidung&&searchUser=HINADA&&page=1"
                                        class="nav-link p-0 ">Tìm kiếm</a></li>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-5 offset-md-3 mb-3">
                            <form>
                                <h5>Theo dõi tin tức từ chúng tôi</h5>
                                <p>Để biết thêm thông tin hàng tháng về những điều mới và thú vị.</p>
                            </form>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Tư vấn khách hàng -->
        <?php
        include('screen/advisory-sc/advisory2.php');
        ?>
        <!-- ----------------- -->
        <div id="copy-right">
            <div class="line-right">
                <p>(C) 2022 HiNaDa, LTD. Mọi quyền được bảo lưu.</p>
            </div>
        </div>
        <!-- Button Thông báo -->
        <?php
        if (isset($_SESSION['id_khachhang'])) {
            $sqlnotifi = "SELECT * FROM thongbao WHERE mataikhoan = $_SESSION[id_khachhang] ORDER BY mathongbao DESC";
            $query = mysqli_query($mysqli, $sqlnotifi);
        }
        ?>
        <div id="test-container" style="display: none;">
            <div id="notify">
                <div class="title">
                    <i class="fa-solid fa-bell"></i> &nbsp;<span style="font-size: 18px;">Thông báo</span>
                    <!-- Khi đóng thì chuyển đổi tình trạng thông báo thành đã xem -->
                    <form action="screen/handle-notify.php" method="post" style="float:right">
                        <input type="text" name="mataikhoan" style="display: none;"
                            value="<?php echo $_SESSION['id_khachhang'] ?>">
                        <input type="text" name="maurl" style="display: none;"
                            value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                        <button type="submit" name="closenotify " style="border:none;"><i id="ti-closes"></i></button>
                    </form>
                </div>
                <div class="notification-list">
                    <ul style="margin: 0; padding:0">
                        <?php
                        while ($dong = mysqli_fetch_array($query)) {
                        ?>
                        <li>
                            <p><?php echo $dong['noidungthongbao'] ?></p>
                            <div class="bottom-notify">
                                <div class="date-notify">
                                    <?php echo date('d-m-Y', strtotime($dong['thoigianthongbao'])) ?>
                                    <?php echo date('&#10059; H:i:s', strtotime($dong['thoigianthongbao'])) ?>
                                </div>
                                <div class="new-notify">
                                    <?php echo ($dong['tinhtrangthongbao'] == 0) ? 'Mới' : ''; ?>
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
        <script>
        const toastTrigger = document.getElementById('liveToastBtn')
        const toastLiveExample = document.getElementById('liveToast')
        if (toastTrigger) {
            toastTrigger.addEventListener('click', () => {
                const toast = new bootstrap.Toast(toastLiveExample)

                toast.show()
            })
        }
        </script>
    </div>

    <script src="assets/javascript/notify-search.js"></script>
    <!-- Kiểm tra đăng nhập thành công -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if (isset($_GET['login']) && $_GET['login'] == 'success') {
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Thành công',
        text: 'Đăng nhập thành công.',
    })
    setTimeout(function() {
        window.location.href = "index.php";
    }, 3000);
    </script>
    <?php
    }
    ?>
    <!-- Kiểm tra đăng xuất thành công -->
    <?php
    if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Thành công',
        text: 'Đăng xuất thành công.',
    })
    setTimeout(function() {
        window.location.href = "index.php";
    }, 3000);
    </script>
    <?php
    }
    ?>
    <!-- Kiểm tra đăng ký thành công -->
    <?php
    if (isset($_GET['dangky']) && $_GET['dangky'] == 'success') {
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Thành công',
        text: 'Đăng ký thành công.',
    })
    setTimeout(function() {
        window.location.href = "index.php";
    }, 3000);
    </script>
    <?php
    }
    ?>
    <!-- Kiểm tra giao dịch thất bại-->
    <?php
    if (isset($_GET['giaodich']) && $_GET['giaodich'] == 'thatbai') {
    ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Thất bại',
        text: 'Giao dịch thất bại.',
    })
    setTimeout(function() {
        window.location.href = "index.php";
    }, 3000);
    </script>
    <?php
    }
    ?>
    <!-- Kiểm tra lấy mật khẩu thành công-->
    <?php
    if (isset($_GET['forgotPassword']) && $_GET['forgotPassword'] == 'success') {
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Thành công',
        text: 'Lấy lại mật khẩu thành công. Bạn có thể đăng nhập lại tài khoản bình thường.',
    })
    </script>
    <?php
    }
    ?>
    <!-- Kiểm tra sân đã được đặt không thể thanh toán sân này-->
    <?php
    if (isset($_GET['setpitch']) && $_GET['setpitch'] == 'failed') {
    ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Thất bại',
        text: 'Sân này đã có người đặt.',
    })
    </script>
    <?php
    }
    ?>
    <!-- Kiểm tra xác nhận gmail đăng nhập thành công-->
    <?php
    if (isset($_GET['xacnhandangnhap']) && $_GET['xacnhandangnhap'] == 'success') {
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Thành công',
        text: 'Tài khoản của bạn đã được xác nhận gmail thành công.',
    })
    </script>
    <?php
    }
    ?>
    <!-- Scroll Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>