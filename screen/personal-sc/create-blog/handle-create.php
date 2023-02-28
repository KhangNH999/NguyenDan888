<?php
include('../../../config/config.php');

$tieude = $_POST['title'];
$noidung = $_POST['noidung'];
$mataikhoan = $_POST['mataikhoan'];
//xuly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh_time = time() . '_' . $hinhanh;

if (isset($_POST['complete-blog'])) {
    if ($noidung == '') {
        session_start();
        $_SESSION['error_null'] = 1;
        header('Location: ../../../index.php?quanly=taoblog');
    } else {
        //them
        if (!empty($_FILES['hinhanh']['name'])) {
            move_uploaded_file($hinhanh_tmp, '../../../admin/modules/blog/uploads-blog/' . $hinhanh_time);
            $sql_blog = "INSERT INTO blog(mataikhoan,tieudeblog,noidungblog,hinhanhblog,thoigiantaoblog,tinhtrangblog) VALUE('" . $mataikhoan . "','" . $tieude . "','" . $noidung . "','" . $hinhanh_time . "',NOW(),'1')";
        } else {
            $sql_blog = "INSERT INTO blog(mataikhoan,tieudeblog,noidungblog,thoigiantaoblog,tinhtrangblog) VALUE('" . $mataikhoan . "','" . $tieude . "','" . $noidung . "',NOW(),'1')";
        }
        mysqli_query($mysqli, $sql_blog);
        header('Location: ../../../index.php?quanly=blogcuatoi');
    }
}