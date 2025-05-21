<?php

/**
 * Destroy the session
 */
function destroySession(): void
{
    // Unset all of the session variables.
    $_SESSION = array();
    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    // Finally, destroy the session.
    session_destroy();
}

function connectToDatabase(string $dsn): object
{
    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Failed to connect to the database using DSN:<br>'$dsn'<br>";
        throw $e;
    }

    return $db;
}

/**
 * Set the flash message.
 * 
 * @return void.
 */
function setFlashMessage(
    string $type,
    string $message
): void {
    $flashMessage = <<<EOD
    <div class="$type">
        <p>$message</p>
    </div>
    EOD;
    $_SESSION["flashMessage"] = $flashMessage;
}

/**
* Get the flash message and return it, if any.
*
* return string with flash message, empty string of no message exists-
*/
function getFlashMessage(): string
{
    $flashMessage = $_SESSION["flashMessage"] ?? "";
    unset($_SESSION["flashMessage"]);

    return $flashMessage;
}

function getDsnToDatabaseFile(string $filename) : string
{
    $fileName = "../db$filename";
    if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
        $fileName = "C:\\db\\$fileName";
    }
    $dsn = "sqlite:$fileName";
    return $dsn;
}
