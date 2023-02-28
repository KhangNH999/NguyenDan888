
function ktNoiDungBinhLuanBlog() {
    var noidungbinhluanblog = document.getElementById('noidungbinhluanblog').value;
    if (noidungbinhluanblog != '') {
        document.getElementById('loi-noidungbinhluanblog').style.display = 'none';
    } else {
        document.getElementById('loi-noidungbinhluanblog').style.display = 'block';
    }
}