<?php
$aDeviner =150;
require("header.php");
?>
<?php
echo '<div class="container">';
if (isset($_GET["chiffre"])){
    if ($_GET["chiffre"]>$aDeviner){
        echo "le chiffre est trop grand";
    }elseif($_GET["chiffre"]<$aDeviner){
        echo "le chiffre est trop petit";
    }else{
        echo "Bingo!";
    };
};
echo <<<HTML
<form action='jeu.php' method="get" class="container-fluid px-0">
    <label for="chiffre">Deviner le chiffre:</label><br>
    <input type="number" id="chiffre" name="chiffre" placeholder="Entre 0 et 1000"><br>
    <input type="submit" class="mt-1" value="Confirmer">
</form>
HTML;
echo '<a href="jeu.php" class="btn btn-primary mt-1">Recommencer</a>';
echo '</div>';
?>


<?php
require("footer.php");
?>
