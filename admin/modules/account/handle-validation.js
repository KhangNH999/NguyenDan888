function ktTenDangNhap() {
    var tendangnhap = document.getElementById('tendangnhap').value;
    if (tendangnhap != '') {
        document.getElementById('loi-tendangnhap').style.display = 'none';
    } else {
        document.getElementById('loi-tendangnhap').style.display = 'block';
    } 

}

function ktMatKhau() {
    var matkhau = document.getElementById('matkhau').value;
    if (matkhau != '') {
        document.getElementById('loi-matkhau').style.display = 'none';
    } else {
        document.getElementById('loi-matkhau').style.display = 'block';
    }
}

function checkNumber() {
    var x = document.getElementById('ten').value;
    if (x == '') {
        document.getElementById('loi-ten').style.display = 'block';
        document.getElementById('loi-ten').innerText = '* Vui lòng nhập tên!';
    } else if (!(isNaN(x))) {
        document.getElementById('loi-ten').style.display = 'block';
        document.getElementById('loi-ten').innerText = '* Tên phải nhập bằng ký tự chữ!';
    } else {
        document.getElementById('loi-ten').style.display = 'none';
    }
}

function ktDiaChiTaiKhoan() {
    var diachitaikhoan = document.getElementById('diachitaikhoan').value;
    if (diachitaikhoan != '') {
        document.getElementById('loi-diachitaikhoan').style.display = 'none';
    } else {
        document.getElementById('loi-diachitaikhoan').style.display = 'block';
    }
}

function ktSoDienThoai() {
    var x = document.getElementById('sodienthoai').value;
    if (x == '') {
        document.getElementById('loi-sodienthoai').style.display = 'block';
        document.getElementById('loi-sodienthoai').innerText = '* Vui lòng nhập số điện thoại!';
    } else if (isNaN(x)) {
        document.getElementById('loi-sodienthoai').style.display = 'block';
        document.getElementById('loi-sodienthoai').innerText = '* Số điện thoại phải là số!';
    } else if(x.length > 10 || x.length < 10){
        document.getElementById('loi-sodienthoai').style.display = 'block';
        document.getElementById('loi-sodienthoai').innerText = '* Số điện thoại phải là 10 số!';
    } else {
        document.getElementById('loi-sodienthoai').style.display = 'none';
    }
}

function ktGmail() {
    var gmail = document.getElementById('gmail').value;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (gmail == '') {
        document.getElementById('loi-gmail').style.display = 'block';
        document.getElementById('loi-gmail').innerText = '* Vui lòng nhập gmail!';
    } else if (!filter.test(gmail)) {
        document.getElementById('loi-gmail').style.display = 'block';
        document.getElementById('loi-gmail').innerText = '* Chưa đúng cú pháp';
    } else {
        document.getElementById('loi-gmail').style.display = 'none';
    }
}