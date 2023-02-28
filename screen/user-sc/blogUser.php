<link rel="stylesheet" href="assets/css/userProfile/blogUser.css">
<div id="blog-user-center">
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
    $sql_blog = "SELECT * FROM blog, taikhoan 
    WHERE blog.mataikhoan = taikhoan.mataikhoan 
    AND blog.mataikhoan='$_GET[idAcc]' ORDER BY mablog DESC LIMIT $begin, $limit";
    $query_blog = mysqli_query($mysqli, $sql_blog);
    //lấy thông tin khách hàng
    $sql_acc = "SELECT * FROM taikhoan WHERE mataikhoan='$_GET[idAcc]'";
    $query_acc = mysqli_query($mysqli, $sql_acc);
    $row_data = mysqli_fetch_array($query_acc);
    //Lấy số lượng hàng bảng blog
    $sql_page = mysqli_query($mysqli, "SELECT * FROM blog, taikhoan 
    WHERE blog.mataikhoan = taikhoan.mataikhoan 
    AND blog.mataikhoan= '$_GET[idAcc]'");
    $row_count = mysqli_num_rows($sql_page);
    ?>
    <h2 class="title-blog-user">
        <i class="ti-book"></i>
        Blog của <u><?php echo $row_data['ten'] ?></u>
    </h2>
    <?php
    if ($row_count > 0) {
        while ($row_blog = mysqli_fetch_array($query_blog)) {
    ?>
    <form action="" method="post">
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
                            style="width:20px; height:20px; border-radius: 10px 10px;">
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
                            } ?>
                    href="index.php?quanly=blognguoidung&&idAcc=<?php echo $_GET['idAcc'] ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php
                }
                ?>
        </ul>
    </div>
    <?php
    } else {
    ?>
    <div class="none"><span>Không có blog nào.</span></div>
    <?php
    }
    ?>
</div>