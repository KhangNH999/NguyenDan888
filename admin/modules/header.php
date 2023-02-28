<div class="header-ad">
    <?php
    $sql_count_account = "SELECT * FROM taikhoan WHERE yeucaunangquyen = 2";
    $query_count_account = mysqli_query($mysqli, $sql_count_account);
    $count_account = mysqli_num_rows($query_count_account);

    $sql_count_pitch = "SELECT * FROM san WHERE tinhtrangsan = 0";
    $query_count_pitch = mysqli_query($mysqli, $sql_count_pitch);
    $count_pitch = mysqli_num_rows($query_count_pitch);

    $sql_count_chat = "SELECT * FROM tuvankhachhang WHERE tinhtrangtinnhan = '1'";
    $query_count_chat = mysqli_query($mysqli, $sql_count_chat);
    $count_chat = mysqli_num_rows($query_count_chat);

    $id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
    $sql_user = "SELECT * FROM taikhoan, loaitaikhoan WHERE taikhoan.maloaitaikhoan = loaitaikhoan.maloaitaikhoan AND taikhoan.mataikhoan = $id_user LIMIT 1";
    $query_user = mysqli_query($mysqli, $sql_user);
    while ($row = mysqli_fetch_array($query_user)) {
    ?>
    <div class="header-ad-box">
        <a href="../index.php?dangxuat=1&id_user=<?php echo $id_user ?>" title="Đăng xuất"><i
                class="fa-solid fa-right-from-bracket"></i></a>
        <a href="index.php?id_user=<?php echo $id_user ?>" title="Trang Admin"><i class="fa-solid fa-house"></i></a>
        <a href="index.php?action=quanlytaikhoan&query=main&id_user=<?php echo $id_user ?>" class="count-data">
            <i class="fa-solid fa-circle-up"></i>
            <span>Yêu cầu nâng quyền: </span>
            <span style="font-weight: bold;"><?php echo $count_account ?></span>
        </a>
        <a href="index.php?action=quanlysan&query=main&id_user=<?php echo $id_user ?>" class="count-data">
            <i class="fa-solid fa-at"></i>
            <span>Yêu cầu tạo sân: </span>
            <span style="font-weight: bold;"><?php echo $count_pitch ?></span>
        </a>
        <a href="index.php?action=quanlytuvankhachhang&query=main&id_user=<?php echo $id_user ?>" class="count-data">
            <i class="fa-sharp fa-solid fa-comments"></i>
            <span>Tư vấn: </span>
            <span style="font-weight: bold;"><?php echo $count_chat ?></span>
        </a>
    </div>
    <div class="header-ad-box">
        <div class="text-ad">
            Chào mừng <span class="text-user-detail">
                <img src="modules/account/uploads-ac/<?php echo $row['hinhanh'] ?>" alt="Ảnh">
                <?php echo $row['tenloaitaikhoan'] ?>:
                <?php echo $row['ten'] ?>
            </span> đến với myHinada
        </div>
    </div>
    <?php } ?>
</div>