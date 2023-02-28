<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
if (isset($_POST['dangky'])) {
    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = md5($_POST['matkhau']);
    $ten = $_POST['ten'];
    $gioitinh = $_POST['gioitinh'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $dienthoai = $_POST['sodienthoai'];
    $gmail = $_POST['gmail'];
    $hinhanh = 'default-user.png';
    //Kiem tra ten dang nhap
    $sql_kiemtratendangnhap = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "' LIMIT 1";
    $row1 = mysqli_query($mysqli, $sql_kiemtratendangnhap);
    $count1 = mysqli_num_rows($row1);
    //kiem tra email
    $sql_kiemtragmail = "SELECT * FROM taikhoan WHERE gmail='" . $gmail . "' LIMIT 1";
    $row2 = mysqli_query($mysqli, $sql_kiemtragmail);
    $count2 = mysqli_num_rows($row2);
    if ($count1 > 0) {
?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Lỗi',
    text: 'Tên đăng nhập này đã tồn tại.',
})
</script>
<?php
    } else if ($count2 > 0) {
    ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Lỗi',
    text: 'Gmail này đã tồn tại.',
})
</script>
<?php
    } else {
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
            $mail->addAddress($gmail, $ten);

            //Set email format to HTML
            $mail->isHTML(true);

            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

            $mail->Subject = 'Xac nhan tai khoan HINADA';
            $mail->Body    = '<p>Mã xác nhận tài khoản HINADA của bạn là: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

            $mail->send();
            // echo 'Message has been sent';

            $encrypted_password = password_hash($matkhau, PASSWORD_DEFAULT);
            //----------------------------------------------------------------------------------------
            $sql = "INSERT INTO taikhoan(tendangnhap,matkhau,thoigiantaotaikhoan,ten,gioitinh,ngaysinh,diachitaikhoan,sodienthoai,gmail,hinhanh,tinhtrangtk,maloaitaikhoan,maxacnhantaikhoan, yeucaunangquyen) VALUE('" . $tendangnhap . "','" . $matkhau . "',NOW(),'" . $ten . "','" . $gioitinh . "','" . $ngaysinh . "','" . $diachi . "','" . $dienthoai . "','" . $gmail . "','" . $hinhanh . "','1','0','" . $verification_code . "','1')";
            $sql_dangky = mysqli_query($mysqli, $sql);
            if ($sql_dangky) {
                // $_SESSION['tenkhachhang']=$tendangnhap;
                // $_SESSION['ten'] = $ten;
                // $_SESSION['sodienthoai'] = $dienthoai;
                // $_SESSION['id_khachhang']
                $idkhachhang = mysqli_insert_id($mysqli);
        ?>
<!-- <script>
window.location.href = "index.php?dangky=success";
</script> -->
<script>
window.location.href =
    "index.php?quanly=xacnhanemail&&email=<?php echo $gmail ?>&&tendangnhap=<?php echo $tendangnhap ?>&&ten=<?php echo $ten ?>&&sodienthoai=<?php echo $dienthoai ?>&&idkhachhang=<?php echo $idkhachhang ?>";
</script>
<?php
            }
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
    }
}
?>
<form action="" method="post">
    <div class="box-regist">
        <div class="regist">
            <h2>Đăng ký</h2>
            <div class="form-group">
                <input type="text" name="tendangnhap" maxlength="20" required>
                <label for="">Tên đăng nhập</label>
            </div>
            <div class="form-group">
                <input type="text" name="ten" maxlength="20" required>
                <label for="">Tên</label>
            </div>
            <div class="form-group">
                <select id="select-regist" name="gioitinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <input type="date" name="ngaysinh" required>
            </div>
            <div class="form-group">
                <input type="text" name="diachi" maxlength="50" required>
                <label for="">Địa chỉ</label>
            </div>
            <div class="form-group">
                <input type="text" name="sodienthoai" maxlength="10" required>
                <label for="">Số điện thoại</label>
            </div>
            <div class="form-group">
                <input type="text" name="gmail" maxlength="30" required>
                <label for="">Gmail</label>
            </div>
            <div class="form-group">
                <input type="password" name="matkhau" maxlength="50" required>
                <label for="">Mật khẩu</label>
            </div>
            <div class="rules">
                <input type="checkbox" id="ckb_rules" required>
                <p>Tôi đồng ý với các<a href="index.php?quanly=dieukhoan">điều khoản sử dụng</a></p>
            </div>
            <input type="submit" value="Đăng ký" name="dangky" id="btn_regist">
            <div class="exist_account">
                <p>Bạn đã có tài khoản?<a href="index.php?quanly=dangnhap">Đăng nhập</a></p>
            </div>
        </div>
    </div>
</form>