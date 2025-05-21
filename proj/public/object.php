<?php
include('../config/config.php');

$title = 'Objekt';

include('../view/header.php');
?><br>

<?php

    $fileName="../pdo/db/nvm.sqlite";
    $dsn="sqlite:$fileName";
    $db = connectToDatabase($dsn);

    $sql = "SELECT id, title, image1, image1Text FROM object";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
    $db = null;

?>
<div class="column-container">
    <?php
        foreach ($res as $photo) {
            echo "<a href='object2.php?id={$photo['id']}'>";
            echo "<h2>{$photo['title']}</h2>";
            echo "</a>";
            echo "<p><em>{$photo['image1Text']}</em></p>";

            echo "<a href='../public/img/orig/{$photo['image1']}' target='_blank'>";
            echo "<img src='../public/img/orig/{$photo['image1']}' alt='{$photo['title']}'>";
            echo "</a>";
        }
    ?>
</div>


