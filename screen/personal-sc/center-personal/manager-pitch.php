<?php
//Kiểm tra đường dẫn
$matk = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';

$sql_type = "SELECT maloaitaikhoan FROM taikhoan WHERE mataikhoan = $matk";
$query_type = mysqli_query($mysqli, $sql_type);
while ($row_type = mysqli_fetch_array($query_type)) {
    $maloaitaikhoan = $row_type['maloaitaikhoan'];
}

if ($maloaitaikhoan == 2) {
?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}
?>
<div id="center-personal">
    <h2 class="title-follow">
        <i class="fa-solid fa-calendar-day"></i>
        Quản lý sân
    </h2>
    <?php
    //Tạo số phần tử hiển thị
    $limit = 5;
    //Tạo thứ tự trang hiện tại trên tổng số trang
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
    $sql_pitch = "SELECT * FROM san, taikhoan 
    WHERE san.mataikhoan = taikhoan.mataikhoan AND san.tinhtrangsan = 1 
    AND san.mataikhoan = '$_SESSION[id_khachhang]' ORDER BY masan DESC LIMIT $begin, $limit";
    $query_pitch = mysqli_query($mysqli, $sql_pitch);
    //Lấy số lượng hàng bảng sân
    $sql_page = mysqli_query($mysqli, "SELECT * FROM san, taikhoan 
    WHERE san.mataikhoan = taikhoan.mataikhoan AND san.tinhtrangsan = 1
    AND san.mataikhoan = '$_SESSION[id_khachhang]'");
    $row_count = mysqli_num_rows($sql_page);
    if ($row_count > 0) {
        while ($dong = mysqli_fetch_array($query_pitch)) {
    ?>
    <form action="screen/personal-sc/center-personal/handle-center-personal/handle-pitch.php" method="post">
        <ul class="set-pitch-list">
            <input type="text" name="masancuatoi" id="masan" style="display: none;"
                value="<?php echo $dong['masan'] ?>">
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
                    <!-- Hiển thị tình trạng sân -->
                    <?php if ($dong['tinhtrangsan'] == 0) { ?>
                    <span class="seperate">|</span>
                    <i class="fa-solid fa-lock" style="color:#528B8B; font-size: 13px;"></i>
                    <?php } ?>
                    <!-- Hiển thị số lượng bình luận -->
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
                    <!-- Hiển thị số lượng theo dõi  -->
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
                    <!-- Hiển thị số lượng thích -->
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
                <button type="submit" class="btn-del" title="Xóa" name="xoasan"
                    onclick="return confirm('Lưu ý: Xóa sân sẽ xóa tất cả dữ liệu liên quan sân này.\nBạn đã chắc chắn?')">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <button type="submit" class="btn-edit" title="Sửa" name="suasan"
                    onclick="return confirm('Lưu ý: Sửa sân sẽ Sửa tất cả dữ liệu liên quan sân này.\nBạn đã chắc chắn?')">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
            </li>
        </ul>
    </form>
    <?php
        }
        ?>
    <?php
        //Lấy số trang hiện có
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
                            } ?> href="index.php?quanly=quanlysan&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php
                }
                ?>
        </ul>
    </div>
    <?php
    } else {
    ?>
    <div class="none"><span>Bạn không có tạo sân nào.</span></div>
    <?php } ?>
</div>
<script src="assets/javascript/change-new-icon.js"></script>