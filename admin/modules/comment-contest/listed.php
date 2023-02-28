<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_listed_comment_contest = "SELECT * FROM binhluansukien, taikhoan, sukien 
    WHERE binhluansukien.mataikhoan = taikhoan.mataikhoan AND binhluansukien.masukien = sukien.masukien
    ORDER BY mabinhluansukien DESC";
$query_listed_comment_contest = mysqli_query($mysqli, $sql_listed_comment_contest);
?>

<p class="title-handle">Danh sách bình luận sự kiện</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã bình luận sự kiện</th>
            <th>Tài khoản</th>
            <th>Sự kiện</th>
            <th>Nội dung bình luận</th>
            <th>Thời gian bình luận</th>
            <th class="wfix-add"><a
                    href="?action=quanlybinhluansukien&query=add&id_user=<?php echo $_GET['id_user'] ?>">Thêm</a></th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed_comment_contest)) {
        ?>
        <tr>
            <td><?php echo $row['mabinhluansukien'] ?></td>
            <td class="wfix-1"><?php echo $row['tendangnhap'] ?></td>
            <td class="wfix-3"><?php echo $row['tieudesukien'] ?></td>
            <td class="wfix-3"><?php echo $row['noidungbinhluansukien'] ?></td>
            <td><?php echo $row['thoigianbinhluansukien'] ?></td>
            <td>
                <a class="wfix-edit"
                    href="?action=quanlybinhluansukien&query=edit&mabinhluansukien=<?php echo $row['mabinhluansukien'] ?>&id_user=<?php echo $_GET['id_user'] ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/comment-contest/handle.php?mabinhluansukien=<?php echo $row['mabinhluansukien'] ?>&id_user=<?php echo $_GET['id_user'] ?>">Xóa</a>
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
if (isset($_SESSION['vali_comment_contest']) && $_SESSION['vali_comment_contest'] == 10) {
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
        <?php unset($_SESSION['vali_comment_contest']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['vali_comment_contest']) && $_SESSION['vali_comment_contest'] == 11) {
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
        <?php unset($_SESSION['vali_comment_contest']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['vali_comment_contest']) && $_SESSION['vali_comment_contest'] == 12) {
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
        <?php unset($_SESSION['vali_comment_contest']); ?>
    }
})
</script>
<?php
}
?>