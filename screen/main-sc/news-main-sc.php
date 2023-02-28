<div id="right" data-aos="fade-left">
    <?php include('recruit-main-sc.php') ?>
</div>
<div class="left" data-aos="fade-right">
    <?php include('setpitch-main-sc.php') ?>
    <br>
</div>
<div class="left" data-aos="fade-right">
    <?php include('contest-main-sc.php') ?>
    <br>
</div>
<div class="left" data-aos="fade-right">
    <div class="title-news">
        <img src="assets/images/icons/notebook.gif" alt="Ảnh" style="width: 30px; height: 30px;">
        <span style="margin-left: 4px;">BLOG</span>
    </div>
    <ul class="bottom-new">
        <?php
        $sql_dt = "SELECT * FROM blog, taikhoan WHERE blog.mataikhoan = taikhoan.mataikhoan ORDER BY RAND() DESC LIMIT 5";
        $query_dt = mysqli_query($mysqli, $sql_dt);
        while ($dong = mysqli_fetch_array($query_dt)) {
        ?>
        <hr>
        <li>
            <div class="bl-content-blog">
                <a
                    href="index.php?quanly=chitietblog&&idchitietblog=<?php echo $dong['mablog'] ?>"><?php echo $dong['tieudeblog'] ?></a>
                <p>
                    <a href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $dong['mataikhoan'] ?>"
                        class="user-blog"><?php echo $dong['ten'] ?></a>
                    <span class="seperate">|</span>
                    <?php echo date('d-m-Y', strtotime($dong['thoigiantaoblog'])) ?>
                    <?php echo date('&#10059; H:i:s', strtotime($dong['thoigiantaoblog'])) ?>
                    <?php
                        $sql = "SELECT * FROM binhluanblog WHERE mablog = '$dong[mablog]'";
                        $count = mysqli_num_rows(mysqli_query($mysqli, $sql));
                        if ($count > 0) {
                        ?>
                    <span class="seperate">|</span>
                    <span style="padding-left: 12px;">
                        <i class="fa-solid fa-comment-dots" style="color:#1C6CC1;"></i>
                        <?php echo $count ?>
                    </span>
                    <?php } ?>
                    <?php
                        $sql = "SELECT * FROM luotyeuthichblog WHERE mablog = '$dong[mablog]'";
                        $countLike = mysqli_num_rows(mysqli_query($mysqli, $sql));
                        if ($countLike > 0) { ?>
                    <span class="seperate">|</span>
                    <span style="padding-left: 12px;">
                        <i class="fa-solid fa-thumbs-up" style="color:#1C6CC1;"></i>
                        <?php echo $countLike ?>
                    </span>
                    <?php } ?>
                </p>
            </div>
            <?php if ($dong['hinhanhblog'] == "") { ?>
            <img src="admin/modules/blog/uploads-blog/<?php echo $dong['hinhanhblog'] ?>"
                alt="<?php echo $dong['hinhanhblog'] ?>" style="display:none;">
            <?php } else {
                ?>
            <img src="admin/modules/blog/uploads-blog/<?php echo $dong['hinhanhblog'] ?>"
                alt="<?php echo $dong['hinhanhblog'] ?>">
            <?php
                }
                ?>
        </li>
        <?php
        }
        ?>
        <hr>
    </ul>
    <h4><a href="index.php?quanly=blog">Xem thêm blog</a></h4>
</div>