<?php $title ="My blog";
?>
<?php require ("header.php") ?>

<div class="container">
    <form action="index.php" method="GET">
    <input type="number" name="chiffre" placeholder="entre 0 et 100" />
    <button type="submit">Deviner</button>
    </form>
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
</div>

<?php require ("footer.php") ?>
