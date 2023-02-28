//Kiểm tra chuỗi có bắt đầu với số
function startsWithNumber(str) {
  return /^\d/.test(str);
}
//Kiểm tra số lương ký tự chuỗi
function numberOfCharacters(str) {
  return str.length;
}

//Kiểm tra nhập số
function checkNumberInput(str) {
  return isNaN(str);
}

//Kiểm tra Địa chỉ Tiếng Việt
// function validCharForStreetAddress(str) {
//     var regex = /^(?=.*[A-Za-z])(?=.*\d)(?!.*[^A-Za-z0-9-[:space:]ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂ ưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]\-#\.\/ ])/;
//     str.split(/[\r\n]+/).forEach((a) => {
//         result = regex.test(a);
//     });
//     return result;
// }

function ktTenSan() {
  var tensan = document.getElementById("input-namepitch").value;
  if (tensan == "") {
    document.getElementById("mess-input-namepitch").innerText =
      "* Chưa nhập tên sân";
    document.getElementById("mess-input-namepitch").classList.add("mess-error");
  } else if (startsWithNumber(tensan)) {
    document.getElementById("mess-input-namepitch").innerText =
      "* Tên sân không được bắt đầu bằng số!";
    document.getElementById("mess-input-namepitch").classList.add("mess-error");
  } else if (numberOfCharacters(tensan) < 15) {
    document.getElementById("mess-input-namepitch").innerText =
      "* Tên sân phải từ 15 ký tự trở lên!";
    document.getElementById("mess-input-namepitch").classList.add("mess-error");
  } else {
    document.getElementById("mess-input-namepitch").innerText =
      "* Đúng yêu cầu";
    document
      .getElementById("mess-input-namepitch")
      .classList.remove("mess-error");
  }
}

function ktTieuDeSan() {
  var tieudesan = document.getElementById("input-title").value;
  if (tieudesan == "") {
    document.getElementById("mess-input-title").innerText =
      "* Chưa nhập tiêu đề sân";
    document.getElementById("mess-input-title").classList.add("mess-error");
  } else if (startsWithNumber(tieudesan)) {
    document.getElementById("mess-input-title").innerText =
      "* Tiêu đề sân không được bắt đầu bằng số!";
    document.getElementById("mess-input-title").classList.add("mess-error");
  } else if (numberOfCharacters(tieudesan) < 15) {
    document.getElementById("mess-input-title").innerText =
      "* Tiêu đề sân phải từ 15 ký tự trở lên!";
    document.getElementById("mess-input-title").classList.add("mess-error");
  } else {
    document.getElementById("mess-input-title").innerText = "* Đúng yêu cầu";
    document.getElementById("mess-input-title").classList.remove("mess-error");
  }
}

function ktGiaThue() {
  var giathue = document.getElementById("input-price").value;
  if (checkNumberInput(giathue)) {
    document.getElementById("mess-input-price").innerText =
      "* Vui lòng nhập số!";
    document.getElementById("mess-input-price").classList.add("mess-error");
  } else if (giathue > 10000000) {
    document.getElementById("mess-input-price").innerText =
      "* Giá thuê phải không quá 10 triệu đồng!";
    document.getElementById("mess-input-price").classList.add("mess-error");
  } else if (giathue < 0) {
    document.getElementById("mess-input-price").innerText =
      "* Giá thuê phải lớn hơn 0!";
    document.getElementById("mess-input-price").classList.add("mess-error");
  } else if (giathue == "") {
    document.getElementById("mess-input-price").innerText =
      "* Chưa nhập tiêu đề sân";
    document.getElementById("mess-input-price").classList.add("mess-error");
  } else {
    document.getElementById("mess-input-price").innerText = "* Đúng yêu cầu";
    document.getElementById("mess-input-price").classList.remove("mess-error");
  }
  format(giathue);
}

function ktDiaChiSan() {
  var diachisan = document.getElementById("input-street").value;
  if (diachisan == "") {
    document.getElementById("mess-input-street").innerText =
      "* Chưa nhập địa chỉ sân";
    document.getElementById("mess-input-street").classList.add("mess-error");
  } else {
    document.getElementById("mess-input-street").innerText = "* Đúng yêu cầu";
    document.getElementById("mess-input-street").classList.remove("mess-error");
  }
}

function ktNoiDungSan() {
  var noidungsan = document.getElementById("input-content").value;
  if (noidungsan !== "") {
    document.getElementById("mess-input-content").innerText = "* Đúng yêu cầu";
    document
      .getElementById("mess-input-content")
      .classList.remove("mess-error");
  } else {
    document.getElementById("mess-input-content").innerText =
      "* Chưa nhập nội dung sân";
    document.getElementById("mess-input-content").classList.add("mess-error");
  }
}

setInterval(function () {
  var tensan = document.getElementById("input-namepitch").value;
  var tieudesan = document.getElementById("input-title").value;
  var giathue = document.getElementById("input-price").value;
  var diachisan = document.getElementById("input-street").value;
  if (
    tensan == "" ||
    (startsWithNumber(tensan)) ||
    (numberOfCharacters(tensan)) < 15 ||
    tieudesan == "" ||
    startsWithNumber(tieudesan) ||
    numberOfCharacters(tieudesan) < 15 ||
    giathue == "" ||
    checkNumberInput(giathue) ||
    giathue > 10000000 ||
    giathue < 0 ||
    diachisan == ""
  ) {
    document.getElementById("create-pitch").setAttribute("disabled", "");
  } else {
    document.getElementById("create-pitch").removeAttribute("disabled");
  }
}, 1000);
