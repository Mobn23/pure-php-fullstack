<?php

include("../config/config.php");

// Get incoming from query string
$type = $_GET["type"];
$message =$_GET["message"];

// Set the flash message and redirect
setFlashMessage($type, $message);
header("Location: session.php");
exit();
