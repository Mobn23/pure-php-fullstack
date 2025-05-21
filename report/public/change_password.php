<?php
include('../config/config.php');

$title = 'Change password';

include('../view/header.php');

?>

<?=getFlashMessage()?>

<form method="post" action="change_password_process.php">
    <fieldset>
        <legend>Change password</legend>

        <p>
            <label>Password:
                <input type="password" name="password1" placeholder="Enter the password">
            </label>
        </p>

        <p>
            <label>Password(again):
                <input type="password" name="password2" placeholder="Repeat your password">
            </label>
        </p>

        <p>
            <input type="submit" name="doit" value="change">
        </p>
    </fieldset>
</form>

<?php include("../view/footer.php");
