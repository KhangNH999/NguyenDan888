<link rel="stylesheet" href="assets/css/pitch-history/pitch-history.css">
<?php
//Lấy mã tài khoản
$mataikhoan = isset($_SESSION['id_khachhang']) ? $_SESSION['id_khachhang'] : '';

if ($mataikhoan == '') {
?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}

?>
<div class="tab-select">
    <button id="btn-history" onclick="showHistoryUser();">Lịch sử đặt sân</button>
    <button id="btn-turnover" onclick="showTurnover();">Doanh thu</button>
</div>
<div class="center-his" id="history-user" <?php echo isset($_GET['doanhthu']) ? 'style="display: none"' : ''; ?>>
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
    $sql_ls = "SELECT * FROM lichsudatsan, taikhoan, san, khunggio
    WHERE san.masan = lichsudatsan.masan 
    AND taikhoan.mataikhoan = lichsudatsan.mataikhoan
    AND khunggio.makhunggio = lichsudatsan.makhunggio 
    AND lichsudatsan.mataikhoan = $mataikhoan 
    AND lichsudatsan.xacnhandatsan = 2
    ORDER BY malichsu DESC LIMIT $begin, $limit";
    $query_ls = mysqli_query($mysqli, $sql_ls);
    //Lấy số lượng tất cả các hàng từ câu truy vấn
    $sql_ls_full = "SELECT * FROM lichsudatsan, taikhoan, san, khunggio
    WHERE san.masan = lichsudatsan.masan 
    AND taikhoan.mataikhoan = lichsudatsan.mataikhoan
    AND khunggio.makhunggio = lichsudatsan.makhunggio 
    AND lichsudatsan.mataikhoan = $mataikhoan 
    AND lichsudatsan.xacnhandatsan = 2
    ORDER BY malichsu DESC";
    $query_ls_full = mysqli_query($mysqli, $sql_ls_full);
    $count_ls = mysqli_num_rows($query_ls_full);
    //Lấy tổng tiền
    $totalMoney = 0;
    while ($getMoney = mysqli_fetch_array($query_ls_full)) {
        $totalMoney = $totalMoney + $getMoney['giathue'];
    }
    ?>
    <div class="title-his">
        <div class="statistical">
            <div class="title-statistical">Số lần thanh toán: </div>
            <div class="number-statistical" style="color: rgb(254, 89, 95);"><?php echo $count_ls ?></div>
        </div>
        <div class="statistical">
            <div class="title-statistical">Tổng tiền: </div>
            <div class="number-statistical" style="color: #30bc40;">
                <?php echo number_format($totalMoney, 0, ',', '.') ?>
            </div>
        </div>
    </div>
    <?php if ($count_ls > 0) {
    ?>
    <div class="data-his">
        <ul class="list-his">
            <?php
                while ($row = mysqli_fetch_array($query_ls)) {
                ?>
            <li class="content-his">
                <div class="his-detail-right">
                    <table class="tbl-his">
                        <thead>
                            <tr>
                                <th class="tbl-title">Mã lịch sử</th>
                                <th class="tbl-title">Ngày tạo đặt sân</th>
                                <th class="tbl-title">Giá thuê</th>
                                <th class="tbl-title">Hình thức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tbl-data" style="color: rgb(254, 89, 95);"><?php echo $row['malichsu'] ?>
                                </td>
                                <td class="tbl-data">
                                    <?php echo date('d-m-Y &#10059; H:i:s', strtotime($row['thoigiantaodatsan'])) ?>
                                </td>
                                <td class="tbl-data"><?php echo number_format($row['giathue'], 0, ',', '.') ?></td>
                                <td class="tbl-data"><?php echo $row['hinhthucthanhtoan'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="wall"></div>
                <div class="his-detail-left">
                    <div class="detail-his">
                        <p class="label">Tên:</p>
                        <p class="data"><?php echo $row['ten'] ?></p>
                        <p class="link"><a href="index.php?quanly=trangcuatoi">(Chi tiết)</a></p>
                    </div>
                    <div class="detail-his">
                        <p class="label">Mã sân:</p>
                        <p class="data"><?php echo $row['masan'] ?></p>
                        <p class="link"><a href="index.php?quanly=chitietdatsan&&idSan=<?php echo $row['masan'] ?>">(Chi
                                tiết)</a>
                        </p>
                    </div>
                    <div class="detail-his">
                        <p class="label">Ngày đặt:</p>
                        <p class="data open">
                            <?php echo date('d-m-Y', strtotime($row['ngaydat'])) ?></p>
                    </div>
                    <div class="detail-his">
                        <p class="label">Khung giờ:</p>
                        <p class="data close">
                            <?php echo date('H:i', strtotime($row['giobatdau'])) . ' - ' . date('H:i', strtotime($row['gioketthuc'])) ?>
                        </p>
                    </div>
                    <div class="detail-his">
                        <p class="label">Tình trạng:</p>
                        <p class="data <?php if ($row['tinhtranglichsu'] == 1) {
                                                    echo 'status-1';
                                                } else {
                                                    echo 'status-0';
                                                } ?>"><?php if ($row['tinhtranglichsu'] == 1) {
                                                            echo 'Còn hiệu lực';
                                                        } else {
                                                            echo 'Hết hạn';
                                                        }
                                                        ?></p>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
    <?php
        //Lấy số trang hiện có
        $page = ceil($count_ls / $limit);
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
                            } ?> href="index.php?quanly=lichsudatsan&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php
                }
                ?>
        </ul>
    </div>
    <?php } else { ?>
    <div class="data-his">
        <ul class="list-his">
            <li class="content-his"><span class="non-his">Bạn chưa thực hiện đặt sân!</span></li>
        </ul>
    </div>
    <?php
    }
    ?>
</div>
<div class="center-his" id="turnover" <?php echo isset($_GET['doanhthu']) ? 'style="display: block"' : ''; ?>>
    <?php
    //Tạo số phần tử hiển thị
    $limit = 5;
    //Tạo thứ tự trang hiện tại trên tổng số trang
    if (isset($_GET['page2'])) {
        $page_get = $_GET['page2'];
    } else {
        $page_get = 1;
    }
    if ($page_get == '' || $page_get == 1) {
        $begin = 0;
    } else {
        $begin = ($page_get * $limit) - $limit;
    }
    $sql_ls = "SELECT * FROM lichsudatsan, san, khunggio
    WHERE san.masan = lichsudatsan.masan 
    AND khunggio.makhunggio = lichsudatsan.makhunggio 
    AND san.mataikhoan = $mataikhoan 
    AND lichsudatsan.xacnhandatsan = 2
    ORDER BY malichsu DESC LIMIT $begin, $limit";
    $query_ls = mysqli_query($mysqli, $sql_ls);
    //Lấy số lượng tất cả các hàng từ câu truy vấn
    $sql_ls_full = "SELECT * FROM lichsudatsan, san, khunggio
    WHERE san.masan = lichsudatsan.masan 
    AND khunggio.makhunggio = lichsudatsan.makhunggio 
    AND san.mataikhoan = $mataikhoan 
    AND lichsudatsan.xacnhandatsan = 2
    ORDER BY malichsu DESC";
    $query_ls_full = mysqli_query($mysqli, $sql_ls_full);
    $count_ls = mysqli_num_rows($query_ls_full);
    //Lấy tổng tiền
    $totalMoney = 0;
    while ($getMoney = mysqli_fetch_array($query_ls_full)) {
        $totalMoney = $totalMoney + $getMoney['giathue'];
    }
    ?>
    <div class="title-his">
        <div class="statistical">
            <div class="title-statistical">Tổng hóa đơn: </div>
            <div class="number-statistical" style="color: rgb(254, 89, 95);"><?php echo $count_ls ?></div>
        </div>
        <div class="statistical">
            <div class="title-statistical">Tổng tiền: </div>
            <div class="number-statistical" style="color: #30bc40;">
                <?php echo number_format($totalMoney, 0, ',', '.') ?>
            </div>
        </div>
    </div>
    <?php if ($count_ls > 0) {
    ?>
    <div class="data-his">
        <ul class="list-his">
            <?php
                while ($row = mysqli_fetch_array($query_ls)) {
                ?>
            <li class="content-his">
                <div class="his-detail-right">
                    <table class="tbl-his">
                        <thead>
                            <tr>
                                <th class="tbl-title">Mã lịch sử</th>
                                <th class="tbl-title">Ngày tạo đặt sân</th>
                                <th class="tbl-title">Giá thuê</th>
                                <th class="tbl-title">Hình thức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tbl-data" style="color: rgb(254, 89, 95);"><?php echo $row['malichsu'] ?>
                                </td>
                                <td class="tbl-data">
                                    <?php echo date('d-m-Y &#10059; H:i:s', strtotime($row['thoigiantaodatsan'])) ?>
                                </td>
                                <td class="tbl-data"><?php echo number_format($row['giathue'], 0, ',', '.') ?></td>
                                <td class="tbl-data"><?php echo $row['hinhthucthanhtoan'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="wall"></div>
                <div class="his-detail-left">
                    <div class="detail-his">
                        <?php
                                $sql_id_user = "SELECT * FROM lichsudatsan, taikhoan 
                                WHERE lichsudatsan.mataikhoan = taikhoan.mataikhoan 
                                AND malichsu = $row[malichsu] LIMIT 1";
                                $query_id_user = mysqli_query($mysqli, $sql_id_user);
                                while ($row_id_user = mysqli_fetch_array($query_id_user)) {
                                ?>
                        <p class="label">Tên:</p>
                        <p class="data"><?php echo $row_id_user['ten'] ?></p>
                        <p class="link"><a
                                href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_id_user['mataikhoan'] ?>">(Chi
                                tiết)</a></p>
                        <?php } ?>
                    </div>
                    <div class="detail-his">
                        <p class="label">Mã sân:</p>
                        <p class="data"><?php echo $row['masan'] ?></p>
                        <p class="link"><a href="index.php?quanly=chitietdatsan&&idSan=<?php echo $row['masan'] ?>">(Chi
                                tiết)</a>
                        </p>
                    </div>
                    <div class="detail-his">
                        <p class="label">Ngày đặt:</p>
                        <p class="data open">
                            <?php echo date('d-m-Y', strtotime($row['ngaydat'])) ?></p>
                    </div>
                    <div class="detail-his">
                        <p class="label">Khung giờ:</p>
                        <p class="data close">
                            <?php echo date('H:i', strtotime($row['giobatdau'])) . ' - ' . date('H:i', strtotime($row['gioketthuc'])) ?>
                        </p>
                    </div>
                    <div class="detail-his">
                        <p class="label">Tình trạng:</p>
                        <p class="data <?php if ($row['tinhtranglichsu'] == 1) {
                                                    echo 'status-1';
                                                } else {
                                                    echo 'status-0';
                                                } ?>"><?php if ($row['tinhtranglichsu'] == 1) {
                                                            echo 'Còn hiệu lực';
                                                        } else {
                                                            echo 'Hết hạn';
                                                        }
                                                        ?></p>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
    <?php
        //Lấy số trang hiện có
        $page = ceil($count_ls / $limit);
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
                    href="index.php?quanly=lichsudatsan&doanhthu&page2=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php
                }
                ?>
        </ul>
    </div>
    <?php } else { ?>
    <div class="data-his">
        <ul class="list-his">
            <li class="content-his"><span class="non-his">Chưa có dữ liệu thống kê!</span></li>
        </ul>
    </div>
    <?php
    }
    ?>
</div>
<script>
function showHistoryUser() {
    document.getElementById('history-user').style.display = "block";
    document.getElementById('turnover').style.display = "none";
    document.getElementById('btn-history').style.backgroundColor = "#1C6CC1";
    document.getElementById('btn-history').style.color = "#fff";
    document.getElementById('btn-turnover').style.backgroundColor = "#f0f0f0";
    document.getElementById('btn-turnover').style.color = "#000";
}

function showTurnover() {
    document.getElementById('history-user').style.display = "none";
    document.getElementById('turnover').style.display = "block";
    document.getElementById('btn-history').style.backgroundColor = "#f0f0f0";
    document.getElementById('btn-history').style.color = "#000";
    document.getElementById('btn-turnover').style.backgroundColor = "#1C6CC1";
    document.getElementById('btn-turnover').style.color = "#fff";
}
</script>