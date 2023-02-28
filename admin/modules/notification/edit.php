<?php
$sql_edit = "SELECT * FROM thongbao WHERE mathongbao = '$_GET[mathongbao]' LIMIT 1";
$query_edit = mysqli_query($mysqli, $sql_edit);
?>

<p class="title-handle">Sửa thông báo</p>
<table class="main-handle">
    <?php
    while ($row = mysqli_fetch_array($query_edit)) {
    ?>
    <!-- Add enctype for post file -->
    <form
        action="modules/notification/handle.php?mathongbao=<?php echo $_GET['mathongbao'] ?>&id_user=<?php echo $_GET['id_user'] ?>"
        method="post" enctype="multipart/form-data">
        <tr>
            <td>Tài khoản</td>
            <td>
                <select name="mataikhoan" id="mataikhoan">
                    <?php
                        $sql_account = "SELECT * FROM taikhoan WHERE maloaitaikhoan != 1 AND maloaitaikhoan != 16";
                        $query_account = mysqli_query($mysqli, $sql_account);
                        while ($row_ac = mysqli_fetch_array($query_account)) {
                            if ($row_ac['mataikhoan'] == $row['mataikhoan']) {
                        ?>
                    <option selected value="<?php echo $row_ac['mataikhoan'] ?>">
                        <?php echo $row_ac['tendangnhap'] ?></option>
                    <?php
                            } else {
                            ?>
                    <option value="<?php echo $row_ac['mataikhoan'] ?>">
                        <?php echo $row_ac['tendangnhap'] ?></option>
                    <?php
                            }
                        }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nội dung thông báo</td>
            <td><textarea name="noidungthongbao" id="noidungthongbao" cols="50" rows="3"
                    oninput="ktNoiDungThongBao()"><?php echo $row['noidungthongbao'] ?></textarea>
                <p id="loi-noidungthongbao" class="notify-error" style="display: none;">* Vui lòng nhập nội dung
                    thông báo!
                </p>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrangthongbao" id="tinhtrangthongbao">
                    <?php
                        if ($row['tinhtrangthongbao'] == 1) {
                        ?>
                    <option value="1" selected>Đã xem</option>
                    <option value="0">Chưa xem</option>
                    <?php
                        } else {
                        ?>
                    <option value="1">Đã xem</option>
                    <option value="0" selected>Chưa xem</option>
                    <?php
                        }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suathongbao" value="Sửa thông báo"></td>
        </tr>
    </form>
    <?php
    }
    ?>
</table>
<script src="modules/notification/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Kiểm tra trống
if (isset($_SESSION['vali_notification']) && $_SESSION['vali_notification'] == 1) {
?>
<script>
Swal.fire({
    title: 'Thất bại!',
    text: "Bạn không được để trống các trường yêu cầu!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['vali_notification']); ?>
    }
})
</script>
<?php
}
?>