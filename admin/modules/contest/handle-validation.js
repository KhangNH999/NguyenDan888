
function ktTieuDeSuKien() {
    var tieudesukien = document.getElementById('tieudesukien').value;
    if (tieudesukien != '') {
        document.getElementById('loi-tieudesukien').style.display = 'none';
    } else {
        document.getElementById('loi-tieudesukien').style.display = 'block';
    }
}

function ktDiaDiemSuKien() {
    var diadiemsukien = document.getElementById('diadiemsukien').value;
    if (diadiemsukien != '') {
        document.getElementById('loi-diadiemsukien').style.display = 'none';
    } else {
        document.getElementById('loi-diadiemsukien').style.display = 'block';
    }
}

function ktNgayHetHan() {
    var ngayhethanthamgia = document.getElementById('ngayhethanthamgia').value;
    if (ngayhethanthamgia != '') {
        document.getElementById('loi-ngayhethanthamgia').style.display = 'none';
    } else {
        document.getElementById('loi-ngayhethanthamgia').style.display = 'block';
    }
}

function ktPhanThuong() {
    var phanthuong = document.getElementById('phanthuong').value;
    if (phanthuong != '') {
        document.getElementById('loi-phanthuong').style.display = 'none';
    } else {
        document.getElementById('loi-phanthuong').style.display = 'block';
    }
}

function ktTenDoiMot() {
    var tendoimot = document.getElementById('tendoimot').value;
    if (tendoimot != '') {
        document.getElementById('loi-tendoimot').style.display = 'none';
    } else {
        document.getElementById('loi-tendoimot').style.display = 'block';
    }
}

function ktTenDoiHai() {
    var tendoihai = document.getElementById('tendoihai').value;
    if (tendoihai != '') {
        document.getElementById('loi-tendoihai').style.display = 'none';
    } else {
        document.getElementById('loi-tendoihai').style.display = 'block';
    }
}