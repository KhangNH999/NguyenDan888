const getEndCountdown = document.getElementById('count-down');
console.log(getEndCountdown);
const myArrayEnd = getEndCountdown.innerText.split(":");

const setDateClose = myArrayEnd[0];
const setMonthClose = myArrayEnd[1] - 1;
const setYearClose = myArrayEnd[2];
const setHoursClose = myArrayEnd[3];
const setMinutesClose = myArrayEnd[4];
const setSecondsClose = myArrayEnd[5];

function formatTime(time) {
    return time < 10 ? (`0${time}`) : time;
}

var myFunc = setInterval(function(){

    const now = new Date();
    const timeEnd = new Date(setYearClose, setMonthClose, setDateClose, setHoursClose, setMinutesClose, setSecondsClose)
    var timeLeft = timeEnd - now;
    
    var days = formatTime(Math.floor((timeLeft / (1000 * 60 * 60 * 24))));
    var hours = formatTime(Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
    var minutes = formatTime(Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60)));
    var seconds = formatTime(Math.floor((timeLeft % (1000 * 60)) / 1000));

    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("mins").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;

    if(timeLeft < 0) {
        clearInterval(myFunc);
        document.getElementById("show-count-down").innerHTML = "Hết hạn tham gia";
    }

}, 1000);
