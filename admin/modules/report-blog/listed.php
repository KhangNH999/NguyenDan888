<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_listed = "SELECT * FROM baocaoblog, taikhoan, blog 
    WHERE baocaoblog.mataikhoan = taikhoan.mataikhoan AND baocaoblog.mablog = blog.mablog
    ORDER BY mabaocaoblog DESC";
$query_listed = mysqli_query($mysqli, $sql_listed);
?>

<p class="title-handle">Danh sách báo cáo blog</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã báo cáo blog</th>
            <th>Tài khoản</th>
            <th>Blog</th>
            <th>Nội dung báo cáo</th>
            <th>Thời gian báo cáo</th>
            <th>Tình trạng</th>
            <th class="wfix-add"><a
                    href="?action=quanlybaocaoblog&query=add&id_user=<?php echo $_GET['id_user'] ?>">Thêm</a></th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed)) {
        ?>
        <tr>
            <td><?php echo $row['mabaocaoblog'] ?></td>
            <td class="wfix-1"><?php echo $row['tendangnhap'] ?></td>
            <td class="wfix-3"><?php echo $row['tieudeblog'] ?></td>
            <td class="wfix-3"><?php echo $row['noidungbaocaoblog'] ?></td>
            <td><?php echo $row['thoigianbaocaoblog'] ?></td>
            <td>
                <?php if ($row['tinhtrangbaocaoblog'] == 1) {
                        echo 'Đã duyệt';
                    } else {
                        echo 'Chưa duyệt';
                    }
                    ?>
            </td>
            <td>
                <a class="wfix-edit"
                    href="?action=quanlybaocaoblog&query=edit&mabaocaoblog=<?php echo $row['mabaocaoblog'] ?>&id_user=<?php echo $_GET['id_user'] ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/report-blog/handle.php?mabaocaoblog=<?php echo $row['mabaocaoblog'] ?>&id_user=<?php echo $_GET['id_user'] ?>">Xóa</a>
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
if (isset($_SESSION['vali_report_blog']) && $_SESSION['vali_report_blog'] == 10) {
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
        <?php unset($_SESSION['vali_report_blog']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['vali_report_blog']) && $_SESSION['vali_report_blog'] == 11) {
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
        <?php unset($_SESSION['vali_report_blog']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['vali_report_blog']) && $_SESSION['vali_report_blog'] == 12) {
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
        <?php unset($_SESSION['vali_report_blog']); ?>
    }
})
</script>
<?php
}
?>