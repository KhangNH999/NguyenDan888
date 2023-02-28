<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_listed_account_type = "SELECT * FROM loaitaikhoan ORDER BY maloaitaikhoan DESC";
$query_listed_account_type = mysqli_query($mysqli, $sql_listed_account_type);
?>

<p class="title-handle">Danh sách loại tài khoản</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã loại tài khoản</th>
            <th>Tên loại tài khoản</th>
            <th class="wfix-add"><a href="?action=quanlyloaitaikhoan&query=add&id_user=<?php echo $id_user ?>">Thêm</a>
            </th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed_account_type)) {
        ?>
        <tr>
            <td><?php echo $row['maloaitaikhoan'] ?></td>
            <td><?php echo $row['tenloaitaikhoan'] ?></td>
            <td>
                <a class="wfix-edit"
                    href="?action=quanlyloaitaikhoan&query=edit&maloaitaikhoan=<?php echo $row['maloaitaikhoan'] ?>&id_user=<?php echo $id_user ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/account-type/handle.php?maloaitaikhoan=<?php echo $row['maloaitaikhoan'] ?>&id_user=<?php echo $id_user ?>">Xóa</a>
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
if (isset($_SESSION['validation_type']) && $_SESSION['validation_type'] == 10) {
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
        <?php unset($_SESSION['validation_type']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['validation_type']) && $_SESSION['validation_type'] == 11) {
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
        <?php unset($_SESSION['validation_type']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['validation_type']) && $_SESSION['validation_type'] == 12) {
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
        <?php unset($_SESSION['validation_type']); ?>
    }
})
</script>
<?php
}
//Xóa thất bại
if (isset($_SESSION['validation_type']) && $_SESSION['validation_type'] == 13) {
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
        <?php unset($_SESSION['validation_type']); ?>
    }
})
</script>
<?php
}
?>