
function ktNoiDungBinhLuanSan() {
    var noidungbinhluansan = document.getElementById('noidungbinhluansan').value;
    if (noidungbinhluansan != '') {
        document.getElementById('loi-noidungbinhluansan').style.display = 'none';
    } else {
        document.getElementById('loi-noidungbinhluansan').style.display = 'block';
    }
}