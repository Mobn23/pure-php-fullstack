<?php

include("../config/config.php");

$acronym = $_POST["acronym"] ?? "";
$password = $_POST["password"] ?? "";


$fileName = "../pdo/db/user.sqlite";
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);


$sql = <<<EOD
SELECT
    password
FROM user
WHERE 
    acronym = ?
;
EOD;


$stmt = $db->prepare($sql);
$args = [$acronym];
$stmt->execute($args);
$res = $stmt->fetch();


$hash = $res["password"];
$success = password_verify($password, $hash);

if (!$success) {

    setFlashMessage("warning", "Login failed, wrong user or password!");
    header("Location: login.php");
    exit();
}


$_SESSION["user"] = $acronym;


setFlashMessage("success", "Login successful, welcome $acronym!");
header("Location: user.php");
exit();

include("../view/crud/users.php");

include("../view/footer.php");