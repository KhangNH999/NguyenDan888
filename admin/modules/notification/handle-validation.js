
function ktNoiDungThongBao() {
    var noidungthongbao = document.getElementById('noidungthongbao').value;
    if (noidungthongbao != '') {
        document.getElementById('loi-noidungthongbao').style.display = 'none';
    } else {
        document.getElementById('loi-noidungthongbao').style.display = 'block';
    }
}