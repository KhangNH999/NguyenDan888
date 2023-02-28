function ktTenLoaiTaiKhoan() {
    var tenloaitaikhoan = document.getElementById('tenloaitaikhoan').value;

    if (tenloaitaikhoan != '') {
        document.getElementById('loi-tenloaitaikhoan').style.display = 'none';
    } else {
        document.getElementById('loi-tenloaitaikhoan').style.display = 'block';
    }

}