<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_listed_commentpitch = "SELECT * FROM binhluansan, taikhoan, san WHERE binhluansan.mataikhoan = taikhoan.mataikhoan AND binhluansan.masan = san.masan
    ORDER BY mabinhluansan DESC";
$query_listed_commentpitch = mysqli_query($mysqli, $sql_listed_commentpitch);
?>

<p class="title-handle">Danh sách bình luận sân</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã bình luận sân</th>
            <th>Tài khoản</th>
            <th>Sân</th>
            <th>Nội dung bình luận</th>
            <th>Thời gian bình luận</th>
            <th class="wfix-add"><a href="?action=quanlybinhluansan&query=add&id_user=<?php echo $id_user ?>">Thêm</a>
            </th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed_commentpitch)) {
        ?>
        <tr>
            <td><?php echo $row['mabinhluansan'] ?></td>
            <td class="wfix-1"><?php echo $row['tendangnhap'] ?></td>
            <td class="wfix-1"><?php echo $row['tensan'] ?></td>
            <td class="wfix-3"><?php echo $row['noidungbinhluansan'] ?></td>
            <td><?php echo $row['thoigianbinhluansan'] ?></td>
            <td>
                <a class="wfix-edit"
                    href="?action=quanlybinhluansan&query=edit&mabinhluansan=<?php echo $row['mabinhluansan'] ?>&id_user=<?php echo $id_user ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/comment-pitch/handle.php?mabinhluansan=<?php echo $row['mabinhluansan'] ?>&id_user=<?php echo $id_user ?>">Xóa</a>
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
if (isset($_SESSION['vali_comment_pitch']) && $_SESSION['vali_comment_pitch'] == 10) {
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
        <?php unset($_SESSION['vali_comment_pitch']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['vali_comment_pitch']) && $_SESSION['vali_comment_pitch'] == 11) {
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
        <?php unset($_SESSION['vali_comment_pitch']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['vali_comment_pitch']) && $_SESSION['vali_comment_pitch'] == 12) {
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
        <?php unset($_SESSION['vali_comment_pitch']); ?>
    }
})
</script>
<?php
}
?>