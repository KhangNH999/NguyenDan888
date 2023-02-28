//Kiểm tra chuỗi có bắt đầu với số
function startsWithNumber(str) {
  return /^\d/.test(str);
}
//Kiểm tra số lương ký tự chuỗi
function numberOfCharacters(str) {
  return str.length;
}

function ktTieuDeSuKien() {
  var tieuDeSuKien = document.getElementById("tieudesukien").value;
  if (tieuDeSuKien == "") {
    document.getElementById("tb-tieudesukien").innerText =
      "* Chưa nhập tiêu đề sự kiện";
    document.getElementById("tb-tieudesukien").classList.add("mess-error");
  } else if (startsWithNumber(tieuDeSuKien)) {
    document.getElementById("tb-tieudesukien").innerText =
      "* Tiêu đề không được bắt đầu bằng số!";
    document.getElementById("tb-tieudesukien").classList.add("mess-error");
  } else if (numberOfCharacters(tieuDeSuKien) < 15) {
    document.getElementById("tb-tieudesukien").innerText =
      "* Tiêu đề phải từ 15 ký tự trở lên!";
    document.getElementById("tb-tieudesukien").classList.add("mess-error");
  } else {
    document.getElementById("tb-tieudesukien").innerText = "* Đúng yêu cầu";
    document.getElementById("tb-tieudesukien").classList.remove("mess-error");
  }
}
function ktThoiGianHetHan() {
  var thoiGianHetHan = document.getElementById("thoigianhethan").value;
  if (thoiGianHetHan == "") {
    document.getElementById("tb-thoigianhethan").innerText =
      "* Chưa chọn thời gian hết hạn";
    document.getElementById("tb-thoigianhethan").classList.add("mess-error");
  } else {
    document.getElementById("tb-thoigianhethan").innerText = "* Đúng yêu cầu";
    document.getElementById("tb-thoigianhethan").classList.remove("mess-error");
  }
}
function ktDiaDiemSuKien() {
  var diaDiemSuKien = document.getElementById("diadiemsukien").value;
  if (diaDiemSuKien == "") {
    document.getElementById("tb-diadiemsukien").innerText =
      "* Chưa nhập địa điểm sự kiện";
    document.getElementById("tb-diadiemsukien").classList.add("mess-error");
  } else {
    document.getElementById("tb-diadiemsukien").innerText = "* Đúng yêu cầu";
    document.getElementById("tb-diadiemsukien").classList.remove("mess-error");
  }
}
function ktTenDoiMot() {
  var tenDoiMot = document.getElementById("tendoimot").value;
  if (tenDoiMot == "") {
    document.getElementById("tb-tendoimot").innerText = "* Chưa nhập tên đội 1";
    document.getElementById("tb-tendoimot").classList.add("mess-error");
  } else if (numberOfCharacters(tenDoiMot) > 10) {
    document.getElementById("tb-tendoimot").innerText =
      "* Tên đội quá dài, yêu cầu dưới 10 ký tự!";
    document.getElementById("tb-tendoimot").classList.add("mess-error");
  } else {
    document.getElementById("tb-tendoimot").innerText = "* Đúng yêu cầu";
    document.getElementById("tb-tendoimot").classList.remove("mess-error");
  }
}
function ktTenDoiHai() {
  var tenDoiHai = document.getElementById("tendoihai").value;
  if (tenDoiHai == "") {
    document.getElementById("tb-tendoihai").innerText = "* Chưa nhập tên đội 2";
    document.getElementById("tb-tendoihai").classList.add("mess-error");
  } else if (numberOfCharacters(tenDoiHai) > 10) {
    document.getElementById("tb-tendoihai").innerText =
      "* Tên đội quá dài, yêu cầu dưới 10 ký tự!";
    document.getElementById("tb-tendoihai").classList.add("mess-error");
  } else {
    document.getElementById("tb-tendoihai").innerText = "* Đúng yêu cầu";
    document.getElementById("tb-tendoihai").classList.remove("mess-error");
  }
}
function ktPhanThuong() {
  var phanThuong = document.getElementById("phanthuong").value;
  if (phanThuong == "") {
    document.getElementById("tb-phanthuong").innerText =
      "* Chưa nhập phần thưởng";
    document.getElementById("tb-phanthuong").classList.add("mess-error");
  } else {
    document.getElementById("tb-phanthuong").innerText = "* Đúng yêu cầu";
    document.getElementById("tb-phanthuong").classList.remove("mess-error");
  }
}

setInterval(function () {
  var tieuDeSuKien = document.getElementById("tieudesukien").value;
  var thoiGianHetHan = document.getElementById("thoigianhethan").value;
  var diaDiemSuKien = document.getElementById("diadiemsukien").value;
  var tenDoiMot = document.getElementById("tendoimot").value;
  var tenDoiHai = document.getElementById("tendoihai").value;
  var phanThuong = document.getElementById("phanthuong").value;
  if (
    tieuDeSuKien === "" ||
    startsWithNumber(tieuDeSuKien) ||
    numberOfCharacters(tieuDeSuKien) < 15 ||
    thoiGianHetHan === "" ||
    diaDiemSuKien === "" ||
    tenDoiMot === "" ||
    numberOfCharacters(tenDoiMot) > 10 ||
    tenDoiHai === "" ||
    numberOfCharacters(tenDoiHai) > 10 ||
    phanThuong === ""
  ) {
    document.getElementById("xulysukien").setAttribute("disabled", "");
  } else {
    document.getElementById("xulysukien").removeAttribute("disabled");
  }
}, 1000);
