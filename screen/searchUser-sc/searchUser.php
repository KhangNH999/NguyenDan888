<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="assets/css/searchUser/searchUser.css">
<?php
if (isset($_GET['page'])) {
    $tukhoa = $_GET['searchUser'];
} else if (isset($_POST['searchUser'])) {
    $tukhoa = $_POST['searchUser'];
} else {
    $tukhoa = '';
}

if ($tukhoa == '') {
?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}

$limit = 5;
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
$sql_timkiem = "SELECT * FROM taikhoan WHERE ten like '%" . $tukhoa . "%' LIMIT $begin, $limit";
$sql_page = "SELECT * FROM taikhoan WHERE ten like '%" . $tukhoa . "%'";
$query_timkiem = mysqli_query($mysqli, $sql_timkiem);
$query_page = mysqli_query($mysqli, $sql_page);
$row_count = mysqli_num_rows($query_page);
?>
<div id="left-searchUser">
    <div id="title">
        <img src="assets/images/icons/search.gif" alt="Ảnh" style="width: 30px; height: 30px;">
        <span style="margin-left: 4px;">Kết quả tìm kiếm: Có <?php echo $row_count ?>
            kết quả cho từ khóa
            "<span style="font-weight: bold; color: #1c6cc1;"><?php echo $tukhoa ?></span>"</span>
    </div>
    <?php
    if ($row_count > 0) {
        while ($row_timkiem = mysqli_fetch_array($query_timkiem)) {
    ?>
    <div id="result-user">
        <img src="admin/modules/account/uploads-ac/<?php echo $row_timkiem['hinhanh'] ?>" alt="">
        <div id="info-user">
            <a href="index.php?quanly=hosonguoidung&&idAcc=<?php echo $row_timkiem['mataikhoan'] ?>">
                <h2><?php echo $row_timkiem['ten'] ?></h2>
            </a>
            <p><i class="fa-solid fa-at" style="color: #EC6E4B;"></i> Sống tại:
                <?php echo $row_timkiem['diachitaikhoan'] ?></p>
            <p><i class="fa-solid fa-clock" style="color: #F29759;"></i> Ngày đăng ký:
                <?php echo date('d-m-Y', strtotime($row_timkiem['thoigiantaotaikhoan'])) ?></p>
            <p><i class="fa-solid fa-circle-exclamation" style="color: #F8C459;"></i> Tình trạng:
                <?php if ($row_timkiem['tinhtrangtk'] == 1) {
                            echo "<span style='background: #4ba66f; color: #fff; border-radius: 12px; padding: 0 5px;font-size: 13px;'>Đang hoạt động</span>";
                        } else if ($row_timkiem['tinhtrangtk'] == 2) {
                            echo "<span style='background: #D53636; color: #fff; border-radius: 12px; padding: 0 5px;font-size: 13px;'>Đăng xuất</span>";
                        } else {
                            echo "<span style='background: #feda2c; color: #fff; border-radius: 12px; padding: 0 5px;font-size: 13px;'>Khóa</span>";
                        } ?></p>
        </div>
    </div>
    <?php
        }
        ?>
    <!-- xử lý page -->
    <?php
        $page = ceil($row_count / $limit);
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
                    href="index.php?quanly=timkiemnguoidung&&searchUser=<?php echo $tukhoa ?>&&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php
                }
                ?>
        </ul>
    </div>
    <?php
    } else {
    ?>
    <div class="none"><span>Không có kết quả tìm kiếm.</span></div>
    <?php
    }
    ?>
</div>
<div id="right">
    <?php include('screen/main-sc/recruit-main-sc.php') ?>
</div>