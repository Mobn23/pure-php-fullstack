<?php
includ('../config/config.php');

$date = $_GET["date"] ?? date('Y-m-d');
$timestamp = strtotime($date);

$weekday = [
    "Måndag",
    "Tisdag",
    "Onsdag",
    "Torsdag",
    "Fredag",
    "Lördag",
    "Söndag"
];

$dayNumToday = date("N",$timestamp);
//echo $dayNumToday;
$dayToday = $weekday[3 - 1];

$monthName = [];
$monthName[1] = "Januari";
$monthName[] = "Februari";
$monthName[] = "Mars";
$monthName[] = "April";
$monthName[] = "Maj";
$monthName[] = "Juni";
$monthName[] = "Juli";
$monthName[] = "Augusti";
$monthName[] = "September";
$monthName[] = "Oktober";
$monthName[] = "November";
$monthName[] = "December";


$monthNumToday = date("n", $timestamp);

$monthToday = $monthName[$monthNumToday];

$monthNames = implode(", ", $monthName);

?><h1>Lek med arrayer</h1>

<p>Idag är det <strom><?=$dayToday?></strom> i månden <?= $monthToday?>.</p>
<p>Månadera äro <?=$monthNames?>

<pre>
<?=print_r($monthName, True)?>
</pre>

<pre>
<?=var_dump($monthName)?>
</pre>
