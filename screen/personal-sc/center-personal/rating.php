<link rel="stylesheet" href="assets/css/personal/rating.css">
<?php
$matkdanhgia = $_SESSION['id_khachhang'];
$sql_star_1 = "SELECT * FROM danhgia WHERE matkdanhgia = $matkdanhgia AND sosao = 1";
$count_star_1 = mysqli_num_rows(mysqli_query($mysqli, $sql_star_1));
$sql_star_2 = "SELECT * FROM danhgia WHERE matkdanhgia = $matkdanhgia AND sosao = 2";
$count_star_2 = mysqli_num_rows(mysqli_query($mysqli, $sql_star_2));
$sql_star_3 = "SELECT * FROM danhgia WHERE matkdanhgia = $matkdanhgia AND sosao = 3";
$count_star_3 = mysqli_num_rows(mysqli_query($mysqli, $sql_star_3));
$sql_star_4 = "SELECT * FROM danhgia WHERE matkdanhgia = $matkdanhgia AND sosao = 4";
$count_star_4 = mysqli_num_rows(mysqli_query($mysqli, $sql_star_4));
$sql_star_5 = "SELECT * FROM danhgia WHERE matkdanhgia = $matkdanhgia AND sosao = 5";
$count_star_5 = mysqli_num_rows(mysqli_query($mysqli, $sql_star_5));
?>
<div class="column">
    <div class="center-personal show-star">
        <div class="container">
            <div class="box">
                <div class="face-rate checked-star-1">
                    <i class="fa-solid fa-face-angry"></i>
                </div>
                <div class="num-rate">
                    <span class="count-rate"><?php echo $count_star_1 ?></span>
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
            <div class="box">
                <div class="face-rate checked-star-2">
                    <i class="fa-solid fa-face-rolling-eyes"></i>
                </div>
                <div class="num-rate">
                    <span class="count-rate"><?php echo $count_star_2 ?></span>
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
            <div class="box">
                <div class="face-rate checked-star-3">
                    <i class="fa-solid fa-face-smile"></i>
                </div>
                <div class="num-rate">
                    <span class="count-rate"><?php echo $count_star_3 ?></span>
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
            <div class="box">
                <div class="face-rate checked-star-4">
                    <i class="fa-solid fa-face-laugh"></i>
                </div>
                <div class="num-rate">
                    <span class="count-rate"><?php echo $count_star_4 ?></span>
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
            <div class="box">
                <div class="face-rate checked-star-5">
                    <i class="fa-solid fa-face-grin-stars"></i>
                </div>
                <div class="num-rate">
                    <span class="count-rate"><?php echo $count_star_5 ?></span>
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </div>
        <?php
        $sql = "SELECT sosao FROM danhgia WHERE matkdanhgia = $_SESSION[id_khachhang]";
        $query_total = mysqli_query($mysqli, $sql);
        $rows = mysqli_num_rows($query_total);
        if ($rows == 0) {
            $rows = 1;
        }
        $total = 0;
        while ($count = mysqli_fetch_array($query_total)) {
            $total = $total + $count['sosao'];
        }
        $result = $total / $rows;
        ?>
        <div class="total">
            <span class="total-rate">+<?php echo $result ?></span>
            <?php
            if ($result > 4) {
                echo '<i class="fa-solid fa-face-grin-stars" style="color: #6cc65a; font-size: 30px; margin-top: 5px;"></i>';
            } elseif ($result > 3) {
                echo '<i class="fa-solid fa-face-laugh" style="color: #9ae68b; font-size: 30px; margin-top: 5px;"></i>';
            } elseif ($result > 2) {
                echo '<i class="fa-solid fa-face-smile" style="color: #ffd35c; font-size: 30px; margin-top: 5px;"></i>';
            } elseif ($result > 1) {
                echo '<i class="fa-solid fa-face-rolling-eyes" style="color: #ff9c3c; font-size: 30px; margin-top: 5px;"></i>';
            } elseif ($result > 0) {
                echo '<i class="fa-solid fa-face-angry" style="color: #f96b6b; font-size: 30px; margin-top: 5px;"></i>';
            } else {
                echo '<i class="fa-solid fa-face-meh" style="color: gray; font-size: 30px; margin-top: 5px;"></i>';
            }
            ?>
        </div>
    </div>
    <div class="center-personal-2">
        <p class="title-table-star">Danh sách đánh giá</p>
        <?php
        $sql_get_user = "SELECT * FROM danhgia, taikhoan WHERE danhgia.matknguoidung = taikhoan.mataikhoan AND danhgia.matkdanhgia = $matkdanhgia ORDER BY thoigiandanhgia DESC";
        $query_get_user = mysqli_query($mysqli, $sql_get_user);
        ?>
        <div class="list-rating-1">
            <div class="list-rating-2">
                <table class="tb-star">
                    <tr>
                        <th>Tài khoản</th>
                        <th>Nội dung</th>
                        <th>Đánh giá</th>
                        <th>Thời gian</th>
                    </tr>
                    <?php
                    while ($row_get_user = mysqli_fetch_array($query_get_user)) {
                    ?>
                    <tr>
                        <td><a href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_get_user['mataikhoan'] ?>"
                                class="user-rating"><?php echo $row_get_user['ten'] ?></a>
                        </td>
                        <td>
                            <?php echo ($row_get_user['noidungdanhgia'] != '') ? "$row_get_user[noidungdanhgia]" : '(Chưa đánh giá)'; ?>
                        </td>
                        <td><?php if ($row_get_user['sosao'] == 1) {
                                    echo '<i class="fa-solid fa-face-angry" style="color: #f96b6b; font-size: 18px; margin-top: 5px;"></i>';
                                } elseif ($row_get_user['sosao'] == 2) {
                                    echo '<i class="fa-solid fa-face-rolling-eyes" style="color: #ff9c3c; font-size: 18px; margin-top: 5px;"></i>';
                                } elseif ($row_get_user['sosao'] == 3) {
                                    echo '<i class="fa-solid fa-face-smile" style="color: #ffd35c; font-size: 18px; margin-top: 5px;"></i>';
                                } elseif ($row_get_user['sosao'] == 4) {
                                    echo '<i class="fa-solid fa-face-laugh" style="color: #9ae68b; font-size: 18px; margin-top: 5px;"></i>';
                                } elseif ($row_get_user['sosao'] == 5) {
                                    echo '<i class="fa-solid fa-face-grin-stars" style="color: #6cc65a; font-size: 18px; margin-top: 5px;"></i>';
                                } ?>
                        </td>
                        <td><?php echo $row_get_user['thoigiandanhgia'] ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>