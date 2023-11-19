<?php 
$title ="Nous contact";
require 'functions.php';
require 'header.php'; 
require 'config.php';
date_default_timezone_set('Europe/Paris');
$heure = (int)date('G');
$ouvert = in_creneaux($heure,CRENEAUX);
?>
<div class="row mt-4 g-0" style="min-height:80vh;">
    <div class="col-md-10 text-center">
        <h2 class="text-primary">Nous contacter</h2> 
        <div>
            <h5>Horaire d'ouvertures</h5>
            <hr>
            <div class="row d-flex justify-content-around">
                <ul class="text-start col-md-5">
                    <?php foreach(JOURS as $k => $jour): ?>
                        <li <?php if ($k + 1 === (int)date('N')): ?>style="color:green" <?php endif; ?> >
                            <strong><?= $jour ?></strong> : 
                            <?= horaireOuvert (CRENEAUX[$k])?>
                        </li>
                    <?php endforeach ?>
                </ul> 
                <?php if($ouvert): ?>
                <div class="alert alert-success col-md-5">
                    Le magasin est ouvert maintenant
                </div>
                <?php else: ?>
                <div class="alert alert-danger col-md-5">
                    Le magasin est fermé maintenant
                    <? $reOuvert ?>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <?php require 'sideNav.php' ?>
</div>
<?php require 'footer.php' ?>