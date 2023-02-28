<div id="center-personal">
    <h2 class="title-follow">
        <i class="fa-solid fa-star"></i>
        Danh sách theo dõi
    </h2>
    <?php
    $limit = 5;
    //create current page on total page
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
    $sql_fl = "SELECT * FROM theodoi, san, taikhoan 
    WHERE theodoi.masan = san.masan 
    AND san.mataikhoan = taikhoan.mataikhoan 
    AND theodoi.mataikhoan = '$_SESSION[id_khachhang]' ORDER BY matheodoi DESC LIMIT $begin, $limit";
    $query_fl = mysqli_query($mysqli, $sql_fl);
    //get count from san
    $sql_page = mysqli_query($mysqli, "SELECT * FROM theodoi, san, taikhoan 
    WHERE theodoi.masan = san.masan 
    AND san.mataikhoan = taikhoan.mataikhoan 
    AND theodoi.mataikhoan = '$_SESSION[id_khachhang]'");
    $row_count = mysqli_num_rows($sql_page);
    if ($row_count > 0) {
        while ($dong = mysqli_fetch_array($query_fl)) {
    ?>
    <ul class="set-pitch-list">
        <li class="set-pitch new-i">
            <div class="title-setpitch">
                <p>
                    <span class="new">NEW</span>
                    <a href="index.php?quanly=chitietdatsan&&idSan=<?php echo $dong['masan'] ?>">
                        <?php echo $dong['tieudesan'] ?>
                    </a>
                </p>
            </div>
            <div class="author">
                <a href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $dong['mataikhoan'] ?>">
                    <img src="admin/modules/account/uploads-ac/<?php echo $dong['hinhanh'] ?>"
                        alt="<?php echo $dong['hinhanh'] ?>"
                        style="width:20px; height:20px; object-fit: cover;"><?php echo $dong['ten'] ?>
                </a>
                <!-- check tinhtrangsan -->
                <?php if ($dong['tinhtrangsan'] == 0) { ?>
                <span class="seperate">|</span>
                <i class="fa-solid fa-lock" style="color:#528B8B; font-size: 13px;"></i>
                <?php } ?>
                <!-- check count comment -->
                <?php
                        $sql_ck_comment = "SELECT * FROM binhluansan WHERE masan = '$dong[masan]'";
                        $count_ck_comment = mysqli_num_rows(mysqli_query($mysqli, $sql_ck_comment));
                        if ($count_ck_comment > 0) { ?>
                <span class="seperate">|</span>
                <i class="fa-solid fa-comment-dots" style="color:#1c6cc1; font-size: 13px;"></i>
                <span class="count-handle"><?php echo $count_ck_comment ?></span>
                <?php
                        }
                        ?>
                <!-- check count follow  -->
                <?php
                        $sql_ck_follow = "SELECT * FROM theodoi WHERE masan = '$dong[masan]'";
                        $count_ck_follow = mysqli_num_rows(mysqli_query($mysqli, $sql_ck_follow));
                        if ($count_ck_follow > 0) { ?>
                <span class="seperate">|</span>
                <i class="fa-solid fa-star" style="color:rgb(255, 184, 41); font-size: 13px;"></i>
                <span class="count-handle"><?php echo $count_ck_follow ?></span>
                <?php
                        }
                        ?>
                <!-- check count like -->
                <?php
                        $sql_ck_like = "SELECT * FROM luotyeuthichsan WHERE masan = '$dong[masan]'";
                        $count_ck_like = mysqli_num_rows(mysqli_query($mysqli, $sql_ck_like));
                        if ($count_ck_like > 0) { ?>
                <span class="seperate">|</span>
                <i class="fa-solid fa-heart" style="color:rgb(213, 54, 54); font-size: 13px;"></i>
                <span class="count-handle"><?php echo $count_ck_like ?></span>
                <?php
                        }
                        ?>
            </div>
            <ol class="sub">
                <!-- Khung gio -->
                <li class="li-frame-time">
                    <span class="timesetdefault">
                        <td class="time">
                            <div class="frame-time-screen">
                                <!-- Khung giờ 1 -->
                                <?php
                                        $sql_get_time_pitch_1 = "SELECT * FROM khunggio WHERE masan = '$dong[masan]' AND thutukhunggio = 1 LIMIT 1";
                                        $query_get_time_pitch_1 = mysqli_query($mysqli, $sql_get_time_pitch_1);
                                        while ($row_get_time_pitch_1 = mysqli_fetch_array($query_get_time_pitch_1)) {
                                        ?>
                                <span><?php echo date("H:i", strtotime($row_get_time_pitch_1['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_1['gioketthuc'])) ?></span>
                                <?php } ?>
                                <!-- Khung giờ 2 -->
                                <?php
                                        $sql_get_time_pitch_2 = "SELECT * FROM khunggio WHERE masan = '$dong[masan]' AND thutukhunggio = 2 LIMIT 1";
                                        $query_get_time_pitch_2 = mysqli_query($mysqli, $sql_get_time_pitch_2);
                                        while ($row_get_time_pitch_2 = mysqli_fetch_array($query_get_time_pitch_2)) {
                                        ?>
                                <span><?php echo date("H:i", strtotime($row_get_time_pitch_2['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_2['gioketthuc'])) ?></span>
                                <?php } ?>
                                <!-- Khung giờ 3 -->
                                <?php
                                        $sql_get_time_pitch_3 = "SELECT * FROM khunggio WHERE masan = '$dong[masan]' AND thutukhunggio = 3 LIMIT 1";
                                        $query_get_time_pitch_3 = mysqli_query($mysqli, $sql_get_time_pitch_3);
                                        while ($row_get_time_pitch_3 = mysqli_fetch_array($query_get_time_pitch_3)) {
                                        ?>
                                <span><?php echo date("H:i", strtotime($row_get_time_pitch_3['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_3['gioketthuc'])) ?></span>
                                <?php } ?>
                            </div>
                            <div class="frame-time-screen">
                                <!-- Khung giờ 4 -->
                                <?php
                                        $sql_get_time_pitch_4 = "SELECT * FROM khunggio WHERE masan = '$dong[masan]' AND thutukhunggio = 4 LIMIT 1";
                                        $query_get_time_pitch_4 = mysqli_query($mysqli, $sql_get_time_pitch_4);
                                        while ($row_get_time_pitch_4 = mysqli_fetch_array($query_get_time_pitch_4)) {
                                        ?>
                                <span><?php echo date("H:i", strtotime($row_get_time_pitch_4['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_4['gioketthuc'])) ?></span>
                                <?php } ?>
                                <!-- Khung giờ 5 -->
                                <?php
                                        $sql_get_time_pitch_5 = "SELECT * FROM khunggio WHERE masan = '$dong[masan]' AND thutukhunggio = 5 LIMIT 1";
                                        $query_get_time_pitch_5 = mysqli_query($mysqli, $sql_get_time_pitch_5);
                                        while ($row_get_time_pitch_5 = mysqli_fetch_array($query_get_time_pitch_5)) {
                                        ?>
                                <span><?php echo date("H:i", strtotime($row_get_time_pitch_5['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_5['gioketthuc'])) ?></span>
                                <?php } ?>
                                <!-- Khung giờ 6 -->
                                <?php
                                        $sql_get_time_pitch_6 = "SELECT * FROM khunggio WHERE masan = '$dong[masan]' AND thutukhunggio = 6 LIMIT 1";
                                        $query_get_time_pitch_6 = mysqli_query($mysqli, $sql_get_time_pitch_6);
                                        while ($row_get_time_pitch_6 = mysqli_fetch_array($query_get_time_pitch_6)) {
                                        ?>
                                <span><?php echo date("H:i", strtotime($row_get_time_pitch_6['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_6['gioketthuc'])) ?></span>
                                <?php } ?>
                            </div>
                        </td>
                    </span>
                </li>
                <li>
                    <i class="fa-solid fa-clock"></i>
                    <span>
                        Ngày đăng: <span
                            class="timeset-default"><?php echo date('d-m-Y', strtotime($dong['thoigiantaosan'])) ?></span>
                        <?php echo date('&#10059; H:i:s', strtotime($dong['thoigiantaosan'])) ?>
                    </span>
                </li>
                <li>
                    <i class="fa-solid fa-arrows-up-down-left-right"></i>
                    <span>Địa điểm: <?php echo $dong['diachisan'] ?></span>
                </li>
            </ol>
        </li>
    </ul>
    <?php
        }
        ?>
    <?php
        //get sum page now available
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
                            } ?> href="index.php?quanly=theodoi&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php
                }
                ?>
        </ul>
    </div>
    <?php
    } else {
    ?>
    <div class="none"><span>Bạn không có theo dõi.</span></div>
    <?php
    }
    ?>
</div>
<script src="assets/javascript/change-new-icon.js"></script>