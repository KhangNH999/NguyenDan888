<div class="effect-btn" style=" float: right;">
    <div class="form-check form-switch" style="margin-top: 5px;">
        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
            onclick="clickBtnEffect();">
        <label class="form-check-label" for="flexSwitchCheckChecked">❆</label>
    </div>
    <div class="snowflakes" id="snowflake" aria-hidden="true">
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
    </div>
</div>
<script>
function clickBtnEffect() {
    if (!(document.getElementById('flexSwitchCheckChecked').hasAttribute('checked'))) {
        document.getElementById('flexSwitchCheckChecked').setAttribute('checked', '');
        localStorage.setItem('snow', 'true');
    } else {
        document.getElementById('flexSwitchCheckChecked').removeAttribute('checked');
        localStorage.setItem('snow', 'false');
    }
}

setInterval(function() {
    var snow = localStorage.getItem('snow');
    if (snow === 'true') {
        document.getElementById('flexSwitchCheckChecked').setAttribute('checked', '');
        var elems = document.getElementsByClassName('snowflakes');
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = 'block';
        }
    } else if (snow === 'false') {
        document.getElementById('flexSwitchCheckChecked').removeAttribute('checked');
        var elems = document.getElementsByClassName('snowflakes');
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = 'none';
        }
    }
}, 500);
</script>