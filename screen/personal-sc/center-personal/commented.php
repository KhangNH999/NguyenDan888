<link rel="stylesheet" href="assets/css/personal/commented.css">
<div class="commented-personal">
    <div class="title-commented">
        <i class="fa-solid fa-comment"></i>
        <span>Đã bình luận</span>
    </div>
    <div class="commented-container">
        <div class="title-container">
            Bình luận sân
        </div>
        <div class="box-data">
            <ul>
                <?php
                $mataikhoan = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
                $list_comment_pitch = "SELECT * FROM binhluansan, san
                WHERE binhluansan.masan = san.masan
                AND binhluansan.mataikhoan = $mataikhoan
                ORDER BY binhluansan.mabinhluansan DESC";
                $query_comment_pitch = mysqli_query($mysqli, $list_comment_pitch);
                $exis_comment_pitch = mysqli_num_rows($query_comment_pitch);
                if ($exis_comment_pitch > 0) {
                    while ($row_comment_pitch = mysqli_fetch_array($query_comment_pitch)) {
                ?>
                <li>
                    <div class="control-commented">
                        <form action="screen/personal-sc/center-personal/handle-center-personal/handle-commented.php"
                            method="post">
                            <input type="text" name="mabinhluansan" style="display: none;"
                                value="<?php echo $row_comment_pitch['mabinhluansan'] ?>">
                            <button type="submit" class="del-btn-commented" name="xoabinhluansan"
                                title="Xóa bình luận sân"
                                onclick="return confirm('Bạn có muốn xóa bình luận sân này?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-data">
                            <i class="fa-solid fa-paperclip"></i>
                            <a href="index.php?quanly=chitietdatsan&&idSan=<?php echo $row_comment_pitch['masan'] ?>">
                                <?php echo $row_comment_pitch['tieudesan'] ?>
                            </a>
                        </div>
                        <div class="content-data">
                            <i class="fa-sharp fa-solid fa-quote-right"></i>
                            <span>Nội dung</span>
                            <p><?php echo $row_comment_pitch['noidungbinhluansan'] ?></p>
                        </div>
                        <div class="time-data">
                            <span><?php echo date('d-m-Y &#10059 H:i:s', strtotime($row_comment_pitch['thoigianbinhluansan'])) ?></span>
                            <i class="fa-sharp fa-solid fa-clock"></i>
                        </div>
                    </div>
                </li>
                <?php
                    }
                } else {
                    ?>
                <li>
                    <div class="control-commented">
                        <form action="" method="post">
                            <button type="submit" class="none-btn-commented">
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-none">
                            Bạn chưa bình luận sân nào!
                        </div>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="commented-container">
        <div class="title-container">
            Bình luận blog
        </div>
        <div class="box-data">
            <ul>
                <?php
                $list_comment_blog = "SELECT * FROM binhluanblog, blog
                WHERE binhluanblog.mablog = blog.mablog
                AND binhluanblog.mataikhoan = $mataikhoan
                ORDER BY binhluanblog.mabinhluanblog DESC";
                $query_comment_blog = mysqli_query($mysqli, $list_comment_blog);
                $exis_comment_blog = mysqli_num_rows($query_comment_blog);
                if ($exis_comment_blog > 0) {
                    while ($row_comment_blog = mysqli_fetch_array($query_comment_blog)) {
                ?>
                <li>
                    <div class="control-commented">
                        <form action="screen/personal-sc/center-personal/handle-center-personal/handle-commented.php"
                            method="post">
                            <input type="text" name="mabinhluanblog" style="display: none;"
                                value="<?php echo $row_comment_blog['mabinhluanblog'] ?>">
                            <button type="submit" class="del-btn-commented" name="xoabinhluanblog"
                                title="Xóa bình luận blog"
                                onclick="return confirm('Bạn có muốn xóa bình luận blog này?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-data">
                            <i class="fa-solid fa-paperclip"></i>
                            <a
                                href="index.php?quanly=chitietblog&&idchitietblog=<?php echo $row_comment_blog['mablog'] ?>">
                                <?php echo $row_comment_blog['tieudeblog'] ?>
                            </a>
                        </div>
                        <div class="content-data">
                            <i class="fa-sharp fa-solid fa-quote-right"></i>
                            <span>Nội dung</span>
                            <p><?php echo $row_comment_blog['noidungbinhluanblog'] ?></p>
                        </div>
                        <div class="time-data">
                            <span><?php echo date('d-m-Y &#10059 H:i:s', strtotime($row_comment_blog['thoigianbinhluanblog'])) ?></span>
                            <i class="fa-sharp fa-solid fa-clock"></i>
                        </div>
                    </div>
                </li>
                <?php
                    }
                } else {
                    ?>
                <li>
                    <div class="control-commented">
                        <form action="" method="post">
                            <button type="submit" class="none-btn-commented">
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-none">
                            Bạn chưa bình luận blog nào!
                        </div>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="commented-container">
        <div class="title-container">
            Bình luận sự kiện
        </div>
        <div class="box-data">
            <ul>
                <?php
                $list_comment_contest = "SELECT * FROM binhluansukien, sukien
                WHERE binhluansukien.masukien = sukien.masukien
                AND binhluansukien.mataikhoan = $mataikhoan
                ORDER BY binhluansukien.mabinhluansukien DESC";
                $query_comment_contest = mysqli_query($mysqli, $list_comment_contest);
                $exis_comment_contest = mysqli_num_rows($query_comment_contest);
                if ($exis_comment_contest > 0) {
                    while ($row_comment_contest = mysqli_fetch_array($query_comment_contest)) {
                ?>
                <li>
                    <div class="control-commented">
                        <form action="screen/personal-sc/center-personal/handle-center-personal/handle-commented.php"
                            method="post">
                            <input type="text" name="mabinhluansukien" style="display: none;"
                                value="<?php echo $row_comment_contest['mabinhluansukien'] ?>">
                            <button type="submit" class="del-btn-commented" name="xoabinhluansukien"
                                title="Xóa bình luận sự kiện"
                                onclick="return confirm('Bạn có muốn xóa bình luận sự kiện này?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-data">
                            <i class="fa-solid fa-paperclip"></i>
                            <a
                                href="index.php?quanly=chitietsukien&idsukien=<?php echo $row_comment_contest['masukien'] ?>">
                                <?php echo $row_comment_contest['tieudesukien'] ?>
                            </a>
                        </div>
                        <div class="content-data">
                            <i class="fa-sharp fa-solid fa-quote-right"></i>
                            <span>Nội dung</span>
                            <p><?php echo $row_comment_contest['noidungbinhluansukien'] ?></p>
                        </div>
                        <div class="time-data">
                            <span><?php echo date('d-m-Y &#10059 H:i:s', strtotime($row_comment_contest['thoigianbinhluansukien'])) ?></span>
                            <i class="fa-sharp fa-solid fa-clock"></i>
                        </div>
                    </div>
                </li>
                <?php
                    }
                } else {
                    ?>
                <li>
                    <div class="control-commented">
                        <form action="" method="post">
                            <button type="submit" class="none-btn-commented">
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-none">
                            Bạn chưa bình luận sự kiện nào!
                        </div>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>