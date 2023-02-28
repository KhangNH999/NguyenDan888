<div class="title-news">
    <img src="assets/images/icons/ball.gif" alt="Ảnh" style="width: 30px; height: 30px;">
    <span style="margin-left: 4px;">SÂN BÓNG</span>
</div>
<ul>
    <?php
    $sql_dt = "SELECT * FROM san WHERE tinhtrangsan = '1' ORDER BY RAND() DESC LIMIT 5";
    $query_dt = mysqli_query($mysqli, $sql_dt);
    while ($dong = mysqli_fetch_array($query_dt)) {
    ?>
    <hr>
    <li>
        <span class="new">NEW</span>
        <a
            href="index.php?quanly=chitietdatsan&&idSan=<?php echo $dong['masan'] ?>"><?php echo $dong['tieudesan'] ?></a>
    </li>
    <p>Ngày đăng: <span class="timeset-default"><?php echo date('d-m-Y', strtotime($dong['thoigiantaosan'])) ?></span>
        <span><?php echo date('&#10059; H:i:s', strtotime($dong['thoigiantaosan'])) ?></span>
        <?php
            $sql_like = "SELECT * FROM luotyeuthichsan WHERE masan = $dong[masan]";
            $number_like = mysqli_num_rows(mysqli_query($mysqli, $sql_like));
            if ($number_like > 0) { ?>
        <span class="badge-like">Yêu thích: <?php echo $number_like ?></span>
        <?php } ?>
        <?php
            $sql_follow = "SELECT * FROM theodoi WHERE masan = $dong[masan]";
            $number_follow = mysqli_num_rows(mysqli_query($mysqli, $sql_follow));
            if ($number_follow > 0) { ?>
        <span class="badge-follow">Theo dõi: <?php echo $number_follow ?></span>
        <?php } ?>
        <?php
            $sql_comment = "SELECT * FROM binhluansan WHERE masan = $dong[masan]";
            $number_comment = mysqli_num_rows(mysqli_query($mysqli, $sql_comment));
            if ($number_comment > 0) { ?>
        <span class="badge-comment">Bình luận: <?php echo $number_comment ?></span>
        <?php } ?>
    </p>
    <?php
    }
    ?>
    <hr>
</ul>
<style>
.new {
    display: inline-block;
    margin: 5px -11px 0px 10px;
    padding: 3px 4px 3px 14px;
    border-radius: 3px;
    background: #F44A4F;
    font-size: 10px;
    color: #FFF;
    line-height: 1;
    vertical-align: top;
    font-weight: normal;
    text-align: center;
}
</style>
<h4><a href="index.php?quanly=datsan&&type=default">Xem thêm sân</a></h4>
<script src="assets/javascript/change-new-icon.js"></script>