<link rel="stylesheet" href="assets/css/personal/participation-history.css">
<div class="participation-personal">
    <div class="title-participation">
        <i class="fa-solid fa-clock-rotate-left"></i>
        <span>Lịch sử tham gia sự kiện</span>
    </div>
    <div class="participation-container">
        <div class="box-data">
            <ul>
                <?php
                $mataikhoan = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';
                $list_participation = "SELECT * FROM thamgiasukien, sukien
                WHERE thamgiasukien.masukien = sukien.masukien
                AND thamgiasukien.mataikhoan = $mataikhoan
                ORDER BY thamgiasukien.mathamgia DESC";
                $query_participation = mysqli_query($mysqli, $list_participation);
                $exis_participation = mysqli_num_rows($query_participation);
                if ($exis_participation > 0) {
                    while ($row_participation = mysqli_fetch_array($query_participation)) {
                ?>
                <li>
                    <div class="control-participation">
                        <form
                            action="screen/personal-sc/center-personal/handle-center-personal/handle-participation.php"
                            method="post">
                            <input type="text" name="mathamgia" style="display: none;"
                                value="<?php echo $row_participation['mathamgia'] ?>">
                            <button type="submit" class="del-btn-participation" name="huythamgia" title="Hủy tham gia"
                                onclick="return confirm('Bạn có muốn hủy tham gia sự kiện này?')">
                                <i class="fa-solid fa-user-slash"></i>
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-data">
                            <i class="fa-solid fa-paperclip"></i>
                            <a
                                href="index.php?quanly=chitietsukien&idsukien=<?php echo $row_participation['masukien'] ?>">
                                <?php echo $row_participation['tieudesukien'] ?>
                            </a>
                        </div>
                        <div class="content-data">
                            <i class="fa-solid fa-hashtag"></i>
                            <span>
                                <?php
                                        $vitri = $row_participation['vitrithamgia'];
                                        switch ($vitri) {
                                            case "1":
                                                echo "Đội - 1";
                                                break;
                                            case "2":
                                                echo "Dự bị - 1";
                                                break;
                                            case "3":
                                                echo "Đội - 2";
                                                break;
                                            case "4":
                                                echo "Dự bị - 2";
                                        }
                                        ?>
                            </span>
                        </div>
                        <div class="time-data">
                            <span><?php echo date('d-m-Y &#10059 H:i:s', strtotime($row_participation['thoigianthamgia'])) ?></span>
                            <i class="fa-sharp fa-solid fa-clock"></i>
                        </div>
                    </div>
                </li>
                <?php
                    }
                } else {
                    ?>
                <li>
                    <div class="control-participation">
                        <form action="" method="post">
                            <button type="submit" class="none-btn-participation">
                            </button>
                        </form>
                    </div>
                    <div class="detail-data">
                        <div class="title-none">
                            Bạn chưa tham gia sự kiện nào!
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_SESSION['notify']) && $_SESSION['notify'] == 1) { ?>
<script>
Swal.fire({
    title: 'Thành công!',
    text: "Bạn đã hủy tham gia sự kiện này!",
    icon: 'success',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['notify']); ?>
    }
})
</script>
<?php } ?>
<?php if (isset($_SESSION['notify']) && $_SESSION['notify'] == 0) { ?>
<script>
Swal.fire({
    title: 'Thất bại!',
    text: "Đã hết hạn giờ không thể hủy!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['notify']); ?>
    }
})
</script>
<?php } ?>