<?php
$user=htmlentities($_SESSION["user"] ?? "");
?>

<!DOCTYPE html>
<html lang="sv">

    <head>
        <meta charset="utf-8">
        <meta name="referrer" content="unsafe-url">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?> | Me-sidan</title>
        <link rel="shortcut icon" href="img/logo.png">
        <link rel="stylesheet" href="css/style.css">
    </head> 
<body>

<nav class ="navbar">
    <ul>
        <li><a href="me.php">Me</a></li>
        <li><a href="report.php">Report</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="demo.php">Demo</a></li>
        <li><a href="today.php">Today</a></li>
        <li><a href="play.php">PHP</a></li>
        <li><a href="friday.php">Friday</a></li>
        <li><a href="month.php">Month</a></li>
        <li><a href="datastructure.php">Arrays</a></li>
        <li><a href="session.php">Session</a></li>
        <li><a href="photocal.php">Photocal</a></li>
        <li><a href="guessname.php">Guessname</a></li>
        <li><a href="search.php">Search</a></li>
        
        <li><a href="users.php">Users</a></li>
        

        <?php if ($user): ?>
            <li><a href="user.php">User (<?= $user?>)</a></li>
            <li><a href="logout_process.php">Log out </a></li>
        <?php else : ?>
            <li><a href="login.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>

<header class="header">
    <img class="logo" src="img/logo.png" alt ="my logo">
    <span class="title">Kursen webtec</span>
    <span class="subtitle">Min rapportsida</span>
</header>
