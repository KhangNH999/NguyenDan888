<?php
//Sân có lượt yêu thích nhiều nhất
$sql_pitch_popular = "SELECT masan, COUNT(masan) AS 'SOLUONG' 
FROM luotyeuthichsan GROUP BY masan ORDER BY SOLUONG DESC LIMIT 3";
$query_pitch_popular = mysqli_query($mysqli, $sql_pitch_popular);
$count_pitch_popular = mysqli_num_rows($query_pitch_popular);
//Blog có lượt yêu thích nhiều nhất
$sql_blog_popular = "SELECT mablog, COUNT(mablog) AS 'SOLUONG' 
FROM luotyeuthichblog GROUP BY mablog ORDER BY SOLUONG DESC LIMIT 3";
$query_blog_popular = mysqli_query($mysqli, $sql_blog_popular);
$count_blog_popular = mysqli_num_rows($query_blog_popular);
//Tài khoản được đánh giá nhiều nhất
$sql_user_popular = "SELECT matkdanhgia, COUNT(matkdanhgia) AS 'SOLUONG' 
FROM danhgia GROUP BY matkdanhgia ORDER BY SOLUONG DESC LIMIT 3";
$query_user_popular = mysqli_query($mysqli, $sql_user_popular);
$count_user_popular = mysqli_num_rows($query_user_popular);
?>
<div class="title-popular">
    <img src="assets/images/icons/favorite.gif" alt="Ảnh" style="width: 30px; height: 30px;">
    <span style="margin-left: 4px;">NỔI BẬT</span>
</div>
<ul>
    <div class="popular">
        <div class="popular-title">Top sân bóng</div>
        <?php
        while ($row_popular = mysqli_fetch_array($query_pitch_popular)) {
            $get_detail =
                "SELECT * FROM san WHERE masan = '$row_popular[masan]'";
            $query_get_detail = mysqli_query($mysqli, $get_detail);
            while ($row_detail = mysqli_fetch_array($query_get_detail)) {
        ?>
        <li>
            <a href="index.php?quanly=chitietdatsan&&idSan=<?php echo $row_popular['masan'] ?>" class="popular-content">
                <span class="top-title"><?php echo $row_detail['tieudesan'] ?></span>
                <span class="top-number">
                    <span class="top-count"><?php echo $row_popular['SOLUONG'] ?></span>
                    <i class="fa-solid fa-heart" style="color:rgb(213, 54, 54); font-size: 13px;"></i>
                </span>
            </a>
        </li>
        <?php }
        } ?>
    </div>
    <div class="popular">
        <div class="popular-title">Top blog</div>
        <?php
        while ($row_popular = mysqli_fetch_array($query_blog_popular)) {
            $get_detail =
                "SELECT * FROM blog WHERE mablog = '$row_popular[mablog]'";
            $query_get_detail = mysqli_query($mysqli, $get_detail);
            while ($row_detail = mysqli_fetch_array($query_get_detail)) {
        ?>
        <li>
            <a href="index.php?quanly=chitietblog&&idchitietblog=<?php echo $row_popular['mablog'] ?>"
                class="popular-content">
                <span class="top-title"><?php echo $row_detail['tieudeblog'] ?></span>
                <span class="top-number">
                    <span class="top-count"><?php echo $row_popular['SOLUONG'] ?></span>
                    <i class="fa-solid fa-thumbs-up" style="color:#1c6cc1; font-size: 13px;"></i>
                </span>
            </a>
        </li>
        <?php }
        } ?>
    </div>
    <div class="popular">
        <div class="popular-title">Top tài khoản</div>
        <?php
        while ($row_popular = mysqli_fetch_array($query_user_popular)) {
            $get_detail =
                "SELECT * FROM danhgia, taikhoan 
                WHERE danhgia.matkdanhgia = taikhoan.mataikhoan 
                AND danhgia.matkdanhgia = '$row_popular[matkdanhgia]' LIMIT 1";
            $query_get_detail = mysqli_query($mysqli, $get_detail);
            while ($row_detail = mysqli_fetch_array($query_get_detail)) {
        ?>
        <li>
            <a href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_popular['matkdanhgia'] ?>"
                class="popular-content">
                <span class="top-img"><img src="admin/modules/account/uploads-ac/<?php echo $row_detail['hinhanh'] ?>"
                        alt="<?php echo $row_detail['hinhanh'] ?>"></span>
                <span class="top-title title-user"><?php echo $row_detail['ten'] ?></span>
                <span class="top-number number-user">
                    <span class="top-count"><?php echo $row_popular['SOLUONG'] ?></span>
                    <i class="fa-solid fa-user" style="color:#F88E36; font-size: 13px;"></i>
                    <span style="font-size: 15px; font-weight: 100;">|</span>
                    <?php
                            $sql = "SELECT * FROM danhgia WHERE matkdanhgia =  $row_detail[mataikhoan]";
                            $query_total = mysqli_query($mysqli, $sql);
                            $row_star = mysqli_num_rows($query_total);
                            $total = 0;
                            while ($count = mysqli_fetch_array($query_total)) {
                                $total = $total + $count['sosao'];
                            }
                            $result = ($row_star == 0) ? $total / 1 : $result = $total / $row_star;
                            ?>
                    <span class="top-count">+<?php echo round($result, 1) ?></span>
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
            </a>
        </li>
        <?php }
        } ?>
    </div>
</ul>