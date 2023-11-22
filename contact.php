<?php 
$title ="Nous contact";
require 'functions.php';
require './components/header.php'; 
require 'config.php';
require './functions/compteur.php';
nombre_vue ();
date_default_timezone_set('Europe/Paris');
$heure = (int)date('G');
$ouvert = in_creneaux($heure,CRENEAUX);
?>
<div class="row mt-4 g-0" style="min-height:80vh;">
    <div class="col-md-10 text-center">
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
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <?php require './components/sideNav.php' ?>
</div>
<?php require './components/footer.php' ?>