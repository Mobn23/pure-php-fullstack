<?php
include('../config/config.php');

$title = 'Hemsida';

include('../view/header.php');
?>


    <header class="second_header">

        <h1>Välkommen till Nättraby Vägmuseum</h1>



        <p><em>Utforska historien om vägar och transporter.</em></p>
    </header>

<div class="main-content">
    <h2>Om Nättraby Vägmuseum</h2>
    <p><em>Välkommen till Nättraby Vägmuseum, där vi tar dig med på en resa genom historien om vägar, fordon och transporter.
        Utforska vår samling av utställningar och artefakter och lär dig om vägarnas utveckling och deras inverkan på samhället.
        Från hästdragna vagnar till moderna motorvägar, vi har allt.</em></p>
</div>

<section class="featured-exhibits">
    <a href="object.php">
    <h2>Få se på vår museum!</h2>
    </a>
    <div class="exhibit">
        <a href="../public/img/s.jpg" target="_blank">
            <img src="../public/img/s.jpg" alt="Exhibit 1">
        </a>
    </div>
    <div class="exhibit">
        <a href="../public/img/fv.jpg" target="_blank">
            <img src="../public/img/fv.jpg" alt="Exhibit 2">
        </a>
    </div>
</section>



<?php include('../view/footer.php') ?>
