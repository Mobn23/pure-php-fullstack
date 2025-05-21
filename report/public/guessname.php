<?php
include('../config/config.php');
$title = 'Guess the name';
include('../view/header.php');


$names = getNameDaysByNameFull();
$namesMeanings = getNameExplanation();

// Check if the array is not empty before proceeding
if (!empty($names)) {
    $randomName = array_rand($names);
    $_SESSION['correctName'] = $randomName;
    echo "Debug: $randomName ";
        // Display the name explanation
    if (isset($namesMeanings[$randomName])) {
        echo "<p>Explanation: " . $namesMeanings[$randomName]. "</p>";
    } else {
        echo "<p>Explanation not available for the selected name.</p>";
    }

    // Create a form for the user's guess
    echo "<form action='guessname_process.php' method='POST'>";
    echo "<label for='guess'>Enter your guess:</label>";
    echo "<input type='text' id='guess' name='guess' required>";
    echo "<button type='submit'>Guess</button>";
    echo "</form>";
} else {
    // Handle the case when no data is retrieved from the database
    echo "<p>No data available</p>";
}
?>

<?php include('../view/footer.php');