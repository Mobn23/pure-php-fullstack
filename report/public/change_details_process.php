<?php

include("../config/config.php");

$user      = $_SESSION["user"] ?? "";
$avatar    = $_POST["avatar"]  ?? "";
$name      = $_POST["name"]    ?? "";
$signature    = $_POST["signature"]  ?? "";

$avatar = filter_var($avatar, FILTER_SANITIZE_STRING);
$name = filter_var($name, FILTER_SANITIZE_STRING);
$signature = filter_var($signature, FILTER_SANITIZE_STRING);

$fileName = "../pdo/db/user.sqlite";
$dsn = "sqlite:$fileName";
$db = connectToDatabase($dsn);


try {
    $sql = <<<EOD
    UPDATE user SET
        avatar = ?,
        name = ?,
        signature = ?
    WHERE 
        acronym = ?;
    EOD;

    $stmt = $db->prepare($sql);
    $args = [$avatar, $name, $signature, $user];
    $stmt->execute($args);

    // Flash message (assuming you have the function implemented)
    setFlashMessage("success", "profile has been updated for $user!");

    // Redirect to user.php
    header("Location: user.php");
    exit();
} catch (Exception $e) {
    // Handle database errors
    echo "An error occurred: " . $e->getMessage();
}