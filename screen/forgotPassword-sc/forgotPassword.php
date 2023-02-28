<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="assets/css/forgotPassword/forgotPassword.css">
<?php
//Kiểm tra đường dẫn
if (isset($_SESSION['id_khachhang'])) {
?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}
?>
<?php
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
if (isset($_POST['layMatKhau'])) {
    $gmail = $_POST['gmail'];
    $matkhau = md5($_POST['matkhau']);
    $nhaplaimatkhau = md5($_POST['nhaplaimatkhau']);
    //Kiem tra gmail
    $sql_kiemtragmail = "SELECT * FROM taikhoan WHERE gmail='" . $gmail . "' LIMIT 1";
    $row1 = mysqli_query($mysqli, $sql_kiemtragmail);
    $count1 = mysqli_num_rows($row1);
    $row_data = mysqli_fetch_array($row1);
    if ($matkhau != $nhaplaimatkhau) {
?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Lỗi',
    text: 'Bạn nhập lại mật khẩu bị sai.',
})
</script>
<?php
    } else if ($count1 > 0 && $matkhau == $nhaplaimatkhau) {
        // $sql_update = mysqli_query($mysqli, "UPDATE taikhoan SET matkhau='" . $matkhau . "' WHERE gmail='" . $gmail . "'");
        // $_SESSION['tenkhachhang'] = $row_data['tendangnhap'];
        // $_SESSION['ten'] = $row_data['ten'];
        // $_SESSION['sodienthoai'] = $row_data['sodienthoai'];
        // $_SESSION['phanquyentaikhoan'] = $row_data['maloaitaikhoan'];
        // $_SESSION['id_khachhang'] = $row_data['mataikhoan'];
        //------------------------Xử lý gửi mail xác nhận-------------------------
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

            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

            $mail->Subject = 'Xac nhan tai khoan HINADA';
            $mail->Body    = '<p>Mã xác nhận tài khoản HINADA của bạn là: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

            $mail->send();
            // echo 'Message has been sent';

            $encrypted_password = password_hash($matkhau, PASSWORD_DEFAULT);
            //----------------------------------------------------------------------------------------
            $sql_update = mysqli_query($mysqli, "UPDATE taikhoan SET maxacnhantaikhoan='" . $verification_code . "' WHERE gmail='" . $gmail . "'");
        ?>
<script>
window.location.href =
    "index.php?quanly=xacnhanlaylaimatkhau&&email=<?php echo $gmail ?>&&matkhau=<?php echo $matkhau ?>";
</script>
<?php
        } catch (Exception $e) {
        ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Lỗi',
    text: 'Không thể gửi mã xác nhận qua Gmail này. Vui lòng nhập đúng Gmail.',
})
</script>
<?php
        }
    } else if ($count1 == 0) {
        ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Lỗi',
    text: 'Gmail này không tồn tại.',
})
</script>
<?php
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div id="forgot-password">
        <h3>
            <i class="fa-solid fa-pen"></i>
            <span>Quên mật khẩu</span>
        </h3>
        <div class="title-forgot w15">
            <div>
                <span class="label">Gmail <span class="obligatory">(Bắt buộc)</span></span>
            </div>
            <input type="text" id="input-title" name="gmail" maxlength="30" required>
        </div>
        <div class="title-forgot w15">
            <div>
                <span class="label">Mật khẩu mới <span class="obligatory">(Bắt buộc)</span></span>
            </div>
            <input type="password" id="input-title" name="matkhau" maxlength="50" required>
        </div>
        <div class="title-forgot w15">
            <div>
                <span class="label">Nhập lại mật khẩu <span class="obligatory">(Bắt buộc)</span></span>
            </div>
            <input type="password" id="input-title" name="nhaplaimatkhau" maxlength="50" required>
        </div>
        <ul class="submit">
            <li>
                <!-- <a href="" class="new-submit btn">Hoàn tất</a> -->
                <button name="layMatKhau" class="new-submit btn">Lấy lại mật khẩu</button>
            </li>
        </ul>
    </div>
</form>