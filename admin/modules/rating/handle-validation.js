
function ktDanhGia() {
    var x = document.getElementById('sosao').value;
    if (x == '') {
        document.getElementById('loi-danhgia').style.display = 'block';
        document.getElementById('loi-danhgia').innerText = '* Vui lòng nhập số sao (1 - 5)!';
    } else if (isNaN(x)) {
        document.getElementById('loi-danhgia').style.display = 'block';
        document.getElementById('loi-danhgia').innerText = '* Số sao đánh giá phải là số!';
    } else if(x < 1){
        document.getElementById('loi-danhgia').style.display = 'block';
        document.getElementById('loi-danhgia').innerText = '* Số sao đánh giá phải lớn hơn 1';
    } else if(x > 5){
        document.getElementById('loi-danhgia').style.display = 'block';
        document.getElementById('loi-danhgia').innerText = '* Số sao đánh giá phải nhỏ hơn 5';
    } else {
        document.getElementById('loi-danhgia').style.display = 'none';
    }
}

function ktNoiDungDanhGia() {
    var noidungdanhgia = document.getElementById('noidungdanhgia').value;
    if (noidungdanhgia != '') {
        document.getElementById('loi-noidungdanhgia').style.display = 'none';
    } else {
        document.getElementById('loi-noidungdanhgia').style.display = 'block';
    }
}