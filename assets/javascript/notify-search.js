//search
var inputs = document.getElementById("search-btns");
inputs.onclick = function() {
    document.getElementById("input-search").style.display = "inline-block";
}
$("#input-search").blur(function() {
    document.getElementById("input-search").style.display = "none";
});

//notify
$("#notification").click(function() {
    $("#test-container").show();
});
$("#ti-closes").click(function() {
    $("#test-container").hide();
});


