<?php

include('../config/config.php');
$title = "Today";
date_default_timezone_set('Europe/Stockholm');
$today = date('y-m-d h:i:s');
$weekday = date('l');
$week_number = date('W');
include('../view/header.php');

?>

<main>
    <h2>Today is</h2><h1><em> <?=$weekday?></em> </h1>
    <p><strong><?=$today?></strong></p>
    <p><em>Week number</em>: <?=$week_number?></p>
</main>

<?php include('../view/footer.php') ?>
