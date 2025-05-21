<?php
include("../config/config.php");
$title = "Friday";
include("../view/header.php");

$dayNum = date('N');
$dLeft = 5 - $dayNum;
$weekday = date('l');
$date = isset($_GET["date"]) ? $_GET["date"] : date("Y-m-d");

$userDate = isset($_GET["date"]) ? $_GET["date"] : date('Y-m-d');
$dayNum = date('N', strtotime($userDate));
$weekday = date('l', strtotime($userDate));
$dLeft = ($dayNum <= 5) ? (5 - $dayNum) : (12 - $dayNum);
$fridayClass = ($dayNum == 5) ? 'fridayClass' : '';
?>

<h1><?=$weekday?></h1>
<h1><?=$date?></h1>

<?php if ($dayNum == 5) : ?>
    <h1 class="fridayClass"><em>It's Friday!!</em></h1>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/VneZR-shohc" frameborder="0" allowfullscreen></iframe>
<?php elseif ($dayNum == 6 || $dayNum == 7) : ?>
    <p>It's a Holiday!!</p>
<?php else : ?>
    <p><b><?=$dLeft?> Left days until it's Friday!</b></p>
    
    <div style="text-align: center;">
        <img src="../public/img/MrBean.gif" alt="Mr. Bean">
    </div>

<?php endif; ?>

<?php include('../view/footer.php'); ?>
