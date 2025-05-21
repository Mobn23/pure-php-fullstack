<?php

include("../config/config.php");
$title = 'Show all users';
include("../view/header.php");

$fileName = "../pdo/db/user.sqlite";
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);


$sql = <<<EOD
SELECT
    rowid,
    *
FROM user
;
EOD;


$stmt = $db->prepare($sql);

$args = [];
$stmt->execute($args);
$res = $stmt->fetchAll();

include("../view/crud/users.php");
include('../view/footer.php');