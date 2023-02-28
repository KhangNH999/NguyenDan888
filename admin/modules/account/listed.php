<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';

$sql_per = "SELECT maloaitaikhoan FROM taikhoan WHERE mataikhoan = $id_user LIMIT 1";
$query_per = mysqli_query($mysqli, $sql_per);
while ($row = mysqli_fetch_array($query_per)) {
    $maloaitaikhoan = $row['maloaitaikhoan'];
}

$sql_listed_account = "SELECT * FROM taikhoan, loaitaikhoan WHERE taikhoan.maloaitaikhoan = loaitaikhoan.maloaitaikhoan 
    ORDER BY mataikhoan DESC";
$query_listed_account = mysqli_query($mysqli, $sql_listed_account);
?>

<p class="title-handle">Danh sách tài khoản</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã tài khoản</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Thời gian tạo</th>
            <th>Tên</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Gmail</th>
            <th>Hình ảnh</th>
            <th>Tình trạng</th>
            <th>Loại tài khoản</th>
            <th class="wfix-add"><a href="?action=quanlytaikhoan&query=add&id_user=<?php echo $id_user ?>">Thêm</a></th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed_account)) {
        ?>
        <tr>
            <td><?php echo $row['mataikhoan'] ?></td>
            <td class="wfix-1"><?php echo $row['tendangnhap'] ?></td>
            <td class="wfix-3"><?php echo $row['matkhau'] ?></td>
            <td><?php echo $row['thoigiantaotaikhoan'] ?></td>
            <td class="wfix-1"><?php echo $row['ten'] ?></td>
            <td><?php echo $row['gioitinh'] ?></td>
            <td><?php echo $row['ngaysinh'] ?></td>
            <td class="wfix-3"><?php echo $row['diachitaikhoan'] ?></td>
            <td class="wfix-1"><?php echo $row['sodienthoai'] ?></td>
            <td class="wfix-2"><?php echo $row['gmail'] ?></td>
            <td><img src="modules/account/uploads-ac/<?php echo $row['hinhanh'] ?>" alt="<?php echo $row['hinhanh'] ?>"
                    width="50px"></td>
            <td>
                <?php if ($row['tinhtrangtk'] == 2) {
                        echo 'Đăng xuất';
                    } else if ($row['tinhtrangtk'] == 1) {
                        echo 'Hoạt động';
                    } else {
                        echo 'Khóa';
                    }
                    ?>
            </td>
            <td><?php echo $row['tenloaitaikhoan'] ?></td>
            <td>
                <?php
                    if ($maloaitaikhoan == 1) {
                        if ($row['maloaitaikhoan'] == 1 || $row['maloaitaikhoan'] == 16) {
                    ?>
                <a class="wfix-lock" href="#">Khóa</a>
                <?php } else { ?>
                <a class="wfix-edit"
                    href="?action=quanlytaikhoan&query=edit&mataikhoan=<?php echo $row['mataikhoan'] ?>&id_user=<?php echo $id_user ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/account/handle.php?mataikhoan=<?php echo $row['mataikhoan'] ?>&id_user=<?php echo $id_user ?>">Xóa</a>
                <?php }
                    } else {
                        if ($row['maloaitaikhoan'] == 16) {
                        ?>
                <a class="wfix-edit"
                    href="?action=quanlytaikhoan&query=edit&mataikhoan=<?php echo $row['mataikhoan'] ?>&id_user=<?php echo $id_user ?>">Sửa</a>
                <?php
                        } else {
                        ?>
                <a class="wfix-edit"
                    href="?action=quanlytaikhoan&query=edit&mataikhoan=<?php echo $row['mataikhoan'] ?>&id_user=<?php echo $id_user ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/account/handle.php?mataikhoan=<?php echo $row['mataikhoan'] ?>&id_user=<?php echo $id_user ?>">Xóa</a>
                <?php
                        }
                    } ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Đã thêm
if (isset($_SESSION['validation_account']) && $_SESSION['validation_account'] == 10) {
?>
<script>
Swal.fire({
    title: 'Thành công!',
    text: "Thêm thành công!",
    icon: 'success',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['validation_account']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['validation_account']) && $_SESSION['validation_account'] == 11) {
?>
<script>
Swal.fire({
    title: 'Thành công!',
    text: "Sửa thành công!",
    icon: 'success',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['validation_account']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['validation_account']) && $_SESSION['validation_account'] == 12) {
?>
<script>
Swal.fire({
    title: 'Thành công!',
    text: "Xóa thành công!",
    icon: 'success',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['validation_account']); ?>
    }
})
</script>
<?php
}
//Xóa thất bại
if (isset($_SESSION['validation_account']) && $_SESSION['validation_account'] == 13) {
?>
<script>
Swal.fire({
    title: 'Thất bại!',
    text: "Không thể xóa!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['validation_account']); ?>
    }
})
</script>
<?php
}
?>