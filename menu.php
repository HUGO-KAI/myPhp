
<?php
$title = "Notre menu";
$menu = file_get_contents("./data/menu.txt");
$lignes = explode("\n", $menu);
foreach($lignes as $k => $ligne){
    $lignes[$k] = explode("\t",trim($ligne));
}
header("content-type:text/html;charset=utf-8");
require 'functions.php';
require './components/header.php';
?>

<div class="row mt-4 g-0">
    <div class="container px-5 col-md-10">
        <h1 class="bg-primary-subtle text-center">Menu</h1>
        <?php foreach($lignes as $ligne): ?>
            <?php if(count($ligne) === 1): ?>
                <h2><?= $ligne[0] ?></h2>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-8">
                        <p>
                            <strong><?= $ligne[0] ?></strong><br>
                            <?= $ligne[1] ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <?= $ligne[2] ?>€
                    </div>
                </div>
            <?php endif ?>
        <?php endforeach ?>       
    </div>
    <?php require './components/sideNav.php'; ?>
</div>

<?php require './components/footer.php' ?>