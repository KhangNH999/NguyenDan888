<?php
include('../../../config/config.php');
session_start();
$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
$masan = (isset($_GET['masan'])) ? $_GET['masan'] : '';
$tensan = $_POST['tensan'];
$tieudesan = $_POST['tieudesan'];

$giathue = $_POST['giathue'];
$diachisan = $_POST['diachisan'];
$noidungsan = $_POST['noidungsan'];
//Handle Image
$hinhanhsan = $_FILES['hinhanhsan']['name'];
$hinhanhsan_tmp = $_FILES['hinhanhsan']['tmp_name'];
$hinhanhsan_time = time() . '_' . $hinhanhsan;

$mataikhoan = $_POST['mataikhoan'];

$giobatdau1 = $_POST['giobatdau1'];
$giobatdau2 = $_POST['giobatdau2'];
$giobatdau3 = $_POST['giobatdau3'];
$giobatdau4 = $_POST['giobatdau4'];
$giobatdau5 = $_POST['giobatdau5'];
$giobatdau6 = $_POST['giobatdau6'];
$gioketthuc1 = $_POST['gioketthuc1'];
$gioketthuc2 = $_POST['gioketthuc2'];
$gioketthuc3 = $_POST['gioketthuc3'];
$gioketthuc4 = $_POST['gioketthuc4'];
$gioketthuc5 = $_POST['gioketthuc5'];
$gioketthuc6 = $_POST['gioketthuc6'];

$sql_check_time_2 = "SELECT * FROM khunggio, san WHERE khunggio.masan = san.masan AND khunggio.masan = $masan AND khunggio.thutukhunggio = 2 LIMIT 1";
$query_check_time_2 = mysqli_query($mysqli, $sql_check_time_2);
$count_check_time_2 = mysqli_num_rows($query_check_time_2);

$sql_check_time_3 = "SELECT * FROM khunggio, san WHERE khunggio.masan = san.masan AND khunggio.masan = $masan AND khunggio.thutukhunggio = 3 LIMIT 1";
$query_check_time_3 = mysqli_query($mysqli, $sql_check_time_3);
$count_check_time_3 = mysqli_num_rows($query_check_time_3);

$sql_check_time_4 = "SELECT * FROM khunggio, san WHERE khunggio.masan = san.masan AND khunggio.masan = $masan AND khunggio.thutukhunggio = 4 LIMIT 1";
$query_check_time_4 = mysqli_query($mysqli, $sql_check_time_4);
$count_check_time_4 = mysqli_num_rows($query_check_time_4);

$sql_check_time_5 = "SELECT * FROM khunggio, san WHERE khunggio.masan = san.masan AND khunggio.masan = $masan AND khunggio.thutukhunggio = 5 LIMIT 1";
$query_check_time_5 = mysqli_query($mysqli, $sql_check_time_5);
$count_check_time_5 = mysqli_num_rows($query_check_time_5);

$sql_check_time_6 = "SELECT * FROM khunggio, san WHERE khunggio.masan = san.masan AND khunggio.masan = $masan AND khunggio.thutukhunggio = 6 LIMIT 1";
$query_check_time_6 = mysqli_query($mysqli, $sql_check_time_6);
$count_check_time_6 = mysqli_num_rows($query_check_time_6);


if (isset($_POST['themsan'])) {
    if ($tensan == '' || $tieudesan == '' || $giathue == '' || $diachisan == '' || $noidungsan == '' || $giobatdau1 == '' || $gioketthuc1 == '') {
        $_SESSION['vali_pitch'] = 1;
?>
<script type="text/javascript">
window.location.href = "../../index.php?action=quanlysan&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else if (!(is_numeric($giathue)) || $giathue < 0 || $giathue > 10000000) {
        $_SESSION['vali_pitch'] = 2;
    ?>
<script type="text/javascript">
window.location.href = "../../index.php?action=quanlysan&query=add&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Add
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if ($hinhanhsan != '') {
            $sql_add = "INSERT INTO san(tensan, tieudesan, thoigiantaosan, giathue, diachisan, noidungsan, hinhanhsan, 
        tinhtrangsan, mataikhoan, tinhtrangkhunggio) 
        VALUE('" . $tensan . "','" . $tieudesan . "','" . date("Y-m-d H:i:s") . "','" . $giathue . "','" . $diachisan . "','" . $noidungsan . "',
        '" . $hinhanhsan_time . "','1', '" . $mataikhoan . "','0')";
        } else {
            $sql_add = "INSERT INTO san(tensan, tieudesan, thoigiantaosan, giathue, diachisan, noidungsan, 
            tinhtrangsan, mataikhoan, tinhtrangkhunggio) 
            VALUE('" . $tensan . "','" . $tieudesan . "','" . date("Y-m-d H:i:s") . "','" . $giathue . "','" . $diachisan . "',
            '" . $noidungsan . "','1', '" . $mataikhoan . "','0')";
        }
        mysqli_query($mysqli, $sql_add);
        move_uploaded_file($hinhanhsan_tmp, 'uploads-pitch/' . $hinhanhsan_time);
        //Add time
        $sql_time = "SELECT * FROM san WHERE mataikhoan = $mataikhoan AND tinhtrangkhunggio = 0 LIMIT 1";
        $query_time = mysqli_query($mysqli, $sql_time);
        while ($row_time = mysqli_fetch_array($query_time)) {
            $masan = $row_time['masan'];
        }
        $sql_add_time_1 = "INSERT INTO khunggio(giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau1 . "','" . $gioketthuc1 . "','" . $masan . "','1','1')";
        mysqli_query($mysqli, $sql_add_time_1);
        if ($giobatdau2 != '' || $gioketthuc2 != '') {
            $sql_add_time_2 = "INSERT INTO khunggio(giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau2 . "','" . $gioketthuc2 . "','" . $masan . "','1','2')";
            mysqli_query($mysqli, $sql_add_time_2);
        }
        if ($giobatdau3 != '' || $gioketthuc3 != '') {
            $sql_add_time_3 = "INSERT INTO khunggio(giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau3 . "','" . $gioketthuc3 . "','" . $masan . "','1','3')";
            mysqli_query($mysqli, $sql_add_time_3);
        }
        if ($giobatdau4 != '' || $gioketthuc4 != '') {
            $sql_add_time_4 = "INSERT INTO khunggio(giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau4 . "','" . $gioketthuc4 . "','" . $masan . "','1','4')";
            mysqli_query($mysqli, $sql_add_time_4);
        }
        if ($giobatdau5 != '' || $gioketthuc5 != '') {
            $sql_add_time_5 = "INSERT INTO khunggio(giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau5 . "','" . $gioketthuc5 . "','" . $masan . "','1','5')";
            mysqli_query($mysqli, $sql_add_time_5);
        }
        if ($giobatdau6 != '' || $gioketthuc6 != '') {
            $sql_add_time_6 = "INSERT INTO khunggio(giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau6 . "','" . $gioketthuc6 . "','" . $masan . "','1','6')";
            mysqli_query($mysqli, $sql_add_time_6);
        }

        //Update
        $sql_update_time = "UPDATE san SET tinhtrangkhunggio = 1 WHERE masan = $masan";
        mysqli_query($mysqli, $sql_update_time);

        $_SESSION['vali_pitch'] = 10;
        header('Location: ../../index.php?action=quanlysan&query=main&id_user=' . $_GET['id_user']);
    }
} else if (isset($_POST['suasan'])) {
    if ($tensan == '' || $tieudesan == '' || $giathue == '' || $diachisan == '' || $noidungsan == '') {
        $_SESSION['vali_pitch'] = 1;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlysan&query=edit&masan=<?php echo $_GET['masan'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else if (!(is_numeric($giathue)) || $giathue < 0 || $giathue > 10000000) {
        $_SESSION['vali_pitch'] = 2;
    ?>
<script type="text/javascript">
window.location.href =
    "../../index.php?action=quanlysan&query=edit&masan=<?php echo $_GET['masan'] ?>&id_user=<?php echo $_GET['id_user'] ?>";
</script>
<?php
    } else {
        //Edit
        if ($hinhanhsan != '') {
            move_uploaded_file($hinhanhsan_tmp, 'uploads-pitch/' . $hinhanhsan_time);
            $sql_update = "UPDATE san SET tensan='" . $tensan . "', tieudesan='" . $tieudesan . "',
        giathue='" . $giathue . "', diachisan='" . $diachisan . "', noidungsan='" . $noidungsan . "',
        hinhanhsan='" . $hinhanhsan_time . "', mataikhoan='" . $mataikhoan . "'
        WHERE masan = '$_GET[masan]'";
            //Delete img old
            $sql_img = "SELECT * FROM san WHERE masan = '$_GET[masan]' LIMIT 1";
            $query_img = mysqli_query($mysqli, $sql_img);
            while ($row = mysqli_fetch_array($query_img)) {
                unlink('uploads-pitch/' . $row['hinhanhsan']);
            }
        } else {
            $sql_update = "UPDATE san SET tensan='" . $tensan . "', tieudesan='" . $tieudesan . "', 
            giathue='" . $giathue . "', diachisan='" . $diachisan . "', noidungsan='" . $noidungsan . "',
            mataikhoan='" . $mataikhoan . "'
            WHERE masan = '$_GET[masan]'";
        }
        mysqli_query($mysqli, $sql_update);
        //Edit time 1
        $sql_update_time_1 = "UPDATE khunggio SET giobatdau = '" . $giobatdau1 . "', gioketthuc = '" . $gioketthuc1 . "' 
        WHERE masan = '" . $mansan . "' AND thutukhunggio = 1";
        mysqli_query($mysqli, $sql_update_time_1);
        //Edit time 2
        if ($giobatdau2 != '' || $gioketthuc2 != '') {
            if ($count_check_time_2 > 0) {
                $sql_update_time_2 = "UPDATE khunggio SET giobatdau = '" . $giobatdau2 . "', gioketthuc = '" . $gioketthuc2 . "' 
        WHERE masan = '" . $masan . "' AND thutukhunggio = 2";
                mysqli_query($mysqli, $sql_update_time_2);
            } else {
                $sql_add2 = "INSERT INTO khunggio (giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau2 . "','" . $gioketthuc2 . "','" . $masan . "','1','2')";
                mysqli_query($mysqli, $sql_add2);
            }
        }
        // Edit time 3
        if ($giobatdau3 != '' || $gioketthuc3 != '') {
            if ($count_check_time_3 > 0) {
                $sql_update_time_3 = "UPDATE khunggio SET giobatdau = '" . $giobatdau3 . "', gioketthuc = '" . $gioketthuc3 . "' 
        WHERE masan = '" . $masan . "' AND thutukhunggio = 3";
                mysqli_query($mysqli, $sql_update_time_3);
            } else {
                $sql_add3 = "INSERT INTO khunggio (giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau3 . "','" . $gioketthuc3 . "','" . $masan . "','1','3')";
                mysqli_query($mysqli, $sql_add3);
            }
        }
        //Edit time 4
        if ($giobatdau4 != '' || $gioketthuc4 != '') {
            if ($count_check_time_4 > 0) {
                $sql_update_time_4 = "UPDATE khunggio SET giobatdau = '" . $giobatdau4 . "', gioketthuc = '" . $gioketthuc4 . "' 
        WHERE masan = '" . $masan . "' AND thutukhunggio = 4";
                mysqli_query($mysqli, $sql_update_time_4);
            } else {
                $sql_add4 = "INSERT INTO khunggio (giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau4 . "','" . $gioketthuc4 . "','" . $masan . "','1','4')";
                mysqli_query($mysqli, $sql_add4);
            }
        }
        //Edit time 5
        if ($giobatdau5 != '' || $gioketthuc5 != '') {
            if ($count_check_time_5 > 0) {
                $sql_update_time_5 = "UPDATE khunggio SET giobatdau = '" . $giobatdau5 . "', gioketthuc = '" . $gioketthuc5 . "' 
        WHERE masan = '" . $masan . "' AND thutukhunggio = 5";
                mysqli_query($mysqli, $sql_update_time_5);
            } else {
                $sql_add5 = "INSERT INTO khunggio (giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau5 . "','" . $gioketthuc5 . "','" . $masan . "','1','5')";
                mysqli_query($mysqli, $sql_add5);
            }
        }
        //Edit time 6
        if ($giobatdau6 != '' || $gioketthuc6 != '') {
            if ($count_check_time_6 > 0) {
                $sql_update_time_6 = "UPDATE khunggio SET giobatdau = '" . $giobatdau6 . "', gioketthuc = '" . $gioketthuc6 . "' 
        WHERE masan = '" . $masan . "' AND thutukhunggio = 6";
                mysqli_query($mysqli, $sql_update_time_6);
            } else {
                $sql_add6 = "INSERT INTO khunggio (giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau6 . "','" . $gioketthuc6 . "','" . $masan . "','1','6')";
                mysqli_query($mysqli, $sql_add6);
            }
        }
        mysqli_query($mysqli, $sql_update_time_6);
        $_SESSION['vali_pitch'] = 11;
        header('Location: ../../index.php?action=quanlysan&query=main&id_user=' . $_GET['id_user']);
    }
} else {
    $id = $_GET['masan'];
    //Delete file img
    $sql_img = "SELECT * FROM san WHERE masan = '$id' LIMIT 1";
    $query_img = mysqli_query($mysqli, $sql_img);
    while ($row = mysqli_fetch_array($query_img)) {
        unlink('uploads-pitch/' . $row['hinhanhsan']);
    }
    //Delete
    $sql_del_comment = "DELETE FROM binhluansan WHERE masan = '" . $id . "'";
    $sql_del_follow = "DELETE FROM theodoi WHERE masan = '" . $id . "'";
    $sql_del_like = "DELETE FROM luotyeuthichsan WHERE masan = '" . $id . "'";
    $sql_del_time = "DELETE FROM khunggio WHERE masan = '" . $id . "'";
    mysqli_query($mysqli, $sql_del_comment);
    mysqli_query($mysqli, $sql_del_follow);
    mysqli_query($mysqli, $sql_del_like);
    mysqli_query($mysqli, $sql_del_time);
    $sql_delete = "DELETE FROM san WHERE masan = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    $_SESSION['vali_pitch'] = 12;
    header('Location: ../../index.php?action=quanlysan&query=main&id_user=' . $_GET['id_user']);
}