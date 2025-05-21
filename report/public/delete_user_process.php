<?php

include("../config/config.php");

$acronym = $_SESSION["user"]   ?? null;



if (!$acronym) {
    setFlashMessage("warning", "You must be logged in!");
    header("Location: login.php");
    exit();
}

$fileName = "../pdo/db/user.sqlite";
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);

$sql = <<<EOD
DELETE FROM user
WHERE
    acronym = ?
;
EOD;

$stmt = $db->prepare($sql);
$args = [$acronym];
$stmt->execute($args);

//unset ($_SESSION["user"]);

setFlashMessage("success", "User $acronym was deleted!");
header("Location: logout_process.php");
exit();

include("../view/crud/users.php");

include("../view/footer.php");
