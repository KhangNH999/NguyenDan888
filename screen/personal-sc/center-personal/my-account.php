<div id="center-personal">
    <?php
    //lấy tên đăng nhập từ session để lấy thông tin tài khoản
    $mataikhoan = $_SESSION['id_khachhang'];
    $tendangnhap = $_SESSION['tenkhachhang'];
    $sql_dt = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "' LIMIT 1";
    $query_dt = mysqli_query($mysqli, $sql_dt);
    while ($dong = mysqli_fetch_array($query_dt)) {
    ?>
    <section id="user-header">
        <div class="picture">
            <img src="admin/modules/account/uploads-ac/<?php echo $dong['hinhanh'] ?>" alt="Ảnh đại diện">
        </div>
        <div class="name">
            <a href=""><?php echo $dong['ten']; ?></a>
        </div>
        <div class="status">
            <i class="fa-solid fa-user"></i>
            <span>Quyền hạn hiện tại của bạn là:<span class="type">
                    <?php
                        if ($dong['maloaitaikhoan'] == 1) {
                            echo 'Admin';
                        } else if ($dong['maloaitaikhoan'] == 2) {
                            echo 'Khách hàng';
                        } else if ($dong['maloaitaikhoan'] == 3) {
                            echo 'Chủ sân';
                        }
                        ?>
                </span></span>
        </div>
    </section>
    <ul id="user-menu">
        <li class="selected">
            <a href="">Hồ sơ</a>
        </li>
        <!-- Xử lý hiển thị số blog đã viết -->
        <?php
            $sql_blog = "SELECT * FROM blog WHERE mataikhoan='" . $mataikhoan . "'";
            $row_blog = mysqli_query($mysqli, $sql_blog);
            $count_blog = mysqli_num_rows($row_blog);
            ?>
        <li <?php if ($count_blog > 0) {
                    echo 'class="selected"';
                } else {
                    echo 'class="disabled"';
                }
                ?>>
            <a href="index.php?quanly=blogcuatoi">Blog:<span class="sum-blog"><?php echo $count_blog ?></span></a>
        </li>
        <!-- Xử lý hiển thị số Sân đã tạo  -->
        <?php
            $sql_pitch = "SELECT * FROM san WHERE mataikhoan='" . $mataikhoan . "'";
            $row_pitch = mysqli_query($mysqli, $sql_pitch);
            $count_pitch = mysqli_num_rows($row_pitch);
            ?>
        <li <?php if ($count_pitch > 0) {
                    echo 'class="selected"';
                } else {
                    echo 'class="disabled"';
                }
                ?>>
            <a href="index.php?quanly=quanlysan">Sân:<span class="sum-setpitch"><?php echo $count_pitch ?></span></a>
        </li>
        <!-- Xử lý hiển thị đánh giá -->
        <?php
            $sql = "SELECT * FROM danhgia WHERE matkdanhgia =  $mataikhoan";
            $query_total = mysqli_query($mysqli, $sql);
            $row_star = mysqli_num_rows($query_total);
            $total = 0;
            while ($count = mysqli_fetch_array($query_total)) {
                $total = $total + $count['sosao'];
            }
            if ($row_star == 0) {
                $result = $total / 1;
            } else {
                $result = $total / $row_star;
            }
            ?>
        <li <?php if ($row_star > 0) {
                    echo 'class="selected"';
                } else {
                    echo 'class="disabled"';
                }
                ?>>
            <a href="index.php?quanly=danhgia">Đánh giá: <span
                    class="sum-evaluate">+<?php echo round($result, 1) ?></span></a>
        </li>
    </ul>
    <section id="profile">
        <h3>
            <i class="fa-solid fa-circle-user"></i>
            <span>Hồ sơ của:<span class="user-name"><?php echo $dong['tendangnhap']; ?></span></span>
        </h3>
        <a href="index.php?quanly=hoso" id="edit-ac">
            <i class="fa-solid fa-gear"></i>
            <span>Chỉnh sửa</span>
        </a>
        <button data-modal-target="#modal" id="edit-pass">
            <i class="fa-solid fa-key"></i>
            <span>Đổi mật khẩu</span>
        </button>
        <form action="screen/personal-sc/center-personal/handle-center-personal/handle-permission.php" method="post"
            class="up-permission">
            <input type="hidden" name="mataikhoan" value="<?php echo $mataikhoan ?>">
            <?php if ($dong['yeucaunangquyen'] == 2) { ?>
            <i class="fa-solid fa-spinner"></i>
            <button type="submit" disabled>Đợi xác nhận</button>
            <?php } else if ($dong['yeucaunangquyen'] == 3) { ?>
            <i class="fa-solid fa-check"></i>
            <button type="submit" disabled>Đã nâng</button>
            <?php } else { ?>
            <i class="fa-solid fa-arrow-up"></i>
            <button type="submit" name="nangquyen">Nâng quyền</button>
            <?php } ?>
        </form>
        <table id="line-table">
            <tbody>
                <tr>
                    <th>
                        <span>Ngày sinh</span>
                    </th>
                    <td>
                        <span><?php echo $dong['ngaysinh'] ?></span>
                    </td>
                </tr>
                <tr>
                    <th>
                        <span>Địa chỉ</span>
                    </th>
                    <td>
                        <span><?php echo $dong['diachitaikhoan'] ?></span>
                    </td>
                </tr>
                <tr>
                    <th>
                        <span>Số điện thoại</span>
                    </th>
                    <td>
                        <span><?php echo $dong['sodienthoai'] ?></span>
                    </td>
                </tr>
                <tr>
                    <th>
                        <span>Ngày đăng ký HINADA</span>
                    </th>
                    <td>
                        <span><?php echo $dong['thoigiantaotaikhoan'] ?></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</div>
<div class="modal" id="modal">
    <div id="modal-header">
        <div class="title">
            <i class="fa-solid fa-key"></i>
            <span>Đổi mật khẩu</span>
        </div>
        <button data-close-button class="close-btn">&times;</button>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div id="modal-body">
            <div class="old-pass">
                <div>
                    <span class="label">Mật khẩu hiện tại</span>
                </div>
                <input type="password" id="input-old-pass" name="old-pass">
            </div>
            <div class="new-pass">
                <div>
                    <span class="label">Mật khẩu mới</span>
                </div>
                <input type="password" id="input-new-pass" name="new-pass">
            </div>
            <button id="btn-new-pass" name="confirm-pass">Xác nhận</button>
        </div>
    </form>
</div>
<?php
    }
?>
<div id="overlay"></div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_SESSION['nangquyen']) && $_SESSION['nangquyen'] == 2) { ?>
<script>
Swal.fire({
    title: 'Yêu cầu nâng quyền thành công!',
    text: "Vui lòng chờ đợi xác nhận yêu cầu!",
    icon: 'success',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['nangquyen']); ?>
    }
})
</script>
<?php } ?>