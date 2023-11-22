<?php 
$title ="Page d'accueil";
require './functions/compteur.php';
$compteur = nombre_vue ();
?>
<?php require ("./components/header.php") ?>

<div class="row mt-4 g-0" style="min-height:80vh;">
    <div class="col-md-10 text-center">
        <h2>Bienvenu(e) !</h2>
        Il y a au total <strong><?= $_SESSION['nbVistors'] ?></strong> visite<?= $compteur > 1 ? 's':'' ?> sur le site
    </div>
    <?php require ("./components/sideNav.php") ?>
</div>
<?php require ("./components/footer.php") ?>