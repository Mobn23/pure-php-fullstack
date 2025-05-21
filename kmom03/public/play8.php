<?php
include('../config/config.php');
$title = "Table";
$date = $_SERVER["date"]??date('Y-m-d');

$timestamp = strtotime($date);

$dateStr         = date('Y-m-d', $timestamp);
$monthStr        = date('F', $timestamp);
$monthDaysStr    = date('t', $timestamp);
$weekStr         = date('W', $timestamp);
$dayStr          = date('l', $timestamp); 


// Calculate the time it took to process this page
$timestampFirst = $_SERVER["REQUEST_TIME_FLOAT"];
$timestampLast = microtime(true);
$diff = $timestampLast - $timestampFirst;
$loadTime = round($diff * 1000, 3);

  // Get name of the current pagecontroller
$requestUri = $_SERVER["SCRIPT_NAME"];
$pageController = basename($requestUri);

?>

<link rel="stylesheet" type="text/css" href="../public/css/play8.css">


<h2>Detaljer om requesten med SERVER</h2>

<table>
    <tr>
        <th>Nyckel</th>
        <th>Värde</th>
    </tr>

    <tr>
        <td>SERVER_SOFTWARE</td>
        <td><?= htmlentities($_SERVER['SERVER_SOFTWARE']) ?></td>
    </tr>

    <tr>
        <td>SERVER_ADDR</td>
        <td><?= htmlentities($_SERVER['SERVER_ADDR']) ?></td>
    </tr>

    <tr>
        <td>REQUEST_METHOD</td>
        <td><?= htmlentities($_SERVER['REQUEST_METHOD']) ?></td>
    </tr>

    <tr>
        <td>REQUEST_URI</td>
        <td><?= htmlentities($_SERVER['REQUEST_URI']) ?></td>


    </tr>

    <tr>
        <td> SCRIPT_NAME</td>
        <td><?= htmlentities($_SERVER['SCRIPT_NAME']) ?></td>
    </tr>
</table><br>

<p>Page's loading time is <?=($loadTime)?></p>
<p>Loading page control is <?=($pageController)?></p>
