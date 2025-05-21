<?php
include("../config/config.php");
$title = 'Connect to database';
include("../view/header.php");


$dsn=getDsnToDatabaseFile("db.sqlite");
$db=connectToDatabase($dsn);

?><h1>Connext to database</h1>
<pre><?=var_dump($db)?></prev>;
