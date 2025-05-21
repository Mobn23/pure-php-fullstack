<?php
include('../config/config.php');

$title = 'Delete user';

include('../view/header.php');

$user = htmlentities($_SESSION["user"] ?? "");
?>

<?=getFlashMessage()?>

<form method="post" action="delete_user_process.php">
    <fieldset>
        <legend>Delete user</legend>

        <p>
            <input type="submit" name="login" value="Delete user'<?=$user?>'">
        </p>
    </fieldset>
</form>

<?php include("../view/footer.php");
