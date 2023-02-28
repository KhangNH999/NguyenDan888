<link rel="stylesheet" href="assets/css/personal/favorite.css">
<div class="favorite-personal">
    <div class="title-favorite">
        <i class="fa-solid fa-heart"></i>
        <span>Đã yêu thích</span>
    </div>
    <div class="box-favorite">
        <div class="title-box-favorite">
            Yêu thích sân
        </div>
        <div class="box-favorite-data">
            <ul>
                <?php
                $mataikhoan = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
                $list_favorite_pitch = "SELECT * FROM luotyeuthichsan, san
                WHERE luotyeuthichsan.masan = san.masan
                AND luotyeuthichsan.mataikhoan = $mataikhoan
                ORDER BY luotyeuthichsan.mayeuthichsan DESC";
                $query_favorite_pitch = mysqli_query($mysqli, $list_favorite_pitch);
                $exis_favorite_pitch = mysqli_num_rows($query_favorite_pitch);
                if ($exis_favorite_pitch > 0) {
                    while ($row_favorite_pitch = mysqli_fetch_array($query_favorite_pitch)) {
                ?>
                <li>
                    <div class="control-favorite">
                        <form action="screen/personal-sc/center-personal/handle-center-personal/handle-favorite.php"
                            method="post">
                            <input type="text" name="mayeuthichsan" style="display: none;"
                                value="<?php echo $row_favorite_pitch['mayeuthichsan'] ?>">
                            <button type="submit" class="del-btn-favorite" name="xoayeuthichsan"
                                title="Hủy yêu thích sân"
                                onclick="return confirm('Bạn có muốn hủy yêu thích sân này?')">
                                <i class="fa-solid fa-heart-crack"></i>
                            </button>
                        </form>
                    </div>
                    <div class="detail-favorite">
                        <div class="title-detail-favorite">
                            <i class="fa-solid fa-paperclip"></i>
                            <a href="index.php?quanly=chitietdatsan&&idSan=<?php echo $row_favorite_pitch['masan'] ?>">
                                <?php echo $row_favorite_pitch['tieudesan'] ?>
                            </a>
                        </div>
                    </div>
                </li>
                <?php
                    }
                } else {
                    ?>
                <li>
                    <div class="control-favorite">
                        <form action="" method="post">
                            <button type="submit" class="none-btn-favorite">
                            </button>
                        </form>
                    </div>
                    <div class="detail-favorite">
                        <div class="title-none">
                            Bạn chưa yêu thích sân nào!
                        </div>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="box-favorite">
        <div class="title-box-favorite">
            Yêu thích blog
        </div>
        <div class="box-favorite-data">
            <ul>
                <?php
                $list_favorite_blog = "SELECT * FROM luotyeuthichblog, blog
                WHERE luotyeuthichblog.mablog = blog.mablog
                AND luotyeuthichblog.mataikhoan = $mataikhoan
                ORDER BY luotyeuthichblog.mayeuthichblog DESC";
                $query_favorite_blog = mysqli_query($mysqli, $list_favorite_blog);
                $exis_favorite_blog = mysqli_num_rows($query_favorite_blog);
                if ($exis_favorite_blog > 0) {
                    while ($row_favorite_blog = mysqli_fetch_array($query_favorite_blog)) {
                ?>
                <li>
                    <div class="control-favorite">
                        <form action="screen/personal-sc/center-personal/handle-center-personal/handle-favorite.php"
                            method="post">
                            <input type="text" name="mayeuthichblog" style="display: none;"
                                value="<?php echo $row_favorite_blog['mayeuthichblog'] ?>">
                            <button type="submit" class="del-btn-favorite" name="xoayeuthichblog"
                                title="Hủy yêu thích blog"
                                onclick="return confirm('Bạn có muốn hủy yêu thích blog này?')">
                                <i class="fa-solid fa-heart-crack"></i>
                            </button>
                        </form>
                    </div>
                    <div class="detail-favorite">
                        <div class="title-detail-favorite">
                            <i class="fa-solid fa-paperclip"></i>
                            <a
                                href="index.php?quanly=chitietblog&&idchitietblog=<?php echo $row_favorite_blog['mablog'] ?>">
                                <?php echo $row_favorite_blog['tieudeblog'] ?>
                            </a>
                        </div>
                    </div>
                </li>
                <?php
                    }
                } else {
                    ?>
                <li>
                    <div class="control-favorite">
                        <form action="" method="post">
                            <button type="submit" class="none-btn-favorite">
                            </button>
                        </form>
                    </div>
                    <div class="detail-favorite">
                        <div class="title-none">
                            Bạn chưa yêu thích blog nào!
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