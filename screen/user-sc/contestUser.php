<link rel="stylesheet" href="assets/css/personal/contest-personal.css">
<div class="contest-personal-center">
    <div class="title-contest-manager">
        <i class="fa-solid fa-calendar-week"></i>
        <span>Sự kiện đã tạo</span>
    </div>
    <div class="list-contest-manager">
        <ul>
            <?php
            $mataikhoan = (isset($_GET['idAcc'])) ? $_GET['idAcc'] : '';
            $list_contest = "SELECT * FROM sukien WHERE mataikhoan = $mataikhoan ORDER BY masukien DESC";
            $query_list_contest = mysqli_query($mysqli, $list_contest);
            $exis_contest = mysqli_num_rows($query_list_contest);
            if ($exis_contest > 0) {
                while ($row_contest = mysqli_fetch_array($query_list_contest)) {
            ?>
            <li>
                <div class="control-contest">
                    <form action="screen/personal-sc/center-personal/handle-center-personal/handle-contest.php"
                        method="post">
                        <button type="submit" class="none-btn-contest">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </form>
                </div>
                <div class="detail-contest">
                    <div class="title-contest">
                        <a href="index.php?quanly=chitietsukien&idsukien=<?php echo $row_contest['masukien'] ?>">
                            <?php echo $row_contest['tieudesukien'] ?>
                        </a>
                    </div>
                    <div class="status-contest <?php echo ($row_contest['tinhtrangsukien'] == 0) ? "timeout" : ""; ?>">
                        <?php
                                if ($row_contest['tinhtrangsukien'] == 1) {
                                    echo 'Đang diễn ra';
                                } else if ($row_contest['tinhtrangsukien'] == 0) {
                                    echo 'Đã kết thúc';
                                }
                                ?>
                    </div>
                    <div class="time-created">
                        Ngày đăng:
                        <?php echo date('d-m-Y &#10059 H:i:s', strtotime($row_contest['thoigiantaosukien'])) ?>
                    </div>
                    <div class="address-contest">
                        Địa chỉ:
                        <?php echo $row_contest['diadiemsukien'] ?>
                    </div>
                </div>
            </li>
            <?php
                }
            } else { ?>
            <li>
                <div class="control-contest">
                    <form action="" method="post">
                        <button type="submit" class="none-btn-contest">
                            <i class="fa-solid fa-question"></i>
                        </button>
                    </form>
                </div>
                <div class="detail-contest">
                    <div class="title-none">
                        Chưa tạo sự kiện nào!
                    </div>
                </div>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>