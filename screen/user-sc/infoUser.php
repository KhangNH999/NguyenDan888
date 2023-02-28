<?php
//lấy tên đăng nhập từ session để lấy thông tin tài khoản
$mataikhoan = $_GET['idAcc'];
$sql_dt = "SELECT * FROM taikhoan WHERE mataikhoan = $mataikhoan LIMIT 1";
$query_dt = mysqli_query($mysqli, $sql_dt);
while ($dong = mysqli_fetch_array($query_dt)) {
?>
<div id="center-userProfile">
    <section id="user-header">
        <div class="picture">
            <img src="admin/modules/account/uploads-ac/<?php echo $dong['hinhanh'] ?>" alt="Ảnh đại diện">
        </div>
        <div class="name">
            <a href=""><?php echo $dong['ten']; ?></a>
        </div>
        <div class="status">
            <i class="fa-solid fa-user"></i>
            <span>Quyền hạn hiện tại của người dùng này là:<span class="type">
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
            <a href="index.php?quanly=blognguoidung&&idAcc=<?php echo $mataikhoan ?>">Blog:<span
                    class="sum-blog"><?php echo $count_blog ?></span></a>
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
            <a href="index.php?quanly=quanlysannguoidung&&idAcc=<?php echo $mataikhoan ?>">Sân:<span
                    class="sum-setpitch"><?php echo $count_pitch ?></span></a>
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
            <a href="index.php?quanly=danhgianguoidung&&idAcc=<?php echo $mataikhoan ?>">Đánh giá: <span
                    class="sum-evaluate">+<?php echo round($result, 1) ?></span></a>
        </li>
    </ul>
    <section id="profile">
        <h3>
            <i class="fa-solid fa-circle-user"></i>
            <span>Hồ sơ của:<span class="user-name"><?php echo $dong['tendangnhap']; ?></span></span>
        </h3>
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
    <?php
}
    ?>
</div>