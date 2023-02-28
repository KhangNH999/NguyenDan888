<script src="screen/detail-sc/detail-setpitch.js"></script>
<div id="left-detail-setpitch">
    <?php
    $sql_chitiet =
        "SELECT * FROM san, taikhoan
    WHERE san.mataikhoan = taikhoan.mataikhoan
    AND san.masan='$_GET[idSan]' LIMIT 1";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
    ?>
    <section id="detail-setpitch">
        <a class="title" href="">
            <h1>
                <?php echo $row_chitiet['tieudesan'] ?>
            </h1>
        </a>
        <ul class="user-action">
            <li>
                <form action="screen/detail-sc/handle-user/handle-like-pitch.php" method="post">
                    <?php
                        // Đếm số like
                        $sql_like_count = "SELECT * FROM luotyeuthichsan WHERE masan = '$_GET[idSan]'";
                        $count = mysqli_num_rows(mysqli_query($mysqli, $sql_like_count));
                        // Nếu tồn tại id_khachhang thì mới có thể yêu thích
                        if (isset($_SESSION['id_khachhang'])) {
                            $sql_like = "SELECT * FROM luotyeuthichsan WHERE mataikhoan = '$_SESSION[id_khachhang]' AND masan = '$_GET[idSan]' LIMIT 1";
                            $query_like = mysqli_query($mysqli, $sql_like);
                            while ($row_like = mysqli_fetch_array($query_like)) {
                                $mayeuthichsan = $row_like['mayeuthichsan'];
                            }
                            $count_like = mysqli_num_rows($query_like);
                            // != 0 khi sql có trả về dữ liệu 
                            if ($count_like != 0) {
                        ?>
                    <input type="text" name="mayeuthichsan" id="mayeuthichsan" style="display: none;"
                        value="<?php echo $mayeuthichsan ?>">
                    <input type="text" name="mataikhoan" id="mataikhoan" style="display: none;"
                        value="<?php echo $_SESSION['id_khachhang'] ?>">
                    <input type="text" name="masan" id="masan" style="display: none;"
                        value="<?php echo $_GET['idSan'] ?>">
                    <button type="submit" class="favorites btns liked" name="like" title="Hủy yêu thích!">
                        <i class="fa-solid fa-heart"></i>
                        <span class="count"><?php echo $count ?></span>
                    </button>
                    <?php } else { ?>
                    <input type="text" name="mayeuthichsan" id="mayeuthichsan" style="display: none;"
                        value="<?php echo $mayeuthichsan ?>">
                    <input type="text" name="mataikhoan" id="mataikhoan" style="display: none;"
                        value="<?php echo $_SESSION['id_khachhang'] ?>">
                    <input type="text" name="masan" id="masan" style="display: none;"
                        value="<?php echo $_GET['idSan'] ?>">
                    <button type="submit" class="favorites btns" name="unlike" title="Yêu thích!">
                        <i class="fa-solid fa-heart"></i>
                        <span class="count"><?php echo $count ?></span>
                    </button>
                    <?php }
                        } else { ?>
                    <a href="index.php?quanly=dangnhap" class="favorites btns" title="Yêu thích!">
                        <i class="fa-solid fa-heart"></i>
                        <span class="count"><?php echo $count ?></span>
                    </a>
                    <?php } ?>
                </form>

            </li>
            <li>
                <div>
                    <!-- Phải đăng nhập thì mới đặt sân được-->
                    <a <?php if (isset($_SESSION['tenkhachhang'])) { ?>
                        href="index.php?quanly=datlich&&idSan=<?php echo $row_chitiet['masan'] ?>" <?php } else { ?>
                        href="index.php?quanly=dangnhap" <?php } ?> class="apply btn">Đặt sân
                    </a>
                </div>
            </li>
            <li>
                <form action="screen/detail-sc/handle-user/handle-follow.php" method="post"
                    style="display: inline-block;">
                    <!-- Nêu không đăng nhập thì không theo dõi được  -->
                    <?php if (isset($_SESSION['id_khachhang'])) {
                            $sql_follow = "SELECT * FROM theodoi WHERE mataikhoan = '$_SESSION[id_khachhang]' AND masan = '$_GET[idSan]' LIMIT 1";
                            $query_follow = mysqli_query($mysqli, $sql_follow);
                            while ($row_follow = mysqli_fetch_array($query_follow)) {
                                $matheodoi = $row_follow['matheodoi'];
                            }
                            $count_follow = mysqli_num_rows($query_follow);
                            // != 0 khi sql có trả về data
                            if ($count_follow != 0) {
                        ?>
                    <input type="text" name="matheodoi" id="matheodoi" style="display: none;"
                        value="<?php echo $matheodoi ?>">
                    <input type="text" name="mataikhoan" id="mataikhoan" style="display: none;"
                        value="<?php echo $_SESSION['id_khachhang'] ?>">
                    <input type="text" name="masan" id="masan" style="display: none;"
                        value="<?php echo $_GET['idSan'] ?>">
                    <button type="submit" class="follow btns followed" name="follow" title="Hủy theo dõi!">
                        <i class="fa-solid fa-star"></i>
                    </button>
                    <?php } else { ?>
                    <input type="text" name="matheodoi" id="matheodoi" style="display: none;"
                        value="<?php echo $matheodoi ?>">
                    <input type="text" name="mataikhoan" id="mataikhoan" style="display: none;"
                        value="<?php echo $_SESSION['id_khachhang'] ?>">
                    <input type="text" name="masan" id="masan" style="display: none;"
                        value="<?php echo $_GET['idSan'] ?>">
                    <button type="submit" class="follow btns" name="unfollow" title="Theo dõi!">
                        <i class="fa-solid fa-star"></i>
                    </button>
                    <?php }
                        } else { ?>
                    <a href="index.php?quanly=dangnhap" class="follow btns" title="Theo dõi!">
                        <i class="fa-solid fa-star"></i>
                    </a>
                    <?php } ?>
                </form>
                <!-- Kiểm tra không có đăng nhập thì sẽ không báo cáo -->
                <?php
                    if (isset($_SESSION['id_khachhang'])) {
                    ?>
                <button name="button" class="report btns" onclick="openFormReport();" title="Báo cáo!">
                    <i class="fa-solid fa-gear"></i>
                </button>
                <?php
                    } else {
                    ?>
                <a href="index.php?quanly=dangnhap" class="report btns" title="Báo cáo!">
                    <i class="fa-solid fa-gear"></i></a>
                <?php
                    }
                    ?>
            </li>
        </ul>
        <table class="detail">
            <tbody>
                <tr>
                    <th>Người đăng</th>
                    <td class="user">
                        <a href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_chitiet['mataikhoan'] ?>">
                            <img src="admin/modules/account/uploads-ac/<?php echo $row_chitiet['hinhanh'] ?>"
                                alt="<?php echo $row_chitiet['hinhanh'] ?>" />
                            <?php echo $row_chitiet['ten'] ?>
                        </a>
                        <span class="points">
                            |
                            <span class="vote">
                                <!-- Hiển thị đánh giá -->
                                <?php
                                    $sql = "SELECT * FROM danhgia WHERE matkdanhgia = $row_chitiet[mataikhoan]";
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
                                Đánh giá
                                <b>+<?php echo round($result, 1) ?></b>
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
                            </span>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Ngày đăng</th>
                    <td class="date">
                        <strong>
                            <span class="day">
                                <?php echo date('d-m-Y &#10059; H:i:s', strtotime($row_chitiet['thoigiantaosan'])) ?>
                            </span>
                        </strong>
                    </td>
                </tr>
                <tr>
                    <th>Khung giờ</th>
                    <td class="time">
                        <div class="frame-time">
                            <!-- Khung giờ 1 -->
                            <?php
                                $sql_get_time_pitch_1 = "SELECT * FROM khunggio WHERE masan = '$_GET[idSan]' AND thutukhunggio = 1 LIMIT 1";
                                $query_get_time_pitch_1 = mysqli_query($mysqli, $sql_get_time_pitch_1);
                                while ($row_get_time_pitch_1 = mysqli_fetch_array($query_get_time_pitch_1)) {
                                ?>
                            <span><?php echo date("H:i", strtotime($row_get_time_pitch_1['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_1['gioketthuc'])) ?></span>
                            <?php } ?>
                            <!-- Khung giờ 2 -->
                            <?php
                                $sql_get_time_pitch_2 = "SELECT * FROM khunggio WHERE masan = '$_GET[idSan]' AND thutukhunggio = 2 LIMIT 1";
                                $query_get_time_pitch_2 = mysqli_query($mysqli, $sql_get_time_pitch_2);
                                while ($row_get_time_pitch_2 = mysqli_fetch_array($query_get_time_pitch_2)) {
                                ?>
                            <span><?php echo date("H:i", strtotime($row_get_time_pitch_2['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_2['gioketthuc'])) ?></span>
                            <?php } ?>
                            <!-- Khung giờ 3 -->
                            <?php
                                $sql_get_time_pitch_3 = "SELECT * FROM khunggio WHERE masan = '$_GET[idSan]' AND thutukhunggio = 3 LIMIT 1";
                                $query_get_time_pitch_3 = mysqli_query($mysqli, $sql_get_time_pitch_3);
                                while ($row_get_time_pitch_3 = mysqli_fetch_array($query_get_time_pitch_3)) {
                                ?>
                            <span><?php echo date("H:i", strtotime($row_get_time_pitch_3['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_3['gioketthuc'])) ?></span>
                            <?php } ?>
                        </div>
                        <div class="frame-time">
                            <!-- Khung giờ 4 -->
                            <?php
                                $sql_get_time_pitch_4 = "SELECT * FROM khunggio WHERE masan = '$_GET[idSan]' AND thutukhunggio = 4 LIMIT 1";
                                $query_get_time_pitch_4 = mysqli_query($mysqli, $sql_get_time_pitch_4);
                                while ($row_get_time_pitch_4 = mysqli_fetch_array($query_get_time_pitch_4)) {
                                ?>
                            <span><?php echo date("H:i", strtotime($row_get_time_pitch_4['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_4['gioketthuc'])) ?></span>
                            <?php } ?>
                            <!-- Khung giờ 5 -->
                            <?php
                                $sql_get_time_pitch_5 = "SELECT * FROM khunggio WHERE masan = '$_GET[idSan]' AND thutukhunggio = 5 LIMIT 1";
                                $query_get_time_pitch_5 = mysqli_query($mysqli, $sql_get_time_pitch_5);
                                while ($row_get_time_pitch_5 = mysqli_fetch_array($query_get_time_pitch_5)) {
                                ?>
                            <span><?php echo date("H:i", strtotime($row_get_time_pitch_5['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_5['gioketthuc'])) ?></span>
                            <?php } ?>
                            <!-- Khung giờ 6 -->
                            <?php
                                $sql_get_time_pitch_6 = "SELECT * FROM khunggio WHERE masan = '$_GET[idSan]' AND thutukhunggio = 6 LIMIT 1";
                                $query_get_time_pitch_6 = mysqli_query($mysqli, $sql_get_time_pitch_6);
                                while ($row_get_time_pitch_6 = mysqli_fetch_array($query_get_time_pitch_6)) {
                                ?>
                            <span><?php echo date("H:i", strtotime($row_get_time_pitch_6['giobatdau'])) . ' - ' . date("H:i", strtotime($row_get_time_pitch_6['gioketthuc'])) ?></span>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Tên sân</th>
                    <td>
                        <span class="pitch">
                            <?php echo $row_chitiet['tensan'] ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Địa điểm</th>
                    <td>
                        <span class="street">
                            <a href="https://www.google.com/maps/place/<?php echo $row_chitiet['diachisan'] ?>"
                                target="_blank"><?php echo $row_chitiet['diachisan'] ?></a>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Giá thuê</th>
                    <td>
                        <?php echo number_format($row_chitiet['giathue'], 0, ',', '.') ?> vnđ
                    </td>
                </tr>
                <tr>
                    <th>Nội dung</th>
                    <td class="content">
                        <p>
                            <?php echo $row_chitiet['noidungsan'] ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="img-pitch">
            <?php if ($row_chitiet['hinhanhsan'] == "") { ?>
            <img src="admin/modules/pitch/uploads-pitch/<?php echo $row_chitiet['hinhanhsan'] ?>"
                alt="<?php echo $row_chitiet['hinhanhsan'] ?>" style="display:none;">
            <?php } else {
                ?>
            <img src="admin/modules/pitch/uploads-pitch/<?php echo $row_chitiet['hinhanhsan'] ?>"
                alt="<?php echo $row_chitiet['hinhanhsan'] ?>">
            <?php
                }
                ?>
        </div>
        <div class="apply-bottom">
            <!-- Nếu có đăng nhập thì mới được đặt sân-->
            <a <?php if (isset($_SESSION['tenkhachhang'])) { ?>
                href="index.php?quanly=datlich&&idSan=<?php echo $row_chitiet['masan'] ?>" <?php } else { ?>
                href="index.php?quanly=dangnhap" <?php } ?> class="apply btn">Đặt sân
            </a>
        </div>

        <div id="countdown">
            <h4 id="end">Đếm ngược hết ngày: </h4>
            <div class="countdown-container">
                <div class="countdown-el hours-c">
                    <p class="text" id="hours">0</p>
                    <span>giờ</span>
                </div>
                <div class="countdown-el mins-c">
                    <p class="text" id="mins">0</p>
                    <span>phút</span>
                </div>
                <div class="countdown-el seconds-c">
                    <p class="text" id="seconds">0</p>
                    <span>giây</span>
                </div>
            </div>
        </div>
        <!-- Xử lý thời gian giảm dần -->
        <script src="assets/javascript/countdown.js"></script>
        <?php
    }
        ?>
        <?php
        //Tạo số phần tử hiển thị
        $limit = 3;
        //Lấy page trang hiện tại
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
        $sql_comment =
            "SELECT * FROM san, binhluansan, taikhoan
        WHERE san.masan = binhluansan.masan
        AND binhluansan.mataikhoan = taikhoan.mataikhoan
        AND san.masan='$_GET[idSan]' ORDER BY mabinhluansan DESC LIMIT $begin, $limit";
        //Nếu không có bình luận
        $query_null_comment = mysqli_query($mysqli, $sql_comment);
        //Nếu có bình luận
        $query_comment = mysqli_query($mysqli, $sql_comment);
        //Lấy số lượng bình luận
        $sql_page = mysqli_query($mysqli, "SELECT * FROM binhluansan WHERE masan='$_GET[idSan]'");
        $row_count = mysqli_num_rows($sql_page);
        ?>
        <section id="comments">
            <h3>
                <i class="fa-solid fa-comment-dots"></i>
                <span>
                    <span class="comment-count">
                        <?php echo $row_count ?>
                    </span>
                    Bình luận
                </span>
            </h3>
            <?php
            if (mysqli_fetch_array($query_null_comment) == null) {
            ?>
            <div class="none"><span>Không có bình luận nào.</span></div>
            <?php
            }
            ?>
            <?php
            while ($row_comment = mysqli_fetch_array($query_comment)) {
            ?>
            <form action="screen/detail-sc/handle-comments/delete-cm-pitch.php" method="post">
                <ul class="list-comments">
                    <li>
                        <!-- Lấy mã bình luận và mã sân đồng thời ẩn nó -->
                        <input type="text" name="mabinhluansan" id="mabinhluan" style="display: none;"
                            value="<?php echo $row_comment['mabinhluansan'] ?>">
                        <input type="text" name="masan" id="masan" style="display: none;"
                            value="<?php echo $_GET['idSan'] ?>">
                        <div class="user-cm">
                            <div class="pict-user-cm">
                                <img src="admin/modules/account/uploads-ac/<?php echo $row_comment['hinhanh'] ?>"
                                    alt="<?php echo $row_comment['hinhanh'] ?>" />
                            </div>
                            <div class="text-cm">
                                <div class="name-cm">
                                    <a
                                        href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_comment['mataikhoan'] ?>">
                                        <?php echo $row_comment['ten'] ?>
                                    </a>
                                </div>
                                <div class="date-cm">
                                    <!--Thời gian hiện tại trừ thời gian tạo bình luận -->
                                    <span>
                                        <?php
                                            $date1 = new DateTime();
                                            $date2 = new DateTime($row_comment['thoigianbinhluansan']);
                                            $interval = $date1->diff($date2);
                                            if ($interval->days == 0) {
                                                echo " Hôm nay ";
                                            } else {
                                                echo $interval->days . " ngày trước";
                                            }
                                            ?>
                                    </span>
                                </div>
                            </div>
                            <!-- Nếu có đăng nhập sẽ hiển thị nút xóa -->
                            <?php if (isset($_SESSION['id_khachhang']) && $row_comment['mataikhoan'] == $_SESSION['id_khachhang']) { ?>
                            <input type="submit" name="xoabinhluan" id="dl-comments" value="&#215;"
                                onclick="return confirm('Bạn có muốn xóa bình luận này?')">
                            <?php } ?>
                        </div>
                        <div class="body-cm">
                            <p class="content-cm">
                                <?php echo $row_comment['noidungbinhluansan'] ?>
                            </p>
                        </div>
                    </li>
                </ul>
            </form>
            <?php
            }
            ?>
            <?php
            //Lấy tổng số page hiện có
            $page = ceil($row_count / $limit);
            ?>
            <?php if ($page != '0') { ?>
            <div class="page">
                <p>Trang bình luận: <?php echo $page_get . "/" . $page ?></p>
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
                            href="index.php?quanly=chitietdatsan&&idSan=<?php echo $_GET['idSan'] ?>&page=<?php echo $i ?>#comments"><?php echo $i ?></a>
                    </li>
                    <?php
                        }
                        ?>
                </ul>
            </div>
            <?php } ?>
            <?php
            //Nếu chưa đăng nhập, hộp thoại bình luận sẽ ẩn
            if (isset($_SESSION['tenkhachhang'])) {
                //get SESSION id_khachhang form Login.php
                $mataikhoan = $_SESSION['id_khachhang'];
                $sql = "SELECT * FROM taikhoan WHERE mataikhoan = '$mataikhoan' LIMIT 1";
                $resurlt_ac = mysqli_query($mysqli, $sql);
                while ($row_result = mysqli_fetch_array($resurlt_ac)) {
            ?>
            <form action="screen/detail-sc/handle-comments/add-cm-pitch.php" method="post">
                <div class="comment-create">
                    <!-- Hiển thị ảnh và tên đăng nhập -->
                    <div class="user">
                        <img src="admin/modules/account/uploads-ac/<?php echo $row_result['hinhanh'] ?>"
                            alt="<?php echo $row_result['hinhanh'] ?>">
                        <span class="name"><?php echo $row_result['ten'] ?></span>
                    </div>
                    <input type="text" name="mataikhoan" id="mataikhoan" style="display: none;"
                        value="<?php echo $row_result['mataikhoan'] ?>">
                    <input type="text" name="masan" id="masan" style="display: none;"
                        value="<?php echo $_GET['idSan'] ?>">
                    <div class="w100">
                        <textarea rows="5" placeholder="Nhận xét * Lên đến 1000 ký tự" maxlength="1000"
                            name="noidungbinhluansan" id="noidungbinhluansan"></textarea>
                        <p>* Vui lòng hạn chế từ ngữ nhạy cảm hoặc thông tin cá nhân trong phần bình luận</p>
                    </div>
                    <div class="btn-green">
                        <input type="submit" name="dangbinhluan" value="Đăng bình luận">
                    </div>
                </div>
            </form>
            <?php
                }
            }
            ?>
        </section>
    </section>
    <!-- post report -->
    <link rel="stylesheet" href="assets/css/setpitch/detail-setpitch.css">
    <form action="screen/detail-sc/handle-user/handle-report-setpitch.php" method="post">
        <div id="myform">
            <div id="f-bc">
                <h5 style="font-size: 1.25rem;padding-top: 2px;color: red;">Báo cáo</h5>
                <input type="button" value="Đóng" class="btn btn-danger" onclick="closeFormReport()"
                    style="background-color: #F08080;font-size: 10px;width: 35px;border-radius: 3px;border: 0.2px solid #FF0000;height: 20px;margin: 4px 0px;padding:0;">
            </div>
            <div id="f-inp">
                <input type="text" name="mataikhoan" id="mataikhoan" style="display: none;"
                    value="<?php echo $_SESSION['id_khachhang'] ?>">
                <input type="text" name="masan" id="masan" style="display: none;" value="<?php echo $_GET['idSan'] ?>">
                <textarea rows="4" name="noidungbaocaosan" placeholder="Nhập một báo cáo" maxlength="3000"
                    required></textarea>
                <p style="margin-left:1px; font-size:13px; font-weight:bold;">Nếu bạn thực hiện một báo cáo, nó sẽ được
                    báo
                    cáo cho ban thư ký HiNaDa.
                    Xin lưu ý rằng không phải tất cả các báo cáo đều có thể được xử lý.</p>
            </div>
            <div id="f-btns">
                <input type="submit" class="btn btn-danger" name="reportsetpitch" value="Báo cáo" id="f-btn"
                    style="padding: 6px; font-size: 12px;font-weight:400;">
            </div>
        </div>
    </form>
</div>
<div id="right">
    <?php include('screen/main-sc/recruit-main-sc.php') ?>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('noidungbinhluansan');
</script>
<!-- Kiểm tra báo cáo sân thành công -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (isset($_GET['reportsetpitch']) && $_GET['reportsetpitch'] == 'success') {
?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Thành công',
    text: 'Báo cáo thành công.',
})
setTimeout(function() {
    window.location.href = "index.php?quanly=chitietdatsan&&idSan=" +
        <?php echo $_GET['idSan'] ?>;
}, 3000);
</script>
<?php
}
if (isset($_GET['vali']) && $_GET['vali'] == '9') {
?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Thất bại',
    text: 'Vui lòng nhập nội dung bình luận.',
})
setTimeout(function() {
    window.location.href = "index.php?quanly=chitietdatsan&&idSan=" +
        <?php echo $_GET['idSan'] ?>;
}, 3000);
</script>
<?php
}
?>
<?php if (isset($_SESSION['setpitch_error']) && $_SESSION['setpitch_error'] == 1) { ?>
<script>
Swal.fire({
    title: 'Đặt sân thất bại!',
    text: "Bạn không thể đặt sân trên chính sân của bạn!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['setpitch_error']); ?>
    }
})
</script>
<?php } ?>