<?php

include('../config/config.php');

$title = 'Update profile';

include('../view/header.php');

?>

<h1>Update profile</h1>

<?= getFlashMessage() ?>

<form method="post" action="change_details_process.php">
    <fieldset>
        <legend>Update profile</legend>

        <p>
            <label>Name:
                <input type="text" name="name">
            </label>
        </p>

        <p>
            <label>Avatar:
                <input type="file" name="avatar" accept="image/*"> 
            </label>
        </p>
        
        <p>
        <label>Signature:
            <input type="text" name="signature">
        </label>
        </p>

        <p>
            <input type="submit" name="doit" value="save">
        </p>
    </fieldset>
</form>
<?php include('../view/footer.php');?>
