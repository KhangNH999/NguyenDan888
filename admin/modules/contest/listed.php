<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_listed_contest = "SELECT * FROM taikhoan, sukien 
    WHERE sukien.mataikhoan = taikhoan.mataikhoan
    ORDER BY masukien DESC";
$query_listed_contest = mysqli_query($mysqli, $sql_listed_contest);
?>

<p class="title-handle">Danh sách sự kiện</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã sự kiện</th>
            <th>Tài khoản</th>
            <th>Tiêu đề sự kiện</th>
            <th>Thời gian tạo</th>
            <th>Địa điểm sự kiện</th>
            <th>Ngày hết hạn</th>
            <th>Phần thưởng</th>
            <th>Tên đội 1</th>
            <th>Tên đội 2</th>
            <th>Số lượng cầu thủ</th>
            <th>Số lượng cầu thủ dự bị</th>
            <th>Tình trạng sự kiện</th>
            <th class="wfix-add"><a href="?action=quanlysukien&query=add&id_user=<?php echo $id_user ?>">Thêm</a></th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed_contest)) {
        ?>
        <tr>
            <td><?php echo $row['masukien'] ?></td>
            <td class="wfix-1"><?php echo $row['tendangnhap'] ?></td>
            <td class="wfix-3"><?php echo $row['tieudesukien'] ?></td>
            <td><?php echo $row['thoigiantaosukien'] ?></td>
            <td class="wfix-3"><?php echo $row['diadiemsukien'] ?></td>
            <td><?php echo $row['ngayhethanthamgia'] ?></td>
            <td class="wfix-2"><?php echo $row['phanthuong'] ?></td>
            <td><?php echo $row['tendoimot'] ?></td>
            <td><?php echo $row['tendoihai'] ?></td>
            <td><?php echo $row['soluongcauthu'] ?></td>
            <td><?php echo $row['soluongcauthudubi'] ?></td>
            <td>
                <?php if ($row['tinhtrangsukien'] == 1) {
                        echo 'Đang diễn ra';
                    } else if ($row['tinhtrangsukien'] == 0) {
                        echo 'Đã kết thúc';
                    } else {
                        echo 'Khóa';
                    }
                    ?>
            </td>
            <td>
                <a class="wfix-edit"
                    href="?action=quanlysukien&query=edit&masukien=<?php echo $row['masukien'] ?>&id_user=<?php echo $id_user ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/contest/handle.php?masukien=<?php echo $row['masukien'] ?>&id_user=<?php echo $id_user ?>">Xóa</a>
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
if (isset($_SESSION['vali_contest']) && $_SESSION['vali_contest'] == 10) {
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
        <?php unset($_SESSION['vali_contest']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['vali_contest']) && $_SESSION['vali_contest'] == 11) {
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
        <?php unset($_SESSION['vali_contest']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['vali_contest']) && $_SESSION['vali_contest'] == 12) {
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
        <?php unset($_SESSION['vali_contest']); ?>
    }
})
</script>
<?php
}
?>