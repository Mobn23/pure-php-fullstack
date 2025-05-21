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

<?php include('../view/crud/photocal.php'); ?>
<?php include('../view/footer.php'); ?>
