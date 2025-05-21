<?php
include('../config/config.php');
$title = 'test';
include('../view/header.php');

if (isset($_GET['Prev'])) {
    $newDate = $_GET['Prev'];
} elseif (isset($_GET['Next'])) {
    $newDate = $_GET['Next'];
} else {
    $newDate = $_GET['date'] ?? date('Y-m-d');
}

$year = date('Y', strtotime($newDate));
$month = date('n', strtotime($newDate));

$timestamp = strtotime($newDate);
$date = date('d', $timestamp);

$timestampPreviousMonth = strtotime($newDate . ' -1 month');
$timestampNextMonth = strtotime($newDate . ' +1 month');
$PrevMonth = date('Y-m-d', $timestampPreviousMonth);
$NextMonth = date('Y-m-d', $timestampNextMonth);

$firstDay = mktime(0, 0, 0, $month, 1, $year);
$dayOfWeek = date('w', $firstDay);
$numDaysPrevMonth = ($dayOfWeek + 6) % 7;
$numDays = date('t', $firstDay);
$monthName = date('F', $firstDay);
$lastDayPrevMonth = mktime(0, 0, 0, $month, 0, $year);
$lastDayPrevMonthNum = date('d', $lastDayPrevMonth);
$startingDay = $lastDayPrevMonthNum - $numDaysPrevMonth + 1;

$monthImages = [
    1 => 'img/bth.jpeg',
    2 => 'img/bth1.jpeg',
    3 => 'img/bth2.jpg',
    4 => 'img/bth3.jpg',
    5 => 'img/bth4.jpg',
    6 => 'img/bth5.jpeg',
    7 => 'img/bth6.jpg',
    8 => 'img/bth7.jpeg',
    9 => 'img/bth8.jpg',
    10 => 'img/bth9.jpg',
    11 => 'img/bth10.jpg',
    12 => 'img/bth11.jpeg',
];

// Update $currentMonth based on the selected date
$currentMonth = $month;

$imageFilename = $monthImages[$currentMonth] ?? 'default.jpg';

// Calculate the number of empty cells needed at the end of the current month
$emptyCells = 7 - (($numDaysPrevMonth + $numDays) % 7);

// Determine the date for the first day of the next month
$firstDayNextMonth = mktime(0, 0, 0, $month + 1, 1, $year);

?>

<img src="<?php echo $imageFilename; ?>" alt="<?php echo date('F'); ?> Image" class="month-image">





<h1 class='ta'><?php echo $monthName, ' ', $year; ?></h1>
<table class='tab'>
    <tr class='th'>
        <th>Mon</th>
        <th>Tue</th>
        <th>Wed</th>
        <th>Thu</th>
        <th>Fri</th>
        <th>Sat</th>
        <th class="sunday">Sun</th>
    </tr>
    <tr>
        <?php
        for ($i = 1; $i <= $numDaysPrevMonth; $i++) {
            echo '<td>', $startingDay, '</td>';
            $startingDay++;
        }

        for ($day = 1; $day <= $numDays; $day++) {
            if ($dayOfWeek == 1) {
                echo '</tr><tr>';
            }

            $class = ($dayOfWeek == 0) ? ' class="sunday"' : '';

            echo '<td', $class, '>', $day, '<br>';

            if ($dayOfWeek == 1) {
                $weekNumber = date('W', mktime(0, 0, 0, $month, $day, $year));
                echo $weekNumber, '<br>';
            }

            $dayNumberInYear = date('z', mktime(0, 0, 0, $month, $day, $year)) + 1;
            echo $dayNumberInYear;

            echo '</td>';

            $dayOfWeek = ($dayOfWeek + 1) % 7;
        }

        // Fill empty cells with days from the next month
        for ($i = 1; $i <= $emptyCells; $i++) {
            echo '<td>', date('j', $firstDayNextMonth), '<br>';
            echo date('W', $firstDayNextMonth), '<br>';
            echo date('z', $firstDayNextMonth) + 1, '</td>';
            $firstDayNextMonth += 86400;
        }
        ?>
    </tr>
</table>



<form action="photocal.php" method="get">
    <p>
        <input type="hidden" name="Prev" value="<?= date('Y-m-d', strtotime('-1 month', strtotime($newDate))) ?>">
        <input type="submit" value="Prev Month">
    </p>
</form>
<form action="photocal.php" method="get">
    <p>
        <input type="hidden" name="Next" value="<?= date('Y-m-d', strtotime('+1 month', strtotime($newDate))) ?>">
        <input type="submit" value="Next Month">
    </p>
</form>

<?php include('../view/footer.php'); ?>