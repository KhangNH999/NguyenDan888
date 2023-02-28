<?php
include('../../../config/config.php');

session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$tendangnhap = $_POST['tendangnhap'];
$matkhau = $_POST['matkhau'];
$ten = $_POST['ten'];
$gioitinh = $_POST['gioitinh'];
$ngaysinh = $_POST['ngaysinh'];
$diachitaikhoan = $_POST['diachitaikhoan'];
$sodienthoai = $_POST['sodienthoai'];
$gmail = $_POST['gmail'];
//Handle Image
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh_time = time() . '-' . $hinhanh;

$tinhtrangtk = $_POST['tinhtrangtk'];
$maloaitaikhoan = $_POST['maloaitaikhoan'];

function gmailValid($g)
{
    $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
    if (!preg_match($regex, $g)) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['themtaikhoan'])) {
    if ($tendangnhap == '' || $matkhau == '' || $ten == '' || $diachitaikhoan == '' || $sodienthoai == '' || $gmail == '') {
        $_SESSION['validation_account'] = 1;
?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlytaikhoan&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else if (is_numeric($ten)) {
        $_SESSION['validation_account'] = 2;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlytaikhoan&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else if (is_nan($sodienthoai) || strlen($sodienthoai) > 10 || strlen($sodienthoai) < 10) {
        $_SESSION['validation_account'] = 3;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlytaikhoan&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else if (gmailValid($gmail) == true) {
        $_SESSION['validation_account'] = 4;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlytaikhoan&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Add
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if ($hinhanh != '') {
            $sql_add = "INSERT INTO taikhoan(tendangnhap, matkhau, thoigiantaotaikhoan, ten, gioitinh, ngaysinh, diachitaikhoan, sodienthoai, 
        gmail, hinhanh, tinhtrangtk, maloaitaikhoan) 
        VALUE('" . $tendangnhap . "','" . md5($matkhau) . "','" . date("Y-m-d H:i:s") . "','" . $ten . "','" . $gioitinh . "','" . $ngaysinh . "',
        '" . $diachitaikhoan . "','" . $sodienthoai . "','" . $gmail . "','" . $hinhanh_time . "','" . $tinhtrangtk . "', '" . $maloaitaikhoan . "')";
        } else {
            $sql_add = "INSERT INTO taikhoan(tendangnhap, matkhau, thoigiantaotaikhoan, ten, gioitinh, ngaysinh, diachitaikhoan, sodienthoai, 
            gmail, hinhanh, tinhtrangtk, maloaitaikhoan) 
            VALUE('" . $tendangnhap . "','" . md5($matkhau) . "','" . date("Y-m-d H:i:s") . "','" . $ten . "','" . $gioitinh . "','" . $ngaysinh . "',
            '" . $diachitaikhoan . "','" . $sodienthoai . "','" . $gmail . "','default-user.png','" . $tinhtrangtk . "', '" . $maloaitaikhoan . "')";
        }
        mysqli_query($mysqli, $sql_add);
        move_uploaded_file($hinhanh_tmp, 'uploads-ac/' . $hinhanh_time);
        $_SESSION['validation_account'] = 10;
        header('Location: ../../index.php?action=quanlytaikhoan&query=main&id_user=' . $_GET['id_user']);
    }
} else if (isset($_POST['suataikhoan'])) {
    if ($tendangnhap == '' || $matkhau == '' || $ten == '' || $diachitaikhoan == '' || $sodienthoai == '' || $gmail == '') {
        $_SESSION['validation_account'] = 1;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlytaikhoan&query=edit&mataikhoan=<?php echo $_GET['mataikhoan'] ?>&id_user=<?php echo $_GET['id_user'] ?>&validation=1";
</script>
<?php
    } else if (is_numeric($ten)) {
        $_SESSION['validation_account'] = 2;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlytaikhoan&query=edit&mataikhoan=<?php echo $_GET['mataikhoan'] ?>&id_user=<?php echo $_GET['id_user'] ?>&validation=2";
</script>
<?php
    } else if (is_nan($sodienthoai) || strlen($sodienthoai) > 10 || strlen($sodienthoai) < 10) {
        $_SESSION['validation_account'] = 3;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlytaikhoan&query=edit&mataikhoan=<?php echo $_GET['mataikhoan'] ?>&id_user=<?php echo $_GET['id_user'] ?>&validation=3";
</script>
<?php
    } else if (gmailValid($gmail) == true) {
        $_SESSION['validation_account'] = 4;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlytaikhoan&query=edit&mataikhoan=<?php echo $_GET['mataikhoan'] ?>&id_user=<?php echo $_GET['id_user'] ?>&validation=4";
</script>
<?php
    } else {
        //Kiểm tra Password
        $sql = "SELECT matkhau FROM taikhoan WHERE mataikhoan = '$_GET[mataikhoan]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $matkhaucu = $row['matkhau'];
        }
        if ($matkhau !== $matkhaucu) {
            $matkhaumoi = md5($matkhau);
        } else {
            $matkhaumoi = $matkhau;
        }

        //Edit
        if ($hinhanh != '') {
            move_uploaded_file($hinhanh_tmp, 'uploads-ac/' . $hinhanh_time);
            $sql_update = "UPDATE taikhoan SET tendangnhap='" . $tendangnhap . "', matkhau='" . $matkhaumoi . "', ten='" . $ten . "',
        gioitinh='" . $gioitinh . "', ngaysinh='" . $ngaysinh . "', diachitaikhoan='" . $diachitaikhoan . "', sodienthoai='" . $sodienthoai . "',
        gmail='" . $gmail . "', hinhanh='" . $hinhanh_time . "', tinhtrangtk='" . $tinhtrangtk . "', maloaitaikhoan='" . $maloaitaikhoan . "'
        WHERE mataikhoan = '$_GET[mataikhoan]'";
            //Delete img old
            $sql_img = "SELECT * FROM taikhoan WHERE mataikhoan = '$_GET[mataikhoan]' LIMIT 1";
            $query_img = mysqli_query($mysqli, $sql_img);
            while ($row = mysqli_fetch_array($query_img)) {
                if ($row['hinhanh'] != "default-user.png") {
                    unlink('uploads-ac/' . $row['hinhanh']);
                }
            }
        } else {
            $sql_update = "UPDATE taikhoan SET tendangnhap='" . $tendangnhap . "', matkhau='" . $matkhaumoi . "', ten='" . $ten . "',
        gioitinh='" . $gioitinh . "', ngaysinh='" . $ngaysinh . "', diachitaikhoan='" . $diachitaikhoan . "', sodienthoai='" . $sodienthoai . "',
        gmail='" . $gmail . "', tinhtrangtk='" . $tinhtrangtk . "', maloaitaikhoan='" . $maloaitaikhoan . "'
        WHERE mataikhoan = '$_GET[mataikhoan]'";
        }
        mysqli_query($mysqli, $sql_update);
        $_SESSION['validation_account'] = 11;
        header('Location: ../../index.php?action=quanlytaikhoan&query=main&id_user=' . $_GET['id_user']);
    }
} else {
    $id = $_GET['mataikhoan'];
    //Delete file img
    $sql_img = "SELECT * FROM taikhoan WHERE mataikhoan = '$id' LIMIT 1";
    $query_img = mysqli_query($mysqli, $sql_img);
    while ($row = mysqli_fetch_array($query_img)) {
        if ($row['hinhanh'] != "default-user.png") {
            unlink('uploads-ac/' . $row['hinhanh']);
        }
    }
    //Delete
    $sql_delete = "DELETE FROM taikhoan WHERE mataikhoan = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    if (mysqli_query($mysqli, $sql_delete)) {
        $_SESSION['validation_account'] = 12;
        header('Location: ../../index.php?action=quanlytaikhoan&query=main&id_user=' . $_GET['id_user']);
    } else {
        $_SESSION['validation_account'] = 13;
        header('Location: ../../index.php?action=quanlytaikhoan&query=main&id_user=' . $_GET['id_user']);
    }
}