<?php
include('../config/config.php');

$title = 'Artikel';

include('../view/header.php');
?><br>

<?php

$fileName="../pdo/db/nvm.sqlite";
$dsn="sqlite:$fileName";
echo $dsn;
$db = connectToDatabase($dsn);

try {
    $sql = "SELECT id, title FROM article";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
    $mode = $db->query("PRAGMA journal_mode;")->fetchColumn();
    echo "Journal Mode: $mode";
} finally {
    $db = null; // Ensure the connection is closed
}


?>
<div class="container">
    <?php
    foreach ($res as $photo) {
        echo "<div>";    
        echo "<a href='articles2.php?id={$photo['id']}'>";
        echo "<h2>{$photo['title']}</h2>";
        echo "</a>";
        echo "</div>";
    }
    ?>
</div>

<?php include('../view/footer.php') ?>
