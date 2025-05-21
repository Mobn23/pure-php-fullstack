<?php

include("../config/config.php");
$title = 'User profile data';
include("../view/header.php");

// Get details from the query string
$user = $_GET["user"] ?? null;
// Exit the script if the id is missing
if (!$user) {
    die("Du måste skicka in en ?user=xxxx");
}
// Connect to the database
$fileName = "..pdo/db/db.sqlite";
if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
    $fileName = "C:\db\db.sqlite";
}
$fileName = "../pdo/db/user.sqlite";
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);

// Create the SQL statement
$sql = <<<EOD
SELECT
    rowid,
    *
FROM user
WHERE
    acronym = ?
;
EOD;

// Prepare the SQL statement so it can be executed
$stmt = $db->prepare($sql);

// Execute the SQL statement towards the database
$args = [$user];
$stmt->execute($args);

// Get the resultset
$res = $stmt->fetch();

// Include the view that shows the row
//echo "<pre>", print_r($res, true), "</pre>";

include("../view/crud/profile.php");
