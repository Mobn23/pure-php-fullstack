<?php
include('../config/config.php');
include('../view/header.php');
$title = 'Guess the name';


$namesAndMeanings = [
    "Abraham" => "Bibliskt namn med bet. fader till många",
    "Amalia" => "Latiniserad form av gotiska namn på Amal- verksam.",
    "Amanda" => "Latinskt namn med bet. den älskvärda"];

$randomName = array_rand($namesAndMeanings);
$_SESSION['correctName'] = $randomName;

// Display the name explanation
echo "<h1>Guess the Name:</h1>";
echo "<p>Explanation: " . $namesAndMeanings[$randomName] . "</p>";

// Create a form for the user's guess
echo "<form action='guessname_process.php' method='POST'>";
echo "<label for='guess'>Enter your guess:</label>";
echo "<input type='text' id='guess' name='guess' required>";
echo "<button type='submit'>Guess</button>";
echo "</form>";
?>

<?php include('../view/footer.php');