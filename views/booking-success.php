<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <?php require(VIEW_PATH . 'template/header.php'); ?>
    <title>Reservasi Success</title>
</head>

<body>
    <div style="width:800px; margin:0 auto; padding-top: 2rem;">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h3>Countdown</h3>
                    <h2 id="antrian">0</h2>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<?php require(VIEW_PATH . 'template/footer.php'); ?>
<script>
    function getParameterByName(name, url = window.location.href) {
        // name = name.replace(/[\[\]]/g, '\\$&');
        // var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        //     results = regex.exec(url);
        // if (!results) return null;
        // if (!results[2]) return '';
        // return decodeURIComponent(results[2].replace(/\+/g, ' '));
        return "<?=$time?>";
    }
</script>
<script>
    // Set the date we're counting down to
    var date = new Date();
    var countDownDate = new Date(new Intl.DateTimeFormat('en-US', {
        month: 'long'
    }).format(date) + ' ' + date.getDate() + ',' + date.getFullYear() + ' ' + getParameterByName('time')).getTime();
    // console.log(new Date(countDownDate).getTime());

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("antrian").innerHTML = hours + "j " +
            minutes + "m " + seconds + "d ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            window.location.href = "<?=BASE_URL?>booking"
            // document.getElementById("antrian").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>

</html>
