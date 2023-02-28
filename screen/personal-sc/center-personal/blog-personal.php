<link rel="stylesheet" href="assets/css/personal/blog-personal.css">
<div id="blog-personal-center">
    <h2 class="title-blog-personal">
        <i class="ti-book"></i>
        Blog của tôi
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
    $mataikhoan = $_SESSION['id_khachhang'];
    $sql_blog = "SELECT * FROM blog, taikhoan 
    WHERE blog.mataikhoan = taikhoan.mataikhoan 
    AND blog.mataikhoan= $mataikhoan ORDER BY mablog DESC LIMIT $begin, $limit";
    $query_blog = mysqli_query($mysqli, $sql_blog);
    //Lấy số lượng tất cả hàng bảng blog
    $sql_page = mysqli_query($mysqli, "SELECT * FROM blog, taikhoan 
    WHERE blog.mataikhoan = taikhoan.mataikhoan 
    AND blog.mataikhoan= $mataikhoan");
    $row_count = mysqli_num_rows($sql_page);
    if ($row_count > 0) {
        while ($row_blog = mysqli_fetch_array($query_blog)) {
    ?>
    <form action="screen/personal-sc/center-personal/handle-center-personal/handle-blog.php" method="post">
        <ul class="list">
            <li class="blog">
                <div class="text">
                    <!-- Lấy mã blog -->
                    <input type="text" name="mablogcuatoi" id="mablog" style="display: none;"
                        value="<?php echo $row_blog['mablog'] ?>">
                    <h3 class="title-content-blog">
                        <a href="index.php?quanly=chitietblog&&idchitietblog=<?php echo $row_blog['mablog'] ?>">
                            <?php echo $row_blog['tieudeblog'] ?></a>
                    </h3>
                    <div class="sub">
                        <img src="admin/modules/account/uploads-ac/<?php echo $row_blog['hinhanh'] ?>"
                            alt="<?php echo $row_blog['hinhanh'] ?>"
                            style="width:20px; height:20px; border-radius: 10px 10px;object-fit: cover;">
                        <a
                            href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_blog['mataikhoan'] ?>"><?php echo $row_blog['ten'] ?></a>
                        <span>|</span>
                        <span>
                            <?php echo date("d-m-Y", strtotime($row_blog['thoigiantaoblog'])) ?>
                            <?php echo date('&#10059; H:i:s', strtotime($row_blog['thoigiantaoblog'])) ?>
                        </span>
                        <?php
                                $sql = "SELECT * FROM binhluanblog WHERE mablog = '$row_blog[mablog]'";
                                $count = mysqli_num_rows(mysqli_query($mysqli, $sql));
                                if ($count > 0) {
                                ?>
                        <span>｜</span>
                        <span>
                            <i class="fa-solid fa-comment-dots" style="color:#1C6CC1;"></i>
                            <?php echo $count ?>
                        </span>
                        <?php } ?>
                        <?php
                                $sql = "SELECT * FROM luotyeuthichblog WHERE mablog = '$row_blog[mablog]'";
                                $countLike = mysqli_num_rows(mysqli_query($mysqli, $sql));
                                if ($countLike > 0) { ?>
                        <span>|</span>
                        <span>
                            <i class="fa-solid fa-thumbs-up" style="color:#1C6CC1;"></i>
                            <?php echo $countLike ?>
                        </span>
                        <?php } ?>
                    </div>
                </div>
                <button type="submit" class="btn-del" title="Xóa" id="dl-blog-personal" name="xoablog"
                    onclick="return confirm('Lưu ý: Xóa blog sẽ xóa tất cả dữ liệu liên quan với blog này.\nBạn đã chắc chắn?')">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <button type="submit" class="btn-edit" title="Sửa" id="ed-blog-personal" name="suablog"
                    onclick="return confirm('Lưu ý: Sửa blog sẽ Sửa tất cả dữ liệu liên quan blog này.\nBạn đã chắc chắn?')">
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
                            } ?> href="index.php?quanly=blogcuatoi&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php
                }
                ?>
        </ul>
    </div>
    <?php
    } else {
    ?>
    <div class="none"><span>Bạn không có blog nào.</span></div>
    <?php
    }
    ?>
</div>