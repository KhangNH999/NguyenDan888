function unLockTime2() {

    var giobatdau = document.getElementById("time-start-1").value;
    var gioketthuc = document.getElementById("time-end-1").value;

    if (gioketthuc == "" || giobatdau == "") {
        document.getElementById("time-start-2").setAttribute("disabled", "");
        document.getElementById("time-end-2").setAttribute("disabled", "");
    } else {
        document.getElementById("time-start-2").removeAttribute("disabled");
        document.getElementById("time-end-2").removeAttribute("disabled");
    }
}

function unLockTime3() {

    var giobatdau = document.getElementById("time-start-2").value;
    var gioketthuc = document.getElementById("time-end-2").value;

    if (gioketthuc == "" || giobatdau == "") {
        document.getElementById("time-start-3").setAttribute("disabled", "");
        document.getElementById("time-end-3").setAttribute("disabled", "");
    } else {
        document.getElementById("time-start-3").removeAttribute("disabled");
        document.getElementById("time-end-3").removeAttribute("disabled");
    }
}

function unLockTime4() {

    var giobatdau = document.getElementById("time-start-3").value;
    var gioketthuc = document.getElementById("time-end-3").value;

    if (gioketthuc == "" || giobatdau == "") {
        document.getElementById("time-start-4").setAttribute("disabled", "");
        document.getElementById("time-end-4").setAttribute("disabled", "");
    } else {
        document.getElementById("time-start-4").removeAttribute("disabled");
        document.getElementById("time-end-4").removeAttribute("disabled");
    }
}

function unLockTime5() {

    var giobatdau = document.getElementById("time-start-4").value;
    var gioketthuc = document.getElementById("time-end-4").value;

    if (gioketthuc == "" || giobatdau == "") {
        document.getElementById("time-start-5").setAttribute("disabled", "");
        document.getElementById("time-end-5").setAttribute("disabled", "");
    } else {
        document.getElementById("time-start-5").removeAttribute("disabled");
        document.getElementById("time-end-5").removeAttribute("disabled");
    }
}

function unLockTime6() {

    var giobatdau = document.getElementById("time-start-5").value;
    var gioketthuc = document.getElementById("time-end-5").value;

    if (gioketthuc == "" || giobatdau == "") {
        document.getElementById("time-start-6").setAttribute("disabled", "");
        document.getElementById("time-end-6").setAttribute("disabled", "");
    } else {
        document.getElementById("time-start-6").removeAttribute("disabled");
        document.getElementById("time-end-6").removeAttribute("disabled");
    }
}