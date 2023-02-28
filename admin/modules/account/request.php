<?php
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$sql_permission = "SELECT * FROM taikhoan WHERE yeucaunangquyen = 2 ORDER BY mataikhoan DESC";
$query_permission = mysqli_query($mysqli, $sql_permission);
$query_permission_null = mysqli_query($mysqli, $sql_permission);
?>

<p class="title-handle">Danh sách yêu cầu nâng quyền</p>
<?php
if (mysqli_fetch_array($query_permission_null) == null) {
?>
<div class="none"><span>Không có yêu cầu nâng quyền.</span></div>
<?php
} else {
?>
<div class="frame-request">
    <table class="main-data">
        <tr>
            <th>Mã tài khoản</th>
            <th>Tên đăng nhập</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Gmail</th>
            <th>Địa chỉ</th>
            <th>Hình ảnh</th>
            <th class="wfix-add">Xử lý</th>
        </tr>
        <?php
            while ($row = mysqli_fetch_array($query_permission)) {
            ?>
        <tr>
            <td><?php echo $row['mataikhoan'] ?></td>
            <td class="wfix-2"><?php echo $row['tendangnhap'] ?></td>
            <td class="wfix-2"><?php echo $row['ten'] ?></td>
            <td><?php echo $row['sodienthoai'] ?></td>
            <td><?php echo $row['gmail'] ?></td>
            <td class="wfix-3"><?php echo $row['diachitaikhoan'] ?></td>
            <td><img src="modules/account/uploads-ac/<?php echo $row['hinhanh'] ?>" alt="<?php echo $row['hinhanh'] ?>"
                    width="50px"></td>
            <td>
                <a class="wfix-edit"
                    href="modules/account/handle-per-add.php?&mataikhoan=<?php echo $row['mataikhoan'] ?>&id_user=<?php echo $id_user ?>">Nhận</a>
                | <a class="wfix-del"
                    href="modules/account/handle-per-delete.php?mataikhoan=<?php echo $row['mataikhoan'] ?>&id_user=<?php echo $id_user ?>">Hủy</a>
            </td>
        </tr>
        <?php
            }
            ?>
    </table>
</div>
<?php
}
?>