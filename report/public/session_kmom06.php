<?php
include('../config/config.php');

$title = 'Sessioner';

include('../view/header.php');

$sessionName = session_name();
$sessionId = session_id();
$sessionCookie = session_get_cookie_params();

?>


<h1><?= $title ?></h1>

<?= getFlashMessage() ?>

<p><a href="session_write.php">Write to the session!</a></p>
<p><a href="session_destroy.php">Destroy the session</a></p>
<p><a href="flash_proccess.php?type=success&amp;message=Successful!">Set flash message success</a></p>
<p><a href="flash_proccess.php?type=warning&amp;message=Failure!">Set flash message warning</a></p>

<p>Debugga sessionen.</p>

<p>Name of session: '<?= $sessionName ?>'</p>

<p>Id of this session: '<?= $sessionId ?>'</p>

<p>Details of the session cookie:</p>
<pre><?= print_r($sessionCookie, 1) ?></pre>

<p>Content of the $_SESSION variable.</p>
<pre><?= var_dump($_SESSION) ?></pre>
