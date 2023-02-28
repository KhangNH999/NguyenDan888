<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_listed = "SELECT * FROM thongbao, taikhoan WHERE thongbao.mataikhoan = taikhoan.mataikhoan 
    ORDER BY mathongbao DESC";
$query_listed = mysqli_query($mysqli, $sql_listed);
?>

<p class="title-handle">Danh sách thông báo</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã thông báo</th>
            <th>Tài khoản</th>
            <th>Nội dung thông báo</th>
            <th>Thời gian thông báo</th>
            <th>Tình trạng</th>
            <th class="wfix-add"><a
                    href="?action=quanlythongbao&query=add&id_user=<?php echo $_GET['id_user'] ?>">Thêm</a></th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed)) {
        ?>
        <tr>
            <td><?php echo $row['mathongbao'] ?></td>
            <td class="wfix-1"><?php echo $row['tendangnhap'] ?></td>
            <td class="wfix-3"><?php echo $row['noidungthongbao'] ?></td>
            <td><?php echo $row['thoigianthongbao'] ?></td>
            <td>
                <?php if ($row['tinhtrangthongbao'] == 1) {
                        echo 'Đã xem';
                    } else {
                        echo 'Chưa xem';
                    }
                    ?>
            </td>
            <td>
                <a class="wfix-edit"
                    href="?action=quanlythongbao&query=edit&mathongbao=<?php echo $row['mathongbao'] ?>&id_user=<?php echo $_GET['id_user'] ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/notification/handle.php?mathongbao=<?php echo $row['mathongbao'] ?>&id_user=<?php echo $_GET['id_user'] ?>">Xóa</a>
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
if (isset($_SESSION['vali_notification']) && $_SESSION['vali_notification'] == 10) {
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
        <?php unset($_SESSION['vali_notification']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['vali_notification']) && $_SESSION['vali_notification'] == 11) {
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
        <?php unset($_SESSION['vali_notification']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['vali_notification']) && $_SESSION['vali_notification'] == 12) {
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
        <?php unset($_SESSION['vali_notification']); ?>
    }
})
</script>
<?php
}
?>