<link rel="stylesheet" href="assets/css/contest/contest.css">
<div id="left-contest-center">
    <div class="title-contest">
        <img src="assets/images/icons/search_contest.gif" alt="Ảnh" style="width: 30px; height: 30px;">
        <span style="margin-left: 4px;">SỰ KIỆN</span>
    </div>
    <form action="index.php?quanly=sukien" method="post">
        <div class="search-submit">
            <input id="input-keywork" type="text" name="keywork"
                <?php echo (isset($_GET['search'])) ? "value='$_GET[search]'" : "placeholder='Nhập từ khóa ...'"; ?>>
            <button type="submit" name="timkiem" class="btn">Tìm kiếm</button>
        </div>
        <?php
        if (isset($_POST['timkiem'])) {
        ?>
        <script>
        window.location.href = "index.php?quanly=sukien&&search=<?php echo $_POST['keywork'] ?>";
        </script>
        <?php
        }
        ?>
    </form>
    <?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $sql_his = "SELECT * FROM sukien WHERE tinhtrangsukien = '1'";
    $query_his = mysqli_query($mysqli, $sql_his);
    while ($row_his = mysqli_fetch_array($query_his)) {
        $datenow = date("Y-m-d H:i:s");
        $timenow = strtotime($datenow);
        $dateto = $row_his['ngayhethanthamgia'];
        $timeto = strtotime($dateto);
        $time = $timeto - $timenow;
        if ($time <= 0) {
            mysqli_query($mysqli, "UPDATE sukien SET tinhtrangsukien = '0' WHERE masukien= '$row_his[masukien]' AND tinhtrangsukien = '1'");
        }
    }
    ?>
    <?php
    //Xử lý tìm kiếm
    if (isset($_GET['search'])) {
        $limit = 5;
        if (isset($_GET['page'])) {
            $page_get = $_GET['page'];
        } else {
            $page_get = 1;
        }
        if ($page_get == '' || $page_get == 1) {
            $begin = 0;
        } else {
            $begin = ($page_get * $limit) - $limit;
        }
        $tukhoa = $_GET['search'];
        $sql_dt = "SELECT * FROM sukien, taikhoan 
            WHERE sukien.mataikhoan = taikhoan.mataikhoan AND tieudesukien 
            LIKE '%" . $tukhoa . "%' LIMIT $begin, $limit";
        $query_dt = mysqli_query($mysqli, $sql_dt);
        //
        $sql_page = "SELECT * FROM sukien, taikhoan 
             WHERE sukien.mataikhoan = taikhoan.mataikhoan AND tieudesukien 
             LIKE '%" . $tukhoa . "%'";
        $query_page = mysqli_query($mysqli, $sql_page);
        $row_count = mysqli_num_rows($query_page);
        //Lấy số lượng blog mặc định
        $sql_page_all = mysqli_query($mysqli, "SELECT * FROM sukien");
        $row_count_all = mysqli_num_rows($sql_page_all);
    ?>
    <div class="title-contest-all" data-aos="fade-right">
        <img src="assets/images/icons/locations.gif" alt="Ảnh" style="width: 30px; height: 30px; margin-top: -5px;">
        <span>TẤT CẢ SỰ KIỆN: <span
                style="font-weight: bold; color: #1c6cc1;"><?php echo $row_count ?>/<?php echo $row_count_all ?></span></span>
    </div>
    <?php
        while ($row_sukien = mysqli_fetch_array($query_dt)) {
        ?>
    <ul class="list" data-aos="fade-right">
        <li class="contest">
            <div class="text">
                <h3 class="title">
                    <a href="index.php?quanly=chitietsukien&idsukien=<?php echo $row_sukien['masukien'] ?>">
                        <?php echo $row_sukien['tieudesukien'] ?></a>
                </h3>
                <div class="sub">
                    <img src="admin/modules/account/uploads-ac/<?php echo $row_sukien['hinhanh'] ?>"
                        alt="<?php echo $row_sukien['hinhanh'] ?>"
                        style="width:20px; height:20px; border-radius: 10px 10px;object-fit: cover;">
                    <a
                        href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_sukien['mataikhoan'] ?>"><?php echo $row_sukien['ten'] ?></a>
                    <?php if ($row_sukien['tinhtrangsukien'] == 1) {
                                echo '<div class="time-left">Đang diễn ra</div>';
                            } else {
                                echo '<div class="time-left finished">Đã kết thúc</div>';
                            } ?>
                    <div class="teams-number" title="Cầu thủ / Đội">
                        <span>+<?php echo ($row_sukien['soluongcauthu'] / 2) ?></span>
                        <i class="fa-solid fa-user" style="color: #fd7e14;"></i>
                        <span>/</span>
                        <i class="fa-solid fa-users" style="color: #fd7e14;"></i>
                    </div>
                    <div class="teams-number" title="Dự bị / Đội">
                        <span>+<?php echo ($row_sukien['soluongcauthudubi'] / 2) ?></span>
                        <i class="fa-regular fa-user" style="color: #fecba1;"></i>
                        <span>/</span>
                        <i class="fa-solid fa-users" style="color: #fecba1;"></i>
                    </div>
                </div>
                <ol class="sub2">
                    <li>
                        <i class="fa-solid fa-clock"></i>
                        <span>
                            Ngày đăng: <span
                                class="timesetdefault"><?php echo date('d-m-Y', strtotime($row_sukien['thoigiantaosukien'])) ?></span>
                            <?php echo date('&#10059; H:i:s', strtotime($row_sukien['thoigiantaosukien'])) ?>
                        </span>
                    </li>
                    <li>
                        <i class="fa-solid fa-arrows-up-down-left-right"></i>
                        <span>Địa điểm: <?php echo $row_sukien['diadiemsukien'] ?></span>
                    </li>
                </ol>
            </div>
        </li>
    </ul>
    <?php
        }
        ?>
    <?php
        $page = ceil($row_count / $limit);
        ?>
    <div class="page">
        <?php if ($page == '0') { ?>
        <p style="display:none;">Trang: <?php echo $page_get . "/" . $page ?></p>
        <?php } else { ?>
        <p>Trang: <?php echo $page_get . "/" . $page ?></p>
        <?php } ?>
        <ul class="list-page">
            <?php
                for ($i = 1; $i <= $page; $i++) {
                ?>
            <li <?php if ($i == $page_get) {
                            echo 'style="background: #1C6CC1;"';
                        } else {
                            echo '';
                        } ?>>
                <a <?php if ($i == $page_get) {
                                echo 'style="font-weight: bold; color:#fff;"';
                            } else {
                                echo '';
                            } ?>
                    href="index.php?quanly=sukien&&search=<?php echo $tukhoa ?>&&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php
                }
                ?>
        </ul>
    </div>
    <?php
    } else {
        $limit = 5;
        if (isset($_GET['page'])) {
            $page_get = $_GET['page'];
        } else {
            $page_get = 1;
        }
        if ($page_get == '' || $page_get == 1) {
            $begin = 0;
        } else {
            $begin = ($page_get * $limit) - $limit;
        }
        $sql_dt = "SELECT * FROM sukien, taikhoan 
            WHERE sukien.mataikhoan = taikhoan.mataikhoan ORDER BY sukien.masukien DESC LIMIT $begin,$limit";
        $query_dt = mysqli_query($mysqli, $sql_dt);
        //Lấy tất cả blog
        $sql_page = mysqli_query($mysqli, "SELECT * FROM sukien");
        $row_count = mysqli_num_rows($sql_page);
    ?>
    <div class="title-contest-all" data-aos="fade-right">
        <img src="assets/images/icons/locations.gif" alt="Ảnh" style="width: 30px; height: 30px; margin-top: -5px;">
        <span>TẤT CẢ SỰ KIỆN: <span style="font-weight: bold; color: #1c6cc1;"><?php echo $row_count ?></span></span>
    </div>
    <?php
        while ($row_sukien = mysqli_fetch_array($query_dt)) {
        ?>
    <ul class="list" data-aos="fade-right">
        <li class="contest">
            <div class="text">
                <h3 class="title">
                    <a href="index.php?quanly=chitietsukien&idsukien=<?php echo $row_sukien['masukien'] ?>">
                        <?php echo $row_sukien['tieudesukien'] ?></a>
                </h3>
                <div class="sub">
                    <img src="admin/modules/account/uploads-ac/<?php echo $row_sukien['hinhanh'] ?>"
                        alt="<?php echo $row_sukien['hinhanh'] ?>"
                        style="width:20px; height:20px; border-radius: 10px 10px;object-fit: cover;">
                    <a
                        href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_sukien['mataikhoan'] ?>"><?php echo $row_sukien['ten'] ?></a>
                    <?php if ($row_sukien['tinhtrangsukien'] == 1) {
                                echo '<div class="time-left">Đang diễn ra</div>';
                            } else {
                                echo '<div class="time-left finished">Đã kết thúc</div>';
                            } ?>
                    <div class="teams-number" title="Cầu thủ / Đội">
                        <span>+<?php echo ($row_sukien['soluongcauthu'] / 2) ?></span>
                        <i class="fa-solid fa-user" style="color: #fd7e14;"></i>
                        <span>/</span>
                        <i class="fa-solid fa-users" style="color: #fd7e14;"></i>
                    </div>
                    <div class="teams-number" title="Dự bị / Đội">
                        <span>+<?php echo ($row_sukien['soluongcauthudubi'] / 2) ?></span>
                        <i class="fa-regular fa-user" style="color: #fecba1;"></i>
                        <span>/</span>
                        <i class="fa-solid fa-users" style="color: #fecba1;"></i>
                    </div>
                </div>
                <ol class="sub2">
                    <li>
                        <i class="fa-solid fa-clock"></i>
                        <span>
                            Ngày đăng: <span
                                class="timesetdefault"><?php echo date('d-m-Y', strtotime($row_sukien['thoigiantaosukien'])) ?></span>
                            <?php echo date('&#10059; H:i:s', strtotime($row_sukien['thoigiantaosukien'])) ?>
                        </span>
                    </li>
                    <li>
                        <i class="fa-solid fa-arrows-up-down-left-right"></i>
                        <span>Địa điểm: <?php echo $row_sukien['diadiemsukien'] ?></span>
                    </li>
                </ol>
            </div>
        </li>
    </ul>
    <?php
        }
        ?>
    <?php
        $page = ceil($row_count / $limit);
        ?>
    <div class="page">
        <?php if ($page == '0') { ?>
        <p style="display:none;">Trang: <?php echo $page_get . "/" . $page ?></p>
        <?php } else { ?>
        <p>Trang: <?php echo $page_get . "/" . $page ?></p>
        <?php } ?>
        <ul class="list-page">
            <?php
                for ($i = 1; $i <= $page; $i++) {
                ?>
            <li <?php if ($i == $page_get) {
                            echo 'style="background: #1C6CC1;"';
                        } else {
                            echo '';
                        } ?>>
                <a <?php if ($i == $page_get) {
                                echo 'style="font-weight: bold; color:#fff;"';
                            } else {
                                echo '';
                            } ?> href="index.php?quanly=sukien&&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php
                }
                ?>
        </ul>
    </div>
    <?php
    }
    ?>
</div>
<div id="right" data-aos="fade-left">
    <?php include('screen/main-sc/recruit-main-sc.php') ?>
</div>