<link rel="stylesheet" href="assets/css/personal/rating.css">
<div class="center-personal">
    <div class="show-star">
        <?php
        //Tạo biến sao đã đánh giá đối với tài khoản đã đăng nhập
        if (isset($_SESSION['id_khachhang'])) {
            $matknguoidung =  $_SESSION['id_khachhang'];
        } else {
            $matknguoidung = 0;
        }

        if ($matknguoidung == 0) {
            $star = 0;
            $content_star = '';
            $time_update = '';
        } else {
            //Lấy sô sao
            $sql_star = "SELECT sosao, noidungdanhgia, thoigiandanhgia FROM danhgia WHERE matkdanhgia = $_GET[idAcc] AND matknguoidung = $matknguoidung LIMIT 1";
            $query_star = mysqli_query($mysqli, $sql_star);
            $query_star_null = mysqli_query($mysqli, $sql_star);
            $count = mysqli_num_rows($query_star_null);
            if ($count > 0) {
                while ($rows_star = mysqli_fetch_array($query_star)) {
                    $star = $rows_star['sosao'];
                    $content_star = $rows_star['noidungdanhgia'];
                    $time_update = $rows_star['thoigiandanhgia'];
                }
            } else {
                $star = -1;
                $content_star = '';
                $time_update = '';
            }
        }

        //Tạo biến đếm sao đánh giá theo tài khoản được đánh giá
        $sql_star_1 = "SELECT * FROM danhgia WHERE matkdanhgia = $_GET[idAcc] AND sosao = 1";
        $count_star_1 = mysqli_num_rows(mysqli_query($mysqli, $sql_star_1));
        $sql_star_2 = "SELECT * FROM danhgia WHERE matkdanhgia = $_GET[idAcc] AND sosao = 2";
        $count_star_2 = mysqli_num_rows(mysqli_query($mysqli, $sql_star_2));
        $sql_star_3 = "SELECT * FROM danhgia WHERE matkdanhgia = $_GET[idAcc] AND sosao = 3";
        $count_star_3 = mysqli_num_rows(mysqli_query($mysqli, $sql_star_3));
        $sql_star_4 = "SELECT * FROM danhgia WHERE matkdanhgia = $_GET[idAcc] AND sosao = 4";
        $count_star_4 = mysqli_num_rows(mysqli_query($mysqli, $sql_star_4));
        $sql_star_5 = "SELECT * FROM danhgia WHERE matkdanhgia = $_GET[idAcc] AND sosao = 5";
        $count_star_5 = mysqli_num_rows(mysqli_query($mysqli, $sql_star_5));

        ?>
        <form action="screen/user-sc/handle/handle-rating.php" method="post">
            <div class="container">
                <input type="text" name="matknguoidung" style="display: none;" value="<?php echo $matknguoidung ?>">
                <input type="text" name="matkdanhgia" style="display: none;" value="<?php echo $_GET['idAcc'] ?>">
                <div class="box">
                    <button type="submit" class="face-rate star-1 <?php if ($star == 1) {
                                                                        echo "checked-star-1";
                                                                    } else {
                                                                        echo '';
                                                                    } ?>" name="motsao" title="Tệ">
                        <i class="fa-solid fa-face-angry"></i>
                    </button>
                    <div class="num-rate">
                        <span class="count-rate"><?php echo $count_star_1 ?></span>
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="box">
                    <button type="submit" class="face-rate star-2 <?php if ($star == 2) {
                                                                        echo "checked-star-2";
                                                                    } else {
                                                                        echo '';
                                                                    } ?>" name="haisao" title="Tạm được">
                        <i class="fa-solid fa-face-rolling-eyes"></i>
                    </button>
                    <div class="num-rate">
                        <span class="count-rate"><?php echo $count_star_2 ?></span>
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="box">
                    <button type="submit" class="face-rate star-3 <?php if ($star == 3) {
                                                                        echo "checked-star-3";
                                                                    } else {
                                                                        echo '';
                                                                    } ?>" name="basao" title="Bình thường">
                        <i class="fa-solid fa-face-smile"></i>
                    </button>
                    <div class="num-rate">
                        <span class="count-rate"><?php echo $count_star_3 ?></span>
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="box">
                    <button type="submit" class="face-rate star-4 <?php if ($star == 4) {
                                                                        echo "checked-star-4";
                                                                    } else {
                                                                        echo '';
                                                                    } ?>" name="bonsao" title="Tốt">
                        <i class="fa-solid fa-face-laugh"></i>
                    </button>
                    <div class="num-rate">
                        <span class="count-rate"><?php echo $count_star_4 ?></span>
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="box">
                    <button type="submit" class="face-rate star-5 <?php if ($star == 5) {
                                                                        echo "checked-star-5";
                                                                    } else {
                                                                        echo '';
                                                                    } ?>" name="namsao" title="Rất tốt">
                        <i class="fa-solid fa-face-grin-stars"></i>
                    </button>
                    <div class="num-rate">
                        <span class="count-rate"><?php echo $count_star_5 ?></span>
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
            </div>
        </form>
        <?php
        $sql = "SELECT sosao FROM danhgia WHERE matkdanhgia = $_GET[idAcc]";
        $query_total = mysqli_query($mysqli, $sql);
        $rows = mysqli_num_rows($query_total);
        $total = 0;
        while ($count = mysqli_fetch_array($query_total)) {
            $total = $total + $count['sosao'];
        }
        if ($rows == 0) {
            $result = $total / 1;
        } else {
            $result = round($total / $rows, 1);
        }
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
        <div class="content-rate">
            <?php
            if ($star == 0) {
                echo '<span class="line-rating">Bạn chưa đăng nhập. Vui lòng đăng nhập để đánh giá!</span>';
            } elseif ($star == -1) {
                echo '<span class="line-rating">Bạn chưa đánh giá tài khoản này!</span>';
            } else {
            ?>
            <span class="line-rating">Bạn đã đánh giá tài khoản này ở mức độ: <?php if ($star == 1) {
                                                                                        echo '<span class="rating-user" style="color: #f96b6b">Tệ</span>';
                                                                                    } elseif ($star == 2) {
                                                                                        echo '<span class="rating-user" style="color: #ff9c3c">Tạm được</span>';
                                                                                    } elseif ($star == 3) {
                                                                                        echo '<span class="rating-user" style="color: #ffd35c">Bình thường</span>';
                                                                                    } elseif ($star == 4) {
                                                                                        echo '<span class="rating-user" style="color: #9ae68b">Tốt</span>';
                                                                                    } elseif ($star == 5) {
                                                                                        echo '<span class="rating-user" style="color: #6cc65a">Rất tốt</span>';
                                                                                    } ?></span>
            <?php } ?>
        </div>
    </div>
    <?php

    ?>
    <div class="show-commented">
        <?php if ($content_star == '') { ?>
        <div class="title-show-comment">Nội dung đã bình luận!</div>
        <ul class="box-commented">
            <li class="content-commented">
                <p class="rated-content">Chưa có nội dung đánh giá!
                </p>
            </li>
            <li class="content-commented">
                <div class="time-update"><?php echo $time_update ?> - Update</div>
            </li>
        </ul>
        <?php } else { ?>
        <div class="title-show-comment">Nội dung đã bình luận!</div>
        <ul class="box-commented">
            <li class="content-commented">
                <p class="rated-content"><?php echo $content_star ?>
                </p>
            </li>
            <li class="content-commented">
                <div class="time-update"><?php echo $time_update ?> - Update</div>
            </li>
        </ul>
        <?php
        }
        ?>
    </div>
    <div class="show-comment">
        <?php if ($star == 0) { ?>
        <div class="title-show-comment">Bạn chưa đăng nhập!</div>
        <?php } else if ($star == -1) { ?>
        <div class="title-show-comment">Bạn chưa chọn mức độ đánh giá cho tài khoản này!</div>
        <form action="screen/user-sc/handle/handle-rating.php" method="post" class="box-comment-star">
            <input type="text" class="input-star" placeholder="Nhập nội dung nhận xét tại đây ..." disabled>
            <button type="submit" class="btn-star" disabled>GỬI</button>
        </form>
        <?php } else {
            if ($content_star == '') {
            ?>
        <div class="title-show-comment">Nhập nội dung bình luận người dùng này!</div>
        <form
            action="screen/user-sc/handle/handle-rating.php?matknguoidung=<?php echo $matknguoidung ?>&matkdanhgia=<?php echo $_GET['idAcc'] ?>"
            method="post" class="box-comment-star">
            <input type="text" class="input-star" id="noidungdanhgia" name="noidungdanhgia" onkeyup="ktNhapDanhGia();"
                placeholder="Nhập nội dung nhận xét tại đây ...">
            <button type="submit" class="btn-star" id="guinoidungdanhgia" name="guinoidungdanhgia" disabled>GỬI</button>
        </form>
        <?php } else { ?>
        <div class="title-show-comment">Nhập nội dung bình luận muốn sửa!</div>
        <form
            action="screen/user-sc/handle/handle-rating.php?matknguoidung=<?php echo $matknguoidung ?>&matkdanhgia=<?php echo $_GET['idAcc'] ?>"
            method="post" class="box-comment-star">
            <input type="text" class="input-star" id="noidungdanhgia" name="noidungdanhgia" onkeyup="ktNhapDanhGia();"
                placeholder="Nhập nội dung muốn sửa tại đây ...">
            <button type="submit" class="btn-star" id="guinoidungdanhgia" name="guinoidungdanhgia" disabled>SỬA</button>
            <?php
            }
        }
            ?>
    </div>
</div>
<script>
function ktNhapDanhGia() {
    if (document.getElementById("noidungdanhgia").value === "") {
        document.getElementById('guinoidungdanhgia').disabled = true;
    } else {
        document.getElementById('guinoidungdanhgia').disabled = false;
    }
}
</script>