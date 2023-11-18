<?php 
$title ="Nous contact";
require 'functions.php';
require 'header.php'; 
require 'config.php';
?>
<div class="row mt-4" style="min-height:75vh;">
    <div class="col-8 text-center">
        <h2 class="text-primary">Nous contacter</h2> 
        <div>
            <h5>Horaire d'ouvertures</h5>
            <hr>
            <div class="d-flex justify-content-center">
                <ul class="text-start">
                    <?php for($i=0; $i<count(JOURS); $i++): ?>
                        <li><strong><?= JOURS[$i] ?></strong>: <?= horaireOuvert (CRENEAUX[$i])?></li>
                    <?php endfor ?>
                </ul> 
            </div>
            
           
        </div>
    </div>
    
    <?php require 'sideNav.php' ?>
</div>
<?php require 'footer.php' ?>