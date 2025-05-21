<?php
include('../config/config.php');

$title = 'Object Details';

include('../view/header.php');
?><br>

<?php

if (isset($_GET['id'])) {
    $selectedTitle = $_GET['id'];

    $fileName = "../pdo/db/nvm.sqlite";
    $dsn = "sqlite:$fileName";
    $db = connectToDatabase($dsn);

    $sql = "SELECT title, data FROM object WHERE id = :id";


    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $selectedTitle, PDO::PARAM_STR);
    $stmt->execute();
    $res = $stmt->fetch();

    if ($res) {

        echo "<p>" . $res['data'] . "</p>";
    } else {
        echo "Title not found in the database.";
    }
} else {
    echo "Title not provided.";
}

?>
<?php include('../view/footer.php'); ?>
