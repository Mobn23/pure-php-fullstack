<?php

include("../config/config.php");

$user      = $_SESSION["user"] ?? "";
$password1 = $_POST["password1"] ?? "";
$password2 = $_POST["password2"] ?? "";

// Check that passwords match
if ($password1 !== $password2) {
    setFlashMessage("warning", "The passwords did not match!");
    header("Location: change_password.php");
    exit();
}

// Generate a new password hash from the new password string
$hash = password_hash($password1, PASSWORD_DEFAULT);

$fileName = "../pdo/db/user.sqlite";
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);


$sql = <<<EOD
UPDATE user SET
    password = ?
WHERE 
    acronym = ?
;
EOD;


$stmt = $db->prepare($sql);
$args = [$hash, $user];
$stmt->execute($args);



setFlashMessage("success", "Password was updated for $user!");
header("Location: user.php");
exit();

include("../view/crud/users.php");

include("../view/footer.php");