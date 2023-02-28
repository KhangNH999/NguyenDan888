
const myArrayEnd = [23, 59, 59];

const setHoursClose = myArrayEnd[0];
const setMinutesClose = myArrayEnd[1];
const setSecondsClose = myArrayEnd[2];

function formatTime(time) {
    return time < 10 ? (`0${time}`) : time;
}

var myFunc = setInterval(function () {
    const getDayNow = new Date().getDay();
    const getMonthNow = new Date().getMonth();
    const getYearNow = new Date().getYear();
    const getHoursNow = new Date().getHours();
    const getMinutesNow = new Date().getMinutes();
    const getSecondsNow = new Date().getSeconds();

    const timeEnd = new Date(getYearNow, getMonthNow, getDayNow, setHoursClose, setMinutesClose, setSecondsClose);

    var now = new Date(getYearNow, getMonthNow, getDayNow, getHoursNow, getMinutesNow, getSecondsNow);

    var timeLeft = timeEnd - now;

    var hours = formatTime(Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
    var minutes = formatTime(Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60)));
    var seconds = formatTime(Math.floor((timeLeft % (1000 * 60)) / 1000));

    document.getElementById("hours").innerHTML = hours;
    document.getElementById("mins").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;

}, 1000);


