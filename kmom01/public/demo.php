<?php
include('../config/config.php');

// Set the title of the page
$title = 'Om mig själv';

// Set the timezone to use
date_default_timezone_set('Europe/Stockholm');

// The date of today
$today = date('Y-m-d H:i:s');

// Name of the week day
$weekday = date('l');

include('../view/header.php');
?>


<main>
        <h1>Demo</h1>
        <p>Här leker runt med nya konstruktioner.</p>

        <p>Dagens datum är <?= $today ?> och idag är det <?= $weekday ?>.</p>
</main>



<?php include('../view/footer.php') ?>
