
function ktNoiDungBaoCaoBlog() {
    var noidungbaocaoblog = document.getElementById('noidungbaocaoblog').value;
    if (noidungbaocaoblog != '') {
        document.getElementById('loi-noidungbaocaoblog').style.display = 'none';
    } else {
        document.getElementById('loi-noidungbaocaoblog').style.display = 'block';
    }
}