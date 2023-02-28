<link rel="stylesheet" href="assets/css/personal/contest-personal.css">
<?php
//Kiểm tra đường dẫn
$matk = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';

$sql_type = "SELECT maloaitaikhoan FROM taikhoan WHERE mataikhoan = $matk";
$query_type = mysqli_query($mysqli, $sql_type);
while ($row_type = mysqli_fetch_array($query_type)) {
    $maloaitaikhoan = $row_type['maloaitaikhoan'];
}

if ($maloaitaikhoan == 2) {
?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}
?>
<div class="contest-personal-center">
    <div class="title-contest-manager">
        <i class="fa-solid fa-calendar-week"></i>
        <span>Quản lý sự kiện</span>
    </div>
    <div class="list-contest-manager">
        <ul>
            <?php
            $mataikhoan = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
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
                        <input type="text" name="masukien" style="display: none;"
                            value="<?php echo $row_contest['masukien'] ?>">
                        <button type="submit" class="del-btn-contest" name="xoasukien" title="Xóa sự kiện"
                            onclick="return confirm('Bạn có muốn xóa sự kiện này?')">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                        <button type="submit" class="edit-btn-contest" name="suasukien" title="Sửa sự kiện">
                            <i class="fa-solid fa-pen-to-square"></i>
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
                        Bạn chưa tạo sự kiện nào!
                    </div>
                </div>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>