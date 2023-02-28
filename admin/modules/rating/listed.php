<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_listed =
    "SELECT danhgia.madanhgia, danhgia.matknguoidung, danhgia.matkdanhgia, danhgia.sosao, 
    danhgia.noidungdanhgia, danhgia.thoigiandanhgia, taikhoan.tendangnhap 
FROM danhgia, taikhoan WHERE danhgia.matknguoidung = taikhoan.mataikhoan ORDER BY thoigiandanhgia DESC";
$query_listed = mysqli_query($mysqli, $sql_listed);
?>

<p class="title-handle">Danh sách theo dõi</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã đánh giá</th>
            <th>Tài khoản người dùng</th>
            <th>Tài khoản đánh giá</th>
            <th>Số sao</th>
            <th>Nội dung đánh giá</th>
            <th>Thời gian đánh giá</th>
            <th class="wfix-add"><a
                    href="?action=quanlydanhgia&query=add&id_user=<?php echo $_GET['id_user'] ?>">Thêm</a></th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed)) {
        ?>
        <tr>
            <td><?php echo $row['madanhgia'] ?></td>
            <td class="wfix-2"><?php echo $row['tendangnhap'] ?></td>
            <?php
                $sql = "SELECT tendangnhap FROM taikhoan WHERE mataikhoan = $row[matkdanhgia] LIMIT 1";
                $query = mysqli_query($mysqli, $sql);
                while ($row2 = mysqli_fetch_array($query)) {
                    $matkdanhgia = $row2['tendangnhap'];
                }
                ?>
            <td class="wfix-2"><?php echo $matkdanhgia ?></td>
            <td><?php echo $row['sosao'] ?></td>
            <td class="wfix-3"><?php echo $row['noidungdanhgia'] ?></td>
            <td><?php echo $row['thoigiandanhgia'] ?></td>
            <td>
                <a class="wfix-edit"
                    href="?action=quanlydanhgia&query=edit&madanhgia=<?php echo $row['madanhgia'] ?>&id_user=<?php echo $_GET['id_user'] ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/rating/handle.php?madanhgia=<?php echo $row['madanhgia'] ?>&id_user=<?php echo $_GET['id_user'] ?>">Xóa</a>
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
if (isset($_SESSION['vali_rating']) && $_SESSION['vali_rating'] == 10) {
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
        <?php unset($_SESSION['vali_rating']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['vali_rating']) && $_SESSION['vali_rating'] == 11) {
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
        <?php unset($_SESSION['vali_rating']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['vali_rating']) && $_SESSION['vali_rating'] == 12) {
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
        <?php unset($_SESSION['vali_rating']); ?>
    }
})
</script>
<?php
}
?>