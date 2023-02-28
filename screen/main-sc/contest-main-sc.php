<div class="title-news">
    <img src="assets/images/icons/trophy.gif" alt="Ảnh" style="width: 30px; height: 30px;">
    <span style="margin-left: 4px;">SỰ KIỆN</span>
</div>
<ul>
    <?php
    $sql_dt = "SELECT * FROM cuocthi WHERE tinhtrangcuocthi = '1' ORDER BY RAND() DESC LIMIT 5";
    $query_dt = mysqli_query($mysqli, $sql_dt);
    while ($row = mysqli_fetch_array($query_dt)) {
    ?>
    <hr>
    <li>
        <!-- <span class="new">NEW</span> -->
        <a href="index.php?quanly=chitietcuocthi&idCuocthi=<?php echo $row['macuocthi'] ?>">
            <?php echo $row['tieudecuocthi'] ?>
        </a>
    </li>
    <p>Ngày đăng: <span class="timesetdefault"><?php echo date('d-m-Y', strtotime($row['thoigiantaocuocthi'])) ?>
        </span><?php echo date('&#10059; H:i:s', strtotime($row['thoigiantaocuocthi'])) ?>
    </p>
    <li class="contest-teams">
        <div class="contest-table">
            <?php
                $sql_get_player_1 = "SELECT * FROM thamgiacuocthi WHERE macuocthi = $row[macuocthi] AND vitrithamgia = '1'";
                $query_get_player_1 = mysqli_query($mysqli, $sql_get_player_1);
                $get_player_1 = mysqli_num_rows($query_get_player_1);

                $sql_get_player_2 = "SELECT * FROM thamgiacuocthi WHERE macuocthi = $row[macuocthi] AND vitrithamgia = '2'";
                $query_get_player_2 = mysqli_query($mysqli, $sql_get_player_2);
                $get_player_2 = mysqli_num_rows($query_get_player_2);

                $sql_get_player_3 = "SELECT * FROM thamgiacuocthi WHERE macuocthi = $row[macuocthi] AND vitrithamgia = '3'";
                $query_get_player_3 = mysqli_query($mysqli, $sql_get_player_3);
                $get_player_3 = mysqli_num_rows($query_get_player_3);

                $sql_get_player_4 = "SELECT * FROM thamgiacuocthi WHERE macuocthi = $row[macuocthi] AND vitrithamgia = '4'";
                $query_get_player_4 = mysqli_query($mysqli, $sql_get_player_4);
                $get_player_4 = mysqli_num_rows($query_get_player_4);
                ?>
            <div class="teams-detail">
                <span class="teams-name" style="color: #EF4D6C"><?php echo $row['tendoimot'] ?></span>
                <span class="teams-number"><?php echo ($get_player_1 > 0) ? $get_player_1 : '0' ?></span>
                <i class="fa-solid fa-user" style="color: #fd7e14;" title="Cầu thủ"></i>
                <span>/</span>
                <span class="teams-number"><?php echo ($row['soluongcauthu'] / 2) ?></span>
                <i class="fa-solid fa-users" style="color: #fd7e14; margin-right: 10px;" title="Tổng số cầu thủ"></i>
                <span class="teams-number"><?php echo ($get_player_2 > 0) ? $get_player_2 : '0' ?></span>
                <i class="fa-regular fa-user" style="color: #fecba1;" title="Dự bị"></i>
                <span>/</span>
                <span class="teams-number"><?php echo ($row['soluongcauthudubi'] / 2) ?></span>
                <i class="fa-solid fa-users" style="color: #fecba1;" title="Tổng số dự bị"></i>
            </div>
            <div>
                <img src="assets/images/icons/versus.png" alt="Ảnh" style="width: 40px; height: 25px;">
            </div>
            <div class="teams-detail right">
                <i class="fa-solid fa-users" style="color: #fecba1;" title="Tổng số dự bị"></i>
                <span class="teams-number"><?php echo ($row['soluongcauthudubi'] / 2) ?></span>
                <span>\</span>
                <i class="fa-regular fa-user" style="color: #fecba1;" title="Dự bị"></i>
                <span class="teams-number"><?php echo ($get_player_4 > 0) ? $get_player_4 : '0' ?></span>
                <i class="fa-solid fa-users" style="color: #fd7e14; margin-left: 10px;" title="Tổng số cầu thủ"></i>
                <span class="teams-number"><?php echo ($row['soluongcauthu'] / 2) ?></span>
                <span>\</span>
                <i class="fa-solid fa-user" style="color: #fd7e14;" title="Cầu thủ"></i>
                <span class="teams-number"><?php echo ($get_player_3 > 0) ? $get_player_3 : '0' ?></span>
                <span class="teams-name" style="color: #4EC9FF;"><?php echo $row['tendoihai'] ?></span>
            </div>
        </div>
    </li>
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
<h4><a href="index.php?quanly=cuocthi">Xem thêm sự kiện</a></h4>