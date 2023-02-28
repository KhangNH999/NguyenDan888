
function ktNoiDungBaoCaoSan() {
    var noidungbaocaosan = document.getElementById('noidungbaocaosan').value;
    if (noidungbaocaosan != '') {
        document.getElementById('loi-noidungbaocaosan').style.display = 'none';
    } else {
        document.getElementById('loi-noidungbaocaosan').style.display = 'block';
    }
}