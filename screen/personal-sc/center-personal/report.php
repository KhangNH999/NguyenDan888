<link rel="stylesheet" href="assets/css/personal/report.css">
<div class="report-personal">
    <div class="title-report">
        <i class="fa-solid fa-gear"></i>
        <span>Đã báo cáo</span>
    </div>
    <div class="report-container">
        <div class="title-container">
            Báo cáo sân
        </div>
        <div class="box-data">
            <ul>
                <?php
                $mataikhoan = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
                $list_report_pitch = "SELECT * FROM baocaosan, san
                WHERE baocaosan.masan = san.masan
                AND baocaosan.mataikhoan = $mataikhoan
                ORDER BY baocaosan.mabaocaosan DESC";
                $query_report_pitch = mysqli_query($mysqli, $list_report_pitch);
                $exis_report_pitch = mysqli_num_rows($query_report_pitch);
                if ($exis_report_pitch > 0) {
                    while ($row_report_pitch = mysqli_fetch_array($query_report_pitch)) {
                ?>
                <li>
                    <div class="control-report">
                        <form action="screen/personal-sc/center-personal/handle-center-personal/handle-report.php"
                            method="post">
                            <input type="text" name="mabaocaosan" style="display: none;"
                                value="<?php echo $row_report_pitch['mabaocaosan'] ?>">
                            <button type="submit" class="del-btn-report" name="xoabaocaosan" title="Xóa báo cáo sân"
                                onclick="return confirm('Bạn có muốn xóa báo cáo sân này?')">
                                <i class="fa-solid fa-bug-slash"></i>
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-data">
                            <i class="fa-solid fa-paperclip"></i>
                            <a href="index.php?quanly=chitietdatsan&&idSan=<?php echo $row_report_pitch['masan'] ?>">
                                <?php echo $row_report_pitch['tieudesan'] ?>
                            </a>
                        </div>
                        <div class="content-data">
                            <i class="fa-solid fa-bug"></i>
                            <span>Báo cáo</span>
                            <p><?php echo $row_report_pitch['noidungbaocaosan'] ?></p>
                        </div>
                        <div class="time-data">
                            <span><?php echo date('d-m-Y &#10059 H:i:s', strtotime($row_report_pitch['thoigianbaocaosan'])) ?></span>
                            <i class="fa-sharp fa-solid fa-clock"></i>
                        </div>
                    </div>
                </li>
                <?php
                    }
                } else {
                    ?>
                <li>
                    <div class="control-report">
                        <form action="" method="post">
                            <button type="submit" class="none-btn-report">
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-none">
                            Bạn chưa báo cáo sân nào!
                        </div>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="report-container">
        <div class="title-container">
            Báo cáo blog
        </div>
        <div class="box-data">
            <ul>
                <?php
                $list_comment_blog = "SELECT * FROM baocaoblog, blog
                WHERE baocaoblog.mablog = blog.mablog
                AND baocaoblog.mataikhoan = $mataikhoan
                ORDER BY baocaoblog.mabaocaoblog DESC";
                $query_comment_blog = mysqli_query($mysqli, $list_comment_blog);
                $exis_comment_blog = mysqli_num_rows($query_comment_blog);
                if ($exis_comment_blog > 0) {
                    while ($row_comment_blog = mysqli_fetch_array($query_comment_blog)) {
                ?>
                <li>
                    <div class="control-report">
                        <form action="screen/personal-sc/center-personal/handle-center-personal/handle-report.php"
                            method="post">
                            <input type="text" name="mabaocaoblog" style="display: none;"
                                value="<?php echo $row_comment_blog['mabaocaoblog'] ?>">
                            <button type="submit" class="del-btn-report" name="xoabaocaoblog" title="Xóa báo cáo blog"
                                onclick="return confirm('Bạn có muốn xóa báo cáo blog này?')">
                                <i class="fa-solid fa-bug-slash"></i>
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
                            <i class="fa-solid fa-bug"></i>
                            <span>Báo cáo</span>
                            <p><?php echo $row_comment_blog['noidungbaocaoblog'] ?></p>
                        </div>
                        <div class="time-data">
                            <span><?php echo date('d-m-Y &#10059 H:i:s', strtotime($row_comment_blog['thoigianbaocaoblog'])) ?></span>
                            <i class="fa-sharp fa-solid fa-clock"></i>
                        </div>
                    </div>
                </li>
                <?php
                    }
                } else {
                    ?>
                <li>
                    <div class="control-report">
                        <form action="" method="post">
                            <button type="submit" class="none-btn-report">
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-none">
                            Bạn chưa báo cáo blog nào!
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