
function ktTieuDeBlog() {
    var tieudeblog = document.getElementById('tieudeblog').value;
    if (tieudeblog != '') {
        document.getElementById('loi-tieudeblog').style.display = 'none';
    } else {
        document.getElementById('loi-tieudeblog').style.display = 'block';
    }
}


function ktNoiDungBlog() {
    var noidungblog = document.getElementById('noidungblog').value;
    if (noidungblog != '') {
        document.getElementById('loi-noidungblog').style.display = 'none';
    } else {
        document.getElementById('loi-noidungblog').style.display = 'block';
    }
}