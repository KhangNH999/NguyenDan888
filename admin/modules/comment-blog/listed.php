<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_listed_commentblog = "SELECT * FROM binhluanblog, taikhoan, blog 
    WHERE binhluanblog.mataikhoan = taikhoan.mataikhoan AND binhluanblog.mablog = blog.mablog
    ORDER BY mabinhluanblog DESC";
$query_listed_commentblog = mysqli_query($mysqli, $sql_listed_commentblog);
?>

<p class="title-handle">Danh sách bình luận blog</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã bình luận blog</th>
            <th>Tài khoản</th>
            <th>Blog</th>
            <th>Nội dung bình luận</th>
            <th>Thời gian bình luận</th>
            <th class="wfix-add"><a
                    href="?action=quanlybinhluanblog&query=add&id_user=<?php echo $_GET['id_user'] ?>">Thêm</a></th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed_commentblog)) {
        ?>
        <tr>
            <td><?php echo $row['mabinhluanblog'] ?></td>
            <td class="wfix-1"><?php echo $row['tendangnhap'] ?></td>
            <td class="wfix-3"><?php echo $row['tieudeblog'] ?></td>
            <td class="wfix-3"><?php echo $row['noidungbinhluanblog'] ?></td>
            <td><?php echo $row['thoigianbinhluanblog'] ?></td>
            <td>
                <a class="wfix-edit"
                    href="?action=quanlybinhluanblog&query=edit&mabinhluanblog=<?php echo $row['mabinhluanblog'] ?>&id_user=<?php echo $_GET['id_user'] ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/comment-blog/handle.php?mabinhluanblog=<?php echo $row['mabinhluanblog'] ?>&id_user=<?php echo $_GET['id_user'] ?>">Xóa</a>
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
if (isset($_SESSION['vali_comment_blog']) && $_SESSION['vali_comment_blog'] == 10) {
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
        <?php unset($_SESSION['vali_comment_blog']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['vali_comment_blog']) && $_SESSION['vali_comment_blog'] == 11) {
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
        <?php unset($_SESSION['vali_comment_blog']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['vali_comment_blog']) && $_SESSION['vali_comment_blog'] == 12) {
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
        <?php unset($_SESSION['vali_comment_blog']); ?>
    }
})
</script>
<?php
}
?>