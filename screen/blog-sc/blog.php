<div id="left-blog-center">
    <section>
        <form action="index.php?quanly=blog" method="post">
            <div class="title-blog">
                <img src="assets/images/icons/search_blog.gif" alt="Ảnh" style="width: 30px; height: 30px;">
                <span style="margin-left: 4px;">BLOG</span>
            </div>
            <form>
                <div class="search-submit">
                    <input id="input-keywork" type="text" name="keywork"
                        <?php echo (isset($_GET['search'])) ? "value='$_GET[search]'" : "placeholder='Nhập từ khóa ...'"; ?>>
                    <button type="submit" name="timkiem" class="btn">Tìm kiếm</button>
                </div>
            </form>
            <?php
            if (isset($_POST['timkiem'])) {
            ?>
            <script>
            window.location.href = "index.php?quanly=blog&&search=<?php echo $_POST['keywork'] ?>";
            </script>
            <?php
            }
            ?>
        </form>
        <?php
        //Xử lý tìm kiếm
        if (isset($_GET['search'])) {
            $limit = 6;
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
            $tukhoa = $_GET['search'];
            $sql_dt = "SELECT * FROM blog, taikhoan 
            WHERE blog.mataikhoan = taikhoan.mataikhoan AND tieudeblog 
            LIKE '%" . $tukhoa . "%' ORDER BY mablog DESC LIMIT $begin, $limit";
            $query_dt = mysqli_query($mysqli, $sql_dt);
            //
            $sql_page = "SELECT * FROM blog, taikhoan 
            WHERE blog.mataikhoan = taikhoan.mataikhoan AND tieudeblog 
            LIKE '%" . $tukhoa . "%' ORDER BY mablog DESC";
            $query_page = mysqli_query($mysqli, $sql_page);
            $row_count = mysqli_num_rows($query_page);
            //Lấy số lượng blog mặc định
            $sql_page_all = mysqli_query($mysqli, "SELECT * FROM blog");
            $row_count_all = mysqli_num_rows($sql_page_all);
        ?>
        <div class="title-blog-all" data-aos="fade-right">
            <img src="assets/images/icons/diary.gif" alt="Ảnh" style="width: 30px; height: 30px; margin-top: -5px;">
            <span>TẤT CẢ BLOG: <span
                    style="font-weight: bold; color:#1c6cc1;"><?php echo $row_count ?>/<?php echo $row_count_all ?></span></span>
        </div>
        <?php
            while ($row_blog = mysqli_fetch_array($query_dt)) {
            ?>
        <ul class="list" data-aos="fade-right">
            <li class="blog">
                <div class="text">
                    <h3 class="title">
                        <a href="index.php?quanly=chitietblog&&idchitietblog=<?php echo $row_blog['mablog'] ?>">
                            <?php echo $row_blog['tieudeblog'] ?></a>
                    </h3>

                    <div class="sub">
                        <img src="admin/modules/account/uploads-ac/<?php echo $row_blog['hinhanh'] ?>"
                            alt="<?php echo $row_blog['hinhanh'] ?>"
                            style="width:20px; height:20px; border-radius: 10px 10px;object-fit: cover;">

                        <a
                            href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_blog['mataikhoan'] ?>"><?php echo $row_blog['ten'] ?></a>
                        <span class="seperate">|</span>
                        <span>
                            <?php echo date("d-m-Y", strtotime($row_blog['thoigiantaoblog'])) ?>
                            <?php echo date('&#10059; H:i:s', strtotime($row_blog['thoigiantaoblog'])) ?>
                        </span>
                        <?php
                                $sql = "SELECT * FROM binhluanblog WHERE mablog = '$row_blog[mablog]'";
                                $count = mysqli_num_rows(mysqli_query($mysqli, $sql));
                                if ($count > 0) {
                                ?>
                        <span class="seperate">|</span>
                        <span>
                            <i class="fa-solid fa-comment-dots"></i>
                            <?php echo $count ?>
                        </span>
                        <?php } ?>
                        <?php
                                $sql = "SELECT * FROM luotyeuthichblog WHERE mablog = '$row_blog[mablog]'";
                                $countLike = mysqli_num_rows(mysqli_query($mysqli, $sql));
                                if ($countLike > 0) { ?>
                        <span class="seperate">|</span>
                        <span>
                            <i class="fa-solid fa-thumbs-up"></i>
                            <?php echo $countLike ?>
                        </span>
                        <?php } ?>
                    </div>
                </div>
                <?php if ($row_blog['hinhanhblog'] == "") { ?>
                <img src="admin/modules/blog/uploads-blog/<?php echo $row_blog['hinhanhblog'] ?>"
                    alt="<?php echo $row_blog['hinhanhblog'] ?>" style="width:36px;height:36px;display:none;" ;>
                <?php } else {
                        ?>
                <img src="admin/modules/blog/uploads-blog/<?php echo $row_blog['hinhanhblog'] ?>"
                    alt="<?php echo $row_blog['hinhanhblog'] ?>" style="width:36px;height:36px;object-fit: cover;">
                <?php
                        }
                        ?>
            </li>
        </ul>
        <?php
            }
            ?>
        <?php
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
                        href="index.php?quanly=blog&&search=<?php echo $tukhoa ?>&&page=<?php echo $i ?>"><?php echo $i ?></a>
                </li>
                <?php
                    }
                    ?>
            </ul>
        </div>
        <?php
        } else {
        ?>
        <?php
            $limit = 6;
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
            $sql_dt = "SELECT * FROM blog, taikhoan 
            WHERE blog.mataikhoan = taikhoan.mataikhoan 
            ORDER BY mablog DESC LIMIT $begin,$limit";
            $query_dt = mysqli_query($mysqli, $sql_dt);
            //Lấy tất cả blog
            $sql_page = mysqli_query($mysqli, "SELECT * FROM blog");
            $row_count = mysqli_num_rows($sql_page);
            ?>
        <div class="title-blog-all" data-aos="fade-right">
            <img src="assets/images/icons/diary.gif" alt="Ảnh" style="width: 30px; height: 30px; margin-top: -5px;">
            <span>TẤT CẢ BLOG: <span style="font-weight: bold; color:#1c6cc1;"><?php echo $row_count ?></span></span>
        </div>
        <?php
            while ($row_blog = mysqli_fetch_array($query_dt)) {
            ?>
        <ul class="list" data-aos="fade-right">
            <li class="blog">
                <div class="text">
                    <h3 class="title">
                        <a href="index.php?quanly=chitietblog&&idchitietblog=<?php echo $row_blog['mablog'] ?>">
                            <?php echo $row_blog['tieudeblog'] ?></a>
                    </h3>

                    <div class="sub">
                        <img src="admin/modules/account/uploads-ac/<?php echo $row_blog['hinhanh'] ?>"
                            alt="<?php echo $row_blog['hinhanh'] ?>"
                            style="width:20px; height:20px; border-radius: 10px 10px;object-fit: cover;">

                        <a
                            href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_blog['mataikhoan'] ?>"><?php echo $row_blog['ten'] ?></a>
                        <span class="seperate">|</span>
                        <span>
                            <?php echo date("d-m-Y", strtotime($row_blog['thoigiantaoblog'])) ?>
                            <?php echo date('&#10059; H:i:s', strtotime($row_blog['thoigiantaoblog'])) ?>
                        </span>
                        <?php
                                $sql = "SELECT * FROM binhluanblog WHERE mablog = '$row_blog[mablog]'";
                                $count = mysqli_num_rows(mysqli_query($mysqli, $sql));
                                if ($count > 0) {
                                ?>
                        <span class="seperate">|</span>
                        <span>
                            <i class="fa-solid fa-comment-dots"></i>
                            <?php echo $count ?>
                        </span>
                        <?php } ?>
                        <?php
                                $sql = "SELECT * FROM luotyeuthichblog WHERE mablog = '$row_blog[mablog]'";
                                $countLike = mysqli_num_rows(mysqli_query($mysqli, $sql));
                                if ($countLike > 0) { ?>
                        <span class="seperate">|</span>
                        <span>
                            <i class="fa-solid fa-thumbs-up"></i>
                            <?php echo $countLike ?>
                        </span>
                        <?php } ?>
                    </div>
                </div>
                <?php if ($row_blog['hinhanhblog'] == "") { ?>
                <img src="admin/modules/blog/uploads-blog/<?php echo $row_blog['hinhanhblog'] ?>"
                    alt="<?php echo $row_blog['hinhanhblog'] ?>" style="width:36px;height:36px;display:none;" ;>
                <?php } else {
                        ?>
                <img src="admin/modules/blog/uploads-blog/<?php echo $row_blog['hinhanhblog'] ?>"
                    alt="<?php echo $row_blog['hinhanhblog'] ?>" style="width:36px;height:36px;object-fit: cover;">
                <?php
                        }
                        ?>
            </li>
        </ul>
        <?php
            }
            ?>
        <?php
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
                                } ?> href="index.php?quanly=blog&&page=<?php echo $i ?>"><?php echo $i ?></a>
                </li>
                <?php
                    }
                    ?>
            </ul>
        </div>
        <?php
        }
        ?>
    </section>
</div>
<div id="right" data-aos="fade-left">
    <?php include('screen/main-sc/recruit-main-sc.php') ?>
</div>