<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//tích hợp giờ
date_default_timezone_set("Asia/Ho_Chi_Minh");
//tích hợp file PHPMailer
require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);
//-----------------------------
if (isset($_GET['partnerCode']) && isset($_GET['payType']) && $_GET['payType'] == "napas") {
    $mataikhoan = $_SESSION['id_khachhang'];
    $masan = $_SESSION['masan'];
    $ngaydat = $_SESSION['ngaydat'];
    $makhunggio = $_SESSION['makhunggio'];
    //Sql lấy tên tài khoản
    $sql_user = "SELECT * FROM taikhoan WHERE mataikhoan = $mataikhoan";
    $sql_user = mysqli_query($mysqli, $sql_user);
    while ($row_user = mysqli_fetch_array($sql_user)) {
        $ten = $row_user['ten'];
    }
    //sql lấy tài khoản chủ sân
    $sql_own = "SELECT * FROM san WHERE masan = $masan";
    $sql_own = mysqli_query($mysqli, $sql_own);
    while ($row_own = mysqli_fetch_array($sql_own)) {
        $mataikhoanchusan = $row_own['mataikhoan'];
        $tieudesan = $row_own['tieudesan'];
    }
    //sql lấy khung giờ
    $sql_time = "SELECT * FROM khunggio WHERE makhunggio = $makhunggio";
    $sql_time = mysqli_query($mysqli, $sql_time);
    while ($row_time = mysqli_fetch_array($sql_time)) {
        $giobatdau = $row_time['giobatdau'];
        $gioketthuc = $row_time['gioketthuc'];
    }
    //sql lấy mã lịch sử
    $sql_malichsu = "SELECT * FROM lichsudatsan 
    WHERE ngaydat='" . $ngaydat . "' 
    AND mataikhoan=$mataikhoan 
    AND masan=$masan 
    AND makhunggio=$makhunggio LIMIT 1";
    $query_malichsu = mysqli_query($mysqli, $sql_malichsu);
    while ($row_malichsu = mysqli_fetch_array($query_malichsu)) {
        $malichsu = $row_malichsu['malichsu'];
    }
    //sql cập nhật lich su dat san
    $sql_update_lichsu =  mysqli_query($mysqli, "UPDATE lichsudatsan SET hinhthucthanhtoan='MoMo', xacnhandatsan=2 WHERE malichsu='" . $malichsu . "'");
    //Add notify
    $mess = "[" . $ten . "] thanh toán thành công: [" . $tieudesan . "] ngày [" . $ngaydat . "] khung giờ [" . date("H:i", strtotime($giobatdau)) . " - " . date("H:i", strtotime($gioketthuc)) . "]";
    $sql_add_notify = "INSERT INTO thongbao (mataikhoan, noidungthongbao, thoigianthongbao, tinhtrangthongbao) 
    VALUE('" . $mataikhoanchusan . "','" . $mess . "','" . date("Y-m-d H:i:s") . "','0')";
    mysqli_query($mysqli, $sql_add_notify);
    //sql lay email
    $sql_gmail = "SELECT * FROM taikhoan WHERE taikhoan.mataikhoan='" . $mataikhoan . "' LIMIT 1";
    $row_taikhoan = mysqli_query($mysqli, $sql_gmail);
    $row_gmail = mysqli_fetch_array($row_taikhoan);
    $gmail = $row_gmail['gmail'];
    //sql san
    $sql_san = "SELECT * FROM lichsudatsan, san, taikhoan, khunggio 
    WHERE lichsudatsan.mataikhoan = taikhoan.mataikhoan 
    AND lichsudatsan.masan = san.masan 
    AND lichsudatsan.makhunggio = khunggio.makhunggio
    AND lichsudatsan.ngaydat='" . $ngaydat . "' 
    AND lichsudatsan.mataikhoan=$mataikhoan 
    AND lichsudatsan.masan=$masan 
    AND lichsudatsan.makhunggio=$makhunggio LIMIT 1";
    $row = mysqli_query($mysqli, $sql_san);
    $row_data = mysqli_fetch_array($row);
    // $thoigianhethan = $row_data['thoigiandong'];
    // $timeCurent = date("Y-m-d") . " " . $thoigianhethan;

    // if ($sql_thank) {
    try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'danmap0914@gmail.com';

        //SMTP password
        $mail->Password = 'ehqtnrypmdvdyhxh';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('your_email@gmail.com', 'HINADA');

        //Add a recipient
        $mail->addAddress($gmail, "");

        //Set email format to HTML
        $mail->isHTML(true);

        $mail->Subject = 'Xac nhan dat san tren Hinada thanh cong';
        $mail->Body    = '<p>Cảm ơn quý khách đã đặt sân trên Hinada</p>
            <p>Thông tin sân:</p>
            <table style="width:max-content;border:1px solid blue;padding:10px;">
                <tr>
                    <td>Mã sân:</td>
                    <td>' . $masan . '</td>
                </tr>
                <tr>
                    <td>Tên sân:</td>
                    <td>' . $row_data['tensan'] . '</td>
                </tr>
                <tr>
                    <td>Địa điểm:</td>
                    <td>' . $row_data['diachisan'] . '</td>
                </tr>
                <tr>
                    <td>Ngày đặt sân:</td>
                    <td><strong>' . date("d/m/Y", strtotime($row_data['ngaydat'])) . '</strong></td>
                </tr>
                <tr>
                    <td>Khung giờ:</td>
                    <td><strong>' . date("H:i", strtotime($row_data['giobatdau'])) . ' - ' . date("H:i", strtotime($row_data['gioketthuc'])) . '</strong></td>
                </tr>
            </table>       
            <p>Quý khách vui lòng đến đúng ngày đúng giờ. Cảm ơn quý khách đã đọc gmail này.</p>
            ';

        $mail->send();
        // echo 'Message has been sent';

        // $encrypted_password = password_hash($matkhau, PASSWORD_DEFAULT);
        //----------------------------------------------------------------------------------------
    } catch (Exception $e) {
?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Lỗi',
    text: 'Không thể gửi mã thông báo qua Gmail này',
})
</script>
<?php
    }
    ?>
<script>
window.location.href = "index.php?quanly=camon&&giaodich=thanhcong";
</script>
<?php

} else {
?>
<script>
window.location.href = "index.php?giaodich=thatbai";
</script>
<?php
}
?>