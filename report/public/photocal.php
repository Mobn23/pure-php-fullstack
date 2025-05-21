<?php
include('../config/config.php');
$title = 'Calendar';
include('../view/header.php');

if (isset($_GET['date'])) {
    $selectedDate = date('Y-m-d', strtotime($_GET['date']));
} else {
    $selectedDate = date('Y-m-d');
}

$year = date('Y', strtotime($selectedDate));
$month = date('n', strtotime($selectedDate));

$monthImages = [
    1 => './img/bth1.jpeg',
    2 => './img/bth2.jpg',
    3 => './img/bth3.jpg',
    4 => './img/bth4.jpg',
    5 => './img/bth5.jpeg',
    6 => './img/bth6.jpg',
    7 => './img/bth7.jpeg',
    8 => './img/bth8.jpg',
    9 => './img/bth9.jpg',
    10 => './img/bth10.jpg',
    11 => './img/bth11.jpeg',
    12 => './img/bth.jpeg'
];

$imageURL = $monthImages[$month] ?? 'default.jpg';
echo '<img src="' . $imageURL . '" alt="' . date('F', strtotime("{$year}-{$month}-01")) . ' Image">';

$firstDay = strtotime("{$year}-{$month}-01");
$dayOfWeek = date('N', $firstDay);
$numDaysPrevMonth = $dayOfWeek - 1;
$lastDayPrevMonth = strtotime("-{$numDaysPrevMonth} days", $firstDay);

$lastDay = strtotime("last day of {$year}-{$month}");
$lastDayOfWeek = date('N', $lastDay);
$numDaysNextMonth = 7 - $lastDayOfWeek;

echo '<h1>' . $year . '</h1>';
echo '<a href="photocal.php?date=', date('Y-m-d', strtotime('-1 month', strtotime($selectedDate))), '"><button>Previous Month</button></a>';
echo '<a href="photocal.php?date=', date('Y-m-d', strtotime('+1 month', strtotime($selectedDate))), '"><button>Next Month</button></a>';
echo '<table class="tab">';
echo '<caption>' . date('F', strtotime("{$year}-{$month}-01")) . '</caption>';
echo '<tr>';
echo '<th>Mon</th>';
echo '<th>Tue</th>';
echo '<th>Wed</th>';
echo '<th>Thu</th>';
echo '<th>Fri</th>';
echo '<th>Sat</th>';
echo '<th class="sunday">Sun</th>';
echo '</tr>';
echo '<tr>';

for ($i = $numDaysPrevMonth; $i > 0; $i--) {
    echo '<td>', date('j', $lastDayPrevMonth), '<br>', date('z', $lastDayPrevMonth) + 1, '</td>';
    $lastDayPrevMonth = strtotime('+1 day', $lastDayPrevMonth);
}

for ($day = 1; $day <= date('j', $lastDay); $day++) {
    if ($dayOfWeek == 1) {
        $weekNumber = date('W', strtotime("{$year}-{$month}-{$day}"));
        echo '</tr><tr>';
    }
    $class = ($dayOfWeek == 7) ? ' class="sunday"' : '';
    echo '<td', $class, '>', $day, '<br>', ($dayOfWeek == 1) ? 'Week ' . $weekNumber : '', '<br>', date('z', strtotime("{$year}-{$month}-{$day}")) + 1, '</td>';
    $dayOfWeek = ($dayOfWeek % 7) + 1;
}

// Calculate the first day of the next month
$firstDayNextMonth = strtotime("first day of {$year}-{$month} +1 month");

// Loop to display the days from the next month
for ($i = 1; $i <= $numDaysNextMonth; $i++) {
    echo '<td>', date('j', $firstDayNextMonth), '<br>', date('z', $firstDayNextMonth) + 1, '</td>';
    $firstDayNextMonth = strtotime('+1 day', $firstDayNextMonth);
}

echo '</tr>';
echo '</table>';

include('../view/footer.php');
?>
