
<div class="well row blueBack" style="overflow: auto; text-align: center;">
    <h1 style="font-family: 'Great Vibes', cursive;">Countdown</h1>
    <div id="timer"><h2 id="days"></h2><p>Days</p></div>
    <div id="timer"><h2 id="hours"></h2><p>Hours</p></div>
    <div id="timer"><h2 id="minutes"></h2><p>Minutes</p></div>
    <div id="timer"><h2 id="seconds"></h2><p>Seconds</p></div>
    <p id="countdown-message" style="margin-top: 20px;"></p>
</div>


<script>
    var countDownDate = new Date("Jun 9, 2018 16:00:00").getTime();

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        var days = Math.abs(Math.floor(distance / (1000 * 60 * 60 * 24)));
        var hours = Math.abs(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
        var minutes = Math.abs(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)));
        var seconds = Math.abs(Math.floor((distance % (1000 * 60)) / 1000));

        if (distance < 0) {
            days = days - 1;
            hours = hours - 1;
            minutes = minutes - 1;
            seconds = seconds - 1;
        }

        document.getElementById("days").innerHTML = days;
        document.getElementById("hours").innerHTML = hours;
        document.getElementById("minutes").innerHTML = minutes;
        document.getElementById("seconds").innerHTML = seconds;

        if (distance > 0) {
            document.getElementById("countdown-message").innerHTML = "Can't wait!";
        }
        else{
            document.getElementById("countdown-message").innerHTML = "Let the ceremony begin!";
        }
    }, 1000);
</script>