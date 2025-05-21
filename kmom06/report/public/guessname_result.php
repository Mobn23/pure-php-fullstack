<?php

include('../config/config.php'); // Include the config file if necessary


if (isset($_SESSION['flashMessage'])) {
    echo "<p>" . $_SESSION['flashMessage'] . "</p>";
    unset($_SESSION['flashMessage']);
}

// Link to start over with a new name explanation
echo "<a href='guessname.php'>Try Again</a>";
