<?php
$user=htmlentities($_SESSION["user"] ?? "");
?>

<!DOCTYPE html>
<html lang="sv">

    <head>
        <meta charset="utf-8">
        <meta name="referrer" content="unsafe-url">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?> | -sidan</title>
        <link rel="shortcut icon" href="img/orig/logo1.png">
        <link rel="stylesheet" href="css/style.css">
    </head> 
<body>

<nav class ="navbar">
    <ul>
        <li><a href="home.php">Hem</a></li>
        <li><a href="articles.php">Artiklar</a></li>
        <li><a href="object.php">Object</a></li>
        <li><a href="about.php">Om</a></li>
        <li><a href="galleri.php">Galleri</a></li>
    </ul>
</nav>

<header class="header">
    <img class="logo" src="img/orig/logo1.png" alt ="my logo">
    <span class="title">Nättraby Vägmuseum</span>
</header>
