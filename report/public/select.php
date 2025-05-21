<?php
include("../config/config.php");
$title = 'Show all users';
include("../view/header.php");

$dsn = getDsnToDatabaseFile("user.sqlite");
$db = connectToDatabase($dsn);

//Skapa SQL-satsen.
// Create the SQL statement
$sql = <<<EOD
SELECT
    rowid,
    *
FROM namnlista
WHERE
    namn = ?
    OR namn = ?
    OR namn = ?
;
EOD;


//Förbereda SQL-satsen så att den kan köras.
$stmt = $db->prepare($sql);
//Kör SQL-satsen mot databasen.
$args = ["Mikael", "Carina", "Magnus"];
$stmt->execute($args);
//Hämta resultatet, kallas också “resultset”, från databasfrågan.
$res = $stmt->fetchAll();

include("../view/crud/select.php");
