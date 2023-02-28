<link rel="stylesheet" href="assets/css/blog/blog-detail.css">
<script src="screen/detail-sc/detail-blog.js"></script>
<?php
$sql_chitietblog = "SELECT * FROM blog, taikhoan 
WHERE blog.mataikhoan = taikhoan.mataikhoan 
AND blog.mablog = '$_GET[idchitietblog]' LIMIT 1";
$query_chitietblog = mysqli_query($mysqli, $sql_chitietblog);
while ($row_chitietblog = mysqli_fetch_array($query_chitietblog)) {

?>

<div id="detail-blog">
    <h1 class="tit-detail">
        <a href="">
            <?php echo $row_chitietblog['tieudeblog'] ?>
        </a>
    </h1>
    <ul class="detail-sub">
        <li class="pict">
            <img src="admin/modules/account/uploads-ac/<?php echo $row_chitietblog['hinhanh'] ?>"
                alt="<?php echo $row_chitietblog['hinhanh'] ?>"
                style="width:40px; height:40px; border-radius: 24px 24px;object-fit: cover;">
        </li>
        <li class="text">
            <div class="author">
                <a
                    href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_chitietblog['mataikhoan'] ?>"><?php echo $row_chitietblog['ten'] ?></a>
            </div>
            <div class="date">
                <span>Ngày đăng:
                    <?php echo date('d-m-Y', strtotime($row_chitietblog['thoigiantaoblog'])) ?>
                    <?php echo date('&#10059; H:i:s', strtotime($row_chitietblog['thoigiantaoblog'])) ?>
                </span>
                <!-- check count like -->
                <?php
                    $sql_ck_like = "SELECT * FROM luotyeuthichblog WHERE mablog = '$row_chitietblog[mablog]'";
                    $count_ck_like = mysqli_num_rows(mysqli_query($mysqli, $sql_ck_like));
                    ?>
                <span class="seperate">|</span>
                <span><span class="count-handle" style="font-weight: bold;"><?php echo $count_ck_like ?></span> lượt
                    thích</span>
            </div>

        </li>
        <li class="btn-comment">
            <div class="button">
                <div id="more-btns">
                    <!-- if isset id_khachhang then can follow or unfollow  -->
                    <?php if (isset($_SESSION['id_khachhang'])) {
                        ?>
                    <form action="screen/detail-sc/handle-user/handle-like-blog.php" method="post">
                        <?php
                                $sql_like_blog = "SELECT * FROM luotyeuthichblog WHERE mataikhoan = '$_SESSION[id_khachhang]' AND mablog = '$_GET[idchitietblog]' LIMIT 1";
                                $query_like_blog = mysqli_query($mysqli, $sql_like_blog);
                                while ($row_like_blog = mysqli_fetch_array($query_like_blog)) {
                                    $mayeuthichblog = $row_like_blog['mayeuthichblog'];
                                }
                                $count_like_blog = mysqli_num_rows($query_like_blog);
                                // != 0 is when sql return has data 
                                if ($count_like_blog != 0) {
                                ?>
                        <input type="text" name="mayeuthichblog" id="mayeuthichblog" style="display: none;"
                            value="<?php echo $mayeuthichblog ?>">
                        <input type="text" name="mataikhoan" id="mataikhoan" style="display: none;"
                            value="<?php echo $_SESSION['id_khachhang'] ?>">
                        <input type="text" name="mablog" id="mablog" style="display: none;"
                            value="<?php echo $_GET['idchitietblog'] ?>">
                        <button type="submit" class="btn btn-danger blog-liked" name="likeblog" title="Hủy yêu thích!">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                        <?php } else { ?>
                        <input type="text" name="mayeuthichblog" id="mayeuthichblog" style="display: none;"
                            value="<?php echo $mayeuthichblog ?>">
                        <input type="text" name="mataikhoan" id="mataikhoan" style="display: none;"
                            value="<?php echo $_SESSION['id_khachhang'] ?>">
                        <input type="text" name="mablog" id="mablog" style="display: none;"
                            value="<?php echo $_GET['idchitietblog'] ?>">
                        <button type="submit" class="btn btn-danger" name="unlikeblog" title="Yêu thích blog này!">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                        <?php }
                            } else { ?>
                        <a href="index.php?quanly=dangnhap" class="btn btn-danger" title="Yêu thích blog này!">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                        <?php } ?>
                    </form> &npar;
                    <?php if (isset($_SESSION['id_khachhang'])) { ?>
                    <button class="btn btn-danger" onclick="openFormReport();" title="Báo cáo blog này!"><i
                            class="fa-solid fa-gear"></i></button>
                    <?php } else { ?>
                    <a href="index.php?quanly=dangnhap" class="btn btn-danger">
                        <i class="fa-solid fa-gear"></i>
                    </a>
                    <?php } ?>
                </div>

            </div>
        </li>
    </ul>
    <div class="content-blog" style="margin-bottom: 20px">
        <div id="blog-description">
            <div class="cont">
                <p><?php echo $row_chitietblog['noidungblog']; ?></p>
            </div>
        </div>
        <div id="image-blog">
            <?php if ($row_chitietblog['hinhanhblog'] == "") { ?>
            <img src="admin/modules/blog/uploads-blog/<?php echo $row_chitietblog['hinhanhblog'] ?>"
                alt="<?php echo $row_chitietblog['hinhanhblog'] ?>" style="display:none;">
            <?php } else {
                ?>
            <img src="admin/modules/blog/uploads-blog/<?php echo $row_chitietblog['hinhanhblog'] ?>"
                alt="<?php echo $row_chitietblog['hinhanhblog'] ?>">
            <?php
                }
                ?>
        </div>
    </div>
    <?php
} ?>

    <?php
    $limit = 3;
    //create current page on total page
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
        "SELECT * FROM blog, binhluanblog, taikhoan
             WHERE blog.mablog = binhluanblog.mablog
            AND binhluanblog.mataikhoan = taikhoan.mataikhoan
             AND blog.mablog='$_GET[idchitietblog]' ORDER BY mabinhluanblog DESC LIMIT $begin, $limit";
    $query_null_comment = mysqli_query($mysqli, $sql_comment);
    $query_comment = mysqli_query($mysqli, $sql_comment);
    $sql_page = mysqli_query($mysqli, "SELECT * FROM binhluanblog WHERE mablog='$_GET[idchitietblog]'");
    $count_comment = mysqli_num_rows($sql_page); //$query_comment
    ?>
    <section id="comments">
        <h3 class="page-title2 bb">
            <i class="fa-solid fa-comment-dots"></i>
            <span>
                <span class="comment-count">
                    <?php echo $count_comment ?>
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
        <form action="screen/detail-sc/handle-comments/delete-cm-blog.php" method="post">
            <ul class="list-comments">
                <li>
                    <input type="text" name="mabinhluanblog" id="mabinhluanblog" style="display: none;"
                        value="<?php echo $row_comment['mabinhluanblog'] ?>">
                    <input type="text" name="mablog" id="mablog" style="display: none;"
                        value="<?php echo $_GET['idchitietblog'] ?>">
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
                                <span>
                                    <?php
                                        $date1 = new DateTime();
                                        $date2 = new DateTime($row_comment['thoigianbinhluanblog']);
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
                        <?php if (isset($_SESSION['id_khachhang']) && $row_comment['mataikhoan'] == $_SESSION['id_khachhang']) { ?>
                        <input type="submit" name="xoabinhluanblog" id="dl-comments-bl" value="&#215;"
                            onclick="return confirm('Bạn có muốn xóa bình luận này?')">
                        <?php } ?>
                    </div>
                    <div class="body-cm">
                        <p class="content-cm">
                            <?php echo $row_comment['noidungbinhluanblog'] ?>
                        </p>
                    </div>
                </li>
            </ul>
        </form>
        <?php
        }
        ?>
        <?php
        //get sum page now available
        $page = ceil($count_comment / $limit);
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
                        href="index.php?quanly=chitietblog&&idchitietblog=<?php echo $_GET['idchitietblog'] ?>&page=<?php echo $i ?>#comments"><?php echo $i ?></a>
                </li>
                <?php
                    }
                    ?>
            </ul>
        </div>
        <?php } ?>
        <?php
        if (isset($_SESSION['tenkhachhang'])) {
            //get SESSION id_khachhang form Login.php
            $mataikhoan = $_SESSION['id_khachhang'];
            $sql = "SELECT * FROM taikhoan WHERE mataikhoan = '$mataikhoan' LIMIT 1";
            $resurlt_ac = mysqli_query($mysqli, $sql);
            while ($row_result = mysqli_fetch_array($resurlt_ac)) {
        ?>
        <form action="screen/detail-sc/handle-comments/add-cm-blog.php" method="post">
            <div class="comment-create">
                <!-- show image & name from id_khachhang -->
                <div class="user">
                    <img src="admin/modules/account/uploads-ac/<?php echo $row_result['hinhanh'] ?>"
                        alt="<?php echo $row_result['hinhanh'] ?>">
                    <span class="name"><?php echo $row_result['ten'] ?></span>
                </div>
                <!-- get mataikhoan & masan hidden -->
                <input type="text" name="mataikhoan" id="mataikhoan" style="display: none;"
                    value="<?php echo $row_result['mataikhoan'] ?>">
                <input type="text" name="mablog" id="mablog" style="display: none;"
                    value="<?php echo $_GET['idchitietblog'] ?>">
                <div class="w100">
                    <textarea rows="5" placeholder="Nhận xét * Lên đến 1000 ký tự" maxlength="1000"
                        name="noidungbinhluanblog" id="noidungbinhluanblog"></textarea>
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
    <!-- post report -->
    <form action="screen/detail-sc/handle-user/handle-report-blog.php" method="post">
        <div id="myform">
            <div id="f-bc">
                <h5 style="font-size: 1.25rem;padding-top: 2px;color: red;">Báo cáo</h5>
                <input type="button" value="Đóng" class="btn btn-danger" onclick="closeFormReport();"
                    style="background-color: #F08080;font-size: 10px;width: 35px;border-radius: 3px;border: 0.2px solid #FF0000;height: 20px;margin: 4px 0px;padding:0;">
            </div>
            <div id="f-inp">
                <input type="text" name="mataikhoan" id="mataikhoan" style="display: none;"
                    value="<?php echo $_SESSION['id_khachhang'] ?>">
                <input type="text" name="mablog" id="mablog" style="display: none;"
                    value="<?php echo $_GET['idchitietblog'] ?>">
                <textarea rows="4" name="noidungbaocaoblog" placeholder="Nhập một báo cáo" maxlength="3000"
                    required></textarea>
                <p style="margin-left:1px; font-size:13px; font-weight:bold;">Nếu bạn thực hiện một báo cáo, nó sẽ được
                    báo
                    cáo cho ban thư ký HiNaDa.
                    Xin lưu ý rằng không phải tất cả các báo cáo đều có thể được xử lý.</p>
            </div>
            <div id="f-btns">
                <input type="submit" class="btn btn-danger" name="reportblog" value="Báo cáo" id="f-btn"
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
CKEDITOR.replace('noidungbinhluanblog');
</script>
<!-- Kiểm tra báo cáo blog thành công -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    if (isset($_GET['reportblog']) && $_GET['reportblog'] == 'success') {
    ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Thành công',
    text: 'Báo cáo thành công.',
})
setTimeout(function() {
    window.location.href = "index.php?quanly=chitietblog&&idchitietblog=" +
        <?php echo $_GET['idchitietblog'] ?>;
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
    window.location.href = "index.php?quanly=chitietblog&&idchitietblog=" +
        <?php echo $_GET['idchitietblog'] ?>;
}, 3000);
</script>
<?php
    }
    ?>