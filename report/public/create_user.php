<?php
include('../config/config.php');

$title = 'create user';

include('../view/header.php');

?>

<?=getFlashMessage()?>

<form method="post" action="create_user_process.php">
    <fieldset>
        <legend>Create user</legend>

        <p>
            <label>Acronym:<br>
                <input type="text" name="acronym" placeholder="Enter your acronym">
            </label>
        </p>

        <p>
            <label>Password:<br>
                <input type="password" name="password1" placeholder="Enter the password">
            </label>
        </p>

        <p>
            <label>Password(again):<br>
                <input type="password" name="password2" placeholder="Repeat your password">
            </label>
        </p>

        <p>
            <input type="submit" name="login" value="Create user">
        </p>
    </fieldset>
</form>

<?php include("../view/footer.php");
