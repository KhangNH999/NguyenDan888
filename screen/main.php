<?php
if (isset($_GET['quanly'])) {
    $tam = $_GET['quanly'];
} else {
    $tam = '';
}
if ($tam == 'dangnhap') {
    include("login-sc/login.php");
} elseif ($tam == 'vechungtoi') {
    include("about-sc/about.php");
} elseif ($tam == 'dangky') {
    include("regist-sc/registration.php");
} elseif ($tam == 'datsan') {
    include("setpitch-sc/setpitch.php");
} elseif ($tam == 'chitietdatsan') {
    include("detail-sc/detail-setpitch.php");
} elseif ($tam == 'blog') {
    include("blog-sc/blog.php");
} elseif ($tam == 'trangcuatoi') { //trang cá nhân
    include("personal-sc/main-personal.php");
} elseif ($tam == 'hoso') {
    include("personal-sc/edit-account.php");
} elseif ($tam == 'taoblog') {
    include("personal-sc/create-blog/create-blog.php");
} elseif ($tam == 'suablog') {
    include("personal-sc/create-blog/edit-blog.php");
} elseif ($tam == 'taosan') {
    include("personal-sc/create-pitch/create-pitch-step1.php");
} elseif ($tam == 'taosanbuoc2') {
    include("personal-sc/create-pitch/create-pitch-step2.php");
} elseif ($tam == 'taosanbuoc3') {
    include("personal-sc/create-pitch/create-pitch-step3.php");
} elseif ($tam == 'suasan') {
    include("personal-sc/create-pitch/edit-pitch.php");
} elseif ($tam == 'taosukien') {
    include("personal-sc/create-contest/create-contest.php");
} elseif ($tam == 'suasukien') {
    include("personal-sc/create-contest/edit-contest.php");
} elseif ($tam == 'theodoi') {
    include("personal-sc/main-personal.php");
} elseif ($tam == 'quanlysan') {
    include("personal-sc/main-personal.php");
} elseif ($tam == 'blogcuatoi') {
    include("personal-sc/main-personal.php");
} elseif ($tam == 'danhgia') {
    include("personal-sc/main-personal.php");
} elseif ($tam == 'hosonguoidung') { //trang người dùng
    include("user-sc/userProfile.php");
} elseif ($tam == 'quanlysannguoidung') {
    include("user-sc/userProfile.php");
} elseif ($tam == 'blognguoidung') {
    include("user-sc/userProfile.php");
} elseif ($tam == 'sukiennguoidung') {
    include("user-sc/userProfile.php");
} elseif ($tam == 'danhgianguoidung') {
    include("user-sc/userProfile.php");
} elseif ($tam == 'datlich') { //thanh toán
    include("book-sc/book.php");
} elseif ($tam == 'thanhtoan') {
    include("paymentMOMO-sc/paymentMOMO.php");
} elseif ($tam == 'xulylichsuMOMO') { //lịch sử giao dịch MoMo
    include("paymentMOMO-sc/historyMOMO.php");
} elseif ($tam == 'xulylichsuVnPay') { //lịch sử giao dịch VnPay
    include("VnPay-sc/historyVnPay.php");
} elseif ($tam == 'chitietblog') {
    include("detail-sc/detail-blog.php");
} elseif ($tam == 'camon') {
    include("thank-sc/thank.php");
} elseif ($tam == 'lichsudatsan') {
    include("personal-sc/pitch-history.php");
} elseif ($tam == 'quenmatkhau') { //quen mat khau
    include("forgotPassword-sc/forgotPassword.php");
} elseif ($tam == 'dieukhoan') { //dieu khoan su dung
    include("rules-sc/rules.php");
} elseif ($tam == 'timkiemnguoidung') { //tim kiem nguoi dung
    include("searchUser-sc/searchUser.php");
} elseif ($tam == 'sukien') { //cuộc thi
    include("contest-sc/contest.php");
} elseif ($tam == 'chitietsukien') { //chi tiết cuộc thi
    include("contest-sc/detail-contest.php");
} elseif ($tam == 'quanlysukien') {
    include("personal-sc/main-personal.php");
} elseif ($tam == 'lichsuthamgia') {
    include("personal-sc/main-personal.php");
} elseif ($tam == 'dadanhgia') {
    include("personal-sc/main-personal.php");
} elseif ($tam == 'yeuthich') {
    include("personal-sc/main-personal.php");
} elseif ($tam == 'baocao') {
    include("personal-sc/main-personal.php");
} elseif ($tam == 'dabinhluan') {
    include("personal-sc/main-personal.php");
} elseif ($tam == 'choxacnhanthanhtoan') {
    include("personal-sc/main-personal.php");
} elseif ($tam == 'duyetdatsan') {
    include("personal-sc/main-personal.php");
} elseif ($tam == 'xacnhanemail') { //xác nhận email
    include("regist-sc/email-verification.php");
} elseif ($tam == 'xacnhantaikhoandangnhap') { //xác nhận đăng nhập email
    include("login-sc/account-verification.php");
} elseif ($tam == 'xacnhanlaylaimatkhau') { //xác nhận lấy lại mật khẩu
    include("forgotPassword-sc/forgotPass-verification.php");
} elseif ($tam == '404error') {
    include("error-sc/404.php");
} elseif ($tam == '') {
    include("main-sc/news-main-sc.php");
} else {
    include("error-sc/404.php");
}