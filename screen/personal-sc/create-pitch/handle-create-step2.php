<?php
include('../../../config/config.php');

session_start();
$masan = $_POST['masan'];
$giobatdau1 = $_POST['giobatdau1'];
$gioketthuc1 = $_POST['gioketthuc1'];

$giobatdau2 = $_POST['giobatdau2'];
$gioketthuc2 = $_POST['gioketthuc2'];

$giobatdau3 = $_POST['giobatdau3'];
$gioketthuc3 = $_POST['gioketthuc3'];

$giobatdau4 = $_POST['giobatdau4'];
$gioketthuc4 = $_POST['gioketthuc4'];

$giobatdau5 = $_POST['giobatdau5'];
$gioketthuc5 = $_POST['gioketthuc5'];

$giobatdau6 = $_POST['giobatdau6'];
$gioketthuc6 = $_POST['gioketthuc6'];

if (isset($_POST['taosanbuoc2'])) {
    if ($giobatdau1 == '' || $gioketthuc1 == '') {
        $_SESSION['null_time_1'] = 1;
        header('Location: ../../../index.php?quanly=taosanbuoc2');
    } else {
        $sql_add1 = "INSERT INTO khunggio (giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau1 . "','" . $gioketthuc1 . "','" . $masan . "','1','1')";
        mysqli_query($mysqli, $sql_add1);
        if ($giobatdau2 != '' || $gioketthuc2 != '') {
            $sql_add2 = "INSERT INTO khunggio (giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau2 . "','" . $gioketthuc2 . "','" . $masan . "','1','2')";
            mysqli_query($mysqli, $sql_add2);
        }
        if ($giobatdau3 != '' || $gioketthuc3 != '') {
            $sql_add3 = "INSERT INTO khunggio (giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau3 . "','" . $gioketthuc3 . "','" . $masan . "','1','3')";
            mysqli_query($mysqli, $sql_add3);
        }
        if ($giobatdau4 != '' || $gioketthuc4 != '') {
            $sql_add4 = "INSERT INTO khunggio (giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau4 . "','" . $gioketthuc4 . "','" . $masan . "','1','4')";
            mysqli_query($mysqli, $sql_add4);
        }
        if ($giobatdau5 != '' || $gioketthuc5 != '') {
            $sql_add5 = "INSERT INTO khunggio (giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau5 . "','" . $gioketthuc5 . "','" . $masan . "','1','5')";
            mysqli_query($mysqli, $sql_add5);
        }
        if ($giobatdau6 != '' || $gioketthuc6 != '') {
            $sql_add6 = "INSERT INTO khunggio (giobatdau, gioketthuc, masan, xetkhunggio, thutukhunggio) 
        VALUE ('" . $giobatdau6 . "','" . $gioketthuc6 . "','" . $masan . "','1','6')";
            mysqli_query($mysqli, $sql_add6);
        }

        $sql_update = "UPDATE san SET tinhtrangkhunggio = 1 WHERE masan = $masan AND tinhtrangkhunggio = 0 LIMIT 1";
        mysqli_query($mysqli, $sql_update);
        header('Location: ../../../index.php?quanly=taosanbuoc3');
    }
}