//Kiểm tra chuỗi có bắt đầu với số
function startsWithNumber(str) {
    return /^\d/.test(str);
}
//Kiểm tra số lương ký tự chuỗi
function numberOfCharacters(str) {
    return str.length;
}

function ktTieuDeBlog() {
    var tieudeblog = document.getElementById("input-title").value;
    if (tieudeblog == "") {
        document.getElementById("mess-input-title").innerText =
            "* Chưa nhập tiêu đề blog";
        document
            .getElementById("mess-input-title")
            .classList.remove("mess-success");
    } else if (startsWithNumber(tieudeblog)) {
        document.getElementById("mess-input-title").innerText =
            "* Tiêu đề blog không được bắt đầu bằng số!";
        document
            .getElementById("mess-input-title")
            .classList.remove("mess-success");
    } else if (numberOfCharacters(tieudeblog) < 15) {
        document.getElementById("mess-input-title").innerText =
            "* Tiêu đề blog phải nhiều hơn 15 ký tự!";
        document
            .getElementById("mess-input-title")
            .classList.remove("mess-success");
    } else {
        document.getElementById("mess-input-title").innerText = "* Đúng yêu cầu";
        document.getElementById("mess-input-title").classList.add("mess-success");
    }
}

function ktNoiDungBlog() {
    var noidungblog = document.getElementById("input-content").value;
    if (noidungblog !== "") {
        document.getElementById("mess-input-content").innerText = "* Đúng yêu cầu";
        document.getElementById("mess-input-content").classList.add("mess-success");
    } else {
        document.getElementById("mess-input-content").innerText =
            "* Chưa nhập nội dung blog";
        document
            .getElementById("mess-input-content")
            .classList.remove("mess-success");
    }
}

setInterval(function () {
    var tieudeblog = document.getElementById("input-title").value;
    if (
        tieudeblog === "" ||
        startsWithNumber(tieudeblog) ||
        numberOfCharacters(tieudeblog) < 15
    ) {
        document.getElementById("taoblog").setAttribute("disabled", "");
    } else {
        document.getElementById("taoblog").removeAttribute("disabled");
    }
}, 1000);
