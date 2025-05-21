<?php

include("../config/config.php");

unset ($_SESSION["user"]);

setFlashMessage("success", "You have logged out!");
header("Location: login.php");
exit();


include("../view/footer.php");