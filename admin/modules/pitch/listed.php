<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_listed_pitch = "SELECT * FROM san, taikhoan WHERE san.mataikhoan = taikhoan.mataikhoan AND san.tinhtrangsan = 1
    ORDER BY masan DESC";
$query_listed_pitch = mysqli_query($mysqli, $sql_listed_pitch);
?>

<p class="title-handle">Danh sách sân</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã sân</th>
            <th>Tên sân</th>
            <th>Tiêu đề sân</th>
            <th>Thời gian tạo</th>
            <th>Khung giờ</th>
            <th>Giá thuê</th>
            <th>Địa chỉ sân</th>
            <th>Nội dung</th>
            <th>Hình ảnh</th>
            <th>Tài khoản</th>
            <th class="wfix-add"><a href="?action=quanlysan&query=add&id_user=<?php echo $id_user ?>">Thêm</a></th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed_pitch)) {
        ?>
        <tr>
            <td><?php echo $row['masan'] ?></td>
            <td class="wfix-2"><?php echo $row['tensan'] ?></td>
            <td class="wfix-3"><?php echo $row['tieudesan'] ?></td>
            <td><?php echo $row['thoigiantaosan'] ?></td>
            <td>
                <?php
                    $sql_time = "SELECT * FROM san, khunggio WHERE san.masan = khunggio.masan AND khunggio.masan = $row[masan]";
                    $query_time = mysqli_query($mysqli, $sql_time);
                    while ($row_time = mysqli_fetch_array($query_time)) {
                    ?>
                <div>
                    <?php echo date("H:i", strtotime($row_time['giobatdau'])) . ' - ' . date("H:i", strtotime($row_time['gioketthuc'])) ?>
                </div>
                <?php
                    }
                    ?>
            </td>
            <td><?php echo number_format($row['giathue'], 0, ',', '.') ?></td>
            <td class="wfix-3"><?php echo $row['diachisan'] ?></td>
            <td class="wfix-3"><?php echo $row['noidungsan'] ?></td>
            <td><img src="modules/pitch/uploads-pitch/<?php echo $row['hinhanhsan'] ?>"
                    alt="<?php echo $row['hinhanhsan'] ?>" width="50px"></td>
            <td class="wfix-1"><?php echo $row['tendangnhap'] ?></td>
            <td>
                <a class="wfix-edit"
                    href="?action=quanlysan&query=edit&masan=<?php echo $row['masan'] ?>&id_user=<?php echo $id_user ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/pitch/handle.php?masan=<?php echo $row['masan'] ?>&id_user=<?php echo $id_user ?>"
                    onclick="return confirm('Lưu ý: Xóa sân sẽ xóa tất cả dữ liệu liên quan với sân này.\nBạn đã chắc chắn?')">Xóa</a>
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
if (isset($_SESSION['vali_pitch']) && $_SESSION['vali_pitch'] == 10) {
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
        <?php unset($_SESSION['vali_pitch']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['vali_pitch']) && $_SESSION['vali_pitch'] == 11) {
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
        <?php unset($_SESSION['vali_pitch']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['vali_pitch']) && $_SESSION['vali_pitch'] == 12) {
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
        <?php unset($_SESSION['vali_pitch']); ?>
    }
})
</script>
<?php
}
?>