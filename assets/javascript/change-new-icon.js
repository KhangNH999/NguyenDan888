const getNewIcon = document.getElementsByClassName("new");
const getTime = document.getElementsByClassName("timeset-default");
const getTimeNow = new Date();
let pattern = /(\d{2})\-(\d{2})\-(\d{4})/;
function formatDate(date) {
    var d = new Date(date),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = "0" + month;
    if (day.length < 2) day = "0" + day;

    return [day, month, year].join("-");
}
let st1 = formatDate(getTimeNow);
let dt1 = new Date(st1.replace(pattern, "$3-$2-$1"));
for (let i = 0; i < getNewIcon.length; i++) {
    let st2 = getTime[i].textContent;
    let dt2 = new Date(st2.replace(pattern, "$3-$2-$1"));
    let result = Math.floor((dt1 - dt2) / (24 * 60 * 60 * 1000));
    if (result > 13) {
        getNewIcon[i].style.background = "#ab296a";
        getNewIcon[i].innerHTML = "★";
    } else if (result > 8) {
        getNewIcon[i].style.background = "#1C6CC1";
        getNewIcon[i].innerHTML = result + " Day";
    } else if (result > 4) {
        getNewIcon[i].style.background = "#FFB829";
        getNewIcon[i].innerHTML = result + " Day";
    } else {
        getNewIcon[i].style.background = "#F44A4F";
        getNewIcon[i].innerHTML = "Mới";
    }
}
