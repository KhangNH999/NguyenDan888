function ktHinhThucThanhToan() {
    var x = document.getElementById('hinhthucthanhtoan').value;
    if (x == '') {
        document.getElementById('loi-hinhthucthanhtoan').style.display = 'block';
        document.getElementById('loi-hinhthucthanhtoan').innerText = '* Vui lòng nhập tên!';
    } else if (!(isNaN(x))) {
        document.getElementById('loi-hinhthucthanhtoan').style.display = 'block';
        document.getElementById('loi-hinhthucthanhtoan').innerText = '* Tên phải nhập bằng ký tự chữ!';
    } else {
        document.getElementById('loi-hinhthucthanhtoan').style.display = 'none';
    }
}

function hiddenTable(){
    document.getElementById('table-step-2').style.display = 'none';
}