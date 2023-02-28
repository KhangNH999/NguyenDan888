<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_listed_follow = "SELECT * FROM theodoi, taikhoan, san WHERE theodoi.mataikhoan = taikhoan.mataikhoan AND theodoi.masan = san.masan
    ORDER BY matheodoi DESC";
$query_listed_follow = mysqli_query($mysqli, $sql_listed_follow);
?>

<p class="title-handle">Danh sách theo dõi</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã theo dõi</th>
            <th>Tài khoản</th>
            <th>Sân</th>
            <th>Thời gian theo dõi</th>
            <th class="wfix-add"><a
                    href="?action=quanlytheodoi&query=add&id_user=<?php echo $_GET['id_user'] ?>">Thêm</a></th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed_follow)) {
        ?>
        <tr>
            <td><?php echo $row['matheodoi'] ?></td>
            <td class="wfix-1"><?php echo $row['tendangnhap'] ?></td>
            <td class="wfix-1"><?php echo $row['tensan'] ?></td>
            <td><?php echo $row['thoigiantheodoi'] ?></td>
            <td>
                <a class="wfix-edit"
                    href="?action=quanlytheodoi&query=edit&matheodoi=<?php echo $row['matheodoi'] ?>&id_user=<?php echo $_GET['id_user'] ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/follow/handle.php?matheodoi=<?php echo $row['matheodoi'] ?>&id_user=<?php echo $_GET['id_user'] ?>">Xóa</a>
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
if (isset($_SESSION['vali_follow']) && $_SESSION['vali_follow'] == 10) {
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
        <?php unset($_SESSION['vali_follow']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['vali_follow']) && $_SESSION['vali_follow'] == 11) {
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
        <?php unset($_SESSION['vali_follow']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['vali_follow']) && $_SESSION['vali_follow'] == 12) {
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
        <?php unset($_SESSION['vali_follow']); ?>
    }
})
</script>
<?php
}
?>