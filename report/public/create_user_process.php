<?php

include("../config/config.php");

$acronym   = $_POST["acronym"]   ?? "";
$password1 = $_POST["password1"] ?? "";
$password2 = $_POST["password2"] ?? "";


if (!$acronym) {
    setFlashMessage("warning", "You must enter an acronym!");
    header("Location: create_user.php");
    exit();
}

// Check that passwords match
if ($password1 !== $password2) {
    setFlashMessage("warning", "The passwords did not match!");
    header("Location: create_user.php");
    exit();
}

// Generate a new password hash from the new password string
$hash = password_hash($password1, PASSWORD_DEFAULT);

$fileName = "../pdo/db/user.sqlite";
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);


$sql = <<<EOD
INSERT INTO user
    (acronym, name, password, role, avatar, signature)
VALUES
    (?,?,?,?,?,?)
;
EOD;


$stmt = $db->prepare($sql);
$args = [$acronym, null, $hash, 'user', null, null];
$stmt->execute($args);

// Close the database connection
$db = null;

setFlashMessage("success", "User $acronym was created!");
header("Location: login.php");
exit();

include("../view/crud/users.php");

include("../view/footer.php");
