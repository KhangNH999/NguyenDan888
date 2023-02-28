function checkNumber() {
    var x = document.getElementById('giathue').value;
    if (isNaN(x)) {
        document.getElementById('loi-giathue').style.display = 'block';
        document.getElementById('loi-giathue').innerText = '* Giá thuê phải nhập số!';
    } else if (x > 10000000) {
        document.getElementById('loi-giathue').style.display = 'block';
        document.getElementById('loi-giathue').innerText = '* Giá thuê phải nhỏ hơn 10 triệu!';
    } else if (x < 0) {
        document.getElementById('loi-giathue').style.display = 'block';
        document.getElementById('loi-giathue').innerText = '* Giá thuê phải lớn hơn 0!';
    } else if (x == '') {
        document.getElementById('loi-giathue').style.display = 'block';
        document.getElementById('loi-giathue').innerText = '* Vui lòng nhập giá thuê!';
    } else {
        document.getElementById('loi-giathue').style.display = 'none';
    }
}

function ktTenSan() {
    var tensan = document.getElementById('tensan').value;

    if (tensan != '') {
        document.getElementById('loi-tensan').style.display = 'none';
    } else {
        document.getElementById('loi-tensan').style.display = 'block';
    }

}

function ktTieuDeSan() {
    var tieudesan = document.getElementById('tieudesan').value;
    if (tieudesan != '') {
        document.getElementById('loi-tieudesan').style.display = 'none';
    } else {
        document.getElementById('loi-tieudesan').style.display = 'block';
    }
}

function ktDiaChiSan() {
    var diachisan = document.getElementById('diachisan').value;
    if (diachisan != '') {
        document.getElementById('loi-diachisan').style.display = 'none';
    } else {
        document.getElementById('loi-diachisan').style.display = 'block';
    }
}

function ktNoiDungSan() {
    var noidungsan = document.getElementById('noidungsan').value;
    if (noidungsan != '') {
        document.getElementById('loi-noidungsan').style.display = 'none';
    } else {
        document.getElementById('loi-noidungsan').style.display = 'block';
    }
}