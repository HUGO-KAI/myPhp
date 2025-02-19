<?php
//checkbox
$parfums =[
    "Fraise"=> 4,
    "Chocolat"=> 5,
    "Vanille"=> 3,
];
//radio
$cornets =[
    "Pot"=> 2,
    "Cornet"=> 3,
];
//checkbox
$supplements =[
    "Pépite de chocolat"=> 1,
    "Chantilly"=> 0.5,
];
$title = "Composer votre glace";
$total = 0;
require("./components/header.php");
require './functions/compteur.php';
ajouter_vue ();
function calculTotal ($data,$collection)
{
    $result = 0;
    if (isset($_GET[$data])) {
        $ingrediens = $_GET[$data];
        foreach($collection as $ingredien => $prix) {
            if (is_array($ingrediens) && in_array($ingredien, $ingrediens)) {
                $result += $prix;
            }elseif($ingredien == $ingrediens){
                $result += $prix;
            }
        }
    }
    return $result;
}
$total += calculTotal ("parfum",$parfums);
$total += calculTotal ("cornet",$cornets);
$total += calculTotal ("supplement",$supplements);
?>

<div class="row my-4 g-0" style="min-height:75vh;">
    <div class="col-md-10 ">
        <h5 class="text-center">Votre glacier</h5>
        <hr>
        <div class="row d-flex justify-content-around g-0">
            <!-- Parti gauche-->
            <div class="col-md-5">
                <form action='parfums.php' method="GET" class="container">
                    <h3>Choisissez vos parfums</h3>
                    <hr/>
                    <?php foreach($parfums as $parfum => $prix): ?>
                        <div class="checkbox">
                            <label>
                                <?= checkbox('parfum', $parfum, $_GET) ?>
                                <?= $parfum ?> - <?= $prix ?>€
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <h3>Choisissez votre cornet</h3>
                    <hr/>
                    <?php foreach($cornets as $cornet => $prix): ?>
                        <div class="radio">
                            <label>
                                <?= radio('cornet', $cornet, $_GET) ?>
                                <?= $cornet ?> - <?= $prix ?>€
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <h3>Choisissez vos suppléments</h3>
                    <hr/>
                    <?php foreach($supplements as $supplement => $prix): ?>
                        <div class="checkbox">
                            <label>
                                <?= checkbox('supplement', $supplement, $_GET) ?>
                                <?= $supplement ?> - <?= $prix ?>€
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-primary mt-2">Composer ma glace</button>
                </form>
            </div>
            <!-- Parti milieu-->
            <div class="col-md-5 bg-primary-subtle px-2">
                    <h3 class="text-center">Votre choix</h3>
                    <hr>
                    <h4>Parfums:</h4>
                    <?php if (isset($_GET["parfum"])): ?>
                        <?php foreach($_GET["parfum"] as $parfum): ?>
                            - <?= $parfum ?><br>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <hr>
                    <h4>Cornet:</h4>
                    <?php if (isset($_GET["cornet"])): ?>
                            - <?= $_GET["cornet"] ?><br>
                    <?php endif; ?>
                    <hr>
                    <h4>Supplements:</h4>
                    <?php if (isset($_GET["supplement"])): ?>
                        <?php foreach($_GET["supplement"] as $supplement): ?>
                            - <?= $supplement ?><br>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <hr>
                    <h4>Prix total: <?= $total ?></h4>
                    <hr>
                </div>
        </div>
    </div>
    
    <?php
    require("./components/sideNav.php");
    ?>
</div>
<?php
    require("./components/footer.php");
?>
