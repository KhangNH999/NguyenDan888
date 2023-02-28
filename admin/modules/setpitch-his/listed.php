<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_listed_setpitch_his = "SELECT * FROM lichsudatsan, san, taikhoan, khunggio 
WHERE lichsudatsan.mataikhoan = taikhoan.mataikhoan 
AND lichsudatsan.masan = san.masan 
AND lichsudatsan.makhunggio = khunggio.makhunggio 
AND lichsudatsan.xacnhandatsan = 2
ORDER BY lichsudatsan.malichsu DESC";
$query_listed_setpitch_his = mysqli_query($mysqli, $sql_listed_setpitch_his);
?>

<p class="title-handle">Danh sách lịch sử đặt sân</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã lịch sử</th>
            <th>Tên</th>
            <th>Tiêu đề sân</th>
            <th>Ngày đặt</th>
            <th>Khung giờ</th>
            <th>Thời gian tạo đặt sân</th>
            <th>Hình thức thanh toán</th>
            <th>Tình trạng</th>
            <th class="wfix-add"><a href="?action=quanlylichsudatsan&query=add&id_user=<?php echo $id_user ?>">Thêm</a>
            </th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed_setpitch_his)) {
        ?>
        <tr>
            <td><?php echo $row['malichsu'] ?></td>
            <td class="wfix-1"><?php echo $row['ten'] ?></td>
            <td class="wfix-2"><?php echo $row['tieudesan'] ?></td>
            <td><?php echo $row['ngaydat'] ?></td>
            <td>
                <div>
                    <?php echo date("H:i", strtotime($row['giobatdau'])) . ' - ' . date("H:i", strtotime($row['gioketthuc'])) ?>
                </div>
            </td>
            <td><?php echo $row['thoigiantaodatsan'] ?></td>
            <td><?php echo $row['hinhthucthanhtoan'] ?></td>
            <td>
                <?php if ($row['tinhtranglichsu'] == 1) {
                        echo 'Còn hạn';
                    } else {
                        echo 'Hết hạn';
                    }
                    ?>
            </td>
            <td>
                <a class="wfix-edit"
                    href="?action=quanlylichsudatsan&query=edit&malichsu=<?php echo $row['malichsu'] ?>&id_user=<?php echo $id_user ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/setpitch-his/handle.php?malichsu=<?php echo $row['malichsu'] ?>&id_user=<?php echo $id_user ?>">Xóa</a>
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
if (isset($_SESSION['vali_his']) && $_SESSION['vali_his'] == 10) {
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
        <?php unset($_SESSION['vali_his']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['vali_his']) && $_SESSION['vali_his'] == 11) {
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
        <?php unset($_SESSION['vali_his']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['vali_his']) && $_SESSION['vali_his'] == 12) {
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
        <?php unset($_SESSION['vali_his']); ?>
    }
})
</script>
<?php
}
?>