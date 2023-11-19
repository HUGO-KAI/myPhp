<?php 
$title ="Nous contact";
require 'functions.php';
require 'header.php'; 
require 'config.php';
date_default_timezone_set('Europe/Paris');
$heure = (int)date('G');
$ouvert = in_creneaux($heure,CRENEAUX);
?>
<div class="row mt-4" style="min-height:75vh;">
    <div class="col-md-10 text-center">
        <h2 class="text-primary">Nous contacter</h2> 
        <div>
            <h5>Horaire d'ouvertures</h5>
            
            <hr>
            <div class="d-flex justify-content-center">
            
                <ul class="text-start">
                    <?php foreach(JOURS as $k => $jour): ?>
                        <li <?php if ($k + 1 === (int)date('N')): ?>style="color:green" <?php endif; ?> >
                            <strong><?= $jour ?></strong> : 
                            <?= horaireOuvert (CRENEAUX[$k])?>
                        </li>
                    <?php endforeach ?>
                </ul> 
                <?php if($ouvert): ?>
                    <div class="alert alert-success w-50">
                        Le magasin est ouvert
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger w-50">
                        Le magasin est fermé
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    
    <?php require 'sideNav.php' ?>
</div>
<?php require 'footer.php' ?>