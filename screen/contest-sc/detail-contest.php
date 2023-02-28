<link rel="stylesheet" href="assets/css/contest/detail-contest.css">
<div id="contest-center">
    <div class="contest-content">
        <?php
        $masukien = (isset($_GET['idsukien'])) ? $_GET['idsukien'] : '';
        $mataikhoan = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
        $sql_contest =
            "SELECT * FROM sukien, taikhoan WHERE sukien.mataikhoan = taikhoan.mataikhoan AND masukien = $masukien";
        $query_contest = mysqli_query($mysqli, $sql_contest);

        while ($row_contest = mysqli_fetch_array($query_contest)) {
        ?>
        <div class="title-contest">
            <?php
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $datenow = date("Y-m-d H:i:s");
                $timenow = strtotime($datenow);
                $dateto = $row_contest['ngayhethanthamgia'];
                $timeto = strtotime($dateto);
                $time = $timeto - $timenow;
                ?>
            <div class="name-contest">
                <img src="assets/images/icons/banners.gif" alt="Ảnh">
                <p><?php echo $row_contest['tieudesukien'] ?></p>
                <img src="assets/images/icons/banners.gif" alt="Ảnh">
            </div>
            <div class="name-organizer">
                <div class="box-user">
                    <div class="name">
                        <img src="admin/modules/account/uploads-ac/<?php echo $row_contest['hinhanh'] ?>"
                            alt="<?php echo $row_contest['hinhanh'] ?>">
                        <a href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_contest['mataikhoan'] ?>">
                            <?php echo $row_contest['ten'] ?>
                        </a>
                    </div>
                    <div class="wall">|</div>
                    <div class="detail-contest">
                        <?php
                            $sql = "SELECT * FROM danhgia WHERE matkdanhgia = $row_contest[mataikhoan]";
                            $query_total = mysqli_query($mysqli, $sql);
                            $row_star = mysqli_num_rows($query_total);
                            $total = 0;
                            while ($count = mysqli_fetch_array($query_total)) {
                                $total = $total + $count['sosao'];
                            }
                            if ($row_star == 0) {
                                $result = $total / 1;
                            } else {
                                $result = $total / $row_star;
                            }
                            ?>
                        <span><?php echo '+' . round($result, 1) ?></span>
                        <?php
                            if ($result > 4) {
                                echo '<i class="fa-solid fa-face-grin-stars" style="color: #6cc65a; font-size: 15px;"></i>';
                            } elseif ($result > 3) {
                                echo '<i class="fa-solid fa-face-laugh" style="color: #9ae68b; font-size: 15px;"></i>';
                            } elseif ($result > 2) {
                                echo '<i class="fa-solid fa-face-smile" style="color: #ffd35c; font-size: 15px;"></i>';
                            } elseif ($result > 1) {
                                echo '<i class="fa-solid fa-face-rolling-eyes" style="color: #ff9c3c; font-size: 15px;"></i>';
                            } elseif ($result > 0) {
                                echo '<i class="fa-solid fa-face-angry" style="color: #f96b6b; font-size: 15px;"></i>';
                            } else {
                                echo '<i class="fa-solid fa-face-meh" style="color: gray; font-size: 15px;"></i>';
                            }
                            ?>
                    </div>
                </div>
                <div class="box-user">
                    <div class="detail-contest" title="Cầu thủ / Đội">
                        <span><?php echo '+' . ($row_contest['soluongcauthu']) / 2 ?></span>
                        <i class="fa-solid fa-user" style="color: #fd7e14; font-size: 15px;"></i>
                        <span>/</span>
                        <i class="fa-solid fa-users" style="color: #fd7e14; font-size: 15px;"></i>
                    </div>
                    <div class="wall">|</div>
                    <div class="detail-contest" title="Dự bị / Đội">
                        <span><?php echo '+' . ($row_contest['soluongcauthudubi']) / 2 ?></span>
                        <i class="fa-regular fa-user" style="color: #fecba1; font-size: 15px;"></i>
                        <span>/</span>
                        <i class="fa-solid fa-users" style="color: #fecba1; font-size: 15px;"></i>
                    </div>
                </div>
            </div>
            <div class="address-contest"><?php echo $row_contest['diadiemsukien'] ?></div>
            <div class="reward-contest"><?php echo "Phần thưởng: " . $row_contest['phanthuong'] ?></div>
            <div class="time-contest">
                <p class="time-end" id="count-down" style="display: none;">
                    <?php echo date("d:m:Y:H:i:s", strtotime($row_contest['ngayhethanthamgia'])) ?></p>
                <p class="time-end"><?php echo date("d-m-Y H:i:s", strtotime($row_contest['ngayhethanthamgia'])) ?></p>
                <p class="time-remaining" id="show-count-down">
                    <span id="days">--</span>d <span id="hours">--</span>h <span id="mins">--</span>m <span
                        id="seconds">--</span>s
                </p>
            </div>
        </div>

        <div class="contest-team">
            <!-- Team A ------------------------------------------------------------------------ -->
            <div class="team">
                <div class="title-team">
                    <div class="title-detail">(Đội 1) <?php echo $row_contest['tendoimot'] ?></div>
                    <div class="title-detail">
                        <?php
                            $count_player_t1 =
                                "SELECT * FROM thamgiasukien
                    WHERE masukien = $masukien
                    AND vitrithamgia = '1'";
                            $query_player_t1 = mysqli_query($mysqli, $count_player_t1);
                            $player_t1 = mysqli_num_rows($query_player_t1);
                            if ($player_t1 > 0) {
                                echo '<span>' . $player_t1 . '</span>';
                            } else {
                                echo '<span>0</span>';
                            }
                            ?>
                        <i class="fa-solid fa-user" style="color: #fd7e14; font-size: 15px;"></i>
                        <span>/</span>
                        <span><?php echo ($row_contest['soluongcauthu']) / 2 ?></span>
                        <i class="fa-solid fa-users" style="color: #fd7e14; font-size: 15px;"></i>
                    </div>
                </div>
                <div class="layer-1">
                    <div class="layer-2">
                        <?php
                            $list_team_1 =
                                "SELECT * FROM thamgiasukien, taikhoan
                        WHERE thamgiasukien.mataikhoan = taikhoan.mataikhoan
                        AND vitrithamgia = '1'
                        AND masukien = $masukien";
                            $query_list_t1 = mysqli_query($mysqli, $list_team_1);
                            $i = 1;
                            $count_list_t1 = mysqli_num_rows($query_list_t1);
                            if ($count_list_t1 > 0) {
                                while ($row_t1 = mysqli_fetch_array($query_list_t1)) {
                            ?>
                        <div class="users-team">
                            <div class="detail-user-team">
                                <span><?php echo $i . ".";
                                                    $i++; ?>
                                </span>
                                <img src="admin/modules/account/uploads-ac/<?php echo $row_t1['hinhanh'] ?>"
                                    alt="<?php echo $row_t1['hinhanh'] ?>">
                                <div class="block-user">
                                    <div class="name-user">
                                        <a
                                            href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_t1['mataikhoan'] ?>">
                                            <?php echo $row_t1['tendangnhap'] ?>
                                        </a>
                                    </div>
                                    <div class="name-user"><?php echo $row_t1['ten'] ?></div>
                                </div>
                            </div>
                            <div class="detail-user-team">
                                <div class="block-user right-w">
                                    <span><?php echo date('d-m-Y &#10059; H:i:s', strtotime($row_t1['thoigianthamgia'])) ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            } else {
                                ?>
                        <div class="users-team">
                            <div class="detail-user-team none-user">
                                (Chưa có thành viên)
                            </div>
                        </div>
                        <?php
                            }
                            ?>
                    </div>
                </div>
                <form action="screen/contest-sc/handle-php/add-user.php" method="post">
                    <div class="btn-team">
                        <input type="text" name="mataikhoan" value="<?php echo $mataikhoan ?>" style="display: none;">
                        <input type="text" name="masukien" value="<?php echo $masukien ?>" style="display: none;">
                        <?php
                            $check_exis =
                                "SELECT * FROM thamgiasukien WHERE masukien = $masukien AND mataikhoan = $mataikhoan LIMIT 1";
                            $query_check_exis = mysqli_query($mysqli, $check_exis);
                            if ($mataikhoan == '') {
                                $exis_login = 0;
                            } else {
                                $exis_login = 1;
                                $exis = mysqli_num_rows($query_check_exis);
                            }
                            if ($exis_login == 0) {
                                echo '<button type="submit" class="btn-submit disable-btn">Bạn chưa đăng nhập</button>';
                            } else if ($time <= 0) {
                                echo '<button type="submit" class="btn-submit disable-btn">Hết hạn tham gia</button>';
                            } else if ($exis > 0) {
                                echo '<button type="submit" class="btn-submit disable-btn">Bạn đã tham gia sự kiện</button>';
                            } else if ($player_t1 == (($row_contest['soluongcauthu']) / 2)) {
                                echo '<button type="submit" class="btn-submit disable-btn">Đủ thành viên</button>';
                            } else {
                                echo '<button type="submit" class="btn-submit" name="doimot">Tham gia đội</button>';
                            }
                            ?>
                    </div>
                </form>
            </div>
            <!-- Team B ------------------------------------------------------------------------ -->
            <div class="team">
                <div class="title-team">
                    <div class="title-detail">(Đội 2) <?php echo $row_contest['tendoihai'] ?></div>
                    <div class="title-detail">
                        <?php
                            $count_player_t2 =
                                "SELECT * FROM thamgiasukien
                    WHERE masukien = $masukien
                    AND vitrithamgia = '3'";
                            $query_player_t2 = mysqli_query($mysqli, $count_player_t2);
                            $player_t2 = mysqli_num_rows($query_player_t2);
                            if ($player_t2 > 0) {
                                echo '<span>' . $player_t2 . '</span>';
                            } else {
                                echo '<span>0</span>';
                            }
                            ?>
                        <i class="fa-solid fa-user" style="color: #fd7e14; font-size: 15px;"></i>
                        <span>/</span>
                        <span><?php echo ($row_contest['soluongcauthu']) / 2 ?></span>
                        <i class="fa-solid fa-users" style="color: #fd7e14; font-size: 15px;"></i>
                    </div>
                </div>
                <div class="layer-1">
                    <div class="layer-2">
                        <?php
                            $list_team_2 =
                                "SELECT * FROM thamgiasukien, taikhoan
                        WHERE thamgiasukien.mataikhoan = taikhoan.mataikhoan
                        AND vitrithamgia = '3'
                        AND masukien = $masukien";
                            $query_list_t2 = mysqli_query($mysqli, $list_team_2);
                            $i2 = 1;
                            $count_list_t2 = mysqli_num_rows($query_list_t2);
                            if ($count_list_t2 > 0) {
                                while ($row_t2 = mysqli_fetch_array($query_list_t2)) {
                            ?>
                        <div class="users-team">
                            <div class="detail-user-team">
                                <span><?php echo $i2 . ".";
                                                    $i2++; ?>
                                </span>
                                <img src="admin/modules/account/uploads-ac/<?php echo $row_t2['hinhanh'] ?>"
                                    alt="<?php echo $row_t2['hinhanh'] ?>">
                                <div class="block-user">
                                    <div class="name-user">
                                        <a
                                            href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_t2['mataikhoan'] ?>">
                                            <?php echo $row_t2['tendangnhap'] ?>
                                        </a>
                                    </div>
                                    <div class="name-user"><?php echo $row_t2['ten'] ?></div>
                                </div>
                            </div>
                            <div class="detail-user-team">
                                <div class="block-user right-w">
                                    <span><?php echo date('d-m-Y &#10059; H:i:s', strtotime($row_t2['thoigianthamgia'])) ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            } else {
                                ?>
                        <div class="users-team">
                            <div class="detail-user-team none-user">
                                (Chưa có thành viên)
                            </div>
                        </div>
                        <?php
                            }
                            ?>
                    </div>
                </div>
                <form action="screen/contest-sc/handle-php/add-user.php" method="post">
                    <div class="btn-team">
                        <input type="text" name="mataikhoan" value="<?php echo $mataikhoan ?>" style="display: none;">
                        <input type="text" name="masukien" value="<?php echo $masukien ?>" style="display: none;">
                        <?php
                            $check_exis =
                                "SELECT * FROM thamgiasukien WHERE masukien = $masukien AND mataikhoan = $mataikhoan LIMIT 1";
                            $query_check_exis = mysqli_query($mysqli, $check_exis);
                            if ($mataikhoan == '') {
                                $exis_login = 0;
                            } else {
                                $exis_login = 1;
                                $exis = mysqli_num_rows($query_check_exis);
                            }
                            if ($exis_login == 0) {
                                echo '<button type="submit" class="btn-submit disable-btn">Bạn chưa đăng nhập</button>';
                            } else if ($time <= 0) {
                                echo '<button type="submit" class="btn-submit disable-btn">Hết hạn tham gia</button>';
                            } else if ($exis > 0) {
                                echo '<button type="submit" class="btn-submit disable-btn">Bạn đã tham gia sự kiện</button>';
                            } else if ($player_t2 == (($row_contest['soluongcauthu']) / 2)) {
                                echo '<button type="submit" class="btn-submit disable-btn">Đủ thành viên</button>';
                            } else {
                                echo '<button type="submit" class="btn-submit" name="doihai">Tham gia đội</button>';
                            }
                            ?>
                    </div>
                </form>
            </div>
        </div>
        <!-- Team dự bị -->
        <div class="contest-team">
            <!-- Team dự bị A ------------------------------------------------------------------------ -->
            <div class="team">
                <div class="title-team">
                    <div class="title-detail"><?php echo '(Dự bị 1) ' . $row_contest['tendoimot'] ?></div>
                    <div class="title-detail">
                        <?php
                            $count_player_res1 =
                                "SELECT * FROM thamgiasukien
                    WHERE masukien = $masukien
                    AND vitrithamgia = '2'";
                            $query_player_res1 = mysqli_query($mysqli, $count_player_res1);
                            $player_res1 = mysqli_num_rows($query_player_res1);
                            if ($player_res1 > 0) {
                                echo '<span>' . $player_res1 . '</span>';
                            } else {
                                echo '<span>0</span>';
                            }
                            ?>
                        <i class="fa-solid fa-user" style="color: #fd7e14; font-size: 15px;"></i>
                        <span>/</span>
                        <span><?php echo ($row_contest['soluongcauthudubi']) / 2 ?></span>
                        <i class="fa-solid fa-users" style="color: #fd7e14; font-size: 15px;"></i>
                    </div>
                </div>
                <div class="layer-1">
                    <div class="layer-2">
                        <?php
                            $list_team_res1 =
                                "SELECT * FROM thamgiasukien, taikhoan
                        WHERE thamgiasukien.mataikhoan = taikhoan.mataikhoan
                        AND vitrithamgia = '2'
                        AND masukien = $masukien";
                            $query_list_res1 = mysqli_query($mysqli, $list_team_res1);
                            $i3 = 1;
                            $count_list_res1 = mysqli_num_rows($query_list_res1);
                            if ($count_list_res1 > 0) {
                                while ($row_res1 = mysqli_fetch_array($query_list_res1)) {
                            ?>
                        <div class="users-team">
                            <div class="detail-user-team">
                                <span><?php echo $i3 . ".";
                                                    $i3++; ?>
                                </span>
                                <img src="admin/modules/account/uploads-ac/<?php echo $row_res1['hinhanh'] ?>"
                                    alt="<?php echo $row_res1['hinhanh'] ?>">
                                <div class="block-user">
                                    <div class="name-user">
                                        <a
                                            href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_res1['mataikhoan'] ?>">
                                            <?php echo $row_res1['tendangnhap'] ?>
                                        </a>
                                    </div>
                                    <div class="name-user"><?php echo $row_res1['ten'] ?></div>
                                </div>
                            </div>
                            <div class="detail-user-team">
                                <div class="block-user right-w">
                                    <span><?php echo date('d-m-Y &#10059; H:i:s', strtotime($row_res1['thoigianthamgia'])) ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            } else {
                                ?>
                        <div class="users-team">
                            <div class="detail-user-team none-user">
                                (Chưa có thành viên)
                            </div>
                        </div>
                        <?php
                            }
                            ?>
                    </div>
                </div>
                <form action="screen/contest-sc/handle-php/add-user.php" method="post">
                    <div class="btn-team">
                        <input type="text" name="mataikhoan" value="<?php echo $mataikhoan ?>" style="display: none;">
                        <input type="text" name="masukien" value="<?php echo $masukien ?>" style="display: none;">
                        <?php
                            $check_exis =
                                "SELECT * FROM thamgiasukien WHERE masukien = $masukien AND mataikhoan = $mataikhoan LIMIT 1";
                            $query_check_exis = mysqli_query($mysqli, $check_exis);
                            if ($mataikhoan == '') {
                                $exis_login = 0;
                            } else {
                                $exis_login = 1;
                                $exis = mysqli_num_rows($query_check_exis);
                            }
                            if ($exis_login == 0) {
                                echo '<button type="submit" class="btn-submit disable-btn">Bạn chưa đăng nhập</button>';
                            } else if ($time <= 0) {
                                echo '<button type="submit" class="btn-submit disable-btn">Hết hạn tham gia</button>';
                            } else if ($exis > 0) {
                                echo '<button type="submit" class="btn-submit disable-btn">Bạn đã tham gia sự kiện</button>';
                            } else if ($player_res1 == (($row_contest['soluongcauthu']) / 2)) {
                                echo '<button type="submit" class="btn-submit disable-btn">Đủ thành viên</button>';
                            } else {
                                echo '<button type="submit" class="btn-submit" name="dubimot">Tham gia đội</button>';
                            }
                            ?>
                    </div>
                </form>
            </div>
            <!-- Team dự bị B ------------------------------------------------------------------------ -->
            <div class="team">
                <div class="title-team">
                    <div class="title-detail"><?php echo '(Dự bị 2) ' . $row_contest['tendoihai'] ?></div>
                    <div class="title-detail">
                        <?php
                            $count_player_res2 =
                                "SELECT * FROM thamgiasukien
                    WHERE masukien = $masukien
                    AND vitrithamgia = '4'";
                            $query_player_res2 = mysqli_query($mysqli, $count_player_res2);
                            $player_res2 = mysqli_num_rows($query_player_res2);
                            if ($player_res2 > 0) {
                                echo '<span>' . $player_res2 . '</span>';
                            } else {
                                echo '<span>0</span>';
                            }
                            ?>
                        <i class="fa-solid fa-user" style="color: #fd7e14; font-size: 15px;"></i>
                        <span>/</span>
                        <span><?php echo ($row_contest['soluongcauthudubi']) / 2 ?></span>
                        <i class="fa-solid fa-users" style="color: #fd7e14; font-size: 15px;"></i>
                    </div>
                </div>
                <div class="layer-1">
                    <div class="layer-2">
                        <?php
                            $list_team_res2 =
                                "SELECT * FROM thamgiasukien, taikhoan
                        WHERE thamgiasukien.mataikhoan = taikhoan.mataikhoan
                        AND vitrithamgia = '4'
                        AND masukien = $masukien";
                            $query_list_res2 = mysqli_query($mysqli, $list_team_res2);
                            $i4 = 1;
                            $count_list_res2 = mysqli_num_rows($query_list_res2);
                            if ($count_list_res2 > 0) {
                                while ($row_res2 = mysqli_fetch_array($query_list_res2)) {
                            ?>
                        <div class="users-team">
                            <div class="detail-user-team">
                                <span><?php echo $i4 . ".";
                                                    $i4++; ?>
                                </span>
                                <img src="admin/modules/account/uploads-ac/<?php echo $row_res2['hinhanh'] ?>"
                                    alt="<?php echo $row_res2['hinhanh'] ?>">
                                <div class="block-user">
                                    <div class="name-user">
                                        <a
                                            href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_res2['mataikhoan'] ?>">
                                            <?php echo $row_res2['tendangnhap'] ?>
                                        </a>
                                    </div>
                                    <div class="name-user"><?php echo $row_res2['ten'] ?></div>
                                </div>
                            </div>
                            <div class="detail-user-team">
                                <div class="block-user right-w">
                                    <span><?php echo date('d-m-Y &#10059; H:i:s', strtotime($row_res2['thoigianthamgia'])) ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            } else {
                                ?>
                        <div class="users-team">
                            <div class="detail-user-team none-user">
                                (Chưa có thành viên)
                            </div>
                        </div>
                        <?php
                            }
                            ?>
                    </div>
                </div>
                <form action="screen/contest-sc/handle-php/add-user.php" method="post">
                    <div class="btn-team">
                        <input type="text" name="mataikhoan" value="<?php echo $mataikhoan ?>" style="display: none;">
                        <input type="text" name="masukien" value="<?php echo $masukien ?>" style="display: none;">
                        <?php
                            $check_exis =
                                "SELECT * FROM thamgiasukien WHERE masukien = $masukien AND mataikhoan = $mataikhoan LIMIT 1";
                            $query_check_exis = mysqli_query($mysqli, $check_exis);
                            if ($mataikhoan == '') {
                                $exis_login = 0;
                            } else {
                                $exis_login = 1;
                                $exis = mysqli_num_rows($query_check_exis);
                            }
                            if ($exis_login == 0) {
                                echo '<button type="submit" class="btn-submit disable-btn">Bạn chưa đăng nhập</button>';
                            } else if ($time <= 0) {
                                echo '<button type="submit" class="btn-submit disable-btn">Hết hạn tham gia</button>';
                            } else if ($exis > 0) {
                                echo '<button type="submit" class="btn-submit disable-btn">Bạn đã tham gia sự kiện</button>';
                            } else if ($player_res2 == (($row_contest['soluongcauthu']) / 2)) {
                                echo '<button type="submit" class="btn-submit disable-btn">Đủ thành viên</button>';
                            } else {
                                echo '<button type="submit" class="btn-submit" name="dubihai">Tham gia đội</button>';
                            }
                            ?>
                    </div>
                </form>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <!-- Khung bình luận -----------------------------------------------------------------------------  -->
    <div id="contest-comment">
        <div class="title-comment">
            <img src="assets/images/icons/bubble-chat.gif" alt="Ảnh"
                style="width: 30px; height: 30px; margin-top: -5px;">
            <span>BÌNH LUẬN</span>
        </div>
        <div class="list-contest-cm">
            <ul>
                <?php
                $list_cm_contest =
                    "SELECT * FROM binhluansukien, taikhoan 
                    WHERE binhluansukien.mataikhoan = taikhoan.mataikhoan 
                    AND masukien = $masukien ORDER BY mabinhluansukien DESC";
                $query_list_cm_contest = mysqli_query($mysqli, $list_cm_contest);
                while ($row_list_cm_contest = mysqli_fetch_array($query_list_cm_contest)) {
                ?>
                <li>
                    </form>
                    <?php
                        if ($mataikhoan == $row_list_cm_contest['mataikhoan']) {
                        ?>
                    <div class="block-control delete-btn">
                        <form action="screen/contest-sc/handle-php/delete-comment.php" method="post" class="form-del">
                            <input type="text" name="mabinhluansukien"
                                value="<?php echo $row_list_cm_contest['mabinhluansukien'] ?>" style="display: none;">
                            <input type="text" name="masukien" value="<?php echo $masukien ?>" style="display: none;">
                            <button type="submit" name="xoabinhluansukien" title="Xóa bình luận"
                                onclick="return confirm('Bạn có muốn xóa bình luận này?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                    <?php
                        } else { ?>
                    <div class="block-control">
                        <button type="submit"></button>
                    </div>
                    <?php
                        }
                        ?>
                    <div class="block-user-cm">
                        <img src="admin/modules/account/uploads-ac/<?php echo $row_list_cm_contest['hinhanh'] ?>"
                            alt="<?php echo $row_list_cm_contest['hinhanh'] ?>">
                        <div class="block-user-detail">
                            <div class="name-user-cm">
                                <a
                                    href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_list_cm_contest['mataikhoan'] ?>">
                                    <?php echo $row_list_cm_contest['ten'] ?></a>
                                <?php
                                    $sql_tag = "SELECT * FROM thamgiasukien
                                    WHERE mataikhoan = $row_list_cm_contest[mataikhoan] AND masukien = $masukien LIMIT 1";
                                    $query_tag = mysqli_query($mysqli, $sql_tag);
                                    while ($row_tag = mysqli_fetch_array($query_tag)) {
                                        switch ($row_tag['vitrithamgia']) {
                                            case "1":
                                                echo " - <span>Đội 1</span>";
                                                break;
                                            case "2":
                                                echo " - <span>Dự bị 1</span>";
                                                break;
                                            case "3":
                                                echo " - <span>Đội 2</span>";
                                                break;
                                            case "4":
                                                echo " - <span>Dự bị 2</span>";
                                        }
                                    } ?>
                            </div>
                            <div class="time-user-cm"><?php echo $row_list_cm_contest['thoigianbinhluansukien'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="block-comment">
                        <p><?php echo $row_list_cm_contest['noidungbinhluansukien'] ?></p>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- Ẩn / Hiện Box chat --------------------------------------------------------------------- -->
        <?php
        if ($mataikhoan != '') {
            $sql_comment_exis = "SELECT * FROM thamgiasukien WHERE masukien = $masukien AND mataikhoan = $mataikhoan";
            $query_comment_exis = mysqli_query($mysqli, $sql_comment_exis);
            $comment_exis = mysqli_num_rows($query_comment_exis);
        } else {
            $comment_exis = 0;
        }
        if ($mataikhoan != '' && $comment_exis > 0) {
        ?>
        <div class="add-comment">
            <?php
                $user_comment =
                    "SELECT * FROM thamgiasukien, taikhoan 
                WHERE thamgiasukien.mataikhoan = taikhoan.mataikhoan
                AND thamgiasukien.mataikhoan = $mataikhoan AND masukien = $masukien LIMIT 1";
                $query_user_comment = mysqli_query($mysqli, $user_comment);
                while ($row_user = mysqli_fetch_array($query_user_comment)) {
                ?>
            <div class="block-user-cm">
                <div><i class="fa-solid fa-comment-captions"></i></div>
                <img src="admin/modules/account/uploads-ac/<?php echo $row_user['hinhanh'] ?>"
                    alt="<?php echo $row_user['hinhanh'] ?>">
                <div class="block-user-detail">
                    <div class="name-user-cm">
                        <a href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_user['mataikhoan'] ?>"><?php echo $row_user['ten'] ?>
                        </a>
                        <?php switch ($row_user['vitrithamgia']) {
                                    case "1":
                                        echo " - <span>Đội 1</span>";
                                        break;
                                    case "2":
                                        echo " - <span>Dự bị 1</span>";
                                        break;
                                    case "3":
                                        echo " - <span>Đội 2</span>";
                                        break;
                                    case "4":
                                        echo " - <span>Dự bị 2</span>";
                                } ?>
                    </div>
                </div>
            </div>
            <div class="input-comment">
                <form action="screen/contest-sc/handle-php/add-comment.php" method="post">
                    <input type="text" name="mataikhoan" value="<?php echo $mataikhoan ?>" style="display: none;">
                    <input type="text" name="masukien" value="<?php echo $masukien ?>" style="display: none;">
                    <textarea name="noidungbinhluansukien" id="noidungbinhluansukien"
                        onkeyup="ktNoiDungBinhLuansukien();" placeholder="Viết bình luận tại đây ..."></textarea>
                    <button type="submit" name="guibinhluansukien" id="guibinhluansukien" disabled>GỬI</button>
                </form>
            </div>
            <?php
                }
                ?>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<script src="screen/contest-sc/handle-js/count-down-time.js"></script>
<script>
function ktNoiDungBinhLuansukien() {
    if (document.getElementById("noidungbinhluansukien").value === "") {
        document.getElementById('guibinhluansukien').disabled = true;
    } else {
        document.getElementById('guibinhluansukien').disabled = false;
    }
}
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_SESSION['dathamgia']) && $_SESSION['dathamgia'] == 1) { ?>
<script>
Swal.fire({
    title: 'Tham gia thành công!',
    text: "Bạn đã tham gia vào đội 1!",
    icon: 'success',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['dathamgia']); ?>
    }
})
</script>
<?php } ?>
<?php if (isset($_SESSION['dathamgia']) && $_SESSION['dathamgia'] == 2) { ?>
<script>
Swal.fire({
    title: 'Tham gia thành công!',
    text: "Bạn đã tham gia vào đội dự bị 1!",
    icon: 'success',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['dathamgia']); ?>
    }
})
</script>
<?php } ?>
<?php if (isset($_SESSION['dathamgia']) && $_SESSION['dathamgia'] == 3) { ?>
<script>
Swal.fire({
    title: 'Tham gia thành công!',
    text: "Bạn đã tham gia vào đội 2!",
    icon: 'success',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['dathamgia']); ?>
    }
})
</script>
<?php } ?>
<?php if (isset($_SESSION['dathamgia']) && $_SESSION['dathamgia'] == 4) { ?>
<script>
Swal.fire({
    title: 'Tham gia thành công!',
    text: "Bạn đã tham gia vào đội dự bị 2!",
    icon: 'success',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['dathamgia']); ?>
    }
})
</script>
<?php } ?>