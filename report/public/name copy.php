<?php
include("../src/functions.php");

$name = $_GET["name"] ?? null; 
include("../view/query_message.php");



if (!$name) {
    die("Du måste fylla i querysträngen");
}

if ($name) {

 // Connect to the database
    $fileName = "../pdo/db/db.sqlite";
    $dsn = "sqlite:$fileName";
    $db = connectToDatabase($dsn);



  // Create the first SQL statement for the 'namnlista' table
$sql1 = <<<EOD
SELECT
    rowid,
    *
FROM namnlista
WHERE
    namn LIKE ?
;
EOD;

// Create the second SQL statement for the 'namnbetydelse' table
$sql2 = <<<EOD
SELECT
    rowid,
    *
FROM namnbetydelse
WHERE
    namn LIKE ?
;
EOD;

$sql3 = <<<EOD
SELECT
    rowid,
    *
FROM efternamn_antal
WHERE
    namn LIKE ?
;
EOD;

// Prepare and execute the first SQL statement
$stmt1 = $db->prepare($sql1);
$stmt1->execute([$name]);


// Prepare and execute the second SQL statement
$stmt2 = $db->prepare($sql2);
$stmt2->execute([$name]);

// Prepare and execute the second SQL statement
$stmt3 = $db ->prepare($sql3);
$stmt3 -> execute([$name]);

// Get the resultsets for both queries
$res1 = $stmt1->fetchAll();
$res2 = $stmt2->fetchAll();
$res3 = $stmt3->fetchAll();


// Check if any results were found in either query
if (count($res1) > 0 || count($res2) > 0 || count($res3) > 0 ) {
    // Display the results
    include("../view/table.php");
    
} else {
    // If no results were found in both queries
    echo "Ingen information om namnet kunde hittas";
}
}
?>