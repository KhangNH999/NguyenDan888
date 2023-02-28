<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_listed_par_contest = "SELECT * FROM taikhoan, sukien, thamgiasukien 
    WHERE thamgiasukien.masukien = sukien.masukien AND thamgiasukien.mataikhoan = taikhoan.mataikhoan
    ORDER BY thamgiasukien.mathamgia DESC";
$query_listed_par_contest = mysqli_query($mysqli, $sql_listed_par_contest);
?>

<p class="title-handle">Danh sách tham gia sự kiện</p>
<div class="frame">
    <table class="main-data">
        <tr>
            <th>Mã tham gia</th>
            <th>Tài khoản</th>
            <th>Tiêu đề sự kiện</th>
            <th>Thời gian tham gia</th>
            <th>Vị trí tham gia</th>
            <th>Tình trạng tham gia</th>
            <th class="wfix-add"><a href="?action=quanlythamgiasukien&query=add&id_user=<?php echo $id_user ?>">Thêm</a>
            </th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($query_listed_par_contest)) {
        ?>
        <tr>
            <td><?php echo $row['mathamgia'] ?></td>
            <td class="wfix-1"><?php echo $row['tendangnhap'] ?></td>
            <td class="wfix-3"><?php echo $row['tieudesukien'] ?></td>
            <td><?php echo $row['thoigianthamgia'] ?></td>
            <td>
                <?php if ($row['vitrithamgia'] == 1) {
                        echo 'Đội 1';
                    } else if ($row['vitrithamgia'] == 2) {
                        echo 'Dự bị 1';
                    } else if ($row['vitrithamgia'] == 3) {
                        echo 'Đội 2';
                    } else if ($row['vitrithamgia'] == 4) {
                        echo 'Dự bị 2';
                    }
                    ?>
            </td>
            <td>
                <?php if ($row['tinhtrangthamgia'] == 1) {
                        echo 'Đã tham gia';
                    } else if ($row['tinhtrangsukien'] == 0) {
                        echo 'Đã hủy';
                    } else {
                        echo 'Khóa';
                    }
                    ?>
            </td>
            <td>
                <a class="wfix-edit"
                    href="?action=quanlythamgiasukien&query=edit&mathamgia=<?php echo $row['mathamgia'] ?>&id_user=<?php echo $id_user ?>">Sửa</a>
                | <a class="wfix-del"
                    href="modules/participation-contest/handle.php?mathamgia=<?php echo $row['mathamgia'] ?>&id_user=<?php echo $id_user ?>">Xóa</a>
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
if (isset($_SESSION['vali_par_contest']) && $_SESSION['vali_par_contest'] == 10) {
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
        <?php unset($_SESSION['vali_par_contest']); ?>
    }
})
</script>
<?php
}
//Đã sửa
if (isset($_SESSION['vali_par_contest']) && $_SESSION['vali_par_contest'] == 11) {
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
        <?php unset($_SESSION['vali_par_contest']); ?>
    }
})
</script>
<?php
}
//Đã xóa
if (isset($_SESSION['vali_par_contest']) && $_SESSION['vali_par_contest'] == 12) {
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
        <?php unset($_SESSION['vali_par_contest']); ?>
    }
})
</script>
<?php
}
?>