<link rel="stylesheet" href="assets/css/personal/rating-user.css">
<div class="rating-user-personal">
    <div class="title-rating-user">
        <i class="fa-solid fa-face-laugh"></i>
        <span>Đã đánh giá</span>
    </div>
    <div class="list-rating-user">
        <ul>
            <?php
            $mataikhoan = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
            $list_rating_user = "SELECT * FROM danhgia, taikhoan 
            WHERE danhgia.matkdanhgia = taikhoan.mataikhoan
            AND danhgia.matknguoidung = $mataikhoan
            ORDER BY danhgia.madanhgia DESC";
            $query_list_rating_user = mysqli_query($mysqli, $list_rating_user);
            $exis_rating_user = mysqli_num_rows($query_list_rating_user);
            if ($exis_rating_user > 0) {
                while ($row_rating_user = mysqli_fetch_array($query_list_rating_user)) {
            ?>
            <li>
                <div class="control-rating-user">
                    <form action="screen/personal-sc/center-personal/handle-center-personal/handle-rating-user.php"
                        method="post">
                        <input type="text" name="madanhgia" style="display: none;"
                            value="<?php echo $row_rating_user['madanhgia'] ?>">
                        <button type="submit" class="del-btn-rating-user" name="xoadanhgia" title="Xóa đánh giá"
                            onclick="return confirm('Bạn có muốn xóa đánh giá này?')">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </div>
                <div class="detail-rating-user">
                    <div class="img-rating-user">
                        <img src="admin/modules/account/uploads-ac/<?php echo $row_rating_user['hinhanh'] ?>"
                            alt="<?php echo $row_rating_user['hinhanh'] ?>">
                    </div>
                    <div class="user-rating-user">
                        <div class="name-rating-user">
                            <a
                                href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_rating_user['matkdanhgia'] ?>">
                                <?php echo $row_rating_user['ten'] ?>
                            </a>
                        </div>
                        <div class="time-rating-user">
                            <?php echo date("m-d-Y &#10059; H:i", strtotime($row_rating_user['thoigiandanhgia'])) ?>
                        </div>
                    </div>
                    <div class="star-rating-user">
                        <?php echo '+' . $row_rating_user['sosao'] ?>
                        <?php
                                $result = $row_rating_user['sosao'];
                                if ($result > 4) {
                                    echo '<i class="fa-solid fa-face-grin-stars" style="color: #6cc65a;"></i>';
                                } elseif ($result > 3) {
                                    echo '<i class="fa-solid fa-face-laugh" style="color: #9ae68b;"></i>';
                                } elseif ($result > 2) {
                                    echo '<i class="fa-solid fa-face-smile" style="color: #ffd35c;"></i>';
                                } elseif ($result > 1) {
                                    echo '<i class="fa-solid fa-face-rolling-eyes" style="color: #ff9c3c;"></i>';
                                } elseif ($result > 0) {
                                    echo '<i class="fa-solid fa-face-angry" style="color: #f96b6b;"></i>';
                                } else {
                                    echo '<i class="fa-solid fa-face-meh" style="color: gray;"></i>';
                                }
                                ?>
                    </div>
                    <div class="content-rating-user">
                        <p><?php echo $row_rating_user['noidungdanhgia'] ?></p>
                    </div>
                </div>
            </li>
            <?php
                }
            } else { ?>
            <li>
                <div class="control-rating-user">
                    <form action="" method="post">
                        <button type="submit" class="none-btn-rating-user">
                            <i class="fa-solid fa-question"></i>
                        </button>
                    </form>
                </div>
                <div class="detail-rating-user">
                    <div class="title-none">
                        Bạn chưa đánh giá người dùng nào!
                    </div>
                </div>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>