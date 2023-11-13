<?php
$adeviner = 81;
if (isset($_GET['chiffre'])) {
    if ($_GET['chiffre'] > $adeviner){
        echo 'Ce chiffre est trop grand';
    }elseif ($_GET['chiffre'] < $adeviner){
        echo 'Ce chiffre est trop petit';
    }else {
        echo 'Bingo!';
    } 
}
?>


<div class="container">
    <form action="/jeu.php" method="GET">
    <input type="number" name="chiffre" placeholder="entre 0 et 100" />
    <button type="submit">Deviner</button>
    </form>
</div>