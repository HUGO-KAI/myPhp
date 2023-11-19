<?php
$aDeviner =150;
$erreur = null;
$succes = null;
$value = null;
$title = "Jouer un jeu";
require("header.php");
?>
<div class="row mt-4" style="min-height:75vh;">
    <div class="col-md-10 d-flex justify-content-center">
    <?php
echo '<div class="col-4 text-center">';
if (isset($_POST["chiffre"])){
    $value = (int)$_POST["chiffre"];
    if ($value > $aDeviner){
        $erreur = "Votre chiffre est trop grand";
    }elseif($value < $aDeviner){
        $erreur = "Votre chiffre est trop petit";
    }else{
        $succes = "Bravo! Vous avez deviné le chiffre <strong>$aDeviner</strong>";
    };
}; 
?>

<?php if ($erreur != null): ?>
<div class="alert alert-danger mt-2">
    <?= $erreur ?>
</div>
<?php elseif ($succes != null): ?>
<div class="alert alert-success mt-2">
    <?= $succes ?>
</div>
<?php else: ?>
<div class="alert alert-primary mt-2">
    Deviner le chiffre:
</div>
<?php endif ?>

<?php
echo <<<HTML
<form action='jeu.php' method="POST" class="container-fluid px-0">
    <input type="number" class="form-control" id="chiffre" name="chiffre" placeholder="Entre 0 et 1000" value="<?= $value ?>"><br>
    <input type="submit" value="Confirmer">
</form>
HTML;
echo '<a href="jeu.php" class="btn btn-primary mt-3">Recommencer</a>';
echo '</div>';
?>

    </div>



<?php
require("sideNav.php");
?>
</div>
<?php
require("footer.php");
?>
