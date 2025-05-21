<?php

include('../config/config.php');

if (isset($_POST['guess'])) {
    $userGuess = $_POST['guess'];
    $correctName = $_SESSION['correctName'];

    if (strcasecmp($userGuess, $correctName) === 0) {
        $_SESSION['flashMessage'] = "Correct! The name is: $correctName";
    } else {
        $_SESSION['flashMessage'] = "Incorrect. The correct name is: $correctName";
    }
}

header("Location: guessname_result.php");
exit;
