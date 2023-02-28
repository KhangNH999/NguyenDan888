<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_listed_blog = "SELECT * FROM blog, taikhoan WHERE blog.mataikhoan = taikhoan.mataikhoan 
    ORDER BY mablog DESC";
$query_listed_blog = mysqli_query($mysqli, $sql_listed_blog);
?>

<p class="title-handle">Danh sách blog</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã blog</th>
            <th>Tài khoản</th>
            <th>Tiêu đề blog</th>
            <th>Nội dung blog</th>
            <th>Hình ảnh</th>
            <th>Thời gian tạo</th>
            <th>Tình trạng</th>
            <th class="wfix-add"><a href="?action=quanlyblog&query=add&id_user=<?php echo $id_user ?>">Thêm</a></th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed_blog)) {
        ?>
        <tr>
            <td><?php echo $row['mablog'] ?></td>
            <td class="wfix-1"><?php echo $row['tendangnhap'] ?></td>
            <td class="wfix-3"><?php echo $row['tieudeblog'] ?></td>
            <td class="wfix-3"><?php echo $row['noidungblog'] ?></td>
            <td><img src="modules/blog/uploads-blog/<?php echo $row['hinhanhblog'] ?>"
                    alt="<?php echo $row['hinhanhblog'] ?>" width="50px"></td>
            <td><?php echo $row['thoigiantaoblog'] ?></td>
            <td>
                <?php if ($row['tinhtrangblog'] == 1) {
                        echo 'Hoạt động';
                    } else {
                        echo 'Khóa';
                    }
                    ?>
            </td>
            <td>
                <a class="wfix-edit"
                    href="?action=quanlyblog&query=edit&mablog=<?php echo $row['mablog'] ?>&id_user=<?php echo $id_user ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/blog/handle.php?mablog=<?php echo $row['mablog'] ?>&id_user=<?php echo $id_user ?>"
                    onclick="return confirm('Lưu ý: Xóa blog sẽ xóa tất cả dữ liệu liên quan với blog này.\nBạn đã chắc chắn?')">Xóa</a>
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
if (isset($_SESSION['validation_blog']) && $_SESSION['validation_blog'] == 10) {
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
        <?php unset($_SESSION['validation_blog']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['validation_blog']) && $_SESSION['validation_blog'] == 11) {
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
        <?php unset($_SESSION['validation_blog']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['validation_blog']) && $_SESSION['validation_blog'] == 12) {
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
        <?php unset($_SESSION['validation_blog']); ?>
    }
})
</script>
<?php
}
?>