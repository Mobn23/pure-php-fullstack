<?php
include('../config/config.php');
$title = 'month';
include('../view/header.php');

if (isset($_GET['Prev'])) {
    $newDate = $_GET['Prev'];
} elseif (isset($_GET['Next'])) {
    $newDate = $_GET['Next'];
} else {
    $newDate = $_GET['date'] ?? date('Y-m-d');
}

$timestamp = strtotime($newDate);

$year      =date('Y', $timestamp);
$date      =date('d',$timestamp);
$month     =date('m',$timestamp);
$monthDays =date('t',$timestamp);
$monthName =date('F',$timestamp);
$dayNum    =date('N',$timestamp);
$weekday   =date ('l',$timestamp);

$dateStr          =date('Y-m-d',$timestamp);
$firstDateInMonth =date('Y-m-01',$timestamp);
$lastDateInMonth  =date("Y-m-$monthDays",$timestamp);

$timestampPreviousMonth =strtotime($firstDateInMonth ."- 1 day");
$timestampNextMonth     =strtotime($lastDateInMonth ."+ 1 day");

$PrevMonth = date('Y-m-01',$timestampPreviousMonth);
$NextMonth = date('Y-m-01',$timestampNextMonth);


$calStr = "";
$aTimestamp = strtotime($firstDateInMonth);
for ($i = 1; $i <= $monthDays; $i++ ){

$aDate = date('d', $aTimestamp);
$aWeekday = date('l', $aTimestamp , );
$dayOfYear = date('z', $aTimestamp) + 1;
$weekNumber = date('W', $aTimestamp); 

if ($aWeekday === 'Sunday') {
    $calStr .= "<tr>\n";
    $calStr .= "<td class='sunday'>$aDate</td>\n";
    $calStr .= "<td class='Dsunday'>$aWeekday</td>\n";
    $calStr .= "<td>$dayOfYear</td>\n";
    $calStr .= "<td></td>\n";
    $calStr .= "</tr>\n";
} else {
    $calStr .= "<tr>\n";
    if ($aWeekday === 'Monday') {
        $calStr .= "<td>$aDate<br> V $weekNumber</td>\n";
    } else {
        $calStr .= "<td>$aDate</td>\n";
    }
    $calStr .= "<td>$aWeekday</td>\n";
    $calStr .= "<td>$dayOfYear</td>\n";
    $calStr .= "<td></td>\n";
    $calStr .= "</tr>\n";
}

$aTimestamp = strtotime("+ 1 day", $aTimestamp);

if (date('N', $aTimestamp) == 1) {
    $weekNumber = date('W', $aTimestamp);
}
}
?>

<form action="month.php" method="get">
<p>
        Datum:
        <input type="date" value="<?= $dateStr ?>" name="date" >
</p>
<p>
        <input type="submit" value="Skicka" name="doit">
        <input type="reset"  value="Rensa">
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

<div class= 'mkalander'>
<h1> Månadskalender</h1>
    </div>

<table class='table'>
    <tr>
        <td colspan = "4"><?=$monthName  ?> <?= $year ?></td>
    </tr>
    <?= $calStr ?>
</table><br>
<?php include('../view/footer.php') ?>
