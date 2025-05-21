<?php

include('../view/header.php');

include("../src/functions.php");

$name = $_GET["q"] ?? null;
include("../view/search_engin.php");

if (!$name) {
    die("Du måste fylla i querysträngen<br >" . file_get_contents('../view/footer.php'));
} else {
    
}


// Connect to the database
$fileName = "../pdo/db/db.sqlite";
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);

// Create SQL statements for searching in 'namnlista' and 'namnbetydelse' tables
$sql1 = <<<EOD
SELECT
    rowid,
    *
FROM namnlista
WHERE
    namn LIKE ?
;
EOD;

$sql2 = <<<EOD
SELECT
    rowid,
    *
FROM namnbetydelse
WHERE
    namn LIKE ?
;
EOD;

// Prepare and execute the SQL statements
$stmt1 = $db->prepare($sql1);
$stmt1->execute(["%$name%"]);

$stmt2 = $db->prepare($sql2);
$stmt2->execute(["%$name%"]);

// Fetch the results
$res1 = $stmt1->fetchAll();
$res2 = $stmt2->fetchAll();

// Combine results from both tables
$results = array_merge($res1, $res2);

// Check if any results were found
if (count($results) > 0) {
    echo "<ul class='search-res'>";
    foreach ($results as $result) {
        echo "<li class='search-ress'>";
        echo "<h2 class='res-title'><a class='result-url' href='name.php?name={$result['namn']}'>{$result['namn']}</a></h2>";
        // Add the description from your data
        echo "<p class='res-description'>Your description here</p>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Ingen information om namnet kunde hittas</p>";
}

?>

<?php include('../view/footer.php');
