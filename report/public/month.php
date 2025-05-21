<?php
include('../config/config.php');
$title = 'Month';
include('../view/header.php');

if (isset($_GET['Prev'])) {
    $NDate = $_GET['Prev'];
} elseif (isset($_GET['Next'])) {
    $NDate = $_GET['Next'];
} else {
    $NDate = $_GET['date'] ?? date('Y-m-d');
}

$timestamp = strtotime($NDate);

$year = date('Y', $timestamp);
$date = date('d', $timestamp);
$month = date('m', $timestamp);
$monthDays = date('t', $timestamp);
$monthName = date('F', $timestamp);
$dayNum = date('N', $timestamp);
$weekday = date('l', $timestamp);

$dateStr = date('Y-m-d', $timestamp);
$firstDateInMonth = date('Y-m-01', $timestamp);
$lastDateInMonth = date("Y-m-$monthDays", $timestamp);

$timestampPreviousMonth = strtotime($firstDateInMonth . "-1 day");
$timestampNextMonth = strtotime($lastDateInMonth . "+1 day");

$PrevMonth = date('Y-m-01', $timestampPreviousMonth);
$NextMonth = date('Y-m-01', $timestampNextMonth);

$calStr = "";
$aTimestamp = strtotime($firstDateInMonth);

$weekNumber = 1;

for ($i = 1; $i <= $monthDays; $i++) {
    $aDate = date('d', $aTimestamp);
    $aWeekday = date('l', $aTimestamp);
    $dayOfYear = date('z', $aTimestamp) + 1;

    if ($aWeekday === 'Monday') { // Check if it's the first day of the week
        $calStr .= "<tr>\n";
        $calStr .= "<td>$aDate</td>\n";
        $calStr .= "<td>$aWeekday</td>\n";
        $calStr .= "<td>Week $weekNumber / $dayOfYear</td>\n"; // Display the week number
        $calStr .= "</tr>\n";

        $weekNumber++;
    } elseif ($aWeekday === 'Sunday') { // Check if it's Sunday
        $calStr .= "<tr>\n";
        $calStr .= "<td class='sunday'>$aDate</td>\n";
        $calStr .= "<td class='Dsunday'>$aWeekday</td>\n";
        $calStr .= "<td>$dayOfYear</td>\n";
        $calStr .= "</tr>\n";

        $weekNumber++;
    } else {
        $calStr .= "<tr>\n";
        $calStr .= "<td>$aDate</td>\n";
        $calStr .= "<td>$aWeekday</td>\n";
        $calStr .= "<td>$dayOfYear</td>\n";
        $calStr .= "</tr>\n";
    }

    $aTimestamp = strtotime("+1 day", $aTimestamp);

    if (date('N', $aTimestamp) == 1) {
        $weekNumber = date('W', $aTimestamp); // Update the week number
    }
}
?>
<form action="month.php" method="get">
    <p>
        Datum:
        <input type="date" value="<?= $dateStr ?>" name="date">
    </p>
    <p>
        <input type="submit" value="Skicka" name="doit">
        <input type="reset" value="Rensa">
    </p>
</form>

<div>
    <?php if ($dateStr) : ?>
        You have submitted the date: <code><?= $dateStr ?></code>.
    <?php endif; ?>
</div>

<form action="month.php" method="get">
    <p>
        <input type="hidden" name="Prev" value="<?= $PrevMonth ?>">
        <input type="submit" value="Prev Month">
    </p>
</form>

<form action="month.php" method="get">
    <p>
        <input type="hidden" name="Next" value="<?= $NextMonth ?>">
        <input type="submit" value="Next Month">
    </p>
</form>

<h1> Månadskalender</h1>

<table class='table'>
    <tr>
        <td colspan="3"><?= $monthName ?> <?= $year ?></td>
    </tr>
    <?= $calStr ?>
</table><br>

<?php include('../view/footer.php') ?>
