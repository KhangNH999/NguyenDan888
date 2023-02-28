<?php
if (isset($_GET['quanly'])) {
    $tam = $_GET['quanly'];
} else {
    $tam = '';
}

if ($tam == 'dangnhap') {
    $_SESSION['path'] = "Đăng nhập";
    $_SESSION['path2'] = "";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'dangky') {
    $_SESSION['path'] = "Đăng ký";
    $_SESSION['path2'] = "";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'datsan') {
    $_SESSION['path'] = "Đặt sân";
    $_SESSION['path2'] = "";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'chitietdatsan') {
    $_SESSION['path'] = "Đặt sân";
    $_SESSION['path2'] = "Chi tiết sân";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'blog') {
    $_SESSION['path'] = "Blog";
    $_SESSION['path2'] = "";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'chitietblog') {
    $_SESSION['path'] = "Blog";
    $_SESSION['path2'] = "Chi tiết blog";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'trangcuatoi') {
    //trang của tôi
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'taosan') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Tạo sân";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'taosanbuoc2') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Tạo sân";
    $_SESSION['path3'] = "Chọn khung giờ";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'taosanbuoc3') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Tạo sân";
    $_SESSION['path3'] = "Chọn khung giờ";
    $_SESSION['path4'] = "Chờ xác nhận";
    $_SESSION['path5'] = "";
} elseif ($tam == 'suasan') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Sửa sân";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'taosukien') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Tạo sự kiện";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'suasukien') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Sửa sự kiện";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'quanlysan') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Quản lý sân";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'theodoi') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Theo dõi";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'taoblog') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Đăng blog";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'suablog') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Sửa blog";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'blogcuatoi') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Blog của tôi";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'hoso') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Hồ sơ cá nhân";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'danhgia') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Đánh giá";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'hosonguoidung') {
    //trang user
    $_SESSION['path'] = "Tài khoản";
    $_SESSION['path2'] = "Hồ sơ người dùng";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'blognguoidung') {
    $_SESSION['path'] = "Tài khoản";
    $_SESSION['path2'] = "Blog người dùng";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'sukiennguoidung') {
    $_SESSION['path'] = "Tài khoản";
    $_SESSION['path2'] = "Sự kiện người dùng";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'quanlysannguoidung') {
    $_SESSION['path'] = "Tài khoản";
    $_SESSION['path2'] = "Quản lý sân người dùng";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'danhgianguoidung') {
    $_SESSION['path'] = "Tài khoản";
    $_SESSION['path2'] = "Đánh giá người dùng";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'lichsudatsan') {
    //quy trình thanh toán
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Lịch sử đặt sân";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'datlich') {
    $_SESSION['path'] = "Đặt sân";
    $_SESSION['path2'] = "Chi tiết sân";
    $_SESSION['path3'] = "Đặt lịch";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'thanhtoan') {
    $_SESSION['path'] = "Đặt sân";
    $_SESSION['path2'] = "Chi tiết sân";
    $_SESSION['path3'] = "Đặt lịch";
    $_SESSION['path4'] = "Thanh toán";
    $_SESSION['path5'] = "";
} elseif ($tam == 'camon') {
    $_SESSION['path'] = "Đặt sân";
    $_SESSION['path2'] = "Chi tiết sân";
    $_SESSION['path3'] = "Đặt lịch";
    $_SESSION['path4'] = "Thanh toán";
    $_SESSION['path5'] = "Hoàn tất";
} elseif ($tam == 'quenmatkhau') {
    $_SESSION['path'] = "Đăng nhập";
    $_SESSION['path2'] = "Quên mật khẩu";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'dieukhoan') {
    $_SESSION['path'] = "Điều khoản sử dụng";
    $_SESSION['path2'] = "";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'timkiemnguoidung') {
    $_SESSION['path'] = "Kết quả tìm kiếm";
    $_SESSION['path2'] = "";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'sukien') {
    $_SESSION['path'] = "Sự kiện";
    $_SESSION['path2'] = "";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'chitietsukien') {
    $_SESSION['path'] = "Sự kiện";
    $_SESSION['path2'] = "Chi tiết sự kiện";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'quanlysukien') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Quản lý sự kiện";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'lichsuthamgia') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Lịch sử tham gia";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'dadanhgia') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Đã đánh giá";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'yeuthich') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Yêu thích";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'baocao') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Báo cáo";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'choxacnhanthanhtoan') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Chờ xác nhận thanh toán";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'duyetdatsan') {
    $_SESSION['path'] = "Trang của tôi";
    $_SESSION['path2'] = "Duyệt đặt sân";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'xacnhanemail' || $tam == 'xacnhantaikhoandangnhap' || $tam == 'xacnhanlaylaimatkhau') {
    $_SESSION['path'] = "Xác nhận email";
    $_SESSION['path2'] = "";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == 'vechungtoi') {
    $_SESSION['path'] = "Về chúng tôi";
    $_SESSION['path2'] = "";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} elseif ($tam == '404error') {
    $_SESSION['path'] = "404 Not Found";
    $_SESSION['path2'] = "";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
} else {
    $_SESSION['path'] = "Trang chủ";
    $_SESSION['path2'] = "";
    $_SESSION['path3'] = "";
    $_SESSION['path4'] = "";
    $_SESSION['path5'] = "";
}