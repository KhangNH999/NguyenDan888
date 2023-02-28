
function ktNoiDungBinhLuanSuKien() {
    var noidungbinhluansukien = document.getElementById('noidungbinhluansukien').value;
    if (noidungbinhluansukien != '') {
        document.getElementById('loi-noidungbinhluansukien').style.display = 'none';
    } else {
        document.getElementById('loi-noidungbinhluansukien').style.display = 'block';
    }
}