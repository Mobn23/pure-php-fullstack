<?php
include('../config/config.php');

$title = 'Galleri';

include('../view/header.php');
?>

<h1 style="text-align: center">Galleri</h1>
<div class="gallery-container">
    <?php
    $imageFolder = "../public/img/orig/";
    $images = glob($imageFolder . "*.jpg"); 

    $thumbnailWidthSmall = 75; 
    $thumbnailHeightSmall = 75;
    $thumbnailWidthLarge = 200;
    $thumbnailHeightLarge = 250; 

    $imagesPerPage = 4;

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    $startIndex = ($page - 1) * $imagesPerPage;
    $endIndex = min($startIndex + $imagesPerPage, count($images));

    echo '<div class="large-thumbnails">';
    for ($i = $startIndex; $i < $endIndex; $i++) {
        $image = $images[$i];
        echo '<div class="thumbnail">';
        echo '<a href="' . $image . '" target="_blank"><img src="' . $image . '" alt="Image" width="' . $thumbnailWidthLarge . '" height="' . $thumbnailHeightLarge . '"></a>';
        echo '</div>';
    }
    echo '</div>';

    echo '<div class="small-thumbnails">';
    foreach ($images as $image) {
        echo '<a href="' . $image . '" target="_blank"><img src="' . $image . '" alt="Image" width="' . $thumbnailWidthSmall . '" height="' . $thumbnailHeightSmall . '"></a>';
    }
    echo '</div>';

    // Pagination
    echo '<div class="pagination">';
    if ($page > 1) {
        echo '<a class="gallery-button" href="galleri.php?page=' . ($page - 1) . '">&lt; Föregående</a>';
    }
    if ($endIndex < count($images)) {
        echo ' <a class="gallery-button" href="galleri.php?page=' . ($page + 1) . '">Nästa &gt;</a>';
    }
    echo '</div>';
    ?>
</div>
<?php include('../view/footer.php'); ?>
